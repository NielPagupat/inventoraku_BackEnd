<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class products extends Model
{
    use HasFactory;
    protected $table = 'products_table';
    protected $fillable = ['user_id', 'product_id', 'product_name', 'stock', 'capital_price', 'retail_price', 'description', 'autoResStatus'];
}
