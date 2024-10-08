@extends('admin.layout.app')

@section('heading', 'View Customers')

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
                                        <th>Photo</th>
                                        <th>Name</th>
                                        <th>Email</th>
                                        <th>Selfie</th>
                                        <th>ID</th>
                                        <th>Phone</th>
                                        <th>Status</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($customers as $row)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>
                                            @if($row->photo!= '')
                                            <img src="{{ asset('uploads/'.$row->photo) }}" alt="photo" class="w_100">
                                            @else
                                            <img src="{{ asset('uploads/default.png') }}" alt="photo" class="w_100">
                                            @endif
                                        </td>
                                        <td>{{ $row->name }}</td>
                                        <td>{{ $row->email }}</td>
                                        <td>
                                            <img src="{{ asset('uploads/'.$row->selfie) }}" alt="selfie" class="w_150">
                                        </td>
                                        <td>
                                            <img src="{{ asset('uploads/'.$row->id_image) }}" alt="id" class="w_300 magnific">
                                        </td>
                                        <td>{{ $row->phone }}</td>
                                        <td class="pt_10 pb_10">
                                            @if($row->status == 1)
                                            <a href="{{ route('admin_customer_change_status', $row->id) }}" class="btn btn-success mb-md-0 mb-1">Active</a>
                                            @else
                                            <a href="{{ route('admin_customer_change_status', $row->id) }}" class="btn btn-danger mb-md-0 mb-1">Pending</a>
                                            @endif
                                            
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
