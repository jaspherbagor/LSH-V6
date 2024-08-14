@extends('admin.layout.app')

@section('heading', 'Report Receipt')

@section('main_content')
<div class="section-body">
    <div class="invoice">
        <div class="invoice-print">
            <div class="row">
                <div class="col-lg-12">
                    <div class="invoice-title">
                        <h2>Receipt</h2>
                        <div class="invoice-number">Date: <span class="c1">August 14, 2024</span></div>
                    </div>
                    <hr>
                    <div class="row">
                        <div class="col-md-6">
                            <address>
                                <strong>Accommodation Info:</strong><br>
                                @if($accommodation_data->photo!= '')
                                <img src="{{ asset('uploads/'.$accommodation_data->photo) }}" alt="profile photo" class="w_50" ><br>
                                @else
                                <img src="{{ asset('uploads/default.png') }}" alt="profile photo" class="w_50" ><br>
                                @endif
                                {{ $accommodation_data->name }}<br>

                                {{ $accommodation_data->address }},<br>

                                {{ $accommodation_data->contact_number }}, <br>

                                {{ $accommodation_data->contact_email }}
                            </address>
                        </div>
                        <div class="col-md-6 text-md-right">
                            <address>
                                <strong>Date Range</strong><br>
                                {{-- {{ \Carbon\Carbon::createFromFormat('d/m/Y', $order->booking_date)->format('F d, Y') }} --}}
                                Start Date - End Date
                            </address>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row mt-4">
                <div class="col-md-12">
                    <div class="section-title">Booking Summary</div>
                    <p class="section-lead">Room information given below in detail:</p>
                    <hr class="invoice-above-table">
                    <div class="table-responsive">
                        <table class="table table-striped table-hover table-md">
                            <tr>
                                <th>SL</th>
                                <th>Booking Number</th>
                                <th>Customer Name</th>
                                <th class="text-center">Payment Method</th>
                                <th class="text-center">Booking Date</th>
                                <th class="text-center">Paid Amount</th>
                                {{-- <th class="text-center">Number of Children</th> --}}
                                <th class="text-right">Percentage (10%)</th>
                            </tr>
                            @php   
                            $total_paid_amount = 0;
                            $total_percentage = 0;   
                            @endphp
                            @foreach($booking_info as $item)
                            @php
                            $percentage = $item->paid_amount * .10;
                            @endphp
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $item->order_no }}</td>
                                <td>{{ $customer_info->name }}</td>
                                <td class="text-center">{{ \Carbon\Carbon::createFromFormat('d/m/Y', $item->booking_date)->format('F d, Y') }}</td>
                                {{-- <td class="text-center">{{ \Carbon\Carbon::createFromFormat('d/m/Y', $item->checkout_date)->format('F d, Y') }} 11:00AM</td> --}}
                                <td class="text-center">{{ number_format($item->paid_amount, 2) }}</td>
                                <td class="text-right">{{ number_format($percentage, 2) }}</td>
                                {{-- <td class="text-right">
                                    @php
                                        $d1 = explode('/',$item->checkin_date);
                                        $d2 = explode('/',$item->checkout_date);
                                        $d1_new = $d1[2].'-'.$d1[1].'-'.$d1[0];
                                        $d2_new = $d2[2].'-'.$d2[1].'-'.$d2[0];
                                        $t1 = strtotime($d1_new);
                                        $t2 = strtotime($d2_new);
                                        $diff = ($t2-$t1)/60/60/24;
                                        if($accommodation_type_data->name != 'Hotel') {
                                            $daily_price = $room_data->price / 30;
                                            $subtotal = $daily_price * $diff;
                                        } else {
                                            $subtotal = $room_data->price*$diff;
                                        }
                                        $sub = $subtotal;
                                        echo '₱'.number_format($sub, 2);
                                    @endphp
                                </td> --}}
                            </tr>
                            @php
                            $total_paid_amount += $paid_amount;
                            $total_percentage += $percentage;
                            @endphp
                    <div class="row mt-4">
                        <div class="col-lg-12 text-right">
                            <div class="invoice-detail-item">
                                <div class="invoice-detail-name">Total Paid Amount</div>
                                <div class="invoice-detail-value invoice-detail-value-lg">₱{{ number_format($total_paid_amount, 2) }}</div>
                            </div>
                            <div class="invoice-detail-item">
                                <div class="invoice-detail-name">Total Percentage(10%)</div>
                                <div class="invoice-detail-value invoice-detail-value-lg">₱{{ number_format($total_percentage, 2) }}</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <hr class="about-print-button">
        <div class="text-md-right">
            <a href="javascript:window.print();" class="btn btn-primary bg-website btn-icon icon-left text-white print-invoice-button"><i class="fas fa-print"></i> Print</a>
        </div>
    </div>
</div>
@endsection