<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Spatie\MediaLibrary\Models\Media;
use Spatie\MediaLibrary\HasMedia\HasMedia;
use Spatie\MediaLibrary\HasMedia\HasMediaTrait;

class Tour extends Model implements HasMedia
{
    use HasMediaTrait;
    protected $fillable = [
        'title',
        'title_alias',
        'image',
        'price',
        'sale_price', // will be removed
        'specifications',
        'detail',
        'schedule',
        'note',
        'itinerary',
        'public',
        'ordering',
        'featured',
        'is_home', // will be removed
        'hits',
        'params',
        'times',
        'begin_date',
        'from_id',
        'to_id',
        'category_id'
    ];
    protected $dates = [
        'created_at',
        'updated_at'
    ];

    public function getBeginDateAttribute($value)
    {
        if (!empty($value)) {
            return \Carbon\Carbon::createFromFormat('Y-m-d', $value)->format('d-m-Y');
        }
        return $value;
    }

    public function setBeginDateAttribute($value)
    {
        if (!empty($value)) {
            $this->attributes['begin_date'] = \Carbon\Carbon::createFromFormat('Y-m-d', $value)->format('Y-m-d');
        } else {
            $this->attributes['begin_date'] = NULL;
        }
    }

    public function getParamsAttribute($value)
    {
        return json_decode($value, false);
    }

    public function setParamsAttribute($value)
    {
        $this->attributes['params'] = json_encode($value, JSON_UNESCAPED_UNICODE);
    }

    public function getFeaturedAttribute($value)
    {
        if (is_null($value)) {
            $value = 0;
        }
        return $value;
    }

    public function getPriceAttribute($value)
    {
        return $value;
    }

    public function setPriceAttribute($value)
    {
        if ($value != null)
            $this->attributes['price'] = str_replace('.', '', $value);
        else
            $this->attributes['price'] = '0.0000';
    }

    public function registerMediaConversions(Media $media = null)
    {
        $this->addMediaConversion('thumb')
            ->width(130)
            ->height(130);
    }

    public function registerMediaCollections()
    {
        $this->addMediaCollection('feature')->singleFile();
        $this->addMediaCollection('gallery');
    }

    public function images()
    {
        return $this->hasMany(TourImage::class);
    }

    public function from()
    {
        return $this->belongsTo(LocationFrom::class, 'from_id');
    }

    public function to()
    {
        return $this->belongsTo(LocationTo::class, 'to_id');
    }

    public function category()
    {
        return $this->belongsTo(TourCategory::class, 'category_id');
    }
}
