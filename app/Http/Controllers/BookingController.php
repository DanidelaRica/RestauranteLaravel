<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Menu;
use App\Models\Table;
use App\Models\Booking;
use App\Models\CreditCard;
use App\Models\Calendar;
use App\Models\Guest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Carbon;
use Carbon\CarbonPeriod;

class BookingController extends Controller
{
    public function calendar(Request $request) {

        $start_date = Carbon::parse($request->input('start'));
        $end_date = Carbon::parse($request->input('end'));

        $dates = CarbonPeriod::create($start_date, $end_date);


        $bookings = Booking::all();

        $available_hours = Calendar::getHours();

        $array_bookings = $bookings->map(function ($item) {

            $calendar = $item->calendar()->first();
            return Carbon::parse($calendar->date . ' ' . $calendar->hour)->format('Y-m-d H:i');
        });


        foreach($dates as $item) {

            $date = $item->format('Y-m-d');


            foreach($available_hours as $hour) {

                $reserved = $array_bookings->contains($date . ' ' . $hour);

                if (!$reserved) {
                    $data[] = [
                        'start' => $date . ' ' . $hour,
                        'end' => $date,
                        'title' => 'Disponible',
                        'color' => 'green'
                    ];
                }
            }
        }


        return response()->json($data);
    }

    public function book(Request $request) {
        $data = $request->input('data');
        parse_str($data, $values);

        $menu = Menu::find($values['menu']);
        $table = Table::find($values['table']);


        $exists = Calendar::whereRaw("DATE(date) = '" . $values['date'] . "' AND hour = '" . $values['time'] . "'")->count();


        if ($exists > 0) {
            return response()->json(['success' => false, 'message' => 'La fecha ya está ocupada']);
        } else {

            if (Auth::user() && $values['num_card']) {
                $num_card = CreditCard::where('num_card', $values['num_card'])->first();
            } else {

                $exists_num_card = CreditCard::where('num_card', $values['credit_card'])->count();

                if($exists_num_card > 0) {
                    return response()->json(['success' => false, 'message' => 'La tarjeta de crédito ya existe']);
                } else {
                    $num_card = CreditCard::create([
                        'num_card' => $values['credit_card'],
                        'expire_month' => $values['expire_month'],
                        'expire_year' => $values['expire_year'],
                        'cvv' => $values['cvv'],
                    ]);
                }
            }


            if (!Auth::user()) {
                $guest = Guest::create([
                    'email' => $values['email'],
                    'name' => $values['name'],
                    'surname' => $values['surname'],
                    'phone' => $values['phone'],
                ]);
            } else {
                $guest = null;
            }


            $date_booking = Calendar::create([
                'date' => $values['date'],
                'hour' => $values['time'],
                'status' => 'reserved'
            ]);


            $insert = [
                'id_client' => Auth::user() ? Auth::user()->id : null,
                'id_guests' => $guest ? $guest->id : null,
                'id_menu' => $menu->id,
                'id_table' => $table->id,
                'date_booking' => $date_booking->id,
                'num_card' => $num_card->num_card,
                'num_people' => $values['num_people']
            ];

            $result = Booking::create($insert);

            return response()->json(['success' => $result, 'message' => $result ? 'Reserva realizada' : 'No se ha podido realizar la reserva']);
        }
    }

    public function destroy(Booking $booking)
    {
        $result = $booking->delete();
        return back()->with('result', $result ? 'Reserva eliminada con éxito' : 'No se ha podido cancelar la reserva');
    }
}
