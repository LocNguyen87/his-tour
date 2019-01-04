@extends('layouts.app')
@section('title', 'Kilala Japan Tour - Tour du lịch Nhật Bản - Đăng ký tour - Phương thức thanh toán')

@section('topBanner')
<div class="header-banner short-banner" style="background-image: url('{{ asset('image/tour-registration-banner.jpg') }}')">
    <div class="header-image">
    </div>
</div>
@endsection
@section('mainContent')
<div class="row registration-details-row">
  <div class="col-md-12">
    <h3 class="details-form-title">Hoàn tất <b>đăng ký</b></h3>
    <div class="thank-you-text text-center">
      <p>Cảm ơn bạn đã tham gia đăng ký.<br>
Bạn vui lòng kiểm tra lại các thông tin đăng ký bên dưới, liên hệ với chúng tôi nếu bạn cần điều chỉnh thay đổi nhé!</p>
    </div>
    <div class="card summary-card thank-you-background">
        <div class="summary-card-header">
          Đăng ký tour du lịch Nhật
        </div>
        <div class="summary-card-content content">
          <div class="row">
            <div class="col-md-5 text-center">
              <h5>Tour <b>{{ $registration->tour->title }}</b></h5>
              <ul class="list-unstyled list-lines">
                  <li>
                      Ngày khởi hành: <b>{{ $registration->tour->begin_date->format('d/m/Y') }} @if($registration->tour->date_note) ({{ $registration->tour->date_note }}) @endif</b>
                  </li>
                  <li>
                      Điểm khởi hành: <b>{{ $registration->tour->from->title }}</b>
                  </li>
                  <li>
                      Số ngày tham quan: <b>{{ $registration->tour->times }}</b>
                  </li>
                  <li>
                      Hãng bay: <b>{{ $registration->tour->flight }}</b>
                  </li>
              </ul>
              <h5 class="summary-total">Tổng giá tour: <b>{{ number_format($registration->total_price, 0, ',', '.') }}</b></h5>
            </div>
            <div class="col-md-7">
              <div class="row">
                <div class="col-md-6">
                  <h5>Giá tour người lớn</h5>
                  <ul class="list-unstyled list-lines">
                      <li>
                          Giá mỗi người lớn: <b>{{ number_format($registration->tour->price, 0, ',', '.') }}</b>
                      </li>
                      <li>
                          Số người lớn: <b>{{ $registration->adults_number }}</b>
                      </li>
                      <li>
                          Tổng giá người lớn: <b>{{ number_format($registration->adults_price, 0, ',', '.') }}</b>
                      </li>
                  </ul>
                </div>
                @if($registration->infants_number > 0)
                <div class="col-md-6">
                  <h5>Giá tour cho em bé 0 ~ 2 tuổi</h5>
                    <ul class="list-unstyled list-lines">
                        <li>
                            Giá mỗi em bé: <b>{{ number_format($registration->tour->price*0.3, 0, ',', '.') }}</b>
                        </li>
                        <li>
                            Số em bé: <b>{{ $registration->infants_number }}</b>
                        </li>
                        <li>
                            Tổng giá em bé: <b>{{ number_format($registration->infants_price, 0, ',', '.') }}</b>
                        </li>
                    </ul>
                </div>
                @endif
              </div>
              <div class="row">
                @if($registration->childs_shared_number > 0)
                <div class="col-md-6">
                  <h5>Giá tour cho trẻ em 2 ~ 12 tuổi (Giường chung)</h5>
                  <ul class="list-unstyled list-lines">
                      <li>
                          Giá mỗi trẻ em: <b>{{ number_format($registration->tour->price*0.8, 0, ',', '.') }}</b>
                      </li>
                      <li>
                          Số trẻ em: <b>{{ $registration->childs_shared_number }}</b>
                      </li>
                      <li>
                          Tổng giá trẻ em: <b>{{ number_format($registration->childs_shared_price, 0, ',', '.') }}</b>
                      </li>
                  </ul>
                </div>
                @endif
                @if($registration->childs_single_number > 0)
                <div class="col-md-6">
                  <h5>Giá tour cho trẻ em 2 ~ 12 tuổi (Giường riêng)</h5>
                  <ul class="list-unstyled list-lines">
                      <li>
                          Giá mỗi trẻ em: <b>{{ number_format($registration->tour->price*0.9, 0, ',', '.') }}</b>
                      </li>
                      <li>
                          Số trẻ em: <b>{{ $registration->childs_single_number }}</b>
                      </li>
                      <li>
                          Tổng giá trẻ em: <b>{{ number_format($registration->childs_single_price, 0, ',', '.') }}</b>
                      </li>
                  </ul>
                </div>
                @endif
              </div>
            </div>
          </div>
        </div>
    </div>
  </div>
</div>
@endsection
@section('pageScripts')

@endsection
