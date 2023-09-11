@extends('layouts.app')
@section('title', 'CrimeWatch System Dashboard')


@section('content')
<!-- BEGIN: Content-->
    <div class="content-overlay"></div>
    <div class="header-navbar-shadow"></div>
    <div class="content-wrapper container-xxl p-0">
        <div class="content-header row">
        </div>
        <div class="content-body">
            <!-- users list start -->
            <section id="dashboard-analytics">
              <div class="row match-height">
                  <!-- Greetings Card starts -->
                  <div class="col-lg-6 col-md-12 col-sm-12">
                      <div class="card card-congratulations">
                          <div class="card-body text-center">
                              <img src="../../../app-assets/images/elements/decore-left.png" class="congratulations-img-left" alt="card-img-left" />
                              <img src="../../../app-assets/images/elements/decore-right.png" class="congratulations-img-right" alt="card-img-right" />
                              <div class="avatar avatar-xl bg-primary shadow">
                                  <div class="avatar-content">
                                      <i data-feather="award" class="font-large-1"></i>
                                  </div>
                              </div>
                              <div class="text-center">
                                  <h1 class="mb-1 text-white">Welcome {{ Auth::user()->name }},</h1>
                                  <p class="card-text m-auto w-75">
                                      You have done <strong>0</strong> incidences today.
                                  </p>
                              </div>
                          </div>
                      </div>
                  </div>
                  <!-- Greetings Card ends -->

                  <!-- Subscribers Chart Card starts -->
                  <div class="col-lg-3 col-sm-6 col-12">
                      <div class="card">
                          <div class="card-header flex-column align-items-start pb-0">
                              <div class="avatar bg-light-primary p-50 m-0">
                                  <div class="avatar-content">
                                      <i data-feather="users" class="font-medium-5"></i>
                                  </div>
                              </div>
                              <h2 class="fw-bolder mt-1">1</h2>
                              <p class="card-text">DCIR</p>
                          </div>
                          <div id="gained-chart"></div>
                      </div>
                  </div>
                  <!-- Subscribers Chart Card ends -->

                  <!-- Orders Chart Card starts -->
                  <div class="col-lg-3 col-sm-6 col-12">
                      <div class="card">
                          <div class="card-header flex-column align-items-start pb-0">
                              <div class="avatar bg-light-warning p-50 m-0">
                                  <div class="avatar-content">
                                      <i data-feather="package" class="font-medium-5"></i>
                                  </div>
                              </div>
                              <h2 class="fw-bolder mt-1">0</h2>
                              <p class="card-text">DOR</p>
                          </div>
                          <div id="order-chart"></div>
                      </div>
                  </div>
                  <!-- Orders Chart Card ends -->
              </div>

        

           

    
              <!--/ List DataTable -->
          </section>
            <!-- users list ends -->

        </div>
    </div>
<!-- END: Content-->
@endsection
@section('vendor-styles')
<link rel="stylesheet" type="text/css" href="{{asset('app-assets/vendors/css/forms/select/select2.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{asset('app-assets/vendors/css/tables/datatable/dataTables.bootstrap5.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{asset('app-assets/vendors/css/tables/datatable/responsive.bootstrap5.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{asset('app-assets/vendors/css/tables/datatable/buttons.bootstrap5.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{asset('app-assets/vendors/css/tables/datatable/rowGroup.bootstrap5.min.css') }}">
    <style>
      .hide{
        display: none;
      }
      </style>
@endsection
@section('after-styles')
<link rel="stylesheet" type="text/css" href="{{asset('app-assets/css/plugins/forms/form-validation.css') }}">
@endsection
@section('after-scripts')
   <!-- BEGIN: Page Vendor JS-->
   <script src="{{asset('app-assets/vendors/js/forms/select/select2.full.min.js') }}"></script>
   <script src="{{asset('app-assets/vendors/js/tables/datatable/jquery.dataTables.min.js') }}"></script>
   <script src="{{asset('app-assets/vendors/js/tables/datatable/dataTables.bootstrap5.min.js') }}"></script>
   <script src="{{asset('app-assets/vendors/js/tables/datatable/dataTables.responsive.min.js') }}"></script>
   <script src="{{asset('app-assets/vendors/js/tables/datatable/responsive.bootstrap5.js') }}"></script>
   <script src="{{asset('app-assets/vendors/js/tables/datatable/datatables.buttons.min.js') }}"></script>
   <script src="{{asset('app-assets/vendors/js/tables/datatable/jszip.min.js') }}"></script>
   <script src="{{asset('app-assets/vendors/js/tables/datatable/pdfmake.min.js') }}"></script>
   <script src="{{asset('app-assets/vendors/js/tables/datatable/vfs_fonts.js') }}"></script>
   <script src="{{asset('app-assets/vendors/js/tables/datatable/buttons.html5.min.js') }}"></script>
   <script src="{{asset('app-assets/vendors/js/tables/datatable/buttons.print.min.js') }}"></script>
   <script src="{{asset('app-assets/vendors/js/tables/datatable/dataTables.rowGroup.min.js') }}"></script>
   <script src="{{asset('app-assets/vendors/js/forms/validation/jquery.validate.min.js') }}"></script>
   <script src="{{asset('app-assets/vendors/js/forms/cleave/cleave.min.js') }}"></script>
   <script src="{{asset('app-assets/vendors/js/forms/cleave/addons/cleave-phone.us.js') }}"></script>
   <script src="{{asset('app-assets/vendors/js/extensions/sweetalert2.all.min.js') }}"></script>
   <!-- END: Page Vendor JS-->
<!-- BEGIN: Page JS-->



<!-- END: Page JS-->

<script>
$(function () {
  ('use strict');

  var dtUserTable = $('.user-list-table'),
    newUserSidebar = $('.new-user-modal'),
    newUserForm = $('.add-new-user'),
    select = $('.select2'),
    dtContact = $('.dt-contact'),
    statusObj = {
      1: { title: 'Pending', class: 'badge-light-warning' },
      2: { title: 'Active', class: 'badge-light-success' },
      3: { title: 'Inactive', class: 'badge-light-secondary' }
    };

  var assetPath = '../../../app-assets/',
    userView = 'app-user-view-account.html';

  if ($('body').attr('data-framework') === 'laravel') {
    assetPath = $('body').attr('data-asset-path');
    userView = assetPath + 'app/user/view/account';
  }

  select.each(function () {
    var $this = $(this);
    $this.wrap('<div class="position-relative"></div>');
    $this.select2({
      // the following code is used to disable x-scrollbar when click in select input and
      // take 100% width in responsive also
      dropdownAutoWidth: true,
      width: '100%',
      dropdownParent: $this.parent()
    });
  });

  // Users List datatable
  if (dtUserTable.length) {
    dtUserTable.DataTable({
        processing: true,
        serverSide: true,
        ajax: "#",
      columns: [
            {data: 'DT_RowIndex', name: 'DT_RowIndex'},
            {data: 'code', name: 'code'},
            {data: 'name', name: 'name'},
            {data: 'category', name: 'category'},
            {data: 'option', name: 'option'},
            {data: 'price', name: 'price'},
            {data: 'diameter', name: 'diameter'},
            {data: 'height', name: 'height'},
        ],
      
      order: [[1, 'desc']],
      dom:
        '<"d-flex justify-content-between align-items-center header-actions mx-2 row mt-75"' +
        '<"col-sm-12 col-lg-4 d-flex justify-content-center justify-content-lg-start" l>' +
        '<"col-sm-12 col-lg-8 ps-xl-75 ps-0"<"dt-action-buttons d-flex align-items-center justify-content-center justify-content-lg-end flex-lg-nowrap flex-wrap"<"me-1"f>B>>' +
        '>t' +
        '<"d-flex justify-content-between mx-2 row mb-1"' +
        '<"col-sm-12 col-md-6"i>' +
        '<"col-sm-12 col-md-6"p>' +
        '>',
      language: {
        sLengthMenu: 'Show _MENU_',
        search: 'Search',
        searchPlaceholder: 'Search..'
      },
      // Buttons with Dropdown
      buttons: [
        {
          extend: 'collection',
          className: 'btn btn-outline-secondary dropdown-toggle me-2',
          text: feather.icons['external-link'].toSvg({ class: 'font-small-4 me-50' }) + 'Export',
          buttons: [
            {
              extend: 'print',
              text: feather.icons['printer'].toSvg({ class: 'font-small-4 me-50' }) + 'Print',
              className: 'dropdown-item',
              exportOptions: { columns: [1,2,3,4,5,6,7] }
            },
            {
              extend: 'csv',
              text: feather.icons['file-text'].toSvg({ class: 'font-small-4 me-50' }) + 'Csv',
              className: 'dropdown-item',
              exportOptions: { columns: [1,2,3,4,5,6,7] }
            },
            {
              extend: 'excel',
              text: feather.icons['file'].toSvg({ class: 'font-small-4 me-50' }) + 'Excel',
              className: 'dropdown-item',
              exportOptions: { columns: [1,2,3,4,5,6,7] }
            },
            {
              extend: 'pdf',
              text: feather.icons['clipboard'].toSvg({ class: 'font-small-4 me-50' }) + 'Pdf',
              className: 'dropdown-item',
              exportOptions: { columns: [1,2,3,4,5,6,7] }
            },
            {
              extend: 'copy',
              text: feather.icons['copy'].toSvg({ class: 'font-small-4 me-50' }) + 'Copy',
              className: 'dropdown-item',
              exportOptions: { columns: [1,2,3,4,5,6,7] }
            }
          ],
          init: function (api, node, config) {
            $(node).removeClass('btn-secondary');
            $(node).parent().removeClass('btn-group');
            setTimeout(function () {
              $(node).closest('.dt-buttons').removeClass('btn-group').addClass('d-inline-flex mt-50');
            }, 50);
          }
        }
      ],
      language: {
        paginate: {
          // remove previous & next text from pagination
          previous: '&nbsp;',
          next: '&nbsp;'
        }
      }
    });
  }
  
  $("#spinner").hide();
  // Form Validation
  if (newUserForm.length) {
    newUserForm.validate({
      errorClass: 'error',
      rules: {
        'name': {
          required: true
        }
        
      }
    });

    newUserForm.on('submit', function (e) {
      var isValid = newUserForm.valid();
      e.preventDefault();
      if (isValid) {
        var data = $(this).serialize();
        $("#spinner").show();
        $("#submit-data").hide();
        $.ajax({
          method: "post",
          url: $(this).attr("action"),
          data:  new FormData(this),
         contentType: false,
         cache: false,
         processData:false,
          success:function(result){
              if(result.success == true){

                Swal.fire({
                  position: 'top-end',
                  icon: 'success',
                  title: result.msg,
                  showConfirmButton: false,
                  timer: 1500,
                  customClass: {
                    confirmButton: 'btn btn-primary'
                  },
                  buttonsStyling: false
                });
             

                location.reload();
              }else{
                   $("#submit-data").show();
                   $("#spinner").hide();

                 
                    Swal.fire({
                      position: 'top-end',
                      title: 'Error!',
                      text: result.msg,
                      icon: 'error',
                      customClass: {
                        confirmButton: 'btn btn-primary'
                      },
                      buttonsStyling: false
                    });
                 
              }
          }
      });



    
    
        newUserSidebar.modal('hide');
      }
    });
  }



  // Phone Number
  if (dtContact.length) {
    dtContact.each(function () {
      new Cleave($(this), {
        phone: true,
        phoneRegionCode: 'US'
      });
    });
  }
});

$(document).on('change', '.toggler', function() {
   
    var parent_id = $(this).attr('data-toggle_id');
    if ($(this).is(':checked')) {
        $('#' + parent_id).removeClass('hide');
    } else {
        $('#' + parent_id).addClass('hide');
    }
});
</script>
@endsection