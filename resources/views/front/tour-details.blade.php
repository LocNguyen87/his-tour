@extends('layouts.app')
@section('title', $tour->title)
@section('topBanner')
<div class="header-banner" style="background-image: url('{{ asset('image/parallax-text.jpg') }}')">
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
    <div class="col-md-3 col-sm-6 col-xs-12">
      <div class="info info-horizontal">
           <div class="icon icon-transparent icon-sm">
               <img src="{{ asset('image/tour-details-icon-01.png') }}" alt="" />
           </div>
           <div class="description">
               <h5>{{ $tour->times }}</h5>
           </div>
      </div>
    </div>
    <div class="col-md-3 col-sm-6 col-xs-12">
      <div class="info info-horizontal">
           <div class="icon icon-transparent icon-sm">
               <img src="{{ asset('image/tour-details-icon-02.png') }}" alt="" />
           </div>
           <div class="description">
               <h5>{{ number_format($tour->price, 0, ',', '.') }} VNĐ</h5>
           </div>
      </div>
    </div>
    <div class="col-md-3 col-sm-6 col-xs-12">
      <div class="info info-horizontal">
           <div class="icon icon-transparent icon-sm">
               <img src="{{ asset('image/tour-details-icon-03.png') }}" alt="" />
           </div>
           <div class="description">
               <h5>Còn {{ $tour->ticket_left }} ghế trống</h5>
           </div>
      </div>
    </div>
    <div class="col-md-3 col-sm-6 col-xs-12">
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
<div class="tour-tabs">
  <div>

    <!-- Nav tabs -->
    <ul class="nav nav-tabs tour-tabs" role="tablist">
      <li role="presentation" class="itinerary-tab active">
        <a href="#itinerary" aria-controls="itinerary" role="tab" data-toggle="tab">Lịch trình</a>
      </li>
      <li role="presentation" class="detail-tab">
        <a href="#details" aria-controls="details" role="tab" data-toggle="tab">Chi tiết</a>
      </li>
      <li role="presentation" class="note-tab">
        <a href="#note" aria-controls="note" role="tab" data-toggle="tab">Lưu ý</a>
      </li>
    </ul>

    <!-- Tab panes -->
    <div class="tab-content tour-tab-content">
      <div role="tabpanel" class="tab-pane fade in active" id="itinerary">
        @if($tour->itinerary_file)
        <a href="{!! url('/storage/' . $tour->itinerary_file) !!}" class="downloadItinerary btn btn-block btn-fill btn-lg btn-info">Download lịch trình  <i class="fa fa-download" aria-hidden="true"></i></a>
        @endif
        {!! $tour->itinerary !!}
      </div>
      <div role="tabpanel" class="tab-pane" id="details">{!! $tour->detail !!}</div>
      <div role="tabpanel" class="tab-pane" id="note">{!! $tour->note !!}</div>
    </div>

  </div>
</div>
@endsection
@section('pageScripts')
<script type="text/javascript">
  jQuery(document).ready(function($) {
    $('#doSubmit').on('click', function(e) {
      e.preventDefault()
      var registrationForm = document.getElementById("registration-init-form")
  		var fd = new FormData(registrationForm)

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

    })
  })
</script>
@endsection
