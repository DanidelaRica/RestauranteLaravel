<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CreditCard extends Model
{
    use HasFactory;

    //protected $primaryKey = 'num_card';

    /* Defining the attributes that can be mass assigned. */
    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'num_card', 'expire_month', 'expire_year', 'cvv'
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'id_client');
    }

    public function bookings()
    {
        return $this->hasMany(Booking::class, 'num_card');
    }
}
