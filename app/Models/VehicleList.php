<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class VehicleList extends Model
{
    use HasFactory;

    protected $fillable = [
        'vehicle_type',
        'status',
    ];
}
