<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
    use HasFactory;

    protected $fillable = [
        'service',
        'price',
        'service_list_id',
        'vehicle_lists_id',
        'shop_id',
    ];

    public function servicelist()
    {
        return $this->belongsTo(ServiceList::class);
    }

    public function shop()
    {
        return $this->belongsTo(Shops::class);
    }

    public function vehiclelist()
    {
        return $this->belongsTo(VehicleList::class);
    }
}
