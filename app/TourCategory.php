<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TourCategory extends Model
{
  protected $table = 'categories';

  /**
   * Fillable field
   *
   * @var mixed
   */
  protected $fillable = [
      'title',
      'title_alias',
      'image',
      'summary',
      'params',
      'public'
  ];

  public function getTileAliasAttribute($value)
  {
      return $value;
  }

  public function setTileAliasAttribute($value)
  {
      $this->attributes['title_alias'] = str_slug($value);
  }

  public function getParamsAttribute($value)
  {
      return json_decode($value, false);
  }

  public function setParamsAttribute($value)
  {
      $this->attributes['params'] = json_encode($value, JSON_UNESCAPED_UNICODE);
  }

  public function tours()
  {
      return $this->hasMany(Tour::class);
  }
}
