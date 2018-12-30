@extends('layouts.app')
@section('title', 'Kilala Japan Tour - Tour du lịch Nhật Bản - Đăng ký tour - Thông tin liên hệ')

@section('topBanner')
<div class="header-banner">
    <div class="header-image">
        <img src="{{ asset('image/tour-registration-banner.jpg') }}" alt="" />
    </div>
</div>
@endsection
@section('mainContent')
<div class="row registration-details-row">
  <div class="col-md-7">
    <h3 class="details-form-title">Đăng ký <b>Tour</b></h3>
    <h4 class="details-form-subtitle">Bước 1: Thông tin người liên hệ</h4>
    <form id="details-form">
      {{ csrf_field() }}
      <input type="hidden" id="details_url" name="details_url" />
      <div class="form-group">
        <input type="text" class="form-control" id="full_name" name="full_name" placeholder="Họ tên người liên hệ" value="{{ \Session::get('full_name') }}" required>
      </div>
      <div class="form-group">
        <input type="text" class="form-control" id="phone_number" name="phone_number" placeholder="Điện thoại liên hệ" value="{{ \Session::get('phone_number') }}" required>
      </div>
      <div class="form-group">
        <input type="text" class="form-control" id="address" name="address" placeholder="Địa chỉ liên hệ" value="{{ \Session::get('address') }}" required>
      </div>
      <div class="form-group">
        <input type="email" class="form-control" id="email" name="email" placeholder="Email liên hệ" value="{{ \Session::get('email') }}" required>
      </div>
      <button id="doNext" type="submit" class="btn btn-warning btn-fill btn-block">Tiếp theo <i class="fa fa-chevron-circle-right" aria-hidden="true"></i></button>
    </form>
  </div>
  <div class="col-md-5">
    <div class="card summary-card">
        <div class="summary-card-header">
          Đăng ký tour du lịch Nhật
        </div>
        <div class="summary-card-content content">
          <h5>Tour <b>{{ $tour->title }}</b></h5>
          <ul class="list-unstyled list-lines">
              <li>
                  Ngày khởi hành: <b>{{ $tour->begin_date->format('d/m/Y') }}</b>
              </li>
              <li>
                  Điểm khởi hành: <b>{{ $tour->from->title }}</b>
              </li>
              <li>
                  Số ngày tham quan: <b>{{ $tour->times }}</b>
              </li>
              <li>
                  Hãng bay: <b>{{ $tour->flight }}</b>
              </li>
          </ul>
          <h5>Giá tour người lớn</h5>
          <ul class="list-unstyled list-lines">
              <li>
                  Giá mỗi người lớn: <b>{{ number_format($tour->price, 0, ',', '.') }}</b>
              </li>
              <li>
                  Số người lớn: <b>{{ $adults_number }}</b>
              </li>
              <li>
                  Tổng giá người lớn: <b>{{ number_format($adults_price, 0, ',', '.') }}</b>
              </li>
          </ul>
          @if($infants_number > 0)
          <h5>Giá tour cho em bé 0 ~ 2 tuổi</h5>
          <ul class="list-unstyled list-lines">
              <li>
                  Giá mỗi em bé: <b>{{ number_format($tour->price*0.3, 0, ',', '.') }}</b>
              </li>
              <li>
                  Số em bé: <b>{{ $infants_number }}</b>
              </li>
              <li>
                  Tổng giá em bé: <b>{{ number_format($infants_price, 0, ',', '.') }}</b>
              </li>
          </ul>
          @endif
          @if($childs_shared_number > 0)
          <h5>Giá tour cho trẻ em 2 ~ 12 tuổi (Giường chung)</h5>
          <ul class="list-unstyled list-lines">
              <li>
                  Giá mỗi trẻ em: <b>{{ number_format($tour->price*0.8, 0, ',', '.') }}</b>
              </li>
              <li>
                  Số trẻ em: <b>{{ $childs_shared_number }}</b>
              </li>
              <li>
                  Tổng giá trẻ em: <b>{{ number_format($childs_shared_price, 0, ',', '.') }}</b>
              </li>
          </ul>
          @endif
          @if($childs_single_number > 0)
          <h5>Giá tour cho trẻ em 2 ~ 12 tuổi (Giường riêng)</h5>
          <ul class="list-unstyled list-lines">
              <li>
                  Giá mỗi trẻ em: <b>{{ number_format($tour->price*0.9, 0, ',', '.') }}</b>
              </li>
              <li>
                  Số trẻ em: <b>{{ $childs_single_number }}</b>
              </li>
              <li>
                  Tổng giá trẻ em: <b>{{ number_format($childs_single_price, 0, ',', '.') }}</b>
              </li>
          </ul>
          @endif
          <h5 class="summary-total">Tổng giá tour: <b>{{ number_format($total_price, 0, ',', '.') }}</b></h5>
        </div>
    </div>
  </div>
</div>
@endsection
@section('pageScripts')
<script type="text/javascript">
  jQuery(document).ready(function($) {
    $('#details_url').val(window.location)
    $("#details-form").validate({
      rules: {
        full_name: {
          required: true
        },
        phone_number: {
          required: true
        },
        email: {
          required: true
        },
        address: {
          required: true
        },
      },
      messages: {
      	full_name: {
      		required: "Vui lòng nhập họ tên"
      	},
      	phone_number: {
      		required: "Vui lòng nhập điện thoại liên hệ"
      	},
      	email: {
      		required: "Vui lòng nhập email"
      	},
      	address: {
      		required: "Vui lòng nhập địa chỉ"
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
  		    var myform = document.getElementById("details-form");
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
              	if(xhr.responseJSON.result === 'details_set') { // registration created successfully
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
