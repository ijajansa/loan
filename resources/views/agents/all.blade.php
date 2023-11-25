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
                            <h3 class="nk-block-title page-title">All DSA</h3>
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
                                            <a href="{{url('dsa/add')}}" class="btn btn-primary"><em class="icon ni ni-plus"></em><span>Add DSA</span></a>
                                        </li>
                                        <li class="nk-block-tools-opt d-block d-sm-none">
                                            <a href="{{url('dsa/add')}}" class="btn btn-icon btn-primary"><em class="icon ni ni-plus"></em></a>
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
    function chartdataTable(){
            NioApp.DataTable('#myTable', {
            "processing": true,
            "serverSide": true,
            "searching":true,
            "bLengthChange":true,

            ajax:"{{url('dsa')}}",
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
                "mData":"profile"
            },
            {            
                "mData":"full_name"
            },
            {
                "mData":"email"
            },
            {
                "mData":"mobile_number"
            },
            {
                "mData":"whatsapp_number"
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
