<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Guest extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'email', 'name', 'surname', 'phone'
    ];

    public function bookings()
    {
        return $this->hasMany(Booking::class, 'id_guests');
    }
}
