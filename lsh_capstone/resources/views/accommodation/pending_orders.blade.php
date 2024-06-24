@extends('accommodation.layout.app')

@section('heading', 'Pending Bookings')

@section('main_content')
    <div class="section-body">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-bordered" id="example1">
                                <thead>
                                    <tr>
                                        <th>SL</th>
                                        <th>Reference No.</th>
                                        <th>Customer's Name</th>
                                        <th>Payment Method</th>
                                        <th>Booking Date</th>
                                        <th>Paid Amount</th>
                                        <th>Status</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($pending_orders as $row)
                                    @php
                                    $customer_info = \App\Models\Customer::where('id', $row->customer_id)->first();
                                    @endphp
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $row->transaction_id }}</td>
                                        <td>{{ $customer_info->name }}</td>
                                        <td>{{ $row->payment_method }}</td>
                                        <td>{{ \Carbon\Carbon::createFromFormat('d/m/Y', $row->booking_date)->format('F d, Y') }}</td>
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
                                            <a href="{{ route('accommodation_invoice',$row->id) }}" class="btn btn-primary mb-1" data-toggle="tooltip" data-placement="top" title="Detail">
                                                <i class="fa fa-info-circle" aria-hidden="true"></i>
                                            </a>
                                            
                                            <form action="{{ route('accommodation_booking_decline', $row->id) }}" method="POST" style="display:inline-block;">
                                                @csrf
                                                <button type="submit" onClick="return confirm('Are you sure you want to decline this booking?');" class="btn btn-danger mb-1" data-toggle="tooltip" data-placement="top" title="Decline booking">
                                                    <i class="fa fa-times" aria-hidden="true"></i>
                                                </button>
                                            </form>

                                            <form action="{{ route('accommodation_booking_confirm', $row->id) }}" method="POST" style="display:inline-block;">
                                                @csrf
                                                <button type="submit" onClick="return confirm('Are you sure you want to confirm this booking?');" class="btn btn-success mb-1" data-toggle="tooltip" data-placement="top" title="Confirm booking">
                                                    <i class="fa fa-check" aria-hidden="true"></i>
                                                </button>
                                            </form>
                                            
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
@endsection
