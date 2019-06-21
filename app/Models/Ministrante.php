<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Ministrante extends Model
{
    public $fillable = ['nome', 'email', 'formacao', 'idade'];
}
