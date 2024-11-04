@extends('admin.admin_dashboard')
@section('admin')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>

<div class="page-content" style="background-color: #FFF9C4;">
    <div class="container-fluid">
        <!-- Start page title -->
        <div class="row">
            <div class="col-12">
                <div class="page-title-box d-sm-flex align-items-center justify-content-between" style="background-color: #FFA500; padding: 10px; border-radius: 5px;">
                    <h4 class="mb-sm-0 font-size-18 text-white">Admin Profile</h4>
                    <div class="page-title-right">
                        <ol class="breadcrumb m-0">
                            <li class="breadcrumb-item"><a href="{{ url('/admin/dashboard') }}" style="color: #FFC107;">Dashboard</a></li>
                            <li class="breadcrumb-item active text-white">Profile</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
        <!-- End page title -->

        <!-- Profile Content -->
        <div class="row">
            <div class="col-xl-9 col-lg-8">
                <div class="card shadow-lg">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-sm order-2 order-sm-1">
                                <div class="d-flex align-items-start mt-3 mt-sm-0">
                                    <div class="flex-shrink-0">
                                        <div class="avatar-xl me-3">
                                            <img src="{{ (!empty($profileData->photo)) ? url('upload/admin_images/'.$profileData->photo) : url('upload/no_image.jpg') }}" alt="Admin Image" class="img-fluid rounded-circle d-block border border-3" style="border-color: #FFC107;">
                                        </div>
                                    </div>
                                    <div class="flex-grow-1">
                                        <div>
                                            <h5 class="font-size-16 mb-1" style="color: #FFA500;">{{ $profileData->name }}</h5>
                                            <p class="text-muted font-size-13">{{ $profileData->email }}</p>
                                            <div class="d-flex flex-wrap align-items-start gap-2 gap-lg-3 text-muted font-size-13">
                                                <div><i class="mdi mdi-circle-medium me-1 text-success align-middle"></i>{{ $profileData->phone }}</div>
                                                <div><i class="mdi mdi-circle-medium me-1 text-success align-middle"></i>{{ $profileData->address }}</div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>                  
                    </div>
                </div>

                <div class="card-body p-4">
                    <form action="{{ route('admin.profile.store') }}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="mb-3">
                                    <label for="example-text-input" class="form-label" style="color: #FFC107;">Name</label>
                                    <input class="form-control" type="text" name="name" value="{{ $profileData->name }}" id="example-text-input">
                                </div>

                                <div class="mb-3">
                                    <label for="example-email-input" class="form-label" style="color: #FFC107;">Email</label>
                                    <input class="form-control" name="email" type="email" value="{{ $profileData->email }}" id="example-email-input">
                                </div>

                                <div class="mb-3">
                                    <label for="example-phone-input" class="form-label" style="color: #FFC107;">Phone</label>
                                    <input class="form-control" name="phone" type="text" value="{{ $profileData->phone }}" id="example-phone-input">
                                </div>
                            </div>

                            <div class="col-lg-6">
                                <div class="mb-3">
                                    <label for="example-address-input" class="form-label" style="color: #FFC107;">Address</label>
                                    <input class="form-control" name="address" type="text" value="{{ $profileData->address }}" id="example-address-input">
                                </div>

                                <div class="mb-3">
                                    <label for="image" class="form-label" style="color: #FFC107;">Profile Image</label>
                                    <input class="form-control" name="photo" type="file" id="image">
                                </div>
                                <div class="mb-3 text-center">
                                    <img id="showImage" src="{{ (!empty($profileData->photo)) ? url('upload/admin_images/'.$profileData->photo) : url('upload/no_image.jpg') }}" alt="Profile Image" class="rounded-circle p-1 bg-primary" style="width: 110px; border: 2px solid #FFA500;">
                                </div>

                                <div class="text-center mt-4">
                                    <button type="submit" class="btn" style="background-color: #FFA500; color: white;">Save Changes</button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<script type="text/javascript">
    $(document).ready(function(){
        $('#image').change(function(e){
            var reader = new FileReader();
            reader.onload = function(e){
                $('#showImage').attr('src', e.target.result);
            }
            reader.readAsDataURL(e.target.files[0]);
        });
    });
</script>

@endsection
