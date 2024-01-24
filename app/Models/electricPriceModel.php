<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class electricPriceModel extends Model
{
    use HasFactory;
    protected $table = 'electricbill';
    public $timestamps = true;
}
