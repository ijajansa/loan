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
                            <h3 class="nk-block-title page-title">All Loan Applications</h3>
                        </div><!-- .nk-block-head-content -->
                        <div class="nk-block-head-content">
                            <div class="toggle-wrap nk-block-tools-toggle">
                                <a href="#" class="btn btn-icon btn-trigger toggle-expand me-n1" data-target="pageMenu"><em class="icon ni ni-menu-alt-r"></em></a>
                                <div class="toggle-expand-content" data-content="pageMenu">
                                    <ul class="nk-block-tools g-3">
                                       
                                        <li class="nk-block-tools-opt d-none d-sm-block">
                                            <a id="status" class="btn btn-danger" style="display:none;"></a>
                                        </li>
                                       
                                       <!--  <li class="nk-block-tools-opt d-none d-sm-block">
                                            <a href="{{url('dsa/add')}}" class="btn btn-primary"><em class="icon ni ni-plus"></em><span>Add DSA</span></a>
                                        </li>
                                        <li class="nk-block-tools-opt d-block d-sm-none">
                                            <a href="{{url('dsa/add')}}" class="btn btn-icon btn-primary"><em class="icon ni ni-plus"></em></a>
                                        </li> -->
                                    </ul>
                                </div>
                            </div><!-- .toggle-wrap -->
                        </div><!-- .nk-block-head-content -->
                    </div><!-- .nk-block-between -->
                </div><!-- .nk-block-head -->
                <div class="nk-block nk-block-lg">
                    <div class="card card-bordered card-preview">
                        <div class="card-inner">
                            <div class="row">
                                <div class="col-lg-3">
                                    <label class="form-label">Search Here</label>
                                   <input type="text" id="search" class="form-control from-control-md" placeholder="Type into Search" onkeyup="callFilter()" name=""> 
                                </div>
                                <div class="col-lg-3">
                                    <label class="form-label">Select Loan Type</label>
                                   <select id="type" class="form-control from-control-md form-select" onchange="callFilter()">
                                       <option value="">Select Type</option>
                                       @foreach($types as $type)
                                           <option value="{{$type->id}}">{{$type->name}}</option>
                                       @endforeach
                                       
                                   </select>
                                </div>
                                <div class="col-lg-12">
                                    <table class="table" id="myTable">
                                <thead>
                                    <tr>
                                        <th>Id</th>
                                        <th>Full Name</th>
                                        <th>Date of birth</th>
                                        <th>Email</th>
                                        <th>Contact Number</th>
                                        <th>Requested Amount</th>
                                        <!-- <th>Agent Name</th> -->
                                        <th>Created At</th>
                                        <th>Status</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                            </table>
                                </div>
                            </div>
                            
                        </div>
                    </div><!-- .card-preview -->
                </div> <!-- nk-block -->
            </div>
        </div>
    </div>
</div>

<script type="text/javascript">
    $(document).ready(function(){
        chartdataTable();
    });

    function callFilter()
    {
        $("#myTable").DataTable().clear().destroy();
        chartdataTable();
    }

    function chartdataTable(){

        search = $("#search").val();
        type = $("#type").val();

            NioApp.DataTable('#myTable', {
            "processing": true,
            "serverSide": true,
            "searching":false,
            "bLengthChange":false,

            ajax:"{{url('loan-applications')}}?name="+search+"&type="+type,
            "order":[
            [0,"desc"]
            ],
            responsive: !0,
            autoFill: !0,
            keys: !0,
            lengthMenu: [
            [10, 100, 500, -1],
            [10, 100, 500, "All"]
            ],
            
            "columns":[
            {
                "mData":"id",
                render: function (data, type, row, meta) {
                    return meta.row + meta.settings._iDisplayStart + 1;
                }
            },
            {
                "mData":"full_name"
            },
            {            
                "mData":"dob"
            },
            {
                "mData":"email"
            },
            {
                "mData":"mobile_number"
            },
            {
                "mData":"requested_amount"
            },
            // {
            //     "mData":"agent_name"
            // },
            {
                "mData":"created_at"
            },
            {
                "mData":"status"
            },
            {
                "mData":"action"
            }
            ]

        });
        
    }
    
</script>
<!-- content @e -->
@endsection
