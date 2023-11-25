@extends('layouts.app')
<style type="text/css">
  .category-link{
    border: 1px solid #eee !important;
  }
</style>
@section('content')

<section class="content">
  <div class="container-fluid">
    @include('admin-layouts.flash')
    <div class="row">
      <div class="col-xxl-8 col-xl-8 col-lg-8 col-md-8 col-sm-12">
        <div class="row">
          <div class="col-12">
            <div class="card custom-card">
              <div class="card-header justify-content-between">
                <div class="card-title"> Apply Loan </div>
              </div>
              <div class="card-body">
                <div class="row gy-xl-0 gy-3">
                  @foreach($data as $loan)
                  <div class="col-xxl-4 col-xl-4 col-lg-4 col-md-6 col-sm-6 col-6">
                    <div>
                      <a href="?path=loan&method=newloan&type={{$loan->id}}&loan_mode=New"  class="category-link primary text-center">
                        <!-- <i class="far fa-user fa-3x pb-3 text-primary"></i> -->
                        <img src="{{url('storage/app')}}/{{$loan->image}}" style="width: 50px;height: 50px;">
                        <p class="fs-14 mb-1 text-default fw-semibold">{{$loan->name ?? ''}}</p>
                        <span class="fs-11 text-muted">{{$loan->additional_text}}</span>
                      </a>
                    </div>
                  </div>
                  @endforeach

                </div>

              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="col-xxl-4 col-xl-4 col-lg-4 col-md-4 col-sm-12">
        <div class="row">
          <div class="col-lg-12">
            <div class="card custom-card recent-transactions-card overflow-hidden">
              <div class="card-header justify-content-between">
                <div class="card-title">Loan Analytics </div>
                <a title="View all leads" href="/index.php?path=loan&method=list"  class="btn btn-sm btn-light">
                  View All
                </a>
              </div>
              <div class="card-body">
                <div class="progress progress-lg mb-4">
                  <div class="progress-bar bg-primary" role="progressbar" style="width: 42.42%" aria-valuenow="42.42" aria-valuemin="0" aria-valuemax="100">42.42%</div>
                  <div class="progress-bar bg-secondary" role="progressbar" style="width: 57.58%" aria-valuenow="57.58" aria-valuemin="0" aria-valuemax="100">57.58%</div>
                  <div class="progress-bar bg-success" role="progressbar" style="width: 0%" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100">0%</div>
                  <div class="progress-bar bg-warning" role="progressbar" style="width: 0%" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100">0%</div>
                  <div class="progress-bar bg-danger" role="progressbar" style="width: 0%" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100">0%</div>
                  <div class="progress-bar bg-dark" role="progressbar" style="width: 0%" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100">0%</div>
                </div>
                <ul class="list-group">
                  @foreach($data as $loan)
                  <li class="list-group-item">
                    {{$loan->name ?? ''}} <span class="badge float-end bg-primary-transparent">{{$loan->leads_count ?? 0}}</span>
                  </li>
                  @endforeach
                 
                </ul>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="row">
      <div class="col-12" id="loan_list"><div class="card custom-card card-primary">
        <div class="card-header justify-content-between">
          <div class="card-title">Loan Leads</div>
          <a href="{{url('home')}}?data_show=list" class="btn btn-sm btn-success" style="margin-left: 10px;">View All</a>
        </div>
        <div class="card-body p-0">
          <table class="table table-striped table-sm">
            <thead>
              <tr>
                <th style="width: 5%">#File No.</th>
                <th style="width: 10%">Loan</th>
                <th style="width: 5%">Loan Mode</th>
                <th style="width: 20%">Applicant Name</th>
                <th style="width: 20%">Subscriber</th>
                <th style="width: 5%">Phone No.</th>
                <th style="width: 10%">Email</th>
                <th style="width: 5%">Review.</th>
                <th style="width: 10%">Status</th>
                <!-- <th style="width: 5%">Action</th> -->
              </tr>
            </thead>
            <tbody>
              @foreach($applications as $record)
        <tr>
            <td>{{$record->id}}</td>
          <td>
           {{$record->loan_name ?? ''}} 
              <br>Rs {{$record->requested_amount ?? 0}}</td>
          <td>New</td>
          <td>{{$record->first_name ?? ''}} {{$record->middle_name ?? ''}} {{$record->last_name ?? ''}}<br>
            <small><strong>Applied On</strong> {{$record->created_at->format('d/m/Y')}}</small><br>
            <small><strong>First Document Upload</strong> 13/10/2023</small><br>
            <small><strong>Last Document Upload</strong> 13/10/2023</small>
        </td>
        <td>
          @if(Auth::user()->id==$record->agent_id)
              Your Client
              @else
              {{$record->agent_first." ".$record->agent_last}}
              @endif
        </td>


        <td>{{$record->mobile_number ?? ''}}</td>
        <td>{{$record->email ?? ''}}</td>
        <td>Review Not Submited</td>
        <td>
          @if($record->status=='PDC')
          <span class="badge bg-indigo">PD-C</span>
          @elseif($record->status=='Login')
          <span class="badge bg-warning">{{$record->status}}</span>
          @elseif($record->status=='Process')
          <span class="badge bg-warning">Processing</span>
          @elseif($record->status=='Disbursement')
          <span class="badge bg-success">Disbursement</span>
          @elseif($record->status=='Cancel')
          <span class="badge bg-danger">Cancelled</span>
          @endif
        </td>

    </tr>
    @endforeach

            </tbody>
          </table>
        </div>
      </div></div>
    </div>
  </div>
</section>

@endsection