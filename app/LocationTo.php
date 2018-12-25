<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class LocationTo extends Model
{
    public $table = 'locations_to';
    public $timestamps = false;

    protected $fillable = [
        'code', 'title', 'summary'
    ];


    public static function getList($prependList = [], $appendList = [])
    {
        $all = self::all(['id', 'title'])->toArray();
        $list = array_column($all, 'title', 'id');
        foreach ($appendList as $key => $title) {
            $prependList[$key] = $title;
        }
        foreach ($list as $key => $title) {
            $prependList[$key] = $title;
        }
        return $prependList;
    }

    public function tours()
    {
        return $this->hasMany(Tour::class, 'to_id');
    }
}
