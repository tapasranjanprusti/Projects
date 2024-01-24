<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CreatePaymentModel extends Model
{
    use HasFactory;
    protected $table = 'createpayment';
    public $timestamps = true;
}
