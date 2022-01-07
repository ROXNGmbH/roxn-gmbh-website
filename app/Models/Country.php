<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;
use Spatie\MediaLibrary\MediaCollections\Models\Media;
use const http\Client\Curl\PROXY_HTTP;

class Country extends Model implements HasMedia
{
    use HasFactory, InteractsWithMedia;

    protected $table = "countries";

    protected $fillable = ['id', 'name', 'created_at'];

    protected $hidden = ['updated_at','media'];

    public $appends = ['image'];

    public function getImageAttribute()
    {

        $photo = $this->getMedia('country')->first();
        if ($photo) {
            return $photo->getUrl('thumb');
        }

        return null;
    }

    public function registerMediaConversions(Media $media = null): void
    {
        $this->addMediaConversion('thumb')
            ->width(100)
            ->height(100)
            ->sharpen(10);
    }

    public function product()
    {
        return $this->belongsTo(Product::class);
    }
}
