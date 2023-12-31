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
                            <h3 class="nk-block-title page-title">All Wallet Requests</h3>
                        </div><!-- .nk-block-head-content -->
                        <div class="nk-block-head-content">
                            <div class="toggle-wrap nk-block-tools-toggle">
                                <a href="#" class="btn btn-icon btn-trigger toggle-expand me-n1" data-target="pageMenu"><em class="icon ni ni-menu-alt-r"></em></a>
                                <div class="toggle-expand-content" data-content="pageMenu">
                                    <ul class="nk-block-tools g-3">

                                        <li class="nk-block-tools-opt d-none d-sm-block">
                                            <a id="status" class="btn btn-danger" style="display:none;"></a>
                                        </li>
                                       <!-- 
                                        <li class="nk-block-tools-opt d-none d-sm-block">
                                            <a href="{{url('sub-dsa/add')}}" class="btn btn-primary"><em class="icon ni ni-plus"></em><span>Add Sub DSA</span></a>
                                        </li>
                                        <li class="nk-block-tools-opt d-block d-sm-none">
                                            <a href="{{url('sub-dsa/add')}}" class="btn btn-icon btn-primary"><em class="icon ni ni-plus"></em></a>
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
                                    <input type="text" placeholder="Type into Search" class="form-control" onkeyup="callFunction()" id="search_id">
                                </div>
                                <div class="col-lg-3">
                                    <select data-search="on" class="form-control form-select" onchange="callFunction()" id="agent_id" name="agent_id">
                                        <option value="">Select DSA</option>
                                        @foreach($agents as $agent)
                                        <option value="{{$agent->id}}">{{$agent->first_name.' '.$agent->last_name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="col-lg-3">
                                    <select data-search="on" class="form-control form-select" onchange="callFunction()" id="status_id" name="status_id">
                                        <option value="">Select Status</option>
                                        <option value="pending">Pending</option>
                                        <option value="success">Approve</option>
                                        <option value="reject">Reject</option>
                                    </select>
                                </div>
                                <div class="col-lg-12">
                                    <table class="table" id="myTable">
                                        <thead>
                                            <tr>
                                                <th>Id</th>
                                                <th>DSA Name</th>
                                                <th>Requested Amount</th>
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
        status_id = $("#status_id").val();
        search_id = $("#search_id").val();

        NioApp.DataTable('#myTable', {
            "processing": true,
            "serverSide": true,
            "searching":false,
            "bLengthChange":false,

            ajax:"{{url('wallet-requests')}}?agent_id="+agent_id+"&status_id="+status_id+"&search_id="+search_id,
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
                "mData":"amount"
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
                    window.location.href="{{ url('daily-charts/delete') }}/"+id;
                }
            });
        }
    }

    /* Change Status*/
    function changeStatus(id, is_active) {

        if ($.trim(id)) {
            var message = "You want to active.";

            if (is_active == 0) {
                message = "You want to inactive.";
            }

            Swal.fire({
                title: 'Are you sure?',
                text: message,
                icon: 'warning',
                showCancelButton: true,
                confirmButtonText: 'Yes, change it!'
            }).then(function (result) {

                if (result.value) {
                    $.ajax({
                        headers: {
                            'X-CSRF-TOKEN': "{{csrf_token()}}"
                        },

                        url: "{{ url('daily-charts/change-status') }}",
                        type: "POST",
                        data: { 'id': id, 'is_active': is_active },
                        dataType: "JSON",
                        success: function (response) {
                            // For success
                            if (response.status == 'success') {
                                Swal.fire("Done", response.message, "success");
                                $("#myTable").DataTable().ajax.reload();
                                return true;
                            }

                            // If fails
                            if (response.status == 'error') {
                                Swal.fire("Error!", response.message, "error");
                                return true;
                            }
                        },
                        error: function (xhr, ajaxOptions, thrownError) {
                            Swal.fire("Error!", "Something went wrong", "error");
                        }
                    });
                }
            });
        }
    }

    /* soft Delete*/
    function softDelete(id, is_active) {
        var message = "You want to unarchive this?";

        if (is_active == 2) {
            message = "You want to archive this?";
        }
        if ($.trim(id)) {
            Swal.fire({
                title: 'Are you sure?',
                text: message,
                icon: 'warning',
                showCancelButton: true,
                confirmButtonText: 'Yes'
            }).then(function (result) {

                if (result.value) {
                    $.ajax({
                        headers: {
                            'X-CSRF-TOKEN': "{{csrf_token()}}"
                        },

                        url: "{{ url('daily-charts/change-status') }}",
                        type: "POST",
                        data: { 'id': id, 'is_active': is_active },
                        dataType: "JSON",
                        success: function (response) {
                            // For success
                            if (response.status == 'success') {
                                Swal.fire({
                                    title: 'Done',
                                    text: 'success',
                                    icon: 'success',
                                    showCancelButton: false,
                                    showConfirmButton: false,
                                    ConfirmButtonText: false
                                });
                                // Swal.fire("Done", response, "success");
                                window.location.reload();
                                return true;
                            }

                            // If fails
                            if (response.status == 'error') {
                                Swal.fire("Error!", response, "error");
                                return true;
                            }
                        },
                        error: function (xhr, ajaxOptions, thrownError) {
                            Swal.fire("Error!", "Something went wrong", "error");
                        }
                    });
                }
                
            });
        }
    }
</script>
<!-- content @e -->
@endsection
