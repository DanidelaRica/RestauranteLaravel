<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Calendar extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'date', 'hour', 'status'
    ];

    public function bookings()
    {
        return $this->hasMany(Booking::class, 'date_booking');
    }

    public static function getHours() {
        return collect([
            '10:00', '11:00', '12:00', '13:00', '14:00', '15:00', '16:00'
        ]);
    }
}
