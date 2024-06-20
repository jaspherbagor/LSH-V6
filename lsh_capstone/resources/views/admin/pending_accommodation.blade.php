@extends('admin.layout.app')

@section('heading', 'Pending Accommodations')

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
                                        <th>Name</th>
                                        <th>Photo</th>
                                        <th>Address</th>
                                        <th>Status</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($pending_accommodations as $row)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $row->name }}</td>
                                        <td><img src="{{ asset('uploads/'.$row->photo) }}" alt="accommodation_type_image" class="w_200"></td>
                                        <td>{{ $row->address }}</td>
                                        <td>
                                            <button class="btn btn-danger">{{ $row->status }}</button>
                                        </td>
                                        <td class="pt_10 pb_10">

                                            <a href="{{ route('admin_accommodation_edit',$row->id) }}" class="btn btn-primary mb-1" data-toggle="tooltip" data-placement="top" title="Edit">
                                                <i class="fa fa-pencil" aria-hidden="true"></i>
                                            </a>

                                            <form action="{{ route('admin_accommodation_approve', $row->id) }}" method="POST" style="display:inline-block;">
                                                @csrf
                                                <button type="submit" onClick="return confirm('Are you sure you want to approve this accommodation?');" class="btn btn-success mb-1" data-toggle="tooltip" data-placement="top" title="Approve">
                                                    <i class="fa fa-check" aria-hidden="true"></i>
                                                </button>
                                            </form>

                                            {{-- <a href="{{ route('admin_accommodation_approve',$row->id) }}" class="btn btn-success mb-1" data-toggle="tooltip" data-placement="top" title="Approve">
                                                <i class="fa fa-check" aria-hidden="true"></i>
                                            </a>                                             --}}
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
