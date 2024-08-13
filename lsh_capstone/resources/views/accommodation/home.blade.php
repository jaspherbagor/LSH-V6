@extends('accommodation.layout.app')

@section('heading', 'Accommodation Dashboard')

@section('main_content')
<div class="row">
    <div class="col-lg-4 col-md-6 col-sm-6 col-12">
        <a href="{{ route('accommodation_order_view') }}">
            <div class="card card-statistic-1">
                <div class="card-icon bg-website">
                    <i class="fa fa-list-alt"></i>
                </div>
                <div class="card-wrap">
                    <div class="card-header">
                        <h4>All Bookings</h4>
                    </div>
                    <div class="card-body">
                        {{ $total_orders }}
                    </div>
                </div>
            </div>
        </a>
    </div>
    <div class="col-lg-4 col-md-6 col-sm-6 col-12">
        <a href="{{ route('accommodation_completed_order_view') }}">
            <div class="card card-statistic-1">
                <div class="card-icon bg-website">
                    <i class="fa fa-check-circle"></i>
                </div>
                <div class="card-wrap">
                    <div class="card-header">
                        <h4>Completed Bookings</h4>
                    </div>
                    <div class="card-body">
                        {{ $total_completed_orders }}
                    </div>
                </div>
            </div>
        </a>
    </div>
    <div class="col-lg-4 col-md-6 col-sm-6 col-12">
        <a href="{{ route('accommodation_pending_order_view') }}">
            <div class="card card-statistic-1">
                <div class="card-icon bg-website">
                    <i class="fa fa-clock-o"></i>
                </div>
                <div class="card-wrap">
                    <div class="card-header">
                        <h4>Pending Bookings</h4>
                    </div>
                    <div class="card-body">
                        {{ $total_pending_orders }}
                    </div>
                </div>
            </div>
        </a>
        
    </div>
    
</div>
<div class="row">
    
    <div class="col-lg-4 col-md-6 col-sm-6 col-12">
        <a href="{{ route('accommodation_declined_order_view') }}">
            <div class="card card-statistic-1">
                <div class="card-icon bg-website">
                    <i class="fa fa-clock-o"></i>
                </div>
                <div class="card-wrap">
                    <div class="card-header">
                        <h4>Declined Bookings</h4>
                    </div>
                    <div class="card-body">
                        {{ $total_declined_orders }}
                    </div>
                </div>
            </div>
        </a>
        
    </div>
    <div class="col-lg-4 col-md-6 col-sm-6 col-12">
        <a href="{{ route('accommodation_room_view') }}">
            <div class="card card-statistic-1">
                <div class="card-icon bg-website">
                    <i class="fa fa-bed"></i>
                </div>
                <div class="card-wrap">
                    <div class="card-header">
                        <h4>Total Rooms</h4>
                    </div>
                    <div class="card-body">
                        {{ $total_rooms }}
                    </div>
                </div>
            </div>
        </a>
        
    </div>
    <div class="col-lg-4 col-md-6 col-sm-6 col-12">
        <a href="{{ route('accommodation_review') }}">
            <div class="card card-statistic-1">
                <div class="card-icon bg-website">
                    <i class="fa fa-star"></i>
                </div>
                <div class="card-wrap">
                    <div class="card-header">
                        <h4>Total Reviews
                    </div>
                    <div class="card-body">
                        {{ $total_reviews }}
                    </div>
                </div>
            </div>
        </a>
    </div>
</div>

<div class="row">
    <div class="col-md-12">
        <section class="section">
            <div class="section-header">
                <h1>Recent Bookings</h1>
            </div>
        </section>
        <div class="section-body">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered">
                                    <thead>
                                        <tr>
                                            <th>SL</th>
                                            <th>Booking No</th>
                                            <th>Customer Name</th>
                                            <th>Payment Method</th>
                                            <th>Checkin & Checkout Date</th>
                                            <th>Paid Amount</th>
                                            <th>Status</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($recent_orders as $row)
                                        @php
                                        $check_date = \App\Models\OrderDetail::where('order_no', $row->order_no)->first();
                                        $customer_info = \App\Models\Customer::where('id', $row->customer_id)->first();
                                        @endphp

                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td>{{ $row->order_no }}</td>
                                            <td>{{ $customer_info->name }}</td>
                                            <td>{{ $row->payment_method }}</td>
                                            <td>{{ \Carbon\Carbon::createFromFormat('d/m/Y', $check_date->checkin_date)->format('F d, Y') }} 3:00PM - {{ \Carbon\Carbon::createFromFormat('d/m/Y', $check_date->checkout_date)->format('F d, Y') }} 11:00AM</td>
                                            <td>₱{{ number_format($row->paid_amount, 2) }}</td>
                                            <td class="pt_10 pb_10">
                                                @if($row->status === 'Completed')
                                                <button class="btn btn-success">{{ $row->status }}</button>
                                                @elseif($row->status === 'Pending')
                                                <button class="btn btn-danger">{{ $row->status }}</button>
                                                @else
                                                <button class="btn btn-dark">{{ $row->status }}</button>
                                                @endif
                                            </td>
                                            <td class="pt_10 pb_10">
                                                <a href="{{ route('accommodation_invoice',$row->id) }}" class="btn btn-primary">Detail</a>
                                            </td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection