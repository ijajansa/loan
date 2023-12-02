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
                            <h3 class="nk-block-title page-title">Update Bank Details</h3>

                        </div><!-- .nk-block-head-content -->
                    </div><!-- .nk-block-between -->
                </div><!-- .nk-block-head -->
                <div class="nk-block nk-block-lg">

                    <div class="card card-bordered card-preview">
                        <div class="card-inner">
                            <form method="POST" action="{{url('bank-commissions/edit')}}/{{$data->id}}" enctype="multipart/form-data">
                                @csrf
                                <div class="row g-4">

                                    <div class="col-lg-4">
                                        <div class="form-group">
                                            <label class="form-label" for="full-name-1">Bank Name <span class="text-danger">*</span></label>
                                            <div class="form-control-wrap">
                                                <input type="text" class="form-control @error('bank_name') is-invalid @enderror" value="{{old('bank_name',$data->bank_name)}}" name="bank_name" placeholder="Enter Bank Name" id="full-name-1"  onkeypress="return (event.charCode > 64 && 
                                                event.charCode < 91) || (event.charCode > 96 && event.charCode < 123) || (event.charCode ==32)">
                                                @error('bank_name')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>


                                    <div class="col-lg-4">
                                        <div class="form-group">
                                            <label class="form-label" for="full-name-12">Commission Upto <span class="text-danger">*</span></label>
                                            <div class="form-control-wrap">
                                                <input type="text" class="form-control @error('commission') is-invalid @enderror" value="{{old('commission',$data->bank_commission)}}" name="commission" placeholder="Eg. 2.5" id="full-name-12" maxlength="6" onkeypress='return event.charCode >= 48 && event.charCode <= 57 || (event.charCode ==46)' >
                                                @error('commission')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                    
                                    <div class="col-12">
                                        <div class="form-group">
                                            <button type="submit" class="btn btn-lg btn-primary">Update</button>
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
