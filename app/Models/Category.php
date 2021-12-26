<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;
use Spatie\MediaLibrary\MediaCollections\Models\Media;
use Spatie\Translatable\HasTranslations;

class Category extends Model implements HasMedia
{
    use HasFactory, InteractsWithMedia, HasTranslations;

    protected $table = "categories";

    protected $fillable = ['id', 'name', 'status', 'created_at'];

    public $translatable = ['name'];

    public $appends = ['image','name_ar','name_de'];

    public $hidden = ['updated_at','media','name'];

    public function getImageAttribute()
    {

        $photo = $this->getMedia('category')->first();
        if ($photo) {
            return $photo->getUrl('thumb');
        }

        return null;
    }

    public function registerMediaConversions(Media $media = null): void
    {
        $this->addMediaConversion('thumb')
            ->width(300)
            ->height(300)
            ->sharpen(10);
    }

    public function getNameArAttribute(): string
    {
        return $this->getTranslation('name', 'ar');
    }

    public function getNameDeAttribute(): string
    {
        return $this->getTranslation('name', 'de');
    }

    public function subCategory()
    {
        return $this->hasMany(SubCategory::class);
    }
}
