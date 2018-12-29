<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Registration extends Model
{
    public $table = 'registrations';

    public function getRouteKeyName()
    {
        return 'registration_code';
    }

    protected $fillable = [
        'registration_code',
        'full_name',
        'address',
        'phone_number',
        'email',
        'adults_price',
        'adults_number',
        'infants_price',
        'infants_number',
        'childs_shared_price',
        'childs_shared_number',
        'childs_single_price',
        'childs_single_number',
        'total_price',
        'tour_id',
        'status'
    ];

    protected $dates = [
        'created_at',
        'updated_at'
    ];


    public function tour()
    {
        return $this->belongsTo(Tour::class, 'tour_id');
    }
}
