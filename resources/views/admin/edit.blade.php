@extends('layouts.app')

@push('title', 'edit')

@push('page-styles')
    <link rel="shortcut icon" href="{{ asset('assets/images/favicon.ico') }}">

    <link href="{{ asset('assets/plugins/datatables/dataTables.bootstrap4.min.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('assets/plugins/datatables/buttons.bootstrap4.min.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('assets/plugins/datatables/responsive.bootstrap4.min.css') }}" rel="stylesheet" type="text/css" />

    <link href="{{ asset('assets/plugins/switchery/switchery.min.css') }}" rel="stylesheet" />
    <link href="{{ asset('assets/css/bootstrap.min.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('assets/css/style.css') }}" rel="stylesheet" type="text/css" />

    <script src="{{ asset('assets/js/modernizr.min.js') }}"></script>
@endpush

@push('page-script')
    <!-- jQuery  -->
    <script src="{{ asset('assets/js/jquery.min.js') }}"></script>
    <script src="{{ asset('assets/js/popper.min.js') }}"></script><!-- Tether for Bootstrap -->
    <script src="{{ asset('assets/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('assets/js/waves.js') }}"></script>
    <script src="{{ asset('assets/js/jquery.nicescroll.js') }}"></script>
    <script src="{{ asset('assets/plugins/switchery/switchery.min.js') }}"></script>

    <!-- Required datatable js -->
    <script src="{{ asset('assets/plugins/datatables/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('assets/plugins/datatables/dataTables.bootstrap4.min.js') }}"></script>
    <!-- Buttons examples -->
    <script src="{{ asset('assets/plugins/datatables/dataTables.buttons.min.js') }}"></script>
    <script src="{{ asset('assets/plugins/datatables/buttons.bootstrap4.min.js') }}"></script>
    <script src="{{ asset('assets/plugins/datatables/jszip.min.js') }}"></script>
    <script src="{{ asset('assets/plugins/datatables/pdfmake.min.js') }}"></script>
    <script src="{{ asset('assets/plugins/datatables/vfs_fonts.js') }}"></script>
    <script src="{{ asset('assets/plugins/datatables/buttons.html5.min.js') }}"></script>
    <script src="{{ asset('assets/plugins/datatables/buttons.print.min.js') }}"></script>
    <script src="{{ asset('assets/plugins/datatables/buttons.colVis.min.js') }}"></script>
    <!-- Responsive examples -->
    <script src="{{ asset('assets/plugins/datatables/dataTables.responsive.min.js') }}"></script>
    <script src="{{ asset('assets/plugins/datatables/responsive.bootstrap4.min.js') }}"></script>

    <!-- App js -->
    <script src="{{ asset('assets/js/jquery.core.js') }}"></script>
    <script src="{{ asset('assets/js/jquery.app.js') }}"></script>

    <script type="text/javascript">
        $(document).ready(function() {
            $('#datatable').DataTable();
            //Buttons examples
            var table = $('#datatable-buttons').DataTable({
                lengthChange: false
                //buttons: ['copy', 'excel', 'pdf']
            });

            table.buttons().container().appendTo('#datatable-buttons_wrapper .col-md-6:eq(0)');
            $(document).on("click", ".add-policy-modal", function() {
                $id = $(this).data('id');
                getAvailablePolicies($id);
            })

            function getAvailablePolicies($id) {
                $.ajax({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
                    },
                    url: $("meta[name='baseUrl']").attr('content') + '/admin/edit/get_policies/' + $id,
                    method: 'get',
                    data: {
                        '_token': $('meta[name="_token"]').attr('content')
                    },
                    success: function(
                        response) {
                        var html = "";
                        for (var i = 0; i < response.length; i++) {
                            html += "<tr>";
                            html += "<td>" + response[i].code + "</td>";
                            html += "<td>" + response[i].plan_reference + "</td>";
                            html += "<td>" + response[i].first_name + "</td>";
                            html += "<td>" + response[i].investment_house + "</td>";
                            html += "<td><a title='Add Client' class='text-site1' data-user_id = '" +
                                $id + "' data-policy_id = '" + response[i].id +
                                "' ><i class ='fa fa-plus' > </i></a > </td>";
                        }
                        $("#datatable tbody").html(html);
                        $("#datatable").DataTable();
                        $("#addProducts").modal('show');
                    },
                })
            };

            $(document).on("click", ".text-site1", function() {
                var dom = $(this);
                var user_id = $(this).data('user_id');
                var policy_id = $(this).data('policy_id');
                $.ajax({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
                    },
                    url: $("meta[name='baseUrl']").attr('content') + '/admin/edit/add_policy/' +
                        user_id,
                    method: 'PUT',
                    data: {
                        policy_id,
                        user_id,
                        '_token': $('meta[name="_token"]').attr('content')
                    },
                    success: function(
                        response) { // Callback function to handle the successful response
                        alert('success');
                        var append_html = "<tr>" +
                            "<td>" + response['policy'].code + "</td>" +
                            "<td>" + response['policy'].plan_reference + "</td>" +
                            "<td>" + response['policy'].first_name + "</td>" +
                            "<td>" + response['policy'].investment_house + "</td>" +
                            "<td>" + (response['policy'].last_operation !== null ? response[
                                'policy'].last_operation : "") + "</td>" +
                            "<td><a title='Remove' class='text-danger remove-user-policy' data-user_id='" +
                            response['user'] + "' data-policy_id='" + response['policy'].id +
                            "'>Remove</a></td>";
                        $('.user-policies-table tbody').append(append_html);
                        dom.parents('tr').remove();
                        getAvailablePolicies(user_id)
                    },
                })
            });
            $(document).on("click", ".remove-user-policy", function() {
                var user_id = $(this).data('user_id');
                var policy_id = $(this).data('policy_id');
                var dom = $(this);
                $.ajax({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
                    },
                    url: $("meta[name='baseUrl']").attr('content') + '/admin/edit/remove_policy/' +
                        user_id,
                    method: 'DELETE',
                    data: {
                        policy_id,
                        user_id,
                        '_token': $('meta[name="_token"]').attr('content')
                    },
                    success: function(
                        response) { // Callback function to handle the successful response
                        if (response === "ok") {
                            alert('Remove Success');
                            dom.parents('tr').remove();
                        }
                    },
                })
            });
        });
    </script>

@endpush

@section('content')
    <div class="container">

        <!-- Page-Title -->
        <div class="row">
            <div class="col-sm-12" style="padding-bottom: 20px;">

            </div>
        </div>
        <!-- end row -->


        <div class="row">
            <div class="col-12">
                <div class="card-box table-responsive">
                    <div class="header">
                        <h3>Edit Staff</h3>
                    </div>

                    <form class="col-12 padded padded-bottom padded-la">
                        <div class="row">
                            <div class="col-xs-12 col-sm-6 col-md-6 col-lg-3">
                                <label>Name</label>
                                <input type="text" name="firstname" class="form-control" value="{{ $user->username }}"
                                    required />
                            </div>
                            <div class="col-xs-12 col-sm-6 col-md-6 col-lg-3">
                                <label>Email</label>
                                <input type="email" name="email" class="form-control" value="{{ $user->email }}"
                                    disabled />
                            </div>
                            <div class="col-xs-12 col-sm-6 col-md-6 col-lg-3">
                                <label>Status</label><br />
                                <span
                                    class="{{ $user->status === 'active' ? 'label label-success' : 'label label-info' }}">
                                    {{ $user->status === 'active' ? 'Active' : 'Invitation Sent' }}
                                </span>
                            </div>
                        </div>
                    </form>

                    <div class="col-12 header">
                        <h3>Policies <button class="btn btn-primary add-policy-modal waves-effect waves-light pull-right"
                                data-id="{{ $user->id }}"><i class="fa fa-plus"></i> Add Policy</button></h3>
                    </div>

                    <div class="col-12">
                        <div class="table-responsive user-policies-table">
                            <table class="table table-striped table-hover">
                                <thead>
                                    <tr>
                                        <th>Policy</th>
                                        <th>Plan Reference</th>
                                        <th>Member Name</th>
                                        <th>Investment House</th>
                                        <th>Last Operation</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($user->policies as $policy)
                                        <tr style="cursor: pointer" class="show-detail">
                                            <td>{{ $policy->code }}</td>
                                            <td>{{ $policy->plan_reference }}</td>
                                            <td>{{ $policy->first_name }}</td>
                                            <td>{{ $policy->investment_house }}</td>
                                            <td>{{ $policy->last_operation }}</td>
                                            <td>
                                                <a title="Remove" class="text-danger remove-user-policy"
                                                    data-user_id="{{ $user->id }}"
                                                    data-policy_id="{{ $policy->id }}">Remove
                                                </a>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>

                        <div class="row padded">
                            <div class="col-6">
                                <button type="submit" name="submit" class="btn btn-success"><i class="fa fa-floppy-o"></i>
                                    Save</button>

                            </div>
                            <div class="col-6 text-right padded padded-top">
                                <a title="Remove User" class="text-danger"
                                    onclick="event.preventDefault();
                                                     document.getElementById('remove-user-form').submit();">
                                    Remove Staff
                                </a>

                                <form id="remove-user-form" action="{{ url('admin/edit/remove_user/' . $user->id) }}"
                                    method="POST" class="d-none">
                                    @csrf
                                    @method('DELETE')
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Modal -->
            <div class="modal fade" id="addProducts" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
                aria-hidden="true">
                <div class="modal-dialog modal-lg" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Available Policies</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <form>
                                <div class="row">
                                    <div class="col-xs-12 col-lg-12 table-policies">
                                        <table id="datatable" class="table table-striped table-bordered">
                                            <thead>
                                                <tr>
                                                    <th>Policy</th>
                                                    <th>Plan Reference</th>
                                                    <th>Member Name</th>
                                                    <th>Investment House</th>
                                                    <th></th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach ($policies as $item)
                                                    <tr>
                                                        <td>{{ $item->code }}</td>
                                                        <td>{{ $item->plan_reference }}</td>
                                                        <td>{{ $item->first_name }}</td>
                                                        <td>{{ $item->inverstment_house }}</td>
                                                        <td><a title="Add Client" class="text-site1"
                                                                data-user_id="{{ $user->id }}"
                                                                data-policy_id="{{ $item->id }}"><i
                                                                    class="fa fa-plus"></i></a></td>
                                                    </tr>
                                                @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                    <div class="col-12 padded padded-top">
                                        <button type="submit" name="submit" class="btn btn-primary pull-right"><i
                                                class="fa fa-check"></i> Done</button>
                                    </div>
                                </div>
                            </form>

                        </div>
                    </div>
                </div>
            </div>

        </div>
        <!-- end row -->


    </div> <!-- container -->
@endsection
