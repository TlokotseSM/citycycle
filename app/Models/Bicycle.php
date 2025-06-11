<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Database\Factories\BicycleFactory;

class Bicycle extends Model
{
    use HasFactory;

    protected $fillable = [
        'hub_id',
        'identifier',
        'status', // available, reserved, in_maintenance
        'last_inspection_date',
        'next_inspection_date'
    ];

    protected $casts = [
        'last_inspection_date' => 'datetime',
        'next_inspection_date' => 'datetime',
    ];

    protected static function newFactory()
    {
        return BicycleFactory::new();
    }

    public function hub()
    {
        return $this->belongsTo(Hub::class);
    }

    public function reservations()
    {
        return $this->hasMany(Reservation::class);
    }

    public function maintenanceLogs()
    {
        return $this->hasMany(MaintenanceLog::class);
    }

    public function scopeAvailable($query)
    {
        return $query->where('status', 'available');
    }

    public function scopeDueForInspection($query)
    {
        return $query->where('next_inspection_date', '<=', now())
            ->orWhere('status', 'in_maintenance');
    }
}
