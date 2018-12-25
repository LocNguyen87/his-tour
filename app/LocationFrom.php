<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class LocationFrom extends Model
{
    public $table = 'locations_from';
    public $timestamps = false;
    /**
     * @var array
     */
    protected $fillable = [
        'code', 'title', 'title_alias', 'summary'
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
        return $this->hasMany(Tour::class, 'from_id');
    }
}
