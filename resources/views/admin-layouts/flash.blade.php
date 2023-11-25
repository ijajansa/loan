@if(session('error'))
<div class="alert alert-danger alert-icon"><em class="icon ni ni-cross-circle"></em> <strong>{{session('error')}}</strong></div>
@endif
@if(session('success'))
<div class="alert alert-success alert-icon"><em class="icon ni ni-check-circle"></em> <strong>{{session('success')}}</strong></div>
@endif
@if(session('warning'))
<div class="alert alert-warning alert-icon"><em class="icon ni ni-alert-circle"></em> <strong>{{session('warning')}}</strong></div>
@endif