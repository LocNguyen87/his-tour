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
use Illuminate\Http\Request;
use Laravel\Nova\Http\Requests\NovaRequest;
use Benjaminhirsch\NovaSlugField\Slug;
use Benjaminhirsch\NovaSlugField\TextWithSlug;
use Manogi\Tiptap\Tiptap;
use Arsenaltech\NovaTab\NovaTab;
use Arsenaltech\NovaHeader\NovaHeader;
use Ebess\AdvancedNovaMediaLibrary\Fields\Images;
use R64\NovaFields\JSON;
use Naxon\NovaFieldSortable\Concerns\SortsIndexEntries;
use Naxon\NovaFieldSortable\Sortable;
use Vyuldashev\NovaMoneyField\Money;

class Tour extends Resource
{
    use SortsIndexEntries;
    public static $defaultSortField = 'id';
    /**
     * The model the resource corresponds to.
     *
     * @var string
     */
    public static $model = 'App\Tour';

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
        'id',
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
            new NovaTab('Basic Information', [
                    NovaHeader::make('Tour Basic Information'),
                    ID::make()->sortable(),

                    TextWithSlug::make('Tour Name', 'title')
                        ->sortable()
                        ->rules('required', 'string')
                        ->slug('Title Alias'),
                    Slug::make('Title Alias','title_alias')
                      ->rules('required','string')
                      ->hideFromIndex(),
                    Text::make('Tour SKU', 'sku'),
                    Text::make('Times', 'times')->hideFromIndex(),
                    Text::make('Flight', 'flight', 'VND')->hideFromIndex(),
                    Money::make('Price','VND')->locale('vi-VN')->hideFromIndex(),
                    BelongsTo::make('Tour Category', 'category', 'App\Nova\TourCategory')->hideFromIndex(),
                    BelongsTo::make('Tour From', 'from', 'App\Nova\LocationFrom')->hideFromIndex(),
                    Boolean::make('Visible', 'public'),
                    Boolean::make('Featured', 'featured'),
                    Date::make('Departure Date','begin_date')->format('DD-MM-Y'),

                ]),
                new NovaTab('Image & Gallery', [
                    NovaHeader::make('Tour Featured Image & Gallery')->hideFromIndex(),
                    Images::make('Featured Image', 'feature') // second parameter is the media collection name
                        ->thumbnail('thumb') // conversion used to display the image
                        ->rules('required')
                        ->setFileName(function($originalFilename, $extension, $model){
                        return 'image-' . md5($originalFilename) . '.' . $extension;
                    }),
                    Images::make('Images Gallery', 'gallery') // second parameter is the media collection name
                    ->conversion('medium-size') // conversion used to display the "original" image
                    ->conversionOnView('thumb') // conversion used on the model's view
                    ->thumbnail('thumb') // conversion used to display the image on the model's index page
                    ->multiple() // enable upload of multiple images - also ordering
                    ->fullSize() // full size column
                    // ->rules('required', 'size:1') // validation rules for the collection of images
                    // validation rules for the collection of images
                    // ->singleImageRules('dimensions:min_width=300')
                    ->setFileName(function($originalFilename, $extension, $model){
                        return 'image-' . md5($originalFilename) . '.' . $extension;
                    })
                    ->customPropertiesFields([
                        Text::make('Image Title'),
                        Textarea::make('Image Description'),
                    ])
                    ->hideFromIndex(),
                ]),
                new NovaTab('Details', [
                    NovaHeader::make('Tour Full Information'),

                    Tiptap::make('Itinerary','itinerary')
                      ->buttons([
                            'bold',
                            'italic',
                            'link',
                            'strike',
                            'underline',
                            'heading' => 6,
                            'bullet_list',
                            'ordered_list',
                            'code_block',
                            'blockquote',
                        ])->hideFromIndex(),

                    Tiptap::make('Details','detail')
                      ->buttons([
                            'bold',
                            'italic',
                            'link',
                            'strike',
                            'underline',
                            'heading' => 6,
                            'bullet_list',
                            'ordered_list',
                            'code_block',
                            'blockquote',
                        ])->hideFromIndex(),

                    Tiptap::make('Schedule')
                      ->buttons([
                            'bold',
                            'italic',
                            'link',
                            'strike',
                            'underline',
                            'heading' => 6,
                            'bullet_list',
                            'ordered_list',
                            'code_block',
                            'blockquote',
                        ])->hideFromIndex(),
                    Tiptap::make('Note')
                      ->buttons([
                            'bold',
                            'italic',
                            'link',
                            'strike',
                            'underline',
                            'heading' => 6,
                            'bullet_list',
                            'ordered_list',
                            'code_block',
                            'blockquote',
                        ])->hideFromIndex(),
                ]),
                new NovaTab('Additional Parameters', [
                    NovaHeader::make('Additional Parameters'),
                    Json::make('OG meta for SEO', [
                          Textarea::make('Meta Title'),
                          Textarea::make('Meta Description'),
                          Textarea::make('Meta Keywords')
                      ], 'params')->hideFromIndex(),
                ]),
                Sortable::make('Order', 'ordering')->onlyOnIndex(),
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
