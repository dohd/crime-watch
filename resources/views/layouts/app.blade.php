<!DOCTYPE html>
<html class="loading semi-dark-layout" lang="en" data-layout="semi-dark-layout" data-textdirection="ltr">
<!-- BEGIN: Head-->
@include('include.head')
<!-- END: Head-->

<!-- BEGIN: Body-->

<body class="vertical-layout vertical-menu-modern  navbar-floating footer-static   menu-collapsed" data-open="click" data-menu="vertical-menu-modern" data-col=""  data-asset-path="{{ asset('upload/')}}">

   

    <!-- BEGIN: Header-->
    @include('include.header')
    <!-- END: Header-->


    <!-- BEGIN: Main Menu-->
    @include('include.menu')
    <!-- END: Main Menu-->

    <!-- BEGIN: Content-->
        <!-- BEGIN: Content-->
        <div class="app-content content ">
    @yield('content')
        </div>
    <!-- END: Content-->
    @include('include.footer')
    @yield('after-scripts')

</body>
<!-- END: Body-->

</html>