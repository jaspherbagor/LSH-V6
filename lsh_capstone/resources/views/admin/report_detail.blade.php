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
                                    <th>Percentage (10%)</th>
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
                                    <td>₱{{ number_format($row->paid_amount * .1, 2) }}</td>
                                </tr>
                                @endforeach
                            </tbody>
                            <tfoot>
                                <tr>
                                    <th colspan="5" style="text-align:right">Total:</th>
                                    <th id="totalPaidAmount">₱0.00</th>
                                    <th id="totalPercentage">₱0.00</th>
                                </tr>
                                <tr id="invoiceRow" style="display: none;">
                                    <td colspan="7" style="text-align: right;">
                                        <button id="invoiceButton" class="btn btn-primary">Generate Invoice</button>
                                    </td>
                                </tr>
                            </tfoot>
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

        // Function to calculate and update the totals
        function updateTotals() {
            var totalPaidAmount = 0;
            var totalPercentage = 0;
            var rowCount = 0;

            table.rows({ search: 'applied' }).every(function() {
                var data = this.data();
                var paidAmount = parseFloat(data[5].replace(/[^0-9.-]+/g, "")) || 0;
                var percentage = parseFloat(data[6].replace(/[^0-9.-]+/g, "")) || 0;

                totalPaidAmount += paidAmount;
                totalPercentage += percentage;
                rowCount++;
            });

            $('#totalPaidAmount').text('₱' + totalPaidAmount.toFixed(2));
            $('#totalPercentage').text('₱' + totalPercentage.toFixed(2));

            // Show or hide the invoice button based on the results
            if (totalPaidAmount > 0 && rowCount > 0) {
                $('#invoiceRow').show();
            } else {
                $('#invoiceRow').hide();
            }
        }

        // Call updateTotals whenever the table is drawn
        table.on('draw', function() {
            updateTotals();
        });

        // Initial call to set totals
        updateTotals();
    });
</script>

{{-- @php
dd(old('min'))
@endphp --}}

@endsection
