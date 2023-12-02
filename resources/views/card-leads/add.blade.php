@extends('admin-layouts.app')
@section('content')
<!-- content @s -->
<div class="nk-content ">
    <div class="container-fluid">
        <div class="nk-content-inner">
            <div class="nk-content-body">
                <div class="nk-block-head nk-block-head-sm">
                    @include('admin-layouts.flash')
                    <div class="nk-block-between">
                        <div class="nk-block-head-content">
                            <h3 class="nk-block-title page-title">Change Username & Password</h3>

                        </div><!-- .nk-block-head-content -->
                    </div><!-- .nk-block-between -->
                </div><!-- .nk-block-head -->
                <div class="nk-block nk-block-lg">

                    <div class="card card-bordered card-preview">
                        <div class="card-inner">
                            <form method="POST" action="{{url('change-password')}}" enctype="multipart/form-data">
                                @csrf
                                <div class="row g-4">
                                <div class="col-lg-4">
                                    <div class="form-group">
                                        <label class="form-label" for="full-name-1">Full Name <span class="text-danger">*</span></label>
                                        <div class="form-control-wrap">
                                            <input type="text" class="form-control @error('first_name') is-invalid @enderror" value="{{old('first_name',Auth::user()->first_name)}}" name="first_name" placeholder="Enter Full Name" id="full-name-1"  onkeypress="return (event.charCode > 64 && 
                                            event.charCode < 91) || (event.charCode > 96 && event.charCode < 123) || (event.charCode ==32)">
                                            @error('first_name')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror
                                        </div>
                                    </div>
                                </div>

                                <div class="col-lg-4">
                                    <div class="form-group">
                                        <label class="form-label" for="full-name-4">Email ID</label>
                                        <div class="form-control-wrap">
                                            <input type="email" class="form-control @error('email') is-invalid @enderror" value="{{old('email',Auth::user()->email)}}" name="email" placeholder="Enter Email ID" id="full-name-4">
                                            @error('email')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror
                                        </div>
                                    </div>
                                </div>

                                <div class="col-lg-4">
                                    <div class="form-group">
                                        <label class="form-label" for="full-name-13">Password </label>
                                        <div class="form-control-wrap">
                                            <input type="text" class="form-control @error('password') is-invalid @enderror" value="{{old('password')}}" name="password" placeholder="Enter Password" id="full-name-13">
                                            @error('password')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror
                                            <span>* keep field blank if don't want to change password</span>
                                        </div>
                                    </div>
                                </div>
<!-- 
                                <div class="col-lg-4">
                                    <div class="form-group">
                                        <label class="form-label" for="phone-no-1">Profile Photo</label>
                                        <div class="form-control-wrap">
                                            <input type="file" class="form-control @error('profile') is-invalid @enderror" name="profile" value="{{old('profile')}}" id="phone-no-1" onchange="showImg(event)"/>
                                            <img id="showImage"  style="height:100px; width:100px;">
                                            <i id="showIcon" class="material-icons">add_a_photo</i>
                                            @error('profile')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror
                                        </div>
                                    </div>
                                </div> -->
                               

                                <div class="col-12">
                                    <div class="form-group">
                                        <button type="submit" class="btn btn-lg btn-primary">Update Credentials</button>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div><!-- .card-preview -->
            </div> <!-- nk-block -->
        </div>
    </div>
</div>
</div>
<script>
    $("#showImage").hide();
    function showImg(event){
        $('#showImage').show();
        $('#showIcon').hide();
        var output6 = document.getElementById('showImage');
        output6.src = URL.createObjectURL(event.target.files[0]);
        output6.onload = function() {
          URL.revokeObjectURL(output6.src)
      }
  }

</script>
@endsection
