<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Database\Factories\MaintenanceLogFactory;

class MaintenanceLog extends Model
{
    use HasFactory;

    protected $fillable = [
        'bicycle_id',
        'staff_id',
        'maintenance_type', // inspection, repair, routine
        'description',
        'completed_at',
        'next_inspection_date'
    ];

    protected $casts = [
        'completed_at' => 'datetime',
        'next_inspection_date' => 'datetime',
    ];

    protected static function newFactory()
    {
        return MaintenanceLogFactory::new();
    }

    public function bicycle()
    {
        return $this->belongsTo(Bicycle::class);
    }

    public function staff()
    {
        return $this->belongsTo(User::class, 'staff_id');
    }

    public function scopeRecent($query)
    {
        return $query->orderBy('completed_at', 'desc');
    }
}
