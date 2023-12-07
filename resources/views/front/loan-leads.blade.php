@extends('layouts.app')
<style type="text/css">
  .pagination li {
    padding: 5px !important;
  }
</style>
@section('content')
<section class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h1>Loan Leads</h1>
      </div>
      <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
          <li class="breadcrumb-item"><a href="{{url('home')}}">Home</a></li>
          <li class="breadcrumb-item active">Loan Leads</li>
        </ol>
      </div>
    </div>
  </div>
</section>
<section class="content">
  <div class="card">
    <div class="card-header">
      <h3 class="card-title">Loan Leads</h3>
    </div>
    <div class="card-body p-0">
      <table class="table table-striped table-sm">
        <thead>
          <tr>
            <th style="width: 5%">#File No.</th>
            <th style="width: 10%">Loan</th>
            <!-- <th style="width: 5%">Loan Mode</th> -->
            <th style="width: 20%">Applicant Name</th>
            <th style="width: 20%">Subscriber</th>
            <th style="width: 5%">Phone No.</th>
            <th style="width: 10%">Email</th>
            <th style="width: 5%">Review.</th>
            <th style="width: 10%">Status</th>
            <th style="width: 5%">Action</th>
          </tr>
        </thead>
        <tbody>
          <form method="GET" action="{{url('home')}}?data_show=list">
            <input type="hidden" name="data_show" value="list">
            <tr>
              <td>
                <input type="text" name="lead_id" value="{{request()->query('lead_id')}}" class="form-control">
              </td>
              <td>
                <select class="form-control" name="type">
                  <option value="">All</option>
                  @foreach($types as $type)
                  <option value="{{$type->id}}" @if(request()->query('lead_id')==$type->id) selected @endif>{{$type->name ?? ''}}</option>
                  @endforeach
                </select>
              </td>
             <!--  <td>
                <select class="form-control" name="loan_mode">
                  <option value="">All</option>
                  <option value="New" >New</option>
                  <option value="Top-up" >Top-up</option>
                  <option value="BT" >BT</option>
                  <option value="Card To Card" >Card To Card</option>

                </select>
              </td> -->
              <td>
                <input type="text" class="form-control" name="applicant_name" value="{{request()->query('applicant_name')}}" placeholder="Applicant Name">
              </td>
              <td>
                &nbsp;
              </td>
              <td>
                <input type="text" class="form-control" name="mobile_number" value="{{request()->query('mobile_number')}}" placeholder="Phone Number">
              </td>
              <td>
                <input type="text" class="form-control" name="email" value="{{request()->query('email')}}" placeholder="Email">
              </td>
              <td>&nbsp;</td>
              <td>
                <select class="form-control" name="status">
                  <option value="">All</option>
                  <option value="PDC" @if(request()->query('status')=="PDC") selected @endif>PD-C</option>
                  <option value="Login" @if(request()->query('status')=="Login") selected @endif>Login</option>
                  <option value="Process" @if(request()->query('status')=="Process") selected @endif>Process</option>
                  <option value="Cancel" @if(request()->query('status')=="Cancel") selected @endif>Cancelled</option>
                  <option value="Disbursement" @if(request()->query('status')=="Disbursement") selected @endif>Disbursed</option>
                </select>
              </td>
              <td class="project-actions text-left">
                <button type="submit" class="btn btn-primary btn-sm">
                  <i class="fas fa-filter"></i> Filter
                </button>
              </td>
            </tr>
          </form>
          @foreach($data as $ans)
          <tr>
            <td>{{$ans->id}}</td>
            <td>{{$ans->loan_name}}<br>Rs {{$ans->requested_amount}}</td>
            <!-- <td>{{$ans->loan_mode}}</td> -->
            <td>{{$ans->first_name}} {{$ans->middle_name}} {{$ans->last_name}}<br/>
              <small><strong>Applied On</strong> {{$ans->created_at->format('d-m-Y')}}</small><br/>
              <small></small><br/>
              <small></small>
            </td>
            <td>
              @if(Auth::user()->id==$ans->agent_id)
              {{Auth::user()->first_name." ".Auth::user()->last_name}}
              @else
              {{$ans->agent_first." ".$ans->agent_last}}
              @endif
            </td>


            <td>{{$ans->mobile_number}}</td>
            <td>{{$ans->email}}</td>
            <td>{{$ans->review ?? '-'}}</td>
            <td>
              @if($ans->status=='PDC')
              <span class="badge bg-indigo">PD-C</span>
              @elseif($ans->status=='Login')
              <span class="badge bg-warning">{{$ans->status}}</span>
              @elseif($ans->status=='Process')
              <span class="badge bg-warning">Processing</span>
              @elseif($ans->status=='Disbursement')
              <span class="badge bg-success">Disbursement</span>
              @elseif($ans->status=='Cancel')
              <span class="badge bg-danger">Cancelled</span>
              @endif
            </td>
            <td>
              <a class="btn btn-primary btn-sm" href="{{url('view-loan')}}/{{$ans->id}}">
                <i class="far fa-eye"></i> View
              </a>
              <p></p>
            </td>
          </tr>
          @endforeach
          

          <tr>

            <td colspan="9">
              <ul class="pagination pagination-sm m-0 float-right">
                {{$data->appends(request()->input())->render("pagination::default")}}
              </ul>
            </td>
          </tr>
        </tbody>
      </table>
    </div>
  </div>
</section>
@endsection