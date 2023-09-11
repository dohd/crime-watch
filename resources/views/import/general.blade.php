@extends('layouts.app')
@section('title', 'Import-Data')
<style>
    .hide {
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
                        <h2 class="content-header-title float-start mb-0">Import</h2>
                        <div class="breadcrumb-wrapper">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="#">Home</a>
                                </li>
                            </ol>
                        </div>
                    </div>
                </div>
            </div>
            <div class="content-header-right text-md-end col-md-3 col-12 d-md-block d-none">
                <div class="mb-1 breadcrumb-right">
                    <div class="dropdown">
                        <button class="btn-icon btn btn-primary btn-round btn-sm dropdown-toggle" type="button"
                            data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i
                                data-feather="grid"></i></button>
                        <div class="dropdown-menu dropdown-menu-end"><a class="dropdown-item" href="app-todo.html"><i
                                    class="me-1" data-feather="check-square"></i><span
                                    class="align-middle">Todo</span></a><a class="dropdown-item" href="app-chat.html"><i
                                    class="me-1" data-feather="message-square"></i><span
                                    class="align-middle">Chat</span></a><a class="dropdown-item" href="app-email.html"><i
                                    class="me-1" data-feather="mail"></i><span class="align-middle">Email</span></a><a
                                class="dropdown-item" href="app-calendar.html"><i class="me-1"
                                    data-feather="calendar"></i><span class="align-middle">Calendar</span></a></div>
                    </div>
                </div>
            </div>
        </div>
        <div class="content-body">
            <!-- Basic Inputs start -->
            {!! Form::open(['route' => 'generalimport.store', 'method' => 'post', 'class' => 'validate-form add-new-user modal-content pt-0', 'files' => true,'id' => 'category_add_form' ]) !!}
            <section id="basic-input">
                <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                    
                            <div class="card-body">
                                @if (session('notification') || !empty($notification))
                                <div class="row">
                                    <div class="col-sm-12">
                                        <div class="alert alert-danger" role="alert">
                                            <div class="alert-body">
                                                @if (!empty($notification['msg']))
                                                    {{ $notification['msg'] }}
                                                @elseif(session('notification.msg'))
                                                    {{ session('notification.msg') }}
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endif
                            @if (session('status') || !empty($notification))
                                <div class="row">
                                    <div class="col-sm-12">
                                        <div class="alert alert-success" role="alert">
                                            <div class="alert-body">
                                                @if (!empty($notification['msg']))
                                                    {{ $notification['msg'] }}
                                                @elseif(session('status.msg'))
                                                    {{ session('status.msg') }}
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endif
                                <div class="row">
                            
                                    <div class="col-xl-4 col-md-6 col-12">
                                        <div class="mb-1">
                                            <label class="form-label" for="basicInput">File</label>
                                            {!! Form::file('file', [
                                                'class' => 'form-control',
                                                'id' => 'formFile',
                                                'accept' => '.xls, .xlsx, .csv',
                                                'required' => 'required',
                                            ]) !!}
                                        </div>
                                    </div>
                           
                        
                                </div>
                          
                            
                              
                            </div>
                        </div>
                    </div>
                </div>
            </section>

        
            <section>
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                         
                            <div class="card-body">
                           
                            
                                {{ Form::submit('Save changes', ['class' => 'btn btn-primary me-1 data-submit','id'=>'submit-data']) }}
                                {{ Form::reset('Cancel', ['class' => 'btn btn-outline-secondary','data-bs-dismiss'=>'modal']) }}
                               
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            {!! Form::close() !!}
     
            <!-- Alians-->
        </div>
    </div>
    <!-- END: Content-->
@endsection
@section('vendor-styles')
    <link rel="stylesheet" type="text/css"
        href="{{ asset('app-assets/vendors/css/pickers/flatpickr/flatpickr.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('app-assets/vendors/css/forms/select/select2.min.css') }}">
    <link rel="stylesheet" type="text/css"
        href="{{ asset('app-assets/vendors/css/tables/datatable/dataTables.bootstrap5.min.css') }}">
    <link rel="stylesheet" type="text/css"
        href="{{ asset('app-assets/vendors/css/tables/datatable/responsive.bootstrap5.min.css') }}">
    <link rel="stylesheet" type="text/css"
        href="{{ asset('app-assets/vendors/css/tables/datatable/buttons.bootstrap5.min.css') }}">
    <link rel="stylesheet" type="text/css"
        href="{{ asset('app-assets/vendors/css/tables/datatable/rowGroup.bootstrap5.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('app-assets/vendors/css/extensions/toastr.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('app-assets/vendors/css/vendors.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('app-assets/vendors/css/editors/quill/katex.min.css') }}">
    <link rel="stylesheet" type="text/css"
        href="{{ asset('app-assets/vendors/css/editors/quill/monokai-sublime.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('app-assets/vendors/css/editors/quill/quill.snow.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('app-assets/vendors/css/editors/quill/quill.bubble.css') }}">
@endsection
@section('after-styles')
    <link rel="stylesheet" type="text/css" href="{{ asset('app-assets/css/plugins/forms/form-validation.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('app-assets/css/plugins/forms/form-quill-editor.css') }}">
@endsection
@section('vendor-script')
    <script src="{{ asset('app-assets/vendors/js/pickers/flatpickr/flatpickr.min.js') }}"></script>
    <script src="{{ asset('app-assets/vendors/js/editors/quill/katex.min.js') }}"></script>
    <script src="{{ asset('app-assets/vendors/js/editors/quill/highlight.min.js') }}"></script>
    <script src="{{ asset('app-assets/vendors/js/editors/quill/quill.min.js') }}"></script>
    <script src="{{ asset('app-assets/vendors/js/forms/repeater/jquery.repeater.min.js') }}"></script>
@endsection
@section('after-scripts')
    <!-- BEGIN: Page Vendor JS-->
    <script src="{{ asset('app-assets/vendors/js/forms/select/select2.full.min.js') }}"></script>
    <script src="{{ asset('app-assets/vendors/js/tables/datatable/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('app-assets/vendors/js/tables/datatable/dataTables.bootstrap5.min.js') }}"></script>
    <script src="{{ asset('app-assets/vendors/js/tables/datatable/dataTables.responsive.min.js') }}"></script>
    <script src="{{ asset('app-assets/vendors/js/tables/datatable/responsive.bootstrap5.js') }}"></script>
    <script src="{{ asset('app-assets/vendors/js/tables/datatable/datatables.buttons.min.js') }}"></script>
    <script src="{{ asset('app-assets/vendors/js/tables/datatable/jszip.min.js') }}"></script>
    <script src="{{ asset('app-assets/vendors/js/tables/datatable/pdfmake.min.js') }}"></script>
    <script src="{{ asset('app-assets/vendors/js/tables/datatable/vfs_fonts.js') }}"></script>
    <script src="{{ asset('app-assets/vendors/js/tables/datatable/buttons.html5.min.js') }}"></script>
    <script src="{{ asset('app-assets/vendors/js/tables/datatable/buttons.print.min.js') }}"></script>
    <script src="{{ asset('app-assets/vendors/js/tables/datatable/dataTables.rowGroup.min.js') }}"></script>
    <script src="{{ asset('app-assets/vendors/js/forms/validation/jquery.validate.min.js') }}"></script>
    <script src="{{ asset('app-assets/vendors/js/forms/cleave/cleave.min.js') }}"></script>
    <script src="{{ asset('app-assets/vendors/js/forms/cleave/addons/cleave-phone.us.js') }}"></script>
    <script src="{{ asset('app-assets/vendors/js/extensions/sweetalert2.all.min.js') }}"></script>
    <script src="{{ asset('app-assets/js/scripts/pages/tender-create.js') }}"></script>
    <script src="{{ asset('app-assets/vendors/js/extensions/toastr.min.js') }}"></script>
    <!-- END: Page Vendor JS-->
    <!-- BEGIN: Page JS-->
    <!-- END: Page JS-->
    <script>
        $(function() {
            ('use strict');
            var dtUserTable = $('.user-list-table'),
                newUserSidebar = $('.new-county-modal'),
                newUserForm = $('.add-new-county'),
                select = $('.select2'),
                dtContact = $('.dt-contact'),
                assetPath = $('body').attr('data-asset-path');
            select.each(function() {
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
                    ajax: "{{ route('county.index') }}", // JSON file to add data
                    columns: [
                        // columns according to JSON
                        {
                            data: 'region'
                        },
                        {
                            data: 'name'
                        },
                        {
                            data: 'code'
                        },
                        {
                            data: ''
                        }
                    ],
                    columnDefs: [{
                        // Actions
                        targets: -1,
                        title: 'Actions',
                        orderable: false,
                        render: function(data, type, full, meta) {
                            return (
                                '<div class="btn-group">' +
                                '<a class=" btn btn-sm dropdown-toggle hide-arrow" data-bs-toggle="dropdown">' +
                                feather.icons['more-vertical'].toSvg({
                                    class: 'font-small-4'
                                }) +
                                '</a>' +
                                '<div class="dropdown-menu dropdown-menu-end">' +
                                '<a href="javascript:;" data-href="county/' + full['id'] +
                                '/edit" class="edit-county dropdown-item">' +
                                feather.icons['file-text'].toSvg({
                                    class: 'font-small-4 me-50'
                                }) +
                                'Edit</a>' +
                                '<a href="javascript:;" data-href="county/' + full['id'] +
                                '" class="delete-county dropdown-item delete-record">' +
                                feather.icons['trash-2'].toSvg({
                                    class: 'font-small-4 me-50'
                                }) +
                                'Delete</a></div>' +
                                '</div>' +
                                '</div>'
                            );
                        }
                    }],
                    order: [
                        [1, 'desc']
                    ],
                    dom: '<"d-flex justify-content-between align-items-center header-actions mx-2 row mt-75"' +
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
                    buttons: [{
                            extend: 'collection',
                            className: 'btn btn-outline-secondary dropdown-toggle me-2',
                            text: feather.icons['external-link'].toSvg({
                                class: 'font-small-4 me-50'
                            }) + 'Export',
                            buttons: [{
                                    extend: 'print',
                                    text: feather.icons['printer'].toSvg({
                                        class: 'font-small-4 me-50'
                                    }) + 'Print',
                                    className: 'dropdown-item',
                                    exportOptions: {
                                        columns: [1, 2, 3, 4, 5]
                                    }
                                },
                                {
                                    extend: 'csv',
                                    text: feather.icons['file-text'].toSvg({
                                        class: 'font-small-4 me-50'
                                    }) + 'Csv',
                                    className: 'dropdown-item',
                                    exportOptions: {
                                        columns: [1, 2, 3, 4, 5]
                                    }
                                },
                                {
                                    extend: 'excel',
                                    text: feather.icons['file'].toSvg({
                                        class: 'font-small-4 me-50'
                                    }) + 'Excel',
                                    className: 'dropdown-item',
                                    exportOptions: {
                                        columns: [1, 2, 3, 4, 5]
                                    }
                                },
                                {
                                    extend: 'pdf',
                                    text: feather.icons['clipboard'].toSvg({
                                        class: 'font-small-4 me-50'
                                    }) + 'Pdf',
                                    className: 'dropdown-item',
                                    exportOptions: {
                                        columns: [1, 2, 3, 4, 5]
                                    }
                                },
                                {
                                    extend: 'copy',
                                    text: feather.icons['copy'].toSvg({
                                        class: 'font-small-4 me-50'
                                    }) + 'Copy',
                                    className: 'dropdown-item',
                                    exportOptions: {
                                        columns: [1, 2, 3, 4, 5]
                                    }
                                }
                            ],
                            init: function(api, node, config) {
                                $(node).removeClass('btn-secondary');
                                $(node).parent().removeClass('btn-group');
                                setTimeout(function() {
                                    $(node).closest('.dt-buttons').removeClass('btn-group')
                                        .addClass('d-inline-flex mt-50');
                                }, 50);
                            }
                        },
                        {
                            text: 'Add New County',
                            className: 'add-new btn btn-primary',
                            attr: {
                                'data-bs-toggle': 'modal',
                                'data-bs-target': '#modals-slide-in'
                            },
                            init: function(api, node, config) {
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
                    initComplete: function() {
                        // Adding role filter once table initialized
                        this.api()
                            .columns(0)
                            .every(function() {
                                var column = this;
                                var label = $(
                                        '<label class="form-label" for="UserRole">Region</label>')
                                    .appendTo('.user_role');
                                var select = $(
                                        '<select id="UserRole" class="form-select text-capitalize mb-md-0 mb-2"><option value=""> Select Region </option></select>'
                                    )
                                    .appendTo('.user_role')
                                    .on('change', function() {
                                        var val = $.fn.dataTable.util.escapeRegex($(this)
                                    .val());
                                        column.search(val ? '^' + val + '$' : '', true, false)
                                            .draw();
                                    });
                                column
                                    .data()
                                    .unique()
                                    .sort()
                                    .each(function(d, j) {
                                        select.append('<option value="' + d +
                                            '" class="text-capitalize">' + d + '</option>');
                                    });
                            });
                        // Adding plan filter once table initialized
                    }
                });
            }
           
         
        $(document).on('click', '.edit-county', function() {
            // alert($(this).data('href'));
            $('div.editCountyModal').load($(this).data('href'), function() {
                $(this).modal('show');
                $('form#edit_county').submit(function(e) {
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
                        processData: false,
                        success: function(result) {
                            if (result.success == true) {
                                $('div.editCountyModal').modal('hide');
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
        $(document).on('click', '.delete-county', function(e) {
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
                        data: {
                            '_token': '{{ csrf_token() }}',
                        },
                        success: function(result) {
                            if (result.success == true) {
                                toastr.success(result.msg);
                                location.reload();
                            } else {
                                toastr.error(result.msg);
                            }
                        }
                    });
                } else {
                    Swal.fire('County not deleted', '', 'info')
                }
            });
        });
        (function(window, document, $) {
            'use strict';
            var Font = Quill.import('formats/font');
            Font.whitelist = ['sofia', 'slabo', 'roboto', 'inconsolata', 'ubuntu'];
            Quill.register(Font, true);
            // Bubble Editor
            var fullEditor = new Quill('#full-container .editor', {
                bounds: '#full-container .editor',
                modules: {
                    formula: true,
                    syntax: true,
                    toolbar: [
                        [{
                                font: []
                            },
                            {
                                size: []
                            }
                        ],
                        ['bold', 'italic', 'underline', 'strike'],
                        [{
                                color: []
                            },
                            {
                                background: []
                            }
                        ],
                        [{
                                script: 'super'
                            },
                            {
                                script: 'sub'
                            }
                        ],
                        [{
                                header: '1'
                            },
                            {
                                header: '2'
                            },
                            'blockquote',
                            'code-block'
                        ],
                        [{
                                list: 'ordered'
                            },
                            {
                                list: 'bullet'
                            },
                            {
                                indent: '-1'
                            },
                            {
                                indent: '+1'
                            }
                        ],
                        [
                            'direction',
                            {
                                align: []
                            }
                        ],
                        ['link', 'image', 'video', 'formula'],
                        ['clean']
                    ]
                },
                theme: 'snow'
            });
            var editors = [fullEditor];
        })(window, document, jQuery);
        $("#report_type").change(function() {
            // Chnage report Type
            if ($(this).val() == 'Briefing Report') {
                console.log($(this).val());
                $(".breifing_report").show();
                $(".special_report").hide();
            } else if ($(this).val() == 'Special Report') {
                $(".breifing_report").hide();
                $(".special_report").show();
            } else {
                $(".breifing_report").hide();
                $(".special_report").hide();
            }
        });
        $("#addincident").change(function() {
            // Check if the checkbox is checked
            if ($(this).is(":checked")) {
                // If checked, show the div
                $("#addincident-input").show();
            } else {
                // If unchecked, hide the div
                $("#addincident-input").hide();
            }
        });
        $("#gangfirearm").change(function() {
            // Check if the checkbox is checked
            if ($(this).is(":checked")) {
                // If checked, show the div
                $("#gangfirearm-input").show();
            } else {
                // If unchecked, hide the div
                $("#gangfirearm-input").hide();
            }
        });
        $("#gambling").change(function() {
            // Check if the checkbox is checked
            if ($(this).is(":checked")) {
                // If checked, show the div
                $("#gambling-input").show();
            } else {
                // If unchecked, hide the div
                $("#gambling-input").hide();
            }
        });
        $("#mob_injustice").change(function() {
            // Check if the checkbox is checked
            if ($(this).is(":checked")) {
                // If checked, show the div
                $("#mobinjustice-input").show();
            } else {
                // If unchecked, hide the div
                $("#mobinjustice-input").hide();
            }
        });
        $("#money_matters").change(function() {
            // Check if the checkbox is checked
            if ($(this).is(":checked")) {
                // If checked, show the div
                $("#moneymatters-input").show();
            } else {
                // If unchecked, hide the div
                $("#moneymatters-input").hide();
            }
        });
        $("#police_officers").change(function() {
            // Check if the checkbox is checked
            if ($(this).is(":checked")) {
                // If checked, show the div
                $("#policeofficers-input").show();
            } else {
                // If unchecked, hide the div
                $("#policeofficers-input").hide();
            }
        });
        $("#arrest_of_foreigners").change(function() {
            // Check if the checkbox is checked
            if ($(this).is(":checked")) {
                // If checked, show the div
                $("#arrestoffeoreigners-input").show();
            } else {
                // If unchecked, hide the div
                $("#arrestoffeoreigners-input").hide();
            }
        });
        $("#criminal_gang").change(function() {
            // Check if the checkbox is checked
            if ($(this).is(":checked")) {
                // If checked, show the div
                $("#criminalgang-input").show();
            } else {
                // If unchecked, hide the div
                $("#criminalgang-input").hide();
            }
        });
        $("#school").change(function() {
            // Check if the checkbox is checked
            if ($(this).is(":checked")) {
                // If checked, show the div
                $("#school-input").show();
            } else {
                // If unchecked, hide the div
                $("#school-input").hide();
            }
        });
        $("#illicitbrew").change(function() {
            // Check if the checkbox is checked
            if ($(this).is(":checked")) {
                // If checked, show the div
                $("#illicitbrew-input").show();
            } else {
                // If unchecked, hide the div
                $("#illicitbrew-input").hide();
            }
        });
        $("#terrorism").change(function() {
            // Check if the checkbox is checked
            if ($(this).is(":checked")) {
                // If checked, show the div
                $("#terrorism-input").show();
            } else {
                // If unchecked, hide the div
                $("#terrorism-input").hide();
            }
        });
        $("#boarder").change(function() {
            // Check if the checkbox is checked
            if ($(this).is(":checked")) {
                // If checked, show the div
                $("#boarder-input").show();
            } else {
                // If unchecked, hide the div
                $("#boarder-input").hide();
            }
        });
        $("#contraband").change(function() {
            // Check if the checkbox is checked
            if ($(this).is(":checked")) {
                // If checked, show the div
                $("#contraband-input").show();
            } else {
                // If unchecked, hide the div
                $("#contraband-input").hide();
            }
        });
        $("#cattle_rustling").change(function() {
            // Check if the checkbox is checked
            if ($(this).is(":checked")) {
                // If checked, show the div
                $("#cattlerustling-input").show();
            } else {
                // If unchecked, hide the div
                $("#cattlerustling-input").hide();
            }
        });
        $("#ethnic_clashes").change(function() {
            // Check if the checkbox is checked
            if ($(this).is(":checked")) {
                // If checked, show the div
                $("#ethnicclashes-input").show();
            } else {
                // If unchecked, hide the div
                $("#ethnicclashes-input").hide();
            }
        });
        $("#stock_theft").change(function() {
            // Check if the checkbox is checked
            if ($(this).is(":checked")) {
                // If checked, show the div
                $("#stocktheft-input").show();
            } else {
                // If unchecked, hide the div
                $("#stocktheft-input").hide();
            }
        });
        $("#alien").change(function() {
            // Check if the checkbox is checked
            if ($(this).is(":checked")) {
                // If checked, show the div
                $("#alien-input").show();
            } else {
                // If unchecked, hide the div
                $("#alien-input").hide();
            }
        });
        // form repeater jquery
        $('.policeofficer-repeater, .policeofficer-default').repeater({
            show: function() {
                $(this).slideDown();
                $(this).find('.select2').select2();
                // Feather Icons
                if (feather) {
                    feather.replace({
                        width: 14,
                        height: 14
                    });
                }
            },
            hide: function(deleteElement) {
                if (confirm('Are you sure you want to delete this element?')) {
                    $(this).slideUp(deleteElement);
                }
            }
        });
    </script>
@endsection
