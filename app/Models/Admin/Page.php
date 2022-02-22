<?php

namespace App\Models\admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;

class Page extends Model
{
    use HasFactory,HasTranslations;

    protected $fillable = ['name','description','title','status','slug'];

    public $translatable = ['name','title','description'];

    public $appends = ['name_ar','name_de','description_ar','description_de','title_ar','title_de'];

    public function getNameArAttribute(): string
    {
        return $this->getTranslation('name', 'ar');
    }

    public function getNameDeAttribute(): string
    {
        return $this->getTranslation('name', 'de');
    }

    public function getTitleArAttribute(): string
    {
        return $this->getTranslation('title', 'ar');
    }

    public function getTitleDeAttribute(): string
    {
        return $this->getTranslation('title', 'de');
    }

    public function getDescriptionArAttribute(): string
    {
        return $this->getTranslation('description', 'ar');
    }

    public function getDescriptionDeAttribute(): string
    {
        return $this->getTranslation('description', 'de');
    }

}
