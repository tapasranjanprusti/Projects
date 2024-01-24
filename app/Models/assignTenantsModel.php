<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class assignTenantsModel extends Model
{
    use HasFactory;
    protected $table = 'assign_shop_details';
    public $timestamps = true;
}
