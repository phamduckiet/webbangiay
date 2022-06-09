<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class xacnhan extends Model
{
    use HasFactory;
    protected $table = 'xacnhans';
    protected $fillable = [
        'user_id',
        'product_id',
        'price_id',
        'soluong',
        'size',
        'hovaten',
        'sodienthoai',
        'diachi',
    ];
}
