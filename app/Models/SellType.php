<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;

class SellType extends Model
{
    use HasFactory ,HasTranslations;

    protected $table = 'sell_types';

    public $translatable = ['name'];

    public $appends = ['name_ar','name_de'];

    protected $fillable = ['id','name'];

    public function getNameArAttribute(): string
    {
        return $this->getTranslation('name', 'ar');
    }

    public function getNameDeAttribute(): string
    {
        return $this->getTranslation('name', 'de');
    }

}
