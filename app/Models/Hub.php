<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Hub extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'location', 'capacity', 'available_bikes'];

    public function bicycles()
    {
        return $this->hasMany(Bicycle::class);
    }
}
