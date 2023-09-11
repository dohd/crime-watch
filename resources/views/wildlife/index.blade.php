@extends('layouts.app')
@section('title', 'WILDLIFE-MANAGE')
<style>
.hide{
	display: none;
}
</style>

@section('content')
<!-- BEGIN: Content-->
    <div class="content-overlay"></div>
    <div class="header-navbar-shadow"></div>
    <div class="content-wrapper container-xxl p-0">
        <div class="content-header row">
        </div>
        <div class="content-body">
            <!-- users list start -->
            <section class="app-user-list">
                <div class="row">
                    <div class="col-lg-3 col-sm-6">
                        <div class="card">
                            <div class="card-body d-flex align-items-center justify-content-between">
                                <div>
                                    <h3 class="fw-bolder mb-75">4</h3>
                                    <span>Total Regions </span>
                                </div>
                                <div class="avatar bg-light-primary p-50">
                                    <span class="avatar-content">
                                        <i data-feather='check'></i>
                                    </span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-sm-6">
                        <div class="card">
                            <div class="card-body d-flex align-items-center justify-content-between">
                                <div>
                                    <h3 class="fw-bolder mb-75">10</h3>
                                    <span>Total Counties</span>
                                </div>
                                <div class="avatar bg-light-danger p-50">
                                    <span class="avatar-content">
                                        <i data-feather='check'></i>
                                    </span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-sm-6">
                        <div class="card">
                            <div class="card-body d-flex align-items-center justify-content-between">
                                <div>
                                    <h3 class="fw-bolder mb-75">20</h3>
                                    <span>Total Divisions </span>
                                </div>
                                <div class="avatar bg-light-success p-50">
                                    <span class="avatar-content">
                                        <i data-feather='check'></i>
                                    </span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-sm-6">
                        <div class="card">
                            <div class="card-body d-flex align-items-center justify-content-between">
                                <div>
                                    <h3 class="fw-bolder mb-75">30</h3>
                                    <span>Total Stations</span>
                                </div>
                                <div class="avatar bg-light-warning p-50">
                                    <span class="avatar-content">
                                        <i data-feather='check'></i>
                                    </span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- list and filter start -->
                <div class="card">
                    <div class="card-body border-bottom">
                        <h4 class="card-title">Manage Wildlife Offences</h4>
                        <div class="row">
                            <div class="col-md-4 user_role"></div>
                            <div class="col-md-4 user_plan"></div>
                            <div class="col-md-4 user_status"></div>
                        </div>
                    </div>
                    <div class="card-datatable table-responsive pt-0">
                        <table class="user-list-table table">
                            <thead class="table-light">
                              <tr>
                                <th>Actions</th>
                                <th>Date</th>
                                <th>Month</th>
                                <th>Elephant</th>
                                <th>Rhino</th>
                                <th>Giraffe</th>
                                <th>Injured</th>
                                <th>Fetal</th>
                       
                            </tr>
                            </thead>
                        </table>
                    </div>
              
                
               


                </div>
                <!-- list and filter end -->
            </section>
            <!-- users list ends -->

        </div>
    </div>
<!-- END: Content-->
@endsection
@section('vendor-styles')
<link rel="stylesheet" type="text/css" href="{{ asset('app-assets/vendors/css/pickers/flatpickr/flatpickr.min.css') }}">
<link rel="stylesheet" type="text/css" href="{{asset('app-assets/vendors/css/forms/select/select2.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{asset('app-assets/vendors/css/tables/datatable/dataTables.bootstrap5.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{asset('app-assets/vendors/css/tables/datatable/responsive.bootstrap5.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{asset('app-assets/vendors/css/tables/datatable/buttons.bootstrap5.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{asset('app-assets/vendors/css/tables/datatable/rowGroup.bootstrap5.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('app-assets/vendors/css/extensions/toastr.min.css') }}">
@endsection
@section('after-styles')
<link rel="stylesheet" type="text/css" href="{{asset('app-assets/css/plugins/forms/form-validation.css') }}">
@endsection

@section('vendor-script')
<script src="{{ asset('app-assets/vendors/js/pickers/flatpickr/flatpickr.min.js') }}"></script>
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
   <script src="{{ asset('app-assets/js/scripts/pages/tender-create.js') }}"></script>
   <script src="{{ asset('app-assets/vendors/js/extensions/toastr.min.js') }}"></script>

   <!-- END: Page Vendor JS-->
<!-- BEGIN: Page JS-->



<!-- END: Page JS-->

<script>
$(function () {
  ('use strict');

  var dtUserTable = $('.user-list-table'),
    newUserSidebar = $('.new-station-modal'),
    newUserForm = $('.add-new-station'),
    select = $('.select2'),
    dtContact = $('.dt-contact'),
    assetPath = $('body').attr('data-asset-path');
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
  // Users List datatable
  if (dtUserTable.length) {
    dtUserTable.DataTable({
    ajax: "{{ route('wildlife.index') }}", // JSON file to add data
      columns: [
        // columns according to JSON
        { data: '' },
        { data: 'date_commited' },
        { data: 'month_commited' },
        { data: 'elephant' },
        { data: 'rhino' },
        { data: 'giraffe' },
        { data: 'injured' },
        { data: 'fetal' },
     
      ],
      columnDefs: [
     
     
        {
          // Actions
          targets: 0,
          title: 'Actions',
          orderable: false,
          render: function (data, type, full, meta) {
            return (
              '<div class="btn-group">' +
              '<a class=" btn btn-sm dropdown-toggle hide-arrow" data-bs-toggle="dropdown">' +
              feather.icons['more-vertical'].toSvg({ class: 'font-small-4' }) +
              '</a>' +
              '<div class="dropdown-menu dropdown-menu-end">' +
              '<a href="wildlife/'+full['uuid']+'/edit"  class="dropdown-item">' +
              feather.icons['file-text'].toSvg({ class: 'font-small-4 me-50' }) +
              'Edit</a>' +
              '<a href="javascript:;" data-href="wildlife/'+full['uuid']+'" class="delete-incidence dropdown-item delete-record">' +
              feather.icons['trash-2'].toSvg({ class: 'font-small-4 me-50' }) +
              'Delete</a></div>' +
              '</div>' +
              '</div>'
            );
          }
        }
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
              exportOptions: { columns: [1, 2, 3, 4, 5] }
            },
            {
              extend: 'csv',
              text: feather.icons['file-text'].toSvg({ class: 'font-small-4 me-50' }) + 'Csv',
              className: 'dropdown-item',
              exportOptions: { columns: [1, 2, 3, 4, 5] }
            },
            {
              extend: 'excel',
              text: feather.icons['file'].toSvg({ class: 'font-small-4 me-50' }) + 'Excel',
              className: 'dropdown-item',
              exportOptions: { columns: [1, 2, 3, 4, 5] }
            },
            {
              extend: 'pdf',
              text: feather.icons['clipboard'].toSvg({ class: 'font-small-4 me-50' }) + 'Pdf',
              className: 'dropdown-item',
              exportOptions: { columns: [1, 2, 3, 4, 5] }
            },
            {
              extend: 'copy',
              text: feather.icons['copy'].toSvg({ class: 'font-small-4 me-50' }) + 'Copy',
              className: 'dropdown-item',
              exportOptions: { columns: [1, 2, 3, 4, 5] }
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
      },
      initComplete: function () {
        // Adding role filter once table initialized
        this.api()
          .columns(1)
          .every(function () {
            var column = this;
            var label = $('<label class="form-label" for="UserRole">Date</label>').appendTo('.user_role');
            var select = $(
              '<select id="UserRole" class="form-select text-capitalize mb-md-0 mb-2"><option value=""> Select  </option></select>'
            )
              .appendTo('.user_role')
              .on('change', function () {
                var val = $.fn.dataTable.util.escapeRegex($(this).val());
                column.search(val ? '^' + val + '$' : '', true, false).draw();
              });

            column
              .data()
              .unique()
              .sort()
              .each(function (d, j) {
                select.append('<option value="' + d + '" class="text-capitalize">' + d + '</option>');
              });
          });
        // Adding plan filter once table initialized
        this.api()
          .columns(2)
          .every(function () {
            var column = this;
            var label = $('<label class="form-label" for="UserPlan">Month</label>').appendTo('.user_plan');
            var select = $(
              '<select id="UserPlan" class="form-select text-capitalize mb-md-0 mb-2"><option value=""> Select </option></select>'
            )
              .appendTo('.user_plan')
              .on('change', function () {
                var val = $.fn.dataTable.util.escapeRegex($(this).val());
                column.search(val ? '^' + val + '$' : '', true, false).draw();
              });

            column
              .data()
              .unique()
              .sort()
              .each(function (d, j) {
                select.append('<option value="' + d + '" class="text-capitalize">' + d + '</option>');
              });
          });
     

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
$(document).on('click', '.edit-station', function() {
   // alert($(this).data('href'));

           
           $('div.editStationModal').load($(this).data('href'), function() {
               $(this).modal('show');
               
        
               $('form#edit_station').submit(function(e) {
                   e.preventDefault();
                   $(this)
                       .find('button[type="submit"]')
                       .attr('disabled', true);
                   //var data = $(this).serialize();
   
                   $.ajax({
                       method: 'POST',
                       url: $(this).attr('action'),
                       data: new FormData(this),
                       contentType: false,
                  cache: false,
                  processData:false,
                       success: function(result) {
                           if (result.success == true) {
                               $('div.editStationModal').modal('hide');
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
                           } else {
                               $(this)
                       .find('button[type="submit"]')
                       .attr('disabled', false);
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
                       },
                   });
               });
   
         
   
   
           });
       });
       $(document).on('click', '.delete-station', function(e) {
                e.preventDefault();
                Swal.fire({
                    type: 'warning',
                  title: "Are You Sure",
                  showCancelButton: true,
                  buttons: true,
                  dangerMode: true,
                }).then((willDelete) => {
                    if (willDelete.value) {
                        var href = $(this).data('href');
                        $.ajax({
                            method: "DELETE",
                            url: href,
                            dataType: "json",
                              data:{
       
                             '_token': '{{ csrf_token() }}',
                                   },
                            success: function(result){
                                if(result.success == true){
                                    toastr.success(result.msg);
                                    location.reload();
                                } else {
                                    toastr.error(result.msg);
                                }
                            }
                        });
                    }else{

                      Swal.fire('Station not deleted', '', 'info')
                    }
                });
            });
      $("#region_id").on('change', function () {
        $("#county_id").val('').trigger('change');
        var region_id = $(this).val();
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        $("#county_id").select2({
            ajax: {
                url: '{{ route("loadCounty") }}',
                dataType: 'json',
                type: 'POST',
                quietMillis: 10,
                data: {
                    region_id : $(this).val(),
                   
                },
                processResults: function (data) {
                    return {
                        results: $.map(data, function (item) {
                            return {
                                text: item.name,
                                id: item.id
                            }
                        })
                    };
                },
            }
        });
    });
    $("#county_id").on('change', function () {
        $("#division_id").val('').trigger('change');
        var county_id = $(this).val();
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        $("#division_id").select2({
            ajax: {
                url: '{{ route("loadDivision") }}',
                dataType: 'json',
                type: 'POST',
                quietMillis: 10,
                data: {
                    county_id : $(this).val(),
                   
                },
                processResults: function (data) {
                    return {
                        results: $.map(data, function (item) {
                            return {
                                text: item.name,
                                id: item.id
                            }
                        })
                    };
                },
            }
        });
    });

    $(document).on('click', '.delete-incidence', function(e) {
                e.preventDefault();
                Swal.fire({
                    type: 'warning',
                  title: "Are You Sure",
                  showCancelButton: true,
                  buttons: true,
                  dangerMode: true,
                }).then((willDelete) => {
                    if (willDelete.value) {
                        var href = $(this).data('href');
                        $.ajax({
                            method: "DELETE",
                            url: href,
                            dataType: "json",
                              data:{
       
                             '_token': '{{ csrf_token() }}',
                                   },
                            success: function(result){
                                if(result.success == true){
                                    toastr.success(result.msg);
                                    location.reload();
                                } else {
                                    toastr.error(result.msg);
                                }
                            }
                        });
                    }else{

                      Swal.fire('No Incident  deleted', '', 'info')
                    }
                });
            });
</script>
@endsection