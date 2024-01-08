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
                            <h3 class="nk-block-title page-title">All Sub-DSA</h3>
                        </div><!-- .nk-block-head-content -->
                        <div class="nk-block-head-content">
                            <div class="toggle-wrap nk-block-tools-toggle">
                                <a href="#" class="btn btn-icon btn-trigger toggle-expand me-n1" data-target="pageMenu"><em class="icon ni ni-menu-alt-r"></em></a>
                                <div class="toggle-expand-content" data-content="pageMenu">
                                    <ul class="nk-block-tools g-3">
                                       
                                        <li class="nk-block-tools-opt d-none d-sm-block">
                                            <a id="status" class="btn btn-danger" style="display:none;"></a>
                                        </li>
                                       
                                        <li class="nk-block-tools-opt d-none d-sm-block">
                                            <a href="{{url('sub-dsa/add')}}" class="btn btn-primary"><em class="icon ni ni-plus"></em><span>Add Sub DSA</span></a>
                                        </li>
                                        <li class="nk-block-tools-opt d-block d-sm-none">
                                            <a href="{{url('sub-dsa/add')}}" class="btn btn-icon btn-primary"><em class="icon ni ni-plus"></em></a>
                                        </li>
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
                                    <input type="text" id="search" onkeyup="callFunction()" placeholder="Type into Search" class="form-control">
                                </div>
                                <div class="col-lg-3">
                                    <select data-search="on" class="form-control form-select" onchange="callFunction()" id="agent_id" name="agent_id">
                                                <option value="">Select DSA</option>
                                                @foreach($agents as $agent)
                                                <option value="{{$agent->id}}" @if(old('agent_id')==$agent->id) selected  @endif >{{$agent->first_name.' '.$agent->last_name}}</option>
                                                @endforeach
                                            </select>
                                </div>
                                <div class="col-lg-12">
                                    <table class="table" id="myTable">
                                <thead>
                                    <tr>
                                        <th>Id</th>
                                        <th>Profile</th>
                                        <th>Full Name</th>
                                        <th>Email</th>
                                        <th>Contact Number</th>
                                        <th>Whatsapp Number</th>
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

    function callFunction()
    {
        $("#myTable").DataTable().clear().destroy();
        chartdataTable();

    }

    function chartdataTable(){

            agent_id = $("#agent_id").val();
            search = $("#search").val();

            NioApp.DataTable('#myTable', {
            "processing": true,
            "serverSide": true,
            "searching":false,
            "bLengthChange":true,

            ajax:"{{url('sub-dsa')}}?agent_id="+agent_id+"&name="+search,
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
                "mData":"profile",
                "sortable": false
            },
            {            
                "mData":"full_name",
                "sortable": false
            },
            {
                "mData":"email",
                "sortable": false
            },
            {
                "mData":"mobile_number",
                "sortable": false
            },
            {
                "mData":"whatsapp_number",
                "sortable": false
            },
            {
                "mData":"status",
                "sortable": false
            },
            {
                "mData":"action",
                "sortable": false
            }
            ]

        });
        
    }
    
    /* Delete Status*/
    function deleteRecord(id) {
        if ($.trim(id)) {
            Swal.fire({
                title: 'Are you sure?',
                text: "You want to delete this?",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonText: 'Yes, delete it!'
            }).then(function (result) {
                if (result.value) 
                {
                    window.location.href="{{ url('sub-dsa/delete') }}/"+id;
                }
            });
        }
    }

    function changeStatus(id) {
        if ($.trim(id)) {
            Swal.fire({
                title: 'Are you sure ?',
                text: "You want to change this status ?",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonText: 'Yes, change it !'
            }).then(function (result) {
                if (result.value) 
                {
                    window.location.href="{{ url('sub-dsa/status') }}/"+id;
                }
            });
        }
    }

  
</script>
<!-- content @e -->
@endsection
