<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class user_info extends Model
{
    use HasFactory;
    protected $table = 'user_info';
    protected $fillable = ['email', 
                            'id', 
                            'firstname', 
                            'lastname', 
                            'mi', 
                            'address', 
                            'business_name', 
                            'business_address', 
                            'payment_option', 
                            'owner_type'];

}
