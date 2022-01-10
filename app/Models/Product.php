<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;
use Spatie\MediaLibrary\MediaCollections\Models\Media;
use Spatie\Translatable\HasTranslations;

class Product extends Model implements HasMedia
{
    use HasFactory, InteractsWithMedia, HasTranslations;

    protected $table = "products";

    public $translatable = ['name','description','slug'];

    public $appends = ['images', 'name_ar', 'name_de', 'description_ar', 'description_de'];

    public $hidden = ['updated_at', 'media', 'name', 'description'];

    protected $fillable = [
        'name',
        'description',
        'slug',
        'status',
        'price',
        'purchase_price',
        'offer_price',
        'qty',
        'min_gty',
        'max_gty',
        'weight',
        'tages',
        'barcode',
        'delivery_time_id',
        'tax_id',
        'unit_id',
        'category_id',
        'sub_category_id',
        'manufacturing_company_id',
        'sell_type_id',
        'flag_id',
        'created_at',
        'no_product',
        'country_id',
        'tags',
        'bro_product',
    ];

    public function getImagesAttribute(){

        $images  = $this->getMedia('product');
        if($images){
            $photo = [];
            foreach($images as $key => $image){
                $photo[] =  $image->getUrl();
            }
            return $photo;
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

    public function getDescriptionArAttribute(): string
    {
        return $this->getTranslation('description', 'ar');
    }

    public function getDescriptionDeAttribute(): string
    {
        return $this->getTranslation('description', 'de');
    }

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function subCategory()
    {
        return $this->belongsTo(Category::class);
    }

    public function tax()
    {
        return $this->belongsTo(Tax::class);
    }

    public function unit()
    {
        return $this->belongsTo(Unit::class);
    }

    public function country()
    {
        return $this->hasOne(Country::class);
    }
}
