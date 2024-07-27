@extends('admin.layout.app')

@section('heading', 'All Bookings Report')

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
                                        <th>Accommodation Name</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($booking_info as $row)
                                    @php
                                    $accommodation_info = \App\Models\Accommodation::where('id', $row->accommodation_id)->first();
                                    @endphp
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        
                                        <td>{{ $accommodation_info->name }}</td>
                                        <td class="pt_10 pb_10">
                                            <a href="" class="btn btn-primary mb-1" data-toggle="tooltip" data-placement="top" title="View Booking Transactions">
                                                <i class="fa fa-info-circle" aria-hidden="true"></i>
                                            </a>
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
