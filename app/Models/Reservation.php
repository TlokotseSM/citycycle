<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Database\Factories\ReservationFactory;

class Reservation extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'bicycle_id',
        'start_time',
        'end_time',
        'status' // pending, active, completed, cancelled
    ];

    protected $casts = [
        'start_time' => 'datetime',
        'end_time' => 'datetime',
    ];

    protected static function newFactory()
    {
        return ReservationFactory::new();
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function bicycle()
    {
        return $this->belongsTo(Bicycle::class);
    }

    public function scopeActive($query)
    {
        return $query->where('status', 'active');
    }

    public function scopeUpcoming($query)
    {
        return $query->where('start_time', '>', now())
            ->where('status', 'pending');
    }
}
