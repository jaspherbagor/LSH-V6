@extends('admin.layout.app')

@section('heading', 'Dashboard')

@section('main_content')
<div class="row">
    <div class="col-lg-4 col-md-6 col-sm-6 col-12">
        <a href="{{ route('admin_completed_order_view') }}">
            <div class="card card-statistic-1">
                <div class="card-icon bg-website">
                    <i class="fa fa-cart-plus"></i>
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
        <a href="{{ route('admin_pending_order_view') }}">
            <div class="card card-statistic-1">
                <div class="card-icon bg-website">
                    <i class="fa fa-shopping-cart"></i>
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
    <div class="col-lg-4 col-md-6 col-sm-6 col-12">
        <a href="{{ route('admin_customer') }}">
            <div class="card card-statistic-1">
                <div class="card-icon bg-website">
                    <i class="fa fa-user-plus"></i>
                </div>
                <div class="card-wrap">
                    <div class="card-header">
                        <h4>Active Customers</h4>
                    </div>
                    <div class="card-body">
                        {{ $total_active_customers }}
                    </div>
                </div>
            </div>
        </a>     
    </div>
    <div class="col-lg-4 col-md-6 col-sm-6 col-12">
        <a href="{{ route('admin_customer') }}">
            <div class="card card-statistic-1">
                <div class="card-icon bg-website">
                    <i class="fa fa-user"></i>
                </div>
                <div class="card-wrap">
                    <div class="card-header">
                        <h4>Pending Customers</h4>
                    </div>
                    <div class="card-body">
                        {{ $total_pending_customers }}
                    </div>
                </div>
            </div>
        </a>   
    </div>
    <div class="col-lg-4 col-md-6 col-sm-6 col-12">
        <a href="{{ route('admin_accommodation_all') }}">
            <div class="card card-statistic-1">
                <div class="card-icon bg-website">
                    <i class="fa fa-home"></i>
                </div>
                <div class="card-wrap">
                    <div class="card-header">
                        <h4>Total Accommodations</h4>
                    </div>
                    <div class="card-body">
                        {{ $total_accommodations }}
                    </div>
                </div>
            </div>
        </a>
    </div>
    <div class="col-lg-4 col-md-6 col-sm-6 col-12">
        <a href="{{ route('admin_subscriber_show') }}">
            <div class="card card-statistic-1">
                <div class="card-icon bg-website">
                    <i class="fa fa-users"></i>
                </div>
                <div class="card-wrap">
                    <div class="card-header">
                        <h4>Total Subscribers</h4>
                    </div>
                    <div class="card-body">
                        {{ $total_subscribers }}
                    </div>
                </div>
            </div>
        </a>
    </div>
    <div class="col-lg-4 col-md-6 col-sm-6 col-12">
        <a href="{{ route('admin_pending_accommodation_view') }}">
            <div class="card card-statistic-1">
                <div class="card-icon bg-website">
                    <i class="fa fa-clock-o"></i>
                </div>
                <div class="card-wrap">
                    <div class="card-header">
                        <h4>Pending Accommodations</h4>
                    </div>
                    <div class="card-body">
                        {{ $total_pending_accommodations }}
                    </div>
                </div>
            </div>
        </a>
    </div>
    <div class="col-lg-4 col-md-6 col-sm-6 col-12">
        <a href="{{ route('admin_approved_accommodation_view') }}">
            <div class="card card-statistic-1">
                <div class="card-icon bg-website">
                    <i class="fa fa-check"></i>
                </div>
                <div class="card-wrap">
                    <div class="card-header">
                        <h4>Approved Accommodations</h4>
                    </div>
                    <div class="card-body">
                        {{ $total_approved_accommodations }}
                    </div>
                </div>
            </div>
        </a>
    </div>
    <div class="col-lg-4 col-md-6 col-sm-6 col-12">
        <a href="{{ route('admin_room_all_view') }}">
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
        <a href="{{ route('admin_pending_room_view') }}">
            <div class="card card-statistic-1">
                <div class="card-icon bg-website">
                    <i class="fa fa-clock-o"></i>
                </div>
                <div class="card-wrap">
                    <div class="card-header">
                        <h4>Pending Rooms</h4>
                    </div>
                    <div class="card-body">
                        {{ $total_pending_rooms }}
                    </div>
                </div>
            </div>
        </a>
    </div>
    <div class="col-lg-4 col-md-6 col-sm-6 col-12">
        <a href="{{ route('admin_published_room_view') }}">
            <div class="card card-statistic-1">
                <div class="card-icon bg-website">
                    <i class="fa fa-check"></i>
                </div>
                <div class="card-wrap">
                    <div class="card-header">
                        <h4>Published Rooms</h4>
                    </div>
                    <div class="card-body">
                        {{ $total_published_rooms }}
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
                                            <td>{{ \Carbon\Carbon::createFromFormat('d/m/Y', $check_date->checkin_date)->format('F d, Y') }} - {{ \Carbon\Carbon::createFromFormat('d/m/Y', $check_date->checkout_date)->format('F d, Y') }}</td>
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
                                                <a href="{{ route('admin_invoice',$row->id) }}" class="btn btn-primary mb-1" data-toggle="tooltip" data-placement="top" title="View"><i class="fa fa-eye" aria-hidden="true"></i></a>
                                                <a href="{{ route('admin_order_delete',$row->id) }}" class="btn btn-danger mb-1" onClick="return confirm('Are you sure?');" data-toggle="tooltip" data-placement="top" title="Delete"><i class="fa fa-trash" aria-hidden="true"></i></a>
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