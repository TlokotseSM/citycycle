<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MaintenanceLog extends Model
{
    use HasFactory;

    protected $fillable = [
        'bicycle_id',
        'staff_id',
        'maintenance_type',
        'description',
        'completed_at',
        'next_inspection_date'
    ];

    public function bicycle()
    {
        return $this->belongsTo(Bicycle::class);
    }

    public function staff()
    {
        return $this->belongsTo(User::class, 'staff_id');
    }
}
