@extends('admin.layout.app')

@section('heading', $accommodation_info->name.' Bookings Report')

@section('main_content')
    <div class="section-body">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-6"></div>
                            <div class="col-md-6">
                                <label for="min">Start Date:</label>
                                <input type="date" id="min" name="min">
                                <label for="max">End Date:</label>
                                <input type="date" id="max" name="max">
                            </div>
                        </div>
                        <div class="table-responsive">
                            <table class="table table-bordered" id="reportDetailTable">
                                <thead>
                                    <tr>
                                        <th>SL</th>
                                        <th>Booking No.</th>
                                        <th>Customer's Name</th>
                                        <th>Payment Method</th>
                                        <th>Booking Date</th>
                                        <th>Paid Amount</th>
                                        {{-- <th>Status</th> --}}
                                        <th>Percentage (10%)</th>
                                        {{-- <th>Action</th> --}}
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($accommodation_transaction as $row)
                                    @php
                                    $customer_info = \App\Models\Customer::where('id', $row->customer_id)->first();
                                    @endphp
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $row->order_no }}</td>
                                        <td>{{ $customer_info->name }}</td>
                                        <td>{{ $row->payment_method }}</td>
                                        <td>{{ \Carbon\Carbon::createFromFormat('d/m/Y', $row->booking_date)->format('Y-m-d') }}</td>
                                        <td>₱{{ number_format($row->paid_amount, 2) }}</td>
                                        {{-- <td class="pt_10 pb_10">
                                            <button class="btn btn-success">{{ $row->status }}</button>
                                        </td> --}}
                                        <td>₱{{ number_format($row->paid_amount * .1, 2) }}</td>
                                        {{-- <td class="pt_10 pb_10">
                                            <a href="" class="btn btn-primary mb-1" data-toggle="tooltip" data-placement="top" title="View Booking Transactions">
                                                <i class="fa fa-info-circle" aria-hidden="true"></i>
                                            </a>
                                        </td> --}}
                                        
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
    <script>
        $(document).ready(function() {
        // Custom filtering function which will search data in column five between two values
        $.fn.dataTable.ext.search.push(
            function(settings, data, dataIndex) {
                var min = $('#min').val();
                var max = $('#max').val();
                var date = data[4]; // Use data for the Booking Date column (0-indexed)

                if (
                    (min === "" && max === "") ||
                    (min === "" && date <= max) ||
                    (min <= date && max === "") ||
                    (min <= date && date <= max)
                ) {
                    return true;
                }
                return false;
            }
        );

        // Initialize the DataTable
        var table = $('#reportDetailTable').DataTable();

        // Event listener to the two range filtering inputs to redraw on input
        $('#min, #max').change(function() {
            table.draw();
        });
    });
    </script>

@endsection
