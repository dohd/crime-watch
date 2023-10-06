@extends('layouts.app')
@section('title', 'SPECIAL-REPORT')
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
            <section id="basic-input">
                <div class="row">
                    <div class="col-md-12">
                        <div class="card shadow-none bg-transparent border-primary">
                            <div class="card-header">
                                <h4 class="card-title">SPECIAL REPORT</h4>
                            </div>
                            @php
                            $special_check_input=null;
                            $daterange_input=null;
                            $report_category_input=null;
                                if(isset($special_check) && isset($daterange) ){
                                    $special_check_input=$special_check; 
                                    $daterange_input=$daterange; 
                                    $report_category_input=$report_category;
                                }

                            @endphp
                            <div class="card-body">
                                {!! Form::open(['route' => 'special-report', 'method' => 'GET', 'class' => ' modal-content pt-0', 'id' => 'search-report']) !!}
                                <div class="row">
                                        <div class="col-xl-3 col-md-6 col-12">
                                            <div class="mb-1">
                                                <label class="form-label" for="report_number">Report Type:</label>
                                                {!! Form::select(
                                                  'special_check', 
                                                  ['gambling'=>'Gambling','mob_injustice'=>'Mob Injustice', 'money_matters' => 'Money Matters', 'arrest_of_foreigners' => 'Arreset of Foreigners', 'Criminal Gang' => 'Criminal Gang', 'police_officers' => 'Police Officers', 'school' => 'School', 'illicitbrew' => 'Illicit Brew', 'terrorism' => 'Terrorism', 'boarder' => 'Boarder', 'contraband' => 'Contraband', 'cattle_rustling' => 'Cattle Rustling', 'ethnic_clashes' => 'Ethnic Clashes', 'stock_theft' => 'Stock Theft', 'alien' => 'Alien', 'kidnapping' => 'Kidnapping', 'wildlife' => 'Wildlife', 'firearm' => 'Firearm', 'drugs' => 'Drugs'], 
                                                  $special_check_input, 
                                                  [
                                                    'placeholder' => '-- Select --',
                                                    'class' => 'select2 form-control',
                                                    'id' => 'special_report',
                                                    'required'=>'required'
                                                ]) !!}
                                            </div>
                                        </div>
                                        <div class="col-xl-3 col-md-6 col-12">
                                            <div class="mb-1">
                                                <label class="form-label" for="report_category">Report ategory:</label>
                                                {!! Form::select('report_category', ['incidences'=>'Incidences','statistics'=>'Statistics'], $report_category_input, [
                                                    'placeholder' => '-- Select --',
                                                    'class' => 'select2 form-control',
                                                    'id' => 'report_category',
                                                    'required'=>'required'
                                                ]) !!}
                                            </div>
                                        </div>

                                    <div class="col-xl-4 col-md-6 col-12">
                                        <div class="mb-1">
                                            <label class="form-label" for="report_number">Date:</label>
                                            {!! Form::text('date', $daterange_input, [
                                                'class' => 'form-control shawCalRanges',
                                                'id' => 'statistic_value ',
                                                'required'=>'date'
                                            ]) !!}


                                        </div>
                                    </div>
                                    <div class="col-xl-2 col-md-6 col-12">
                                        <button type="submit" class="btn btn-icon btn-warning mt-2">
                                            <i data-feather="search"></i>
                                        </button>
                                    </div>
                                </div>

                                {!! Form::close() !!}
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <!-- users list ends -->
          

@if (isset($special_check) && isset($daterange) )

@if ($report_category=='incidences')

@include('report.section.statistics')
    
@else

@if ($special_check=='gambling')
@include('report.section.gambling')
    
@endif
    
@endif




    
@endif



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
    <link rel="stylesheet" type="text/css" href="{{ asset('app-assets/vendors/js/daterangepicker/daterangepicker.css') }}">
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
   <script src="{{ asset('app-assets/vendors/js/moment/min/moment.min.js') }}"></script>
   <script src="{{ asset('app-assets/vendors/js/daterangepicker/daterangepicker.js') }}"></script>
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
    ajax: "{{ route('station.index') }}", // JSON file to add data
      columns: [
        // columns according to JSON
        { data: 'region' },
        { data: 'county' },
        { data: 'division' },
        { data: 'name' },
        { data: 'code' },
        { data: '' }
      ],
      columnDefs: [
     
     
        {
          // Actions
          targets: -1,
          title: 'Actions',
          orderable: false,
          render: function (data, type, full, meta) {
            return (
              '<div class="btn-group">' +
              '<a class=" btn btn-sm dropdown-toggle hide-arrow" data-bs-toggle="dropdown">' +
              feather.icons['more-vertical'].toSvg({ class: 'font-small-4' }) +
              '</a>' +
              '<div class="dropdown-menu dropdown-menu-end">' +
              '<a href="javascript:;" data-href="station/'+full['id']+'/edit" class="edit-station dropdown-item">' +
              feather.icons['file-text'].toSvg({ class: 'font-small-4 me-50' }) +
              'Edit</a>' +
              '<a href="javascript:;" data-href="station/'+full['id']+'" class="delete-station dropdown-item delete-record">' +
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
        },
        {
          text: 'Add New Station',
          className: 'add-new btn btn-primary',
          attr: {
            'data-bs-toggle': 'modal',
            'data-bs-target': '#modals-slide-in'
          },
          init: function (api, node, config) {
            $(node).removeClass('btn-secondary');
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
          .columns(0)
          .every(function () {
            var column = this;
            var label = $('<label class="form-label" for="UserRole">Region</label>').appendTo('.user_role');
            var select = $(
              '<select id="UserRole" class="form-select text-capitalize mb-md-0 mb-2"><option value=""> Select Region </option></select>'
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


    $("#report_number").change(function() {
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            console.log($(this).val());
            $.ajax({
                url: '{{ route('getDorReport') }}',
                type: 'post',
                dataType: 'html',
                data: {
                  is_dcir : 0,
                  report_number: $(this).val(),
                },
                success: function(response) {
                    $('#load_dor').html(response);
                  
                }
            });
        });
       /* $(function(){
        'use strict'
        $('.shawCalRanges').daterangepicker({
        ranges: {
            'Today': [moment(), moment()],
            'Yesterday': [moment().subtract(1, 'days'), moment().subtract(1, 'days')],
            'This Month': [moment().startOf('month'), moment().endOf('month')],
            'Last Month': [moment().subtract(1, 'month').startOf('month'), moment().subtract(1, 'month').endOf('month')],
            'First Quarter': [moment().startOf('year'), moment().startOf('year').add(3, 'months').endOf('month')],
            'Second Quarter': [moment().startOf('year').add(3, 'months'), moment().startOf('year').add(6, 'months').endOf('month')],
            'Third Quarter': [moment().startOf('year').add(6, 'months'), moment().startOf('year').add(9, 'months').endOf('month')],
            'Fourth Quarter': [moment().startOf('year').add(9, 'months'), moment().endOf('year')],
            
        },
                alwaysShowCalendars: true,
            });
        });
*/





</script>
@if (isset($date_from))
<script>
   $(document).ready(function () {
    const quarters = {
    'Today': [moment(), moment()],
    'Yesterday': [moment().subtract(1, 'days'), moment().subtract(1, 'days')],
    'This Month': [moment().startOf('month'), moment().endOf('month')],
    'Last Month': [moment().subtract(1, 'month').startOf('month'), moment().subtract(1, 'month').endOf('month')],
    'First Quarter': [moment().startOf('year'), moment().startOf('year').add(3, 'months').endOf('month')],
    'Second Quarter': [moment().startOf('year').add(3, 'months'), moment().startOf('year').add(6, 'months').endOf('month')],
    'Third Quarter': [moment().startOf('year').add(6, 'months'), moment().startOf('year').add(9, 'months').endOf('month')],
    'Fourth Quarter': [moment().startOf('year').add(9, 'months'), moment().endOf('year')],
  };
  var date_from = @json($date_from);
  var date_to = @json($date_to);

    $('.shawCalRanges').daterangepicker({
    ranges: quarters, // Set the custom quarters
    date_from, // Set default start date to the beginning of the year
    date_to, // Set default end date to the end of the year
    opens: 'left', // Display the calendar on the left side
    applyClass: 'btn-primary', // Set the Apply button class
    cancelClass: 'btn-secondary', // Set the Cancel button class
    alwaysShowCalendars: true,
    locale: {
      format: 'DD/MM/YYYY', // Define the date format
    },
  });
  
});

</script>
@else
<script>
  $(document).ready(function () {
   const quarters = {
   'Today': [moment(), moment()],
   'Yesterday': [moment().subtract(1, 'days'), moment().subtract(1, 'days')],
   'This Month': [moment().startOf('month'), moment().endOf('month')],
   'Last Month': [moment().subtract(1, 'month').startOf('month'), moment().subtract(1, 'month').endOf('month')],
   'First Quarter': [moment().startOf('year'), moment().startOf('year').add(3, 'months').endOf('month')],
   'Second Quarter': [moment().startOf('year').add(3, 'months'), moment().startOf('year').add(6, 'months').endOf('month')],
   'Third Quarter': [moment().startOf('year').add(6, 'months'), moment().startOf('year').add(9, 'months').endOf('month')],
   'Fourth Quarter': [moment().startOf('year').add(9, 'months'), moment().endOf('year')],
 };

   $('.shawCalRanges').daterangepicker({
   ranges: quarters, // Set the custom quarters
   startDate: moment(), // Set default start date to the beginning of the year
   endDate: moment(), // Set default end date to the end of the year
   opens: 'left', // Display the calendar on the left side
   applyClass: 'btn-primary', // Set the Apply button class
   cancelClass: 'btn-secondary', // Set the Cancel button class
   alwaysShowCalendars: true,
   locale: {
     format: 'DD/MM/YYYY', // Define the date format
   },
 });
 
});

</script>
@endif
@endsection