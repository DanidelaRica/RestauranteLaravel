<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Carbon;

class Booking extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'id_client', 'id_guests', 'id_table', 'id_menu', 'num_card', 'date_booking', 'num_people'
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'id_client');
    }

    public function guest()
    {
        return $this->belongsTo(Guest::class, 'id_guests');
    }

    public function table()
    {
        return $this->belongsTo(Table::class, 'id_table');
    }

    public function menu()
    {
        return $this->belongsTo(Menu::class, 'id_menu');
    }

    public function creditCard()
    {
        return $this->belongsTo(CreditCard::class, 'num_card', 'num_card');
    }

    public function calendar()
    {
        return $this->belongsTo(Calendar::class, 'date_booking');
    }
}
