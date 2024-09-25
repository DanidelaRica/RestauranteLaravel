<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\CreditCard;

class CreditCardController extends Controller
{
    public function create(Request $request) {
        $data = $this->validate($request, [
            'num_card' => 'required',
            'expire_month' => 'required',
            'expire_year' => 'required',
            'cvv' => 'required',
        ],[
            'num_card.required' => 'El número es obligatorio',
            'expire_month.required' => 'El mes de expiración es obligatorio',
            'expire_year.required' => 'El año de expiración es obligatorio',
            'cvv.required' => 'El CVV es obligatorio'
        ]);

        $result = Auth::user()->creditCards()->create($data);
        return redirect()->route('profile.index')->with('result', $result ? 'Tarjeta creada correctamente' : 'No ha sido posible crear la tarjeta');
    }

    public function destroy($card)
    {
        $result = CreditCard::where('num_card', $card)->delete();
        return back()->with('result', $result ? 'Tarjeta eliminada con éxito' : 'No se ha podido eliminar la tarjeta');
    }
}
