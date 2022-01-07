<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;
use Spatie\MediaLibrary\MediaCollections\Models\Media;
use Spatie\Translatable\HasTranslations;

class ManufacturingCompany extends Model implements HasMedia
{
    use HasFactory,InteractsWithMedia,HasTranslations;

    public $translatable = ['name'];

    protected $fillable = ['name'];

    protected $hidden = ['media'];

    public $appends = ['image','name_ar','name_de'];

    public function getImageAttribute()
    {

        $photo = $this->getMedia('company')->first();
        if ($photo) {
            return $photo->getUrl('thumb');
        }

        return null;
    }


    public function getNameArAttribute(): string
    {
        return $this->getTranslation('name', 'ar');
    }

    public function getNameDeAttribute(): string
    {
        return $this->getTranslation('name', 'de');
    }

    public function registerMediaConversions(Media $media = null): void
    {
        $this->addMediaConversion('thumb')
            ->width(300)
            ->height(300)
            ->sharpen(10);
    }

}
