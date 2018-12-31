<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\URL;
use App\Tour;
use App\Registration;
use Facades\Spatie\Referer\Referer;

class FrontController extends Controller
{
    public function getHome(Request $request) {
      $tours = Tour::orderBy('ordering','asc')
      ->take(30)
      ->get();

      $featured_tour = Tour::where('featured', 1)
      ->orderBy('ordering','asc')
      ->take(3)
      ->get();
      // $selected_from = $from;

      $tours_hcm = Tour::where('from_id', 1)
      ->orderBy('ordering','asc')
      ->take(6)
      ->get();

      $tours_hn = Tour::where('from_id', 2)
      ->orderBy('ordering','asc')
      ->take(3)
      ->get();

      return view('front.home', [
        'featured_tours' => $featured_tour,
        'tours_hcm'  =>  $tours_hcm,
        'tours_hn'  =>  $tours_hn,
        'tours'     =>  $tours
      ]);
    }

    public function getTourInfo(Request $request) {
      $tour = Tour::findOrFail($request->tour_id);

      return response()->json([
        'result'      =>  'found',
        'tour_id'     =>  $tour->id,
        'tour_price'  =>  number_format($tour->price, 0, ',', '.') . ' VNĐ',
        'tour_begin'  =>  $tour->begin_date->format('d/m/Y'),
        'tour_from'   =>  $tour->from->title,
        'tour_slug'   =>  $tour->title_alias
      ]);
    }

    public function getAllTours(Request $request) {

      $featured_tour = Tour::where('featured', 1)
      ->orderBy('ordering','asc')
      ->take(3)
      ->get();
      // $selected_from = $from;

      $tours_hcm = Tour::where('from_id', 1)
      ->orderBy('ordering','asc')
      ->take(6)
      ->get();

      $tours_hn = Tour::where('from_id', 2)
      ->orderBy('ordering','asc')
      ->take(3)
      ->get();

      $tours = Tour::orderBy('ordering','asc')
      ->take(30)
      ->get();

      return view('front.tours', [
        'featured_tours' => $featured_tour,
        'tours_hcm'  =>  $tours_hcm,
        'tours_hn'  =>  $tours_hn,
        'tours'     =>  $tours
      ]);
    }

    public function tourDetails($tour) {
      $galleryItems = $tour->getMedia('gallery');
      return view('front.tour-details', ['tour' => $tour, 'galleryItems' => $galleryItems]);
    }

    public function createRegistration(Request $request, $tour) {
      \Session::put('adults_number', $request->adults);
      \Session::put('infants_number', $request->infants);
      \Session::put('childs_shared_number', $request->childs_shared);
      \Session::put('childs_single_number', $request->childs_single);

      $redirect = URL::temporarySignedRoute('tourRegistration', now()->addMinutes(60), ['tour' => $tour]);
      return response()->json([
        'result' => 'session_set',
        'redirect' => $redirect
      ]);
    }

    public function tourRegistration(Request $request, $tour) {
      // delete session data
      // $request->session()->flush();
      // abort(401);

      // check valid url
      if (! $request->hasValidSignature()) {
        abort(401);
      }

      $adults_number = \Session::get('adults_number');
      $adults_price = intval($adults_number) * $tour->price;
      \Session::put('adults_price', $adults_price);

      $infants_number = \Session::get('infants_number');
      $infants_price = ($tour->price * 0.3) * $infants_number;
      \Session::put('infants_price', $infants_price);

      $childs_shared_number = \Session::get('childs_shared_number');
      $childs_shared_price = ($tour->price * 0.8) * $childs_shared_number;
      \Session::put('childs_shared_price', $childs_shared_price);

      $childs_single_number = \Session::get('childs_single_number');
      $childs_single_price = ($tour->price * 0.9) * $childs_single_number;
      \Session::put('childs_single_price', $childs_single_price);

      $total_price = $adults_price + $infants_price + $childs_shared_price + $childs_single_price;
      \Session::put('total_price', $total_price);

      // add tour info to session
      \Session::put('tour_id', $tour->id);

      return view('front.tour-registration', [
        'tour' => $tour,
        'adults_number' => $adults_number,
        'adults_price' => $adults_price,
        'infants_number' => $infants_number,
        'infants_price' => $infants_price,
        'childs_shared_number' => $childs_shared_number,
        'childs_shared_price' => $childs_shared_price,
        'childs_single_number' => $childs_single_number,
        'childs_single_price' => $childs_single_price,
        'total_price' => $total_price
      ]);
    }

    public function tourDetailsUpdate(Request $request, $tour) {
      \Session::put('full_name', $request->full_name);
      \Session::put('phone_number', $request->phone_number);
      \Session::put('email', $request->email);
      \Session::put('address', $request->address);
      \Session::put('details_url', $request->details_url);

      $redirect = URL::temporarySignedRoute('tourPaymentUpdateForm', now()->addMinutes(30), ['tour' => $tour ]);

      return response()->json([
        'result' => 'details_set',
        'redirect' => $redirect
      ]);
    }

    public function tourPaymentUpdateForm(Request $request, $tour) {
      // check valid url
      if (! $request->hasValidSignature()) {
        abort(401);
      }

      $adults_number = \Session::get('adults_number');
      $adults_price = \Session::get('adults_price');

      $infants_number = \Session::get('infants_number');
      $infants_price = \Session::get('infants_price');

      $childs_shared_number = \Session::get('childs_shared_number');
      $childs_shared_price = \Session::get('childs_shared_price');

      $childs_single_number = \Session::get('childs_single_number');
      $childs_single_price = \Session::get('childs_single_price');

      $total_price = \Session::get('total_price');
      $back_url = \Session::get('details_url');

      return view('front.tour-payment', [
        'tour' => $tour,
        'adults_number' => $adults_number,
        'adults_price' => $adults_price,
        'infants_number' => $infants_number,
        'infants_price' => $infants_price,
        'childs_shared_number' => $childs_shared_number,
        'childs_shared_price' => $childs_shared_price,
        'childs_single_number' => $childs_single_number,
        'childs_single_price' => $childs_single_price,
        'total_price' => $total_price,
        'back_url' => $back_url
      ]);
    }

    public function tourCreateRegistration(Request $request, $tour) {
      // get and assign session value to variables
      $adults_number = \Session::get('adults_number');
      $adults_price = \Session::get('adults_price');

      $infants_number = \Session::get('infants_number');
      $infants_price = \Session::get('infants_price');

      $childs_shared_number = \Session::get('childs_shared_number');
      $childs_shared_price = \Session::get('childs_shared_price');

      $childs_single_number = \Session::get('childs_single_number');
      $childs_single_price = \Session::get('childs_single_price');

      $total_price = \Session::get('total_price');
      $full_name = \Session::get('full_name');
      $phone_number = \Session::get('phone_number');
      $email = \Session::get('email');
      $address = \Session::get('address');
      $payment_method = $request->paymentOption;

      // create registration object
      $registration = new Registration;
      $registration->tour_id = $tour->id;
      $registration->registration_code = date("ymd") . strval(mt_rand(1000, 999999));
      $registration->full_name = $full_name;
      $registration->address = $address;
      $registration->phone_number = $phone_number;
      $registration->email = $email;

      $registration->adults_number = $adults_number;
      $registration->adults_price = $adults_price;

      $registration->infants_number = $infants_number;
      $registration->infants_price = $infants_price;

      $registration->childs_shared_number = $childs_shared_number;
      $registration->childs_shared_price = $childs_shared_price;

      $registration->childs_single_number = $childs_single_number;
      $registration->childs_single_price = $childs_single_price;

      $registration->total_price = $total_price;
      $registration->payment_method = $payment_method;

      $registration->status = 'New';
      $registration->referer = Referer::get();
      $registration->save();

      // we dont need session data anymore
      $request->session()->flush();

      // sign and create temporary thank you page with new registration data
      $redirect = URL::temporarySignedRoute('thankYouPage', now()->addMinutes(30), [
        'registration'  =>  $registration
      ]);

      // return json to ajax request with redirection
      return response()->json([
        'result' => 'registration_created',
        'redirect' => $redirect
      ]);
    }

    public function thankYouPage(Request $request, Registration $registration) {
      // check valid url
      if (! $request->hasValidSignature()) {
        abort(401);
      }
      return view('front.tour-thankyou', ['registration' => $registration ]);
    }
}
