Xin chào {{ $registration->full_name }} <br/>
Yêu cầu đăng ký tour du lịch Nhật Bản của quý khách đã được ghi nhận. Vui lòng kiểm tra lại thông tin đăng ký bên dưới<br/>
<h3>Thông tin liên hệ</h3>
<ul>
	<li><strong>Người liên hệ:</strong> {{ $registration->full_name }}</li>
	<li><strong>Email:</strong> {{$registration->email }}</li>
	<li><strong>Điện thoại:</strong> {{ $registration->phone_number }}</li>
	<li><strong>Địa chỉ:</strong> {{ $registration->address}}</li>
</ul>
<h3>Thông tin tour du lịch</h3>
<ul>
	<li><strong>Tên tour:</strong> {{ $registration->tour->title }}</li>
    <li><strong>Khởi hành từ:</strong> {{ $registration->tour->from->title }}</li>
    <li><strong>Ngày khởi hành:</strong> {{ $registration->tour->begin_date->format('d/m/Y') }}</li>
    <li><strong>Số người lớn:</strong> {{ $registration->adults_number }} - Tổng giá người lớn: {{ number_format($registration->adults_price, 0, ',', '.') }} đ</li>
    @if($registration->infants_price)
    <li><strong>Số em bé:</strong> {{ $registration->infants_number }} - Tổng giá em bé: {{ number_format($registration->infants_price, 0, ',', '.') }} đ</li>
    @endif
    @if($registration->childs_shared_price)
    <li><strong>Số trẻ em (Giường chung):</strong> {{ $registration->childs_shared_number }} - Tổng giá: {{ number_format($registration->childs_shared_price, 0, ',', '.') }} đ</li>
    @endif
    @if($registration->childs_single_price)
    <li><strong>Số trẻ em (Giường riêng):</strong> {{ $registration->childs_single_number }} - Tổng giá: {{ number_format($registration->childs_single_price, 0, ',', '.') }} đ</li>
    @endif
</ul>
<h3>Thông tin thanh toán</h3>
    <li><strong>Tổng chi phí:</strong> {{ number_format($registration->total_price, 0, ',', '.') }} đ</li>
    <li><strong>Phương pháp thanh toán:</strong> <?php echo ('complete' === $registration->payment_method) ? 'Toàn bộ chi phí' : 'Đặt cọc 20.000.000 VNĐ'  ?></li>
<ul>
</ul>
Nhân viên của KILALA JAPAN TOUR - SONG HAN TOURIST sẽ liên hệ quý khách trong thời gian sớm nhất để xác nhận đơn đăng ký<br/>
Xin chân thành cảm ơn
<strong>KILALA JAPAN TOUR</strong> - https://japan-tour.songhantourist.com
