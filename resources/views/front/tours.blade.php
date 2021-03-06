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
                                <option class="tour_default_text" disabled selected> Chọn tour khởi hành</option>
                                @foreach($tours as $tour)
                                <option class="tour_option" value="{{ $tour->id }}">
                                  {{ $tour->title }} ({{ number_format($tour->price, 0, ',', '.') }} VNĐ)
                                </option>
                                @endforeach
                            </select>
                          </div>
                          <div class="form-group">
                            <div class="row">
                              <div class="col-md-6">
                                <select id="begin_date" class="selectpicker" data-style="form-control">
                                    <option disabled selected> Chọn ngày khởi hành</option>
                                </select>
                              </div>
                              <div class="col-md-6">
                                  <select id="location_from" class="selectpicker" data-style="form-control">
                                      <option disabled selected> Chọn điểm khởi hành</option>
                                  </select>
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
                                         <option value="6">6</option>
                                         <option value="7">7</option>
                                         <option value="8">8</option>
                                         <option value="9">9</option>
                                         <option value="10">10</option>
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
  @include('partials.kilala-features')
  @include('partials.feature-tours')
  @include('partials.tours-from-hcm')
  @include('partials.tours-from-hn')
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

    // get all available date
    $.ajax({
        url: '{{ url('/api/getAvailableDates') }}',
        type: 'GET',
        beforeSend: function() {
        },
        success: function(xml, textStatus, xhr) {
          var dates = xhr.responseJSON.dates
          dates.forEach(d => {
            $('#begin_date').append('<option value="'+ d +'">' + d + '</option>')
            $('#begin_date').selectpicker('refresh')
          });
        },
        error: function() {
          alert('Đã xảy ra lỗi khi hiển thị dữ liệu. Hãy thử lại sau.');
        }
    })

    // get all available location from
    $.ajax({
        url: '{{ url('/api/getAvailableLocationFrom') }}',
        type: 'GET',
        beforeSend: function() {
        },
        success: function(xml, textStatus, xhr) {
          var locations = xhr.responseJSON.locations
          locations.forEach(location => {
            $('#location_from').append('<option value="'+ location.id +'">' + location.title + '</option>')
            $('#location_from').selectpicker('refresh')
          });
        },
        error: function() {
          alert('Đã xảy ra lỗi khi hiển thị dữ liệu. Hãy thử lại sau.');
        }
    })

    $('#begin_date').on('change', performAdvanceSearch)
    $('#location_from').on('change', performAdvanceSearch)

    function performAdvanceSearch() {
      var date_str = $('#begin_date').val()
      var from_id = $('#location_from').val()
      console.log(date_str)
      console.log(from_id)
      console.log('dad')
      if(date_str || from_id) {
        $.ajax({
        url: '{{ url('/api/searchTourAdvance') }}',
  					type: 'POST',
  					data: {
              date: date_str,
              from_id: from_id
  					},
  					beforeSend: function() {
  					},
  					success: function(xml, textStatus, xhr) {
              var tours = xhr.responseJSON.tours
              $('#tour_select option.tour_option').remove()
              $('#tour_select option.tour_default_text').prop('selected','selected')
              if(tours.length > 0) { // found tours
                $('#tour_select option.tour_default_text').html('Có '+ tours.length +' tour phù hợp với ngày và điểm khởi hành đã chọn')
                tours.forEach(tour => {
                  $('#tour_select').append('<option class="tour_option" value="'+ tour.id +'">' + tour.title  + ' (' + tour.price + ' VNĐ)</option>')
                })
              }
              else {
                $('#tour_select option.tour_default_text').html('Không có tour nào phù hợp với ngày và điểm khởi hành đã chọn')
              }
              $('#tour_select').selectpicker('refresh')
  					},
  					error: function() {
  						alert('Đã xảy ra lỗi khi tìm thông tin tour!!! Hãy thử lại sau.');
  					}
        })
      }
    }

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
              $('#begin_date option[value="' + xhr.responseJSON.tour_begin + '"]').prop('selected', 'selected')
              $('#begin_date').selectpicker('refresh')

              $('#location_from option[value="' + xhr.responseJSON.tour_from_id + '"]').prop('selected', 'selected')
              $('#location_from').selectpicker('refresh')

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
