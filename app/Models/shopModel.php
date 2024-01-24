<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class shopModel extends Model
{
    use HasFactory;
    protected $table = 'shop';
    public $timestamps = true;
}
