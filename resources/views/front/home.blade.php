@extends('layouts.app')
@section('title', 'Kilala Japan Tour - Tour du lịch Nhật Bản')

@section('topBanner')
<div class="header-banner">
    <div class="header-image">
        <img src="{{ asset('image/home-banner-01.jpg') }}" alt="" />
    </div>
</div>
@endsection
@section('mainContent')
  @include('partials.kilala-features')
  @include('partials.feature-tours')
  @include('partials.tours-from-hcm')
  @include('partials.tours-from-hn')
@endsection
@section('extraContent')
  @include('partials.home-explore')
  @include('partials.home-cuisine')
  @include('partials.home-contact')
@endsection
@section('pageScripts')
<script type="text/javascript">
  jQuery(document).ready(function($) {
    $('#explore-thumbnails').lightGallery({
        thumbnail:true,
        animateThumb: false,
        showThumbByDefault: false
    });
  })
</script>
@endsection
