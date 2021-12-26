<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;

class ProductFlag extends Model
{
    use HasFactory,HasTranslations;

    public $translatable = ['name'];

    protected $fillable = ['name'];

    public $appends = ['name_ar','name_de'];

    public function getNameArAttribute(): string
    {
        return $this->getTranslation('name', 'ar');
    }

    public function getNameDeAttribute(): string
    {
        return $this->getTranslation('name', 'de');
    }
}
