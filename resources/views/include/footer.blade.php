<div class="sidenav-overlay"></div>
<div class="drag-target"></div>

<!-- BEGIN: Footer-->
<footer class="footer footer-static footer-light">
    <p class="clearfix mb-0"><span class="float-md-start d-block d-md-inline-block mt-25">COPYRIGHT &copy; {{ date('Y') }}<a class="ms-25" href="http//:technogurudigitalsystems.com" target="_blank">Technoguru Ltd</a><span class="d-none d-sm-inline-block">, All rights Reserved</span></span><span class="float-md-end d-none d-md-block">Hand-crafted & Made with<i data-feather="heart"></i></span></p>
</footer>
<button class="btn btn-primary btn-icon scroll-top" type="button"><i data-feather="arrow-up"></i></button>
<!-- END: Footer-->


<!-- BEGIN: Vendor JS-->
<script src="{{asset('app-assets/vendors/js/vendors.min.js') }}"></script>
<!-- BEGIN Vendor JS-->

<!-- BEGIN: Page Vendor JS-->
<script src="{{asset('app-assets/vendors/js/charts/apexcharts.min.js') }}"></script>
<script src="{{asset('app-assets/vendors/js/extensions/toastr.min.js') }}"></script>
@yield('vendor-script')
<!-- END: Page Vendor JS-->

<!-- BEGIN: Theme JS-->
<script src="{{asset('app-assets/js/core/app-menu.js') }}"></script>
<script src="{{asset('app-assets/js/core/app.js') }}"></script>
<!-- END: Theme JS-->
<script src="{{asset('app-assets/js/scripts/accounting.min.js') }}"></script>



<script>
    $(window).on('load', function() {
        if (feather) {
            feather.replace({
                width: 14,
                height: 14
            });
        }
    })
</script>