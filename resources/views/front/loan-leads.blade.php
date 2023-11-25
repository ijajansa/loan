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
            <th style="width: 5%">Loan Mode</th>
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
          <form method="GET" action="/index.php?path=loan&method=list">
            <input type="hidden" name="path" value="loan">
            <input type="hidden" name="method" value="list">
            <tr>
              <td>
                <input type="text" name="lead_id" value="" class="form-control">
              </td>
              <td>
                <select class="form-control" name="type">
                  <option value="">All</option>
                  @foreach($types as $type)
                  <option value="{{$type->id}}">{{$type->name ?? ''}}</option>
                  @endforeach
                </select>
              </td>
              <td>
                <select class="form-control" name="loan_mode">
                  <option value="">All</option>
                  <option value="New" >New</option>
                  <option value="Top-up" >Top-up</option>
                  <option value="BT" >BT</option>
                  <option value="Card To Card" >Card To Card</option>

                </select>
              </td>
              <td>
                <input type="text" class="form-control" name="applicant_name" value="" placeholder="Applicant Name">
              </td>
              <td>
                &nbsp;
              </td>
              <td>
                <input type="text" class="form-control" name="mobile_number" value="" placeholder="Mobile Number">
              </td>
              <td>
                <input type="text" class="form-control" name="email" value="" placeholder="Email">
              </td>
              <td>&nbsp;</td>
              <td>
                <select class="form-control" name="status">
                  <option>All</option>
                  <option value="18">DU-NL</option>
                  <option value="19">DU-L</option>
                  <option value="20">DU-L(P)</option>
                  <option value="21">DU-NL(P)</option>
                  <option value="4">PD</option>
                  <option value="17">PD-C</option>
                  <option value="5">Rejected</option>
                  <option value="6">Canceled</option>
                  <option value="7">Soft Approval</option>
                  <option value="8">Disbursed</option>
                  <option value="9">Commission Due</option>
                  <option value="10">Commission Paid</option>
                  <option value="12">Shifted To Yojana</option>
                  <option value="22">DSA List Sent</option>
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
            <td>{{$ans->loan_mode}}</td>
            <td>{{$ans->first_name}} {{$ans->middle_name}} {{$ans->last_name}}<br/>
              <small><strong>Applied On</strong> {{$ans->created_at->format('d-m-Y')}}</small><br/>
              <small></small><br/>
              <small></small>
            </td>
            <td>
              @if(Auth::user()->id==$ans->agent_id)
              Your Client
              @else
              {{$ans->agent_first." ".$ans->agent_last}}
              @endif
            </td>


            <td>{{$ans->mobile_number}}</td>
            <td>{{$ans->email}}</td>
            <td>Review Not Submited</td>
            <td><span class="badge bg-primary">DU-NL</span></td>
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