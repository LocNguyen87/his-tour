@extends('layouts.app')
@section('title', $tour->title)
@section('topBanner')
<div class="header-banner details-banner" style="background-image: url('{{ asset('image/parallax-text.jpg') }}')">
    <div class="header-image">
        <div class="top-form-wrapper">
          <div class="container">
            <div class="row">
              <div class="col-md-6 col-md-offset-6">
                <div class="card">
                    <div class="top-form-header">
                      Đăng ký tour du lịch Nhật
                    </div>
                    <div class="content">
                      <form id="registration-init-form">
                          {{ csrf_field() }}
                          <input type="hidden" name="tour_id" value="{{ $tour->id }}" readonly/>
                          <div class="form-group">
                            <input type="text" class="form-control" id="tour_name" placeholder="Tên tour" value="{{ $tour->title }} ({{ number_format($tour->price, 0, ',', '.') }} VNĐ)" readonly>
                          </div>
                          <div class="form-group">
                            <div class="row">
                              <div class="col-md-6">
                                <input type="text" class="form-control" id="begin_date" placeholder="Ngày khởi hành" value="Ngày khởi hành: {{ $tour->begin_date->format('d/m/Y') }}" readonly>
                              </div>
                              <div class="col-md-6">
                                <input type="text" class="form-control" id="location_from" placeholder="Điểm khởi hành" value="Từ: {{ $tour->from->title }}" readonly>
                              </div>
                            </div>
                          </div>
                          <div class="form-group">
                            <div class="row">
                               <div class="col-sm-6">
                                 <div class="row">
                                   <div class="col-md-12">
                                     <select name="adults" class="selectpicker" data-style="form-control">
                                         <option disabled selected> Số người lớn</option>
                                         <option value="1">1</option>
                                         <option value="2">2</option>
                                         <option value="3">3</option>
                                         <option value="4">4</option>
                                         <option value="5">5</option>
                                     </select>
                                   </div>
                                 </div>
                                </div>
                                <div class="col-sm-6">
                                  <div class="row">
                                    <div class="col-md-12">
                                      <select name="infants" class="selectpicker" data-style="form-control">
                                          <option disabled selected> Số em bé (0 ~ 2) tuổi</option>
                                          <option value="0">0</option>
                                          <option value="1">1</option>
                                          <option value="2">2</option>
                                          <option value="3">3</option>
                                          <option value="4">4</option>
                                          <option value="5">5</option>
                                      </select>
                                    </div>
                                  </div>
                                </div>
                              </div>
                          </div>
                          <div class="form-group">
                            <div class="row">
                               <div class="col-sm-6">
                                 <div class="row">
                                   <div class="col-md-12">
                                     <select name="childs_shared" class="selectpicker" data-style="form-control">
                                         <option disabled selected> Trẻ em (2 ~ 12) tuổi / Giường Chung</option>
                                         <option value="0">0</option>
                                         <option value="1">1</option>
                                         <option value="2">2</option>
                                         <option value="3">3</option>
                                         <option value="4">4</option>
                                         <option value="5">5</option>
                                     </select>
                                   </div>
                                 </div>
                                </div>
                                <div class="col-sm-6">
                                  <div class="row">
                                    <div class="col-md-12">
                                      <select name="childs_single" class="selectpicker" data-style="form-control">
                                          <option disabled selected> Trẻ em (2 ~ 12) tuổi / Giường Riêng</option>
                                          <option value="0">0</option>
                                          <option value="1">1</option>
                                          <option value="2">2</option>
                                          <option value="3">3</option>
                                          <option value="4">4</option>
                                          <option value="5">5</option>
                                      </select>
                                    </div>
                                  </div>
                                </div>
                              </div>
                          </div>

                          <button id="doSubmit" type="submit" class="btn btn-warning btn-fill btn-block">Đăng ký</button>

                        </form>
                    </div>
                </div>
              </div>
            </div>
          </div>
        </div>
    </div>
</div>
@endsection
@section('mainContent')
<div class="tour-meta">
  <div class="row">
    <div class="col-md-4 col-sm-4 col-xs-12">
      <div class="info info-horizontal">
           <div class="icon icon-transparent icon-sm">
               <img src="{{ asset('image/tour-details-icon-01.png') }}" alt="" />
           </div>
           <div class="description">
               <h5>{{ $tour->times }}</h5>
           </div>
      </div>
    </div>
    <div class="col-md-4 col-sm-4 col-xs-12">
      <div class="info info-horizontal">
           <div class="icon icon-transparent icon-sm">
               <img src="{{ asset('image/tour-details-icon-02.png') }}" alt="" />
           </div>
           <div class="description">
               <h5>{{ number_format($tour->price, 0, ',', '.') }} VNĐ</h5>
           </div>
      </div>
    </div>
    <div class="col-md-4 col-sm-4 col-xs-12">
      <div class="info info-horizontal">
           <div class="icon icon-transparent icon-sm">
               <img src="{{ asset('image/tour-details-icon-04.png') }}" alt="" />
           </div>
           <div class="description">
               <h5>{{ $tour->flight }}</h5>
           </div>
      </div>
    </div>
  </div>
</div>
<div class="tour-content">
  <h1 class="tour-title text-center">{{ $tour->title }}</h1>
  @if($tour->sale_text)
  <h3 class="sale-text text-center">{!! $tour->sale_text !!}</h3>
  @endif
  <div class="tour-carousel">
    <div id="carousel">
        <div id="tour-gallery-carousel" class="carousel slide" data-ride="carousel">
              <!-- Indicators -->
              <ol class="carousel-indicators">
                @foreach($galleryItems as $k => $item)
                <li data-target="#tour-gallery-carousel" data-slide-to="<?php echo $k; ?>" class="<?php echo (0 === $k) ? 'active' : ''; ?>"></li>
                @endforeach
              </ol>

              <!-- Wrapper for slides -->
              <div class="carousel-inner">
                @foreach($galleryItems as $key => $galleryItem)
                <div class="item <?php echo (0 === $key) ? 'active' : ''; ?>">
                  <img src="{{ $galleryItem->getFullUrl() }}" alt="">
                  <div class="carousel-caption">
                    <h3><?php echo ($galleryItem->hasCustomProperty('image_title')) ? $galleryItem->getCustomProperty('image_title') : 'Hình ảnh' ; ?></h3>
                    <p><?php echo ($galleryItem->hasCustomProperty('image_description')) ? $galleryItem->getCustomProperty('image_description') : ''; ?></p>
                  </div>
                </div>
                @endforeach
              </div>

              <!-- Controls -->
              <a class="left carousel-control" href="#tour-gallery-carousel" data-slide="prev">
                <span class="fa fa-angle-left"></span>
              </a>
              <a class="right carousel-control" href="#tour-gallery-carousel" data-slide="next">
                <span class="fa fa-angle-right"></span>
              </a>
        </div>
    </div>
  </div>
</div>
<div id="tab-slider" class="royalSlider contentSlider rsDefaultInv">
    <div class="tour-tab-content">
        @if($tour->itinerary_file)
        <a href="{!! url('/storage/' . $tour->itinerary_file) !!}" class="downloadItinerary btn btn-block btn-fill btn-lg btn-info">Download lịch trình  <i class="fa fa-download" aria-hidden="true"></i></a>
        @endif
        {!! $tour->itinerary !!}
        <div class="rsTmb itinerary-tab">
            <span>Lịch trình</span>
        </div>
    </div>
    <div class="tour-tab-content">
        {!! $tour->detail !!}
        <div class="rsTmb detail-tab">
            <span>Chi tiết</span>
        </div>
    </div>
    <div class="tour-tab-content">
        {!! $tour->note !!}
        <div class="rsTmb note-tab">
            <span>Lưu ý</span>
        </div>
    </div>

</div>
@if($related_tours)
<div class="tour-related">
    <h5 class="tours-title">Tour <b>liên quan</b></h5>
    <div class="tours-grid row">
        @foreach($related_tours as $related_tour)
        <?php
            $featured_item = $related_tour->getFirstMedia('feature');
        ?>
        <div class="col-md-4">
            <div class="card card-user card-tour normal-tour">
                <div class="image">
                <img class="" src="{!! $featured_item->getFullUrl() !!}" alt="..." />
                </div>
                <div class="tour-meta clearfix">
                <span class="pull-left">{{ $related_tour->times }}</span>
                <span class="pull-right">{{ number_format($related_tour->price, 0, ',', '.') . ' VNĐ' }}</span>
                </div>
                <div class="content">
                    <div class="description">
                    <a href="{!! route('tourDetails', ['tour' => $related_tour]) !!}">
                        <h4 class="title">{{ $related_tour->title }}</h4>
                    </a>
                    <ul class="list-unstyled list-lines">
                        <li>
                            <b>Hành trình:</b> {!! $related_tour->schedule !!}
                        </li>
                        <li>
                        <b>Khởi hành:</b> {{ $related_tour->begin_date->format('d/m/Y') }} @if($related_tour->date_note) ({{ $related_tour->date_note }}) @endif
                        </li>
                        <li>
                            <b>Hãng bay:</b> {{ $related_tour->flight }}
                        </li>
                    </ul>
                    <div class="row">
                        <div class="col-xs-6">
                            <a class="btn btn-warning btn-fill btn-block" href="{!! route('tourDetails', ['tour' => $related_tour]) !!}">Đăng ký tour</a>
                        </div>
                        <div class="col-xs-6">
                            <a class="btn btn-primary btn-fill btn-block" href="{!! route('tourDetails', ['tour' => $related_tour]) !!}">Chi tiết</a>
                        </div>
                    </div>
                    </div>
                </div>
            </div> <!-- end card -->
        </div>
        @endforeach
    </div>
</div>
@endif
@endsection
@section('pageScripts')
<script type="text/javascript">
    $.ajaxSetup({
        headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
  jQuery(document).ready(function($) {
    $('#tab-slider').royalSlider({
        autoHeight: true,
        arrowsNav: true,
        fadeinLoadedSlide: true,
        controlNavigation: 'thumbnails',
        loop: false,
        loopRewind: true,
        numImagesToPreload: 6,
        keyboardNavEnabled: true,
        usePreloader: false,
        thumbs: {
            autoCenter: true,
            fitInViewport: true,
    		spacing: 0,
    		arrowsAutoHide: true
    	}
    });
    var slider = $('#tab-slider');
    slider.prepend(slider.find('.rsNav'));

    $("#registration-init-form").validate({
      rules: {
        tour_id: {
          required: true
        },
        adults: {
          required: true
        }
      },
      messages: {
        tour_id: {
          required: 'Vui lòng bổ sung thông tin'
        },
        adults: {
          required: 'Vui lòng bổ sung thông tin'
        }
      },
      errorPlacement: function(error, element) {
  	    if ( element.is(":radio") )
  	    {
  	        error.appendTo( element.parents('.row') );
  	    }
  	    else
  	    { // This is the default behavior
  	        error.insertAfter( element );
  	    }
  	 },

      submitHandler: function(form, event) {
        event.preventDefault();
        var myform = document.getElementById("registration-init-form");
        var fd = new FormData(myform );

        $.ajax({
            url: window.location,
            data: fd,
            cache: false,
            processData: false,
            contentType: false,
            type: 'POST',
            beforeSend: function() {
            console.log('before send');
            },
            success: function (xml, textStatus, xhr) {
            if(xhr.responseJSON.result === 'session_set') { // registration created successfully
                // display thank you text
                console.log('success')
                // console.log(xhr.responseJSON.redirect)
                window.location = xhr.responseJSON.redirect
            }
            else {
                alert('Có lỗi khi đăng ký')
            }
            },
                error: function(error) {
                        alert('Có lỗi khi đăng ký')
            }
        });
      }
    });

    // $('#doSubmit').on('click', function(e) {
    //   e.preventDefault()
    //   var registrationForm = document.getElementById("registration-init-form")
  	// 	var fd = new FormData(registrationForm)

    //   $.ajax({
    //     url: window.location,
    //     data: fd,
    //     cache: false,
    //     processData: false,
    //     contentType: false,
    //     type: 'POST',
    //     beforeSend: function() {
    //       console.log('before send');
    //     },
    //     success: function (xml, textStatus, xhr) {
    //     	if(xhr.responseJSON.result === 'session_set') { // registration created successfully
    //     		// display thank you text
    //         console.log('success')
    //         // console.log(xhr.responseJSON.redirect)
    //         window.location = xhr.responseJSON.redirect
    //     	}
    //     	else {
    //     		alert('Có lỗi khi đăng ký')
    //     	}
    //     },
	// 			error: function(error) {
	// 					alert('Có lỗi khi đăng ký')
    //     }
    //   });

    // })
  })
</script>
@endsection
