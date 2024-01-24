<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class shopPriceSet extends Model
{
    use HasFactory;
    protected $table = 'sqrfeetprice';
    public $timestamps = true;
}
