<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TenantModel extends Model
{
    use HasFactory;
    protected $table = 'tenantsdetails';
    public $timestamps = true;
}
