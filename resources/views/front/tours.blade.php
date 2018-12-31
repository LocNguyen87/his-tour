@extends('layouts.app')
@section('title', 'Kilala Japan Tour - Tour du lịch Nhật Bản')

@section('topBanner')
<div class="header-banner all-tours-banner" style="background-image: url('{{ asset('image/home-banner-01.jpg') }}')">
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
                        <input type="hidden" name="tour_id" readonly/>
                        <input type="hidden" name="tour_slug" readonly/>
                        <div class="form-group">
                          <select id="tour_select" class="selectpicker" data-style="form-control">
                              <option disabled selected> Chọn tour khởi hành</option>
                              @foreach($tours as $tour)
                              <option value="{{ $tour->id }}">
                                {{ $tour->title }} ({{ number_format($tour->price, 0, ',', '.') }} VNĐ)
                              </option>
                              @endforeach
                          </select>
                        </div>
                        <div class="form-group">
                          <div class="row">
                            <div class="col-md-6">
                              <input type="text" class="form-control" id="begin_date" placeholder="Ngày khởi hành" readonly>
                            </div>
                            <div class="col-md-6">
                              <input type="text" class="form-control" id="location_from" placeholder="Điểm khởi hành" readonly>
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

                        <button id="doSubmit" type="submit" class="btn btn-warning btn-fill btn-block" disabled>Chọn tour để bắt đầu đăng ký</button>
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
<div id="all-tours">
  <h5 class="tours-title">Tour du lịch đi <b>Nhật Bản</b></h5>
  <div class="tours-grid row">
    @foreach($tours as $tour)
    <?php
        $featured_item = $tour->getFirstMedia('feature');
    ?>
    <div class="col-md-4 col-sm-6 col-xs-6">
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
                      <div class="col-sm-6 col-xs-12">
                          <a class="btn btn-warning btn-fill btn-block" href="{!! route('tourDetails', ['tour' => $tour]) !!}">Đăng ký tour</a>
                      </div>
                      <div class="col-sm-6 col-xs-12">
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
  $.ajaxSetup({
    headers: {
      'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
  });
  jQuery(document).ready(function($) {
    $('#explore-thumbnails').lightGallery({
        thumbnail:true,
        animateThumb: false,
        showThumbByDefault: false
    });
    new Tippy('.tippy')

    $('#tour_select').on('change', function() {
      var tour_id = $(this).val();
      var begin_date = $('#begin_date');
      var location_from = $('#location_from');
      var tour_slug = $('input[name="tour_slug"]');
      $.ajax({
  					url: '{{ url('/api/getTourInfo') }}',
  					type: 'POST',
  					data: {
  						tour_id: tour_id
  					},
  					beforeSend: function() {
  					},
  					success: function(xml, textStatus, xhr) {
              begin_date.val(xhr.responseJSON.tour_begin)
              location_from.val(xhr.responseJSON.tour_from)
              tour_slug.val(xhr.responseJSON.tour_slug)
              $('input[name="tour_id"]').val(xhr.responseJSON.tour_id)
              $('#doSubmit').attr('disabled', false)
              $('#doSubmit').html('Đăng ký')
  					},
  					error: function() {
  						alert('Đã xảy ra lỗi khi tìm thông tin tour!!! Hãy thử lại sau.');
  					}
  			})
    })
    $("#registration-init-form").validate({
      rules: {
        tour_id: {
          required: true
        },
        adults: {
          required: true
        },
        infants: {
          required: true
        },
        childs_shared: {
          required: true
        },
        childs_single: {
          required: true
        },
      },
      messages: {
        tour_id: {
          required: 'Vui lòng bổ sung thông tin'
        },
        adults: {
          required: 'Vui lòng bổ sung thông tin'
        },
        infants: {
          required: 'Vui lòng bổ sung thông tin'
        },
        childs_shared: {
          required: 'Vui lòng bổ sung thông tin'
        },
        childs_single: {
          required: 'Vui lòng bổ sung thông tin'
        },
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
          var tour_slug = $('input[name="tour_slug"]').val()
          var destination = '{{ url('/chi-tiet-tour/') }}' + '/' + tour_slug

            $.ajax({
              url: destination,
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
  })
</script>
@endsection
