@extends('layouts.app')
@section('title', 'Kilala Japan Tour - Tour du lịch Nhật Bản - Đăng ký tour - Phương thức thanh toán')

@section('topBanner')
<div class="header-banner">
    <div class="header-image">
        <img src="{{ asset('image/parallax-text.jpg') }}" alt="" />
    </div>
</div>
@endsection
@section('mainContent')
<div class="row registration-details-row">
  <div class="col-md-7">
    <h3 class="details-form-title">Đăng ký <b>Tour</b></h3>
    <h4 class="details-form-subtitle">Bước 2: Hình thức thanh toán</h4>
    <form id="payment-form">
      {{ csrf_field() }}
      <div class="form-group">
        <label class="radio">
          <span class="icons"><span class="first-icon fa fa-circle-o"></span><span class="first-icon fa fa-dot-circle-o"></span></span><input type="radio" name="paymentOption" data-toggle="radio" id="paymentOption" value="complete" checked>
          <i></i>Thanh toán trọn gói
        </label>
      </div>
      <div class="form-group">
        <label class="radio">
          <span class="icons"><span class="first-icon fa fa-circle-o"></span><span class="second-icon fa fa-dot-circle-o"></span></span><input type="radio" name="paymentOption" data-toggle="radio" id="paymentOption" value="partial">
          <i></i>Thanh toán phí đặt cọc trước*
        </label>
      </div>
      <div class="row">
        <div class="col-md-6">
          <a id="doBack" class="btn btn-primary btn-fill btn-block" href="{{ $back_url }}"><i class="fa fa-chevron-circle-left" aria-hidden="true"></i> Quay lại</a>
        </div>
        <div class="col-md-6">
          <button id="doComplete" type="submit" class="btn btn-warning btn-fill btn-block">Hoàn tất <i class="fa fa-check-circle" aria-hidden="true"></i> </button>
        </div>
      </div>
    </form>
    <hr>
    <div class="payment-note">
      <h5>Quy định đăng ký và thanh toán:</h5>
      <p>
        <b>Đợt 1</b>: Đặt cọc 20.000.000 VNĐ/khách.<br />
        <b>Đợt 2</b>: Thanh toán số tiền còn lại trước ngày khởi hành ít nhất 3 ngày (không tính thứ bảy, chủ nhật).
      </p>
      <h5>Chi phí hủy tour:</h5>
      <p>
        Nếu hủy tour khách thanh toán các khoản lệ phí hủy tour, hủy vé máy bay theo điều khoản bên dưới:
        <ul>
          <li>
            - Ngay sau khi đặt cọc tour và trước ngày khởi hành là 22 ngày: Phí hủy là 2.000.000 VNĐ
          </li>
          <li>
            - Trước ngày đi 15 -21 ngày:            Thanh toán 50% trên giá tour.
          </li>
          <li>
            - Trước ngày đi 8-14 ngày:               Thanh toán 70% trên giá tour.
          </li>
          <li>
            - Trước ngày đi 07 ngày:                  Thanh toán 100% trên giá tour.
          </li>
          <li>
            - Trường hợp Quý khách bị từ chối visa, chi phí không hoàn lại là 3,000,000 VNĐ
          </li>
          <li>
            (Thời gian hủy tour được tính cho ngày làm việc, không tính thứ bảy và chủ nhật)
          </li>
        </ul>
      </p>
    </div>
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

    $('#doComplete').on('click', function(e) {
      e.preventDefault()
      var registrationForm = document.getElementById("payment-form")
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
        	if(xhr.responseJSON.result === 'registration_created') { // registration created successfully
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
