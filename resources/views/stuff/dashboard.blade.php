@extends('layouts.app')

@push('title', 'dashboard')

@push('page-styles')
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/plugins/morris/morris.css') }}" />
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/plugins/switchery/switchery.min.css') }}" />
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/bootstrap.min.css') }}" />

    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/style.css') }}" />
    <!-- Modernizr js -->
    <script src="{{ asset('assets/js/modernizr.min.js') }}"></script>
@endpush

@push('page-script')
    <script src="{{ asset('assets/js/jquery.min.js') }}"></script>
    <script src="{{ asset('assets/js/popper.min.js') }}"></script><!-- Tether for Bootstrap -->
    <script src="{{ asset('assets/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('assets/js/waves.js') }}"></script>
    <script src="{{ asset('assets/js/jquery.nicescroll.js') }}"></script>
    <script src="{{ asset('assets/plugins/switchery/switchery.min.js') }}"></script>

    <!--Morris Chart-->
    <script src="{{ asset('assets/plugins/morris/morris.min.js') }}"></script>
    <script src="{{ asset('assets/plugins/raphael/raphael-min.js') }}"></script>

    <!-- Counter Up  -->
    <script src="{{ asset('assets/plugins/waypoints/lib/jquery.waypoints.min.js') }}"></script>
    <script src="{{ asset('assets/plugins/counterup/jquery.counterup.min.js') }}"></script>

    <!-- App js -->
    <script src="{{ asset('assets/js/jquery.core.js') }}"></script>
    <script src="{{ asset('assets/js/jquery.app.js') }}"></script>

    <!-- Page specific js -->
    <script src="{{ asset('assets/pages/jquery.dashboard.js') }}"></script>
    <script>
        $(document).on("click", ".show-detail", function(){
            $id = $(this).data('id');
            location.href = $("meta[name='baseUrl']").attr('content')+'/dashboard/show/'+$id;
        })
    </script>

@endpush

@section('content')
    <div class="container">

        <!-- Page-Title -->
        <div class="row">
            <div class="col-sm-12">
                <h4 class="page-title">Dashboard</h4>
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                <div class="card-box table-responsive">
                    <div class="header">
                        <h3>Policies</h3>
                    </div>

                    <table class="table table-striped table-hover">
                        <thead>
                            <tr>
                                <th>Policy</th>
                                <th>Plan Reference</th>
                                <th>Member Name</th>
                                <th>Investment House</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($user->policies as $policy)
                                <tr style="cursor: pointer" class="show-detail" data-id="{{$policy->id}}">
                                    <td>{{ $policy->code }}</td>
                                    <td>{{ $policy->plan_reference }}</td>
                                    <td>{{ $policy->first_name }}</td>
                                    <td>{{ $policy->investment_house }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

    </div> <!-- container -->
@endsection
