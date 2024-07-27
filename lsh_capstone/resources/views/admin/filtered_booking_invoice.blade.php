@extends('admin.layout.app')

@section('heading', 'Filtered Bookings Invoice')

@section('main_content')
<div class="section-body">
    <div class="invoice">
        <div class="invoice-print">
            <div class="row">
                <div class="col-lg-12">
                    <div class="invoice-title">
                        <h2>Invoice</h2>
                    </div>
                    <hr>
                    <div class="row mt-4">
                        <div class="col-md-12">
                            <div class="section-title">Booking Summary</div>
                            <p class="section-lead">Room information given below in detail:</p>
                            <hr class="invoice-above-table">
                            <div class="table-responsive">
                                <table class="table table-striped table-hover table-md">
                                    <tr>
                                        <th>SL</th>
                                        <th>Booking No.</th>
                                        <th>Customer's Name</th>
                                        <th>Payment Method</th>
                                        <th>Booking Date</th>
                                        <th>Paid Amount</th>
                                        <th>Percentage (10%)</th>
                                    </tr>
                                    @php $total = 0; @endphp
                                    @foreach($filteredBookings as $index => $booking)
                                    @php
                                    $paidAmount = $booking['paid_amount'];
                                    $percentage = $paidAmount * 0.1;
                                    $total += $paidAmount;
                                    @endphp
                                    <tr>
                                        <td>{{ $index + 1 }}</td>
                                        <td>{{ $booking['order_no'] }}</td>
                                        <td>{{ $booking['customer_name'] }}</td>
                                        <td>{{ $booking['payment_method'] }}</td>
                                        <td>{{ \Carbon\Carbon::createFromFormat('d/m/Y', $booking['booking_date'])->format('Y-m-d') }}</td>
                                        <td>₱{{ number_format($paidAmount, 2) }}</td>
                                        <td>₱{{ number_format($percentage, 2) }}</td>
                                    </tr>
                                    @endforeach
                                </table>
                            </div>
                            <div class="row mt-4">
                                <div class="col-lg-12 text-right">
                                    <div class="invoice-detail-item">
                                        <div class="invoice-detail-name">Total</div>
                                        <div class="invoice-detail-value invoice-detail-value-lg">₱{{ number_format($total, 2) }}</div>
                                    </div>
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
</div>
@endsection
