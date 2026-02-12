<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

abstract class Transaction extends Model
{
    protected $fillable = [
        'date',
        'name',
        'comment',
    ];
}
