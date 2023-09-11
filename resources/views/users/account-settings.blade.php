@extends('layouts.app')
@section('title', 'Manage-Users')
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
            <div class="content-header-left col-md-9 col-12 mb-2">
                <div class="row breadcrumbs-top">
                    <div class="col-12">
                        <h2 class="content-header-title float-start mb-0">Account</h2>
                        <div class="breadcrumb-wrapper">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="index.html">Home</a>
                                </li>
                                <li class="breadcrumb-item"><a href="#">Account Settings </a>
                                </li>
                                <li class="breadcrumb-item active"> Account
                                </li>
                            </ol>
                        </div>
                    </div>
                </div>
            </div>
            <div class="content-header-right text-md-end col-md-3 col-12 d-md-block d-none">
                <div class="mb-1 breadcrumb-right">
                    <div class="dropdown">
                        <button class="btn-icon btn btn-primary btn-round btn-sm dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i data-feather="grid"></i></button>
                        <div class="dropdown-menu dropdown-menu-end"><a class="dropdown-item" href="app-todo.html"><i class="me-1" data-feather="check-square"></i><span class="align-middle">Todo</span></a><a class="dropdown-item" href="app-chat.html"><i class="me-1" data-feather="message-square"></i><span class="align-middle">Chat</span></a><a class="dropdown-item" href="app-email.html"><i class="me-1" data-feather="mail"></i><span class="align-middle">Email</span></a><a class="dropdown-item" href="app-calendar.html"><i class="me-1" data-feather="calendar"></i><span class="align-middle">Calendar</span></a></div>
                    </div>
                </div>
            </div>
        </div>
        <div class="content-body">
            <div class="row">
                <div class="col-12">
                

                    <!-- profile -->
                    {{ Form::model($user, ['route' => ['users.update', $user], 'class' => 'validate-form mt-2 pt-50 update-user', 'role' => 'form', 'method' => 'PUT', 'id' => 'category_add_form']) }}
                    <div class="card">
                        <div class="card-header border-bottom">
                            <h4 class="card-title">Profile Details</h4>
                        </div>
                        <div class="card-body py-2 my-25">
                            @php
                            $image = asset('upload/'.Auth::user()->icon);
                           
                            @endphp
                            <!-- header section -->
                          
                            <div class="d-flex mb-2">
                                <a href="#" class="me-25">
                                    <img src="{{ !empty(Auth::user()->icon  ) ? $image : asset('upload/profile_image.png')}}" id="account-upload-img" class="uploadedAvatar rounded me-50" alt="profile image" height="100" width="100" />
                                </a>
                                <!-- upload and reset button -->
                                <div class="d-flex align-items-end mt-75 ms-1">
                                    <div>
                                        <label for="account-upload" class="btn btn-sm btn-primary mb-75 me-75">Upload</label>
                                        {!! Form::file('icon',['id'=>'account-upload',  'hidden', 'accept'=>'image/*']) !!}

                                        
                                        
                                      
                                        <p class="mb-0">Allowed file types: png, jpg, jpeg.</p>
                                    </div>
                                </div>
                                <!--/ upload and reset button -->
                            </div>
                            <!--/ header section -->

                            <!-- form -->
                       

                           
                                <div class="row">
                                    <div class="col-12 col-sm-6 mb-1">
                                        <label class="form-label" for="accountFirstName">Name</label>

                                        {!! Form::text('name',null,['placeholder' => 'Name', 'class'=>'  form-control','id'=> 'name','data-msg'=>'Please Enter  Name']) !!}

                
                                    </div>
                                    <div class="col-12 col-sm-6 mb-1">
                                        <label class="form-label" for="accountLastName">Username</label>
                                        {!! Form::text('username',null,['placeholder' => 'Username', 'class'=>'  form-control','id'=> 'name','data-msg'=>'Please Enter  Username','readonly']) !!}
                                    </div>
                                    <div class="col-12 col-sm-6 mb-1">
                                        <label class="form-label" for="accountEmail">Email</label>
                                        {!! Form::text('email',null,['placeholder' => 'Email', 'class'=>'  form-control','id'=> 'email','data-msg'=>'Please Enter  Email']) !!}
                                    </div>
                                    <div class="col-12 col-sm-6 mb-1">
                                        <label class="form-label" for="accountOrganization">Phone</label>
                                        {!! Form::text('phone',null,['placeholder' => 'Phone', 'class'=>'  form-control','id'=> 'phone','data-msg'=>'Please Enter  Phone']) !!}
                                    </div>
                              
                                
                                    <div class="col-12">
                                        <button type="submit" class="btn btn-primary mt-1 me-1">Save changes</button>
                                        <button type="reset" class="btn btn-outline-secondary mt-1">Discard</button>
                                    </div>
                                </div>
                               
                            <!--/ form -->
                        </div>
                    </div>
                    {!! Form::close() !!}
                    <!-- deactivate account  -->
                    <div class="card">
                        <div class="card-header border-bottom">
                            <h4 class="card-title">Change Password</h4>
                        </div>
                        <div class="card-body py-2 my-25">
                          
                            {!! Form::open([
                                'route' => 'user-password-reset',
                                'method' => 'post',
                                'class' => 'validate-form  modal-content pt-0  update-user',
                                'id' => 'category_add_form',
                            ]) !!}


                            <form id="formAccountDeactivation" class="validate-form" onsubmit="return false">
                                <div class="row">
                                    <div class="col-12 col-sm-12 mb-1">
                                        <label class="form-label" for="accountFirstName">Current Password</label>

                                        {!! Form::password('current_password',['placeholder' => 'Name', 'class'=>'  form-control','id'=> 'name','data-msg'=>'Please Enter  Password','required']) !!}

                
                                    </div>
                                 
                                    <div class="col-12 col-sm-6 mb-1">
                                        <label class="form-label" for="accountEmail">New Password</label>
                                        {!! Form::password('new_password',['placeholder' => 'Password', 'class'=>'  form-control','id'=> 'new_password','data-msg'=>'Please Enter  Password','required']) !!}
                                    </div>
                                    <div class="col-12 col-sm-6 mb-1">
                                        <label class="form-label" for="accountOrganization">Confirm Password</label>
                                        {!! Form::password('new_confirm_password',['placeholder' => 'Password', 'class'=>'  form-control','id'=> 'new_confirm_password','data-msg'=>'Please Password','required']) !!}
                                    </div>
                              
                                
                                    <div class="col-12">
                                        <button type="submit" class="btn btn-danger deactivate-account mt-1">Reset Password</button>
                                        
                                    </div>
                                </div>
                                <div>
                                  
                                </div>
                                {!! Form::close() !!}
                        </div>
                    </div>
                    <!--/ profile -->
                </div>
            </div>

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
    newUserSidebar = $('.new-user-modal'),
    newUserForm = $('.update-user'),
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
    ajax: "{{ route('users.index') }}", // JSON file to add data
      columns: [
        // columns according to JSON
        { data: 'name' },
        { data: 'email' },
        { data: 'username' },
        { data: 'phone' },
        { data: 'status' },
        { data: '' }
      ],
      columnDefs: [
     
        {
          // User full name and username
          targets: 0,
          responsivePriority: 4,
          render: function (data, type, full, meta) {
            var $name = full['name'];
            return $name;
          }
        },
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
              '<a href="javascript:;" data-href="users/'+full['id']+'/edit" class="edit-users dropdown-item">' +
              feather.icons['file-text'].toSvg({ class: 'font-small-4 me-50' }) +
              'Edit</a>' +
              '<a href="javascript:;" data-href="users/'+full['id']+'" class="delete-users dropdown-item delete-record">' +
              feather.icons['trash-2'].toSvg({ class: 'font-small-4 me-50' }) +
              'Delete</a>' +
              '<a href="javascript:;" data-href="resetpassword/'+full['id']+'" class="resetpassword-users dropdown-item resetpassword-record">' +
              feather.icons['rotate-ccw'].toSvg({ class: 'font-small-4 me-50' }) +
              'Reset Password</a></div>' +
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
          text: 'Add New User',
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
          .columns(4)
          .every(function () {
            var column = this;
            var label = $('<label class="form-label" for="UserRole">Status</label>').appendTo('.user_role');
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
$(document).on('click', '.edit-users', function() {
   // alert($(this).data('href'));

           
           $('div.editUsersModal').load($(this).data('href'), function() {
               $(this).modal('show');
        
               $('form#edit_users').submit(function(e) {
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
                               $('div.editUsersModal').modal('hide');
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
       $(document).on('click', '.delete-users', function(e) {
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

                      Swal.fire('Users not deleted', '', 'info')
                    }
                });
            });


            $(document).on('click', '.resetpassword-users', function(e) {
                e.preventDefault();
                Swal.fire({
                    type: 'warning',
                  title: "Are You Sure!!",
                  showCancelButton: true,
                  buttons: true,
                  dangerMode: true,
                }).then((willDelete) => {
                    if (willDelete.value) {
                        var href = $(this).data('href');
                        $.ajax({
                            method: "GET",
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

                      Swal.fire('Password Not Reset', '', 'info')
                    }
                });
            });

</script>
@endsection