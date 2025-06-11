<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Database\Factories\HubFactory;

class Hub extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'location',
        'capacity',
        'available_bikes'
    ];

    protected static function newFactory()
    {
        return HubFactory::new();
    }

    public function bicycles()
    {
        return $this->hasMany(Bicycle::class);
    }

    public function updateAvailableBikes()
    {
        $this->update([
            'available_bikes' => $this->bicycles()
                ->where('status', 'available')
                ->count()
        ]);
    }
}
