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

@endpush

@section('content')
    <div class="container">

        <!-- Page-Title -->
        <div class="row">
            <div class="col-sm-12">
                <h4 class="page-title">Dashboard</h4>
                <a href="{{url('/dashboard')}}" type="button" class="btn btn-primary" style="float: right">Dashboard</a>
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                <h3>Welcome</h3>
            </div>
        </div>

    </div> <!-- container -->
@endsection
