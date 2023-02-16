<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Carre extends Model
{
    use HasFactory;

    protected $guarded = [];
    public $table = 'carres';
}
