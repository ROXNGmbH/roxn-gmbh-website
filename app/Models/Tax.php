<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tax extends Model
{
    use HasFactory;

    protected $table = "taxes";

    protected $fillable = ['id','tax','created_at'];

    protected $hidden = ['updated_at'];

}
