<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Laravel\Sanctum\HasApiTokens;

class Cupon extends Model
{
    use HasApiTokens,HasFactory;
    protected $table = "cupon";
    public $timestamps = false;
}
