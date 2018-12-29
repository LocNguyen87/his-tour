<?php

namespace App\Nova;

use Laravel\Nova\Fields\ID;
use Laravel\Nova\Fields\Text;
use Laravel\Nova\Fields\Image;
use Laravel\Nova\Fields\Number;
use Laravel\Nova\Fields\BelongsTo;
use Laravel\Nova\Fields\Boolean;
use Laravel\Nova\Fields\Date;
use Laravel\Nova\Fields\Textarea;
use Laravel\Nova\Fields\Currency;
use Laravel\Nova\Panel;
use Illuminate\Http\Request;
use Laravel\Nova\Http\Requests\NovaRequest;

class Registration extends Resource
{
    /**
     * The model the resource corresponds to.
     *
     * @var string
     */
    public static $model = 'App\Registration';

    /**
     * The single value that should be used to represent the resource when being displayed.
     *
     * @var string
     */
    public static $title = 'id';

    /**
     * The columns that should be searched.
     *
     * @var array
     */
    public static $search = [
        'id','registration_code'
    ];

    /**
     * Get the fields displayed by the resource.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function fields(Request $request)
    {
        BelongsTo::make('Tour');
        return [
            ID::make()->sortable(),
            Text::make('Registration Code'),
            BelongsTo::make('Tour', 'tour', 'App\Nova\Tour'),

            new Panel('Personal Information', $this->personalFields()),
            new Panel('Price Information', $this->priceFields()),

        ];
    }

    protected function personalFields() {
        return [
          Text::make('Full Name'),
          Textarea::make('Address'),
          Text::make('Phone Number'),
          Text::make('Email'),
        ];
    }

    protected function priceFields() {
        return [
          Number::make('Adults Number'),
          Number::make('Adults Price')->resolveUsing(function ($price) {
              return number_format($price, 0, ',', '.') . ' VNĐ';
          }),
          Number::make('Infants Number'),
          Number::make('Infants Price')->resolveUsing(function ($price) {
              return number_format($price, 0, ',', '.') . ' VNĐ';
          }),
          Number::make('Childs Single Number'),
          Number::make('Childs Single Price')->resolveUsing(function ($price) {
              return number_format($price, 0, ',', '.') . ' VNĐ';
          }),
          Number::make('Childs Shared Number'),
          Number::make('Childs Shared Price')->resolveUsing(function ($price) {
              return number_format($price, 0, ',', '.') . ' VNĐ';
          }),

          Number::make('Total Price')->resolveUsing(function ($price) {
              return number_format($price, 0, ',', '.') . ' VNĐ';
          }),
        ];
    }

    /**
     * Get the cards available for the request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function cards(Request $request)
    {
        return [];
    }

    /**
     * Get the filters available for the resource.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function filters(Request $request)
    {
        return [];
    }

    /**
     * Get the lenses available for the resource.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function lenses(Request $request)
    {
        return [];
    }

    /**
     * Get the actions available for the resource.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function actions(Request $request)
    {
        return [];
    }
}
