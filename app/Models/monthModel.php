<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class monthModel extends Model
{
    use HasFactory;
    protected $table = 'monthtbl';
    public $timestamps = true;
}
