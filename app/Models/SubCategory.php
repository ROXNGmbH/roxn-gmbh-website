<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;
use Spatie\MediaLibrary\MediaCollections\Models\Media;
use Spatie\Translatable\HasTranslations;

class SubCategory extends Model implements HasMedia
{
    use HasFactory, InteractsWithMedia, HasTranslations;

    protected $table = "sub_categories";

    protected $fillable = ['id', 'name', 'status', 'category_id', 'created_at'];

    public $translatable = ['name'];

    public $hidden = ['updated_at','media'];

    public $appends = ['image','name_ar','name_de'];

    public function getImageAttribute()
    {

        $photo = $this->getMedia('subCategory')->first();
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

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

}
