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
                            <form method="POST" action="{{url('loan-documents/edit')}}/{{$data->id}}" enctype="multipart/form-data">
                                @csrf
                                <div class="row g-4">
                                 <div class="nk-block-head-content">
                                    <h3 class="nk-block-title page-title">Update Document Detail</h3>

                                </div>
                                
                                <div class="col-lg-4">
                                    <div class="form-group">
                                        <label class="form-label" for="full-name-1">Name <span class="text-danger">*</span></label>
                                        <div class="form-control-wrap">
                                            <input type="text" class="form-control @error('name') is-invalid @enderror" value="{{old('name',$data->name)}}" name="name" placeholder="eg. Personal Loan" id="full-name-1">
                                            @error('name')
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
    function showImg(event){
       
        var output6 = document.getElementById('showImage');
        output6.src = URL.createObjectURL(event.target.files[0]);
        output6.onload = function() {
          URL.revokeObjectURL(output6.src)
      }
  }

</script>
@endsection
