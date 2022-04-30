<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SoldProduct extends Model
{
    use HasFactory;

    protected $fillable = [
        'userEmail',
        'productId',
        'productPrice',
        'userCountry',
        'userHouse',
        'userAppartement',
        'userZip',
    ];
}