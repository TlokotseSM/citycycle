<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

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
}
