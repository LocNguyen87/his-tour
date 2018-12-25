<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tour extends Model
{
    protected $fillable = [
        'title',
        'title_alias',
        'image',
        'price',
        'sale_price',
        'specifications',
        'detail',
        'schedule',
        'note',
        'itinerary',
        'public',
        'ordering',
        'featured',
        'is_home',
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
    public function getTileAliasAttribute($value)
    {
        return $value;
    }

    public function setTileAliasAttribute($value)
    {
        $this->attributes['title_alias'] = str_slug($value);
    }

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
            $this->attributes['begin_date'] = \Carbon\Carbon::createFromFormat('d-m-Y', $value)->format('Y-m-d');
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

    public function getSalePriceAttribute($value)
    {
        return $value;
    }

    public function setSalePriceAttribute($value)
    {
        if ($value != null)
            $this->attributes['sale_price'] = str_replace('.', '', $value);
        else
            $this->attributes['sale_price'] = '0.0000';
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
