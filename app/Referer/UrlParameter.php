<?php
namespace App\Referer;

use Illuminate\Http\Request;
use Spatie\Referer\Source;

class UrlParameter implements Source
{
    public function getReferer(Request $request): string
    {
        if($request->get('utm_source') || $request->get('gclid'))
        	return $request->fullUrl();
        else
        	return '';
    }
}