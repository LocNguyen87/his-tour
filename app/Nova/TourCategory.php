<?php

namespace App\Nova;

use Laravel\Nova\Fields\ID;
use R64\NovaFields\Text;
use R64\NovaFields\Image;
use R64\NovaFields\Number;
use Laravel\Nova\Fields\Markdown;
use Laravel\Nova\Fields\Select;
use Laravel\Nova\Fields\HasMany;
use R64\NovaFields\Row;

use Illuminate\Http\Request;
use Laravel\Nova\Http\Requests\NovaRequest;

class TourCategory extends Resource
{
    /**
     * The model the resource corresponds to.
     *
     * @var string
     */
    public static $model = 'App\TourCategory';

    /**
     * The single value that should be used to represent the resource when being displayed.
     *
     * @var string
     */
    public static $title = 'title';

    /**
     * The columns that should be searched.
     *
     * @var array
     */
    public static $search = [
        'id', 'title'
    ];

    /**
     * Get the fields displayed by the resource.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function fields(Request $request)
    {
        return [
            ID::make()->sortable(),
            Text::make('Tên nhóm tour', 'title')->sortable()->rules('required', 'string'),
            Markdown::make('Nội dung mô tả', 'summary'),
            Image::make('Hình đại diện', 'image')->rules('required', 'image'),
            Row::make('Thông số', [
              Text::make('Name')
                ->fieldClasses('w-full px-8 py-6')
                ->hideLabelInForms(),
              Text::make('Value')
                ->fieldClasses('w-full px-8 py-6')
                ->hideLabelInForms(),
            ], 'params')->fieldClasses('w-4/5 px-8 py-6')
              ->labelClasses('w-1/5 px-8 py-6'),
            // HasMany::make('Tours')
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
