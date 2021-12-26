<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SellType extends Model
{
    use HasFactory;

    protected $table = 'sell_types';

    protected $fillable = ['id','name'];
}
