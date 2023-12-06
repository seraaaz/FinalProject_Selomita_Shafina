<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class menuOrder extends Model
{
    use HasFactory;

    protected $fillable = [
        'menu_id',
        'order_id',
        'quantity',
    ];
}
