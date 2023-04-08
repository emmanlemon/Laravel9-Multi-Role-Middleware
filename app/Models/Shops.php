<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Shops extends Model
{
    use HasFactory;
    
    protected $fillable = [
        'status',
        'logo',
        'shop_name',
        'user_role_id',
        'users_id',
        'address',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
