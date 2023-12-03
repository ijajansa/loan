@extends('layouts.app')
@section('content')
<!-- Content Header (Page header) -->
<section class="content-header">
  <div class="container-fluid">
    @include('admin-layouts.flash')
    <div class="row mb-2">
      <div class="col-sm-6">
        <h1>Wallet</h1>
      </div>
      <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
          <li class="breadcrumb-item"><a href="{{url('/')}}">Home</a></li>
          <li class="breadcrumb-item active">Wallet</li>
        </ol>
      </div>
    </div>
  </div><!-- /.container-fluid -->
</section>

<!-- Main content -->
<section class="content">
  <!-- Default box -->
  <div class="card">
    <div class="card-header">
      <h3 class="card-title">Wallet</h3>
      <div class="card-tools">
        <a class="btn btn-primary btn-bg" href="{{url('wallet-withdraw')}}">
          <i class="fas fa-coins"></i> Request withdraw
        </a>
        
      </div>
    </div>
    <div class="card-body p-0">
      <div class="row">

        <div class="col-sm-12">
          <table class="table table-sm">
            <thead>
              <tr>
                <th colspan="2" style="width: 70%"><h2>Earned Points</h2></th>
                <th style="width: 30%">Balance:<br><h2><span class="badge bg-success">₹{{number_format(Auth::user()->wallet??0)}}</span></h2></th>
              </tr>
            </thead>
            <thead>
              <tr>
                <th style="width: 20%">Date</th>
                <th style="width: 50%">Description</th>
                <th style="width: 30%">Amount</th>
              </tr>
            </thead>
            <tbody>
              @foreach($histories as $history)
              <tr>
                <td>{{$history->created_at->format('d M Y H:i:sa')}}</td>

                <td>
                  {{$history->message ?? ''}}
                </td>
                <td>
                  @if($history->request_type == 1)
                  <span class="text-danger">₹{{$history->amount}}</span> 
                  @else
                  <span class="text-success">₹{{$history->amount}}</span> 
                  @endif
                  @if($history->request_type == 1)
                  <span class="badge bg-danger">DR</span>
                  @else
                  <span class="badge bg-success">CR</span>
                  @endif
                  <br>
                  @if($history->status == "success")
                  <span class="badge bg-success">Success</span>
                  @elseif($history->status == "pending")
                  <span class="badge bg-warning">Pending</span>
                  @else
                  <span class="badge bg-danger">Reject</span>
                  @endif
                </td>
              </tr>
              @endforeach
             
            </tbody>
          </table>
        </div>
      </div>
    </div>
    <!-- /.card-body -->
  </div>
  <!-- /.card -->
</section>
<!-- /.content -->
</div>

@endsection