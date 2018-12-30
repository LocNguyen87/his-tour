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
<div id="all-tours">
  <h5 class="tours-title">Tour du lịch đi <b>Nhật Bản</b></h5>
  <div class="tours-grid row">
    @foreach($tours as $tour)
    <?php
        $featured_item = $tour->getFirstMedia('feature');
    ?>
    <div class="col-md-4">
        <div class="card card-user card-tour normal-tour">
          @if($tour->on_sale === 1)
          <div class="sale-info">
            <img class="tippy" title="{!! $tour->sale_text !!}" src="{{ asset('image/sale-badge.png') }}" data-theme="light" data-arrow="true" />
          </div>
          @endif
            <div class="image">
              <img class="" src="{!! $featured_item->getFullUrl() !!}" alt="..." />
            </div>
            <div class="tour-meta clearfix">
              <span class="pull-left">{{ $tour->times }}</span>
              <span class="pull-right">{{ number_format($tour->price, 0, ',', '.') . ' VNĐ' }}</span>
            </div>
            <div class="content">
                <div class="description">
                  <a href="{!! route('tourDetails', ['tour' => $tour]) !!}">
                    <h4 class="title">{{ $tour->title }}</h4>
                  </a>
                  <ul class="list-unstyled list-lines">
                      <li>
                          <b>Hành trình:</b> {!! $tour->schedule !!}
                      </li>
                      <li>
                          <b>Khởi hành:</b> {{ $tour->begin_date->format('d/m/Y') }}
                      </li>
                      <li>
                          <b>Từ:</b> {{ $tour->from->title }}
                      </li>
                      <li>
                          <b>Hãng bay:</b> {{ $tour->flight }}
                      </li>
                  </ul>
                  <div class="row">
                      <div class="col-xs-6">
                          <a class="btn btn-warning btn-fill btn-block" href="{!! route('tourDetails', ['tour' => $tour]) !!}">Đăng ký tour</a>
                      </div>
                      <div class="col-xs-6">
                          <a class="btn btn-primary btn-fill btn-block" href="{!! route('tourDetails', ['tour' => $tour]) !!}">Chi tiết</a>
                      </div>
                  </div>
                </div>
            </div>
        </div> <!-- end card -->
    </div>
    @endforeach
  </div>
</div>

@endsection
@section('pageScripts')
<script type="text/javascript">
    new Tippy('.tippy')
</script>
@endsection
