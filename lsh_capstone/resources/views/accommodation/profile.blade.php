@extends('accommodation.layout.app')

@section('heading', 'Edit Profile')

@section('main_content')
<div class="section-body">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <form action="{{ route('accommodation_profile_submit') }}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="row">
                            <div class="col-md-3">
                                @php
                                if(Auth::guard('accommodation')->user()->photo != '') {
                                    $accommodation_photo = Auth::guard('accommodation')->user()->photo;
                                } else {
                                    $accommodation_photo = 'default.png';
                                }
                                @endphp
                                <img src="{{ asset('uploads/'.$accommodation_photo) }}" alt="" class="profile-photo w_100_p">
                                <input type="file" class="form-control mt_10" name="photo">
                            </div>
                            <div class="col-md-9">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="mb-4">
                                            <label class="form-label">Accommodation Name *</label>
                                            <input type="text" class="form-control" name="name" value="{{ Auth::guard('accommodation')->user()->name }}">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="mb-4">
                                            <label class="form-label">Contact Email *</label>
                                            <input type="text" class="form-control" name="contact_email" value="{{ Auth::guard('accommodation')->user()->contact_email }}">
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="mb-4">
                                            <label class="form-label">Contact Number</label>
                                            <input type="text" class="form-control" name="contact_number" value="{{ Auth::guard('accommodation')->user()->contact_number }}">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="mb-4">
                                            <label class="form-label">Address</label>
                                            <input type="text" class="form-control" name="address" value="{{ Auth::guard('accommodation')->user()->address }}">
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="mb-4">
                                            <label class="form-label">Map Iframe Code</label>
                                            <textarea name="map" class="form-control h_100" id="" cols="30" rows="10">{{ Auth::guard('accommodation')->user()->map }}</textarea>
                                        </div>
                                    </div>
                                </div>                             

                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="mb-4">
                                            <label class="form-label">Password</label>
                                            <input type="password" class="form-control" name="password">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="mb-4">
                                            <label class="form-label">Retype Password</label>
                                            <input type="password" class="form-control" name="retype_password">
                                        </div>
                                    </div>
                                </div>                            
                                
                                <div class="mb-4">
                                    <label class="form-label"></label>
                                    <button type="submit" class="btn btn-primary">Update</button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection