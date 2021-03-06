<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Spatie\MediaLibrary\Models\Media;
use Spatie\MediaLibrary\HasMedia\HasMedia;
use Spatie\MediaLibrary\HasMedia\HasMediaTrait;
use Spatie\EloquentSortable\Sortable;
use Spatie\EloquentSortable\SortableTrait;

class Tour extends Model implements HasMedia, Sortable
{
    use HasMediaTrait;
    use SortableTrait;

    public function getRouteKeyName()
    {
        return 'title_alias';
    }

    protected $fillable = [
        'title',
        'title_alias',
        'image',
        'price',
        'specifications',
        'detail',
        'schedule',
        'note',
        'itinerary',
        'public',
        'ordering',
        'featured',
        'hits',
        'params',
        'times',
        'begin_date',
        'from_id',
        'category_id'
    ];
    protected $dates = [
        'created_at',
        'updated_at',
        'begin_date'
    ];

    protected $casts = [
        'begin_date'  =>  'date:Y-m-d'
    ];

    public $sortable = [
        'order_column_name' => 'ordering',
        'sort_when_creating' => true,
    ];

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

    public function registerMediaConversions(Media $media = null)
    {
      $this->addMediaConversion('banner')
          ->width(1400)
          ->height(450);

      $this->addMediaConversion('gallery')
          ->width(1200)
          ->height(500);

      $this->addMediaConversion('thumb')
          ->width(300)
          ->height(300);

      $this->addMediaConversion('medium-size')
          ->width(800)
          ->height(800);
    }

    public function registerMediaCollections()
    {
        $this->addMediaCollection('feature')->singleFile();
        $this->addMediaCollection('banner')->singleFile();
        $this->addMediaCollection('gallery');
    }

    public function from()
    {
        return $this->belongsTo(LocationFrom::class, 'from_id');
    }

    public function category()
    {
        return $this->belongsTo(TourCategory::class, 'category_id');
    }

    public function registrations()
    {
        return $this->hasMany(Registration::class);
    }
}
