A new tour booking request has just been made on KILALA JAPAN TOUR website. <br/>
<h3>Contact Information</h3>
<ul>
	<li><strong>Full Name:</strong> {{ $registration->full_name }}</li>
	<li><strong>Email:</strong> {{$registration->email }}</li>
	<li><strong>Phone Number:</strong> {{ $registration->phone_number }}</li>
	<li><strong>Address:</strong> {{ $registration->address}}</li>
</ul>
<h3>Tour Information</h3>
<ul>
	<li><strong>Tour Name:</strong> {{ $registration->tour->title }}</li>
    <li><strong>Tour From:</strong> {{ $registration->tour->from->title }}</li>
    <li><strong>Tour Departure Date:</strong> {{ $registration->tour->begin_date->format('d/m/Y') }}</li>
    <li><strong>Adults:</strong> {{ $registration->adults_number }} - Price: {{ number_format($registration->adults_price, 0, ',', '.') }} đ</li>
    @if($registration->infants_price)
    <li><strong>Infants:</strong> {{ $registration->infants_number }} - Price: {{ number_format($registration->infants_price, 0, ',', '.') }} đ</li>
    @endif
    @if($registration->childs_shared_price)
    <li><strong>Childs (Shared Bed):</strong> {{ $registration->childs_shared_number }} - Price: {{ number_format($registration->childs_shared_price, 0, ',', '.') }} đ</li>
    @endif
    @if($registration->childs_single_price)
    <li><strong>Childs (Single Bed):</strong> {{ $registration->childs_single_number }} - Price: {{ number_format($registration->childs_single_price, 0, ',', '.') }} đ</li>
    @endif
</ul>
<h3>Payment Information</h3>
    <li><strong>Total Price:</strong> {{ number_format($registration->total_price, 0, ',', '.') }} đ</li>
    <li><strong>Payment Method:</strong> {{ $registration->payment_method }}</li>
<ul>
</ul>
For more details, please login to admin section.<br/><br/>
<strong>KILALA JAPAN TOUR</strong> - https://japan-tour.songhantourist.com
