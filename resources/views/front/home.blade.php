@extends('layouts.app')
@section('title', 'Kilala Japan Tour - Tour du lịch Nhật Bản')

@section('topBanner')
<div class="header-banner">
    <div class="header-image">
        <img src="{{ asset('image/parallax-text.jpg') }}" alt="" />
    </div>
</div>
@endsection
@section('mainContent')
  @include('partials.kilala-features')
  @include('partials.feature-tours')
  @include('partials.tours-from-hcm')
  @include('partials.tours-from-hn')
@endsection
