<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ServiceList extends Model
{
    use HasFactory;

    protected $fillable = [
        'service'
    ];

    public function service()
    {
        return $this->hasMany(Service::class, 'service_lists_id');
    }
}
