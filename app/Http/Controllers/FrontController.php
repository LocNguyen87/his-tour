<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Tour;

class FrontController extends Controller
{
    public function tourDetails($tour) {
      return view('front.tour-details', ['tour' => $tour]);
    }
}
