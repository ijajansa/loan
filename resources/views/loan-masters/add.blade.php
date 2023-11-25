@extends('admin-layouts.app')
@section('content')
<!-- content @s -->
<div class="nk-content ">
    <div class="container-fluid">
        <div class="nk-content-inner">
            <div class="nk-content-body">
                <div class="nk-block-head nk-block-head-sm">
                    <div class="nk-block-between">
                        <!-- .nk-block-head-content -->
                    </div><!-- .nk-block-between -->
                </div><!-- .nk-block-head -->
                <div class="nk-block nk-block-lg">

                    <div class="card card-bordered card-preview">
                        <div class="card-inner">
                            <form method="POST" action="{{url('loan-types/add')}}" enctype="multipart/form-data">
                                @csrf
                                <div class="row g-4">
                                 <div class="nk-block-head-content">
                                    <h3 class="nk-block-title page-title">Add New Type</h3>

                                </div>
                                <div class="col-lg-4">
                                    <div class="form-group">
                                        <label class="form-label" for="full-name-1">Icon <span class="text-danger">*</span></label>
                                        <div class="form-control-wrap">
                                            <input type="file" class="form-control @error('image') is-invalid @enderror" value="{{old('image')}}" name="image" placeholder="eg. Personal Loan" id="full-name-1">
                                            @error('image')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                
                                <div class="col-lg-4">
                                    <div class="form-group">
                                        <label class="form-label" for="full-name-1">Name <span class="text-danger">*</span></label>
                                        <div class="form-control-wrap">
                                            <input type="text" class="form-control @error('name') is-invalid @enderror" value="{{old('name')}}" name="name" placeholder="eg. Personal Loan" id="full-name-1">
                                            @error('name')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror
                                        </div>
                                    </div>
                                </div>

                                <div class="col-lg-4">
                                    <div class="form-group">
                                        <label class="form-label" for="full-name-11">Additional Text <span class="text-danger">*</span></label>
                                        <div class="form-control-wrap">
                                            <input type="text" class="form-control @error('additional_text') is-invalid @enderror" value="{{old('additional_text')}}" name="additional_text" placeholder="eg. Starting ROI @ 10.40%" id="full-name-11">
                                            @error('additional_text')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                
                                <div class="col-12">
                                    <div class="form-group">
                                        <button type="submit" class="btn btn-lg btn-primary">Save</button>
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
