@extends('layouts.app')
@section('title', 'Traffic-Incident')

@section('content')
    <!-- BEGIN: Content-->
    <div class="content-overlay"></div>
    <div class="header-navbar-shadow"></div>
    <div class="content-wrapper container-xxl p-0">
        <div class="content-header row">
            <div class="content-header-left col-md-9 col-12 mb-2">
                <div class="row breadcrumbs-top">
                    <div class="col-12">
                        <h2 class="content-header-title float-start mb-0">Traffic</h2>
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
            @if (isset($trafficincidence->id))
                {{ Form::model($trafficincidence, ['route' => ['traffic.update', $trafficincidence], 'class' => 'validate-form  modal-content pt-0 add-new-incidence', 'role' => 'form', 'method' => 'PUT', 'id' => 'category_add_form']) }}
            @else
                {!! Form::open(['route' => 'traffic.store','method' => 'post','class' => 'validate-form  modal-content pt-0 add-new-incidence','id' => 'category_add_form']) !!}
            @endif
                @include('traffic.form')
                <section>
                    <div class="row">
                        <div class="col-12">
                            <div class="card">
                                <div class="card-body">
                                    <button type="button" id="spinner" class="btn btn-primary me-1">
                                        <span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>
                                        <span class="ms-25 align-middle">Loading...</span></button>
                                    {{ Form::submit('Save Record', ['class' => 'btn btn-primary me-1 data-submit', 'id' => 'submit-data']) }}
                                    {{ Form::reset('Cancel', ['class' => 'btn btn-outline-secondary']) }}
                                    {{-- <button type="reset" class='btn btn-outline-secondary'>Cancel</button> --}}
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
            {!! Form::close() !!}
        </div>
    </div>
    <!-- END: Content-->
@endsection
@section('vendor-styles')
    <link rel="stylesheet" type="text/css" href="{{ asset('app-assets/vendors/css/pickers/flatpickr/flatpickr.min.css') }}">
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
    <style>
        .hide {
            display: none;
        }
    
        #full-container {
            height: 100%;
            /* added these styles */
            flex: 1;
            display: flex;
            flex-direction: column;
        }
    
        #editor {
            height: 100%;
            /* added these styles */
            flex: 1;
            overflow-y: auto;
            width: 100%;
        }
    
        .table-wrapper {
            height: 300px;
            /* Adjust the height as needed */
            overflow-y: scroll;
        }
    
        /* Add some basic styles to the table */
        #myTable {
            border-collapse: collapse;
            width: 100%;
        }
    
        #myTable th,
        #myTable td {
            border: 1px solid #ddd;
            padding: 8px;
        }
    
        /* Add a class for the fixed column */
        #myTable .fixed-column {
            position: sticky;
            left: 0;
            z-index: 1;
            background-color: #f9f9f9;
        }
    
        #myTable thead {
            position: sticky;
            top: 0;
            background-color: #f9f9f9;
        }
    
        #dataTable {
            border-collapse: collapse;
            width: 100%;
        }
    
        #dataTable th,
        #dataTable td {
            border: 1px solid #ddd;
            padding: 8px;
        }
    
        /* Add a class for the fixed column */
        #dataTable .fixed-column {
            position: sticky;
            left: 0;
            z-index: 1;
            background-color: #f9f9f9;
        }
    
        #dataTable thead {
            position: sticky;
            top: 0;
            background-color: #f9f9f9;
        }
    
        #dataTable_new {
            border-collapse: collapse;
            width: 100%;
        }
    
        #dataTable_new th,
        #dataTable_new td {
            border: 1px solid #ddd;
            padding: 8px;
        }
    
        /* Add a class for the fixed column */
        #dataTable_new .fixed-column {
            position: sticky;
            left: 0;
            z-index: 1;
            background-color: #f9f9f9;
        }
    
        #dataTable_new thead {
            position: sticky;
            top: 0;
            background-color: #f9f9f9;
        }
    
        #myTable_new {
            border-collapse: collapse;
            width: 100%;
        }
    
        #myTable_new th,
        #myTable_new td {
            border: 1px solid #ddd;
            padding: 8px;
        }
    
        /* Add a class for the fixed column */
        #myTable_new .fixed-column {
            position: sticky;
            left: 0;
            z-index: 1;
            background-color: #f9f9f9;
        }
    
        #myTable_new thead {
            position: sticky;
            top: 0;
            background-color: #f9f9f9;
        }
    </style>
@endsection
@section('vendor-script')
    <script src="{{ asset('app-assets/vendors/js/pickers/flatpickr/flatpickr.min.js') }}"></script>
    <script src="{{ asset('app-assets/vendors/js/editors/quill/katex.min.js') }}"></script>
    <script src="{{ asset('app-assets/vendors/js/editors/quill/highlight.min.js') }}"></script>
    <script src="{{ asset('app-assets/vendors/js/editors/quill/quill.min.js') }}"></script>
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
        
        // dynamically display report section
        $('#report_type').change(function() {
            const url = "{{ request()->url() }}";
            if (this.value) {
                sessionStorage.reportType = this.value;
                let date = $('#date_commited').val();
                location.replace(url+'?date_committed='+ date + '&report_type=' + this.value);
            } else {
                sessionStorage.removeItem('reportType');
                location.replace(url);
            }
        });
        $('section.report').each(function() {
            const reportType = sessionStorage.reportType || $('#report_type').val();
            if (reportType == $(this).attr('id')) {
                $(this).removeClass('d-none');
            } else {
                $(this).addClass('d-none');
            }
        });

        $(function() {
            var dtUserTable = $('.user-list-table'),
            newUserForm = $('.add-new-incidence'),
            select = $('.select2'),
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
                newUserForm.on('submit', function(e) {
                    var isValid = newUserForm.valid();
                    e.preventDefault();
                    if (isValid) {
                        var data = $(this).serialize();
                        $("#spinner").show();
                        $("#submit-data").hide();
                        $.ajax({
                            method: "post",
                            url: $(this).attr("action"),
                            data: new FormData(this),
                            contentType: false,
                            cache: false,
                            processData: false,
                            success: function(result) {
                                if (result.success == true) {
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
                    }
                });
            }
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
        
        $(document).ready(function() {
            // Add the "fixed-column" class to the first cell in each row (the fixed column)
            $('#myTable tbody tr').each(function() {
                $(this).find('td:first-child').addClass('fixed-column');
            });
        });
        $(document).ready(function() {
            function updateTotals() {
                // Update row totals
                $('#dataTable tbody tr').each(function() {
                    var total = 0;
                    $(this).find('.data-input').each(function(i) {
                        if (i > 1) total += parseInt($(this).val()) || 0;
                    });
                    $(this).find('.total').text(total);
                });
                // Update column totals
                $('#dataTable tfoot th.s_total').each(function() {
                    var colIndex = $(this).index();
                    var total = 0;
                    $('#dataTable tbody tr').each(function() {
                        var cellValue = parseInt($(this).find('td').eq(colIndex).find('.data-input')
                            .val()) || 0;
                        total += cellValue;
                    });
                    $(this).text(total);
                });
                // Update the grand total
                var grandTotal = 0;
                $('#dataTable tfoot th.s_total').each(function() {
                    grandTotal += parseInt($(this).text()) || 0;
                });
                $('#dataTable tfoot th.g_total').text(grandTotal);
            }
            // Call the function initially
            updateTotals();
            // Listen for changes in input values
            $('#dataTable tbody').on('change', '.data-input', function() {
                updateTotals();
            });
        });
        $(document).ready(function() {
            function updateRaTotals() {
                // Update row totals
                $('#dataTable_new tbody tr').each(function() {
                    var total = 0;
                    $(this).find('.data-input-ra').each(function() {
                        total += parseInt($(this).val()) || 0;
                    });
                    $(this).find('.ra_total').text(total);
                });
                // Update column totals
                $('#dataTable_new tfoot th.ras_total').each(function() {
                    var colIndex = $(this).index();
                    var total = 0;
                    $('#dataTable_new tbody tr').each(function() {
                        var cellValue = parseInt($(this).find('td').eq(colIndex).find(
                            '.data-input-ra').val()) || 0;
                        total += cellValue;
                    });
                    $(this).text(total);
                });
                // Update the grand total
                var grandTotal = 0;
                $('#dataTable_new tfoot th.ras_total').each(function() {
                    grandTotal += parseInt($(this).text()) || 0;
                });
                $('#dataTable_new tfoot th.ga_total').text(grandTotal);
            }
            // Call the function initially
            updateRaTotals();
            // Listen for changes in input values
            $('#dataTable_new tbody').on('change', '.data-input-ra', function() {
                updateRaTotals();
            });
            //Second table
            function updateRvTotals() {
                // Update row totals
                $('#dataTable_new tbody tr').each(function() {
                    var total = 0;
                    $(this).find('.data-input-rv').each(function() {
                        total += parseInt($(this).val()) || 0;
                    });
                    $(this).find('.rv_total').text(total);
                });
                // Update column totals
                $('#dataTable_new tfoot th.rvs_total').each(function() {
                    var colIndex = $(this).index();
                    var total = 0;
                    $('#dataTable_new tbody tr').each(function() {
                        var cellValue = parseInt($(this).find('td').eq(colIndex).find(
                            '.data-input-rv').val()) || 0;
                        total += cellValue;
                    });
                    $(this).text(total);
                });
                // Update the grand total
                var grandTotal = 0;
                $('#dataTable_new tfoot th.rvs_total').each(function() {
                    grandTotal += parseInt($(this).text()) || 0;
                });
                $('#dataTable_new tfoot th.gv_total').text(grandTotal);
            }
            // Call the function initially
            updateRvTotals();
            // Listen for changes in input values
            $('#dataTable_new tbody').on('change', '.data-input-rv', function() {
                updateRvTotals();
            });
            //Third table
            function updateRTotals() {
                // Update row totals
                $('#myTable tbody tr').each(function() {
                    var total = 0;
                    $(this).find('.data-input-r').each(function() {
                        total += parseInt($(this).val()) || 0;
                    });
                    $(this).find('.r_total').text(total);
                });
                // Update column totals
                $('#myTable tfoot th.rs_total').each(function() {
                    var colIndex = $(this).index();
                    var total = 0;
                    $('#myTable tbody tr').each(function() {
                        var cellValue = parseInt($(this).find('td').eq(colIndex).find(
                            '.data-input-r').val()) || 0;
                        total += cellValue;
                    });
                    $(this).text(total);
                });
                // Update the grand total
                var grandTotal = 0;
                $('#myTable tfoot th.rs_total').each(function() {
                    grandTotal += parseInt($(this).text()) || 0;
                });
                $('#myTable tfoot th.gr_total').text(grandTotal);
            }
            // Call the function initially
            updateRTotals();
            // Listen for changes in input values
            $('#myTable tbody').on('change', '.data-input-r', function() {
                updateRTotals();
            });
            //Forth table
            function updateFTotals() {
                // Update row totals
                $('#myTable_new tbody tr').each(function() {
                    var total = 0;
                    $(this).find('.data-input-f').each(function() {
                        total += parseInt($(this).val()) || 0;
                    });
                    $(this).find('.f_total').text(total);
                });
                // Update column totals
                $('#myTable_new tfoot th.fs_total').each(function() {
                    var colIndex = $(this).index();
                    var total = 0;
                    $('#myTable_new tbody tr').each(function() {
                        var cellValue = parseInt($(this).find('td').eq(colIndex).find(
                            '.data-input-f').val()) || 0;
                        total += cellValue;
                    });
                    $(this).text(total);
                });
                // Update the grand total
                var grandTotal = 0;
                $('#myTable_new tfoot th.fs_total').each(function() {
                    grandTotal += parseInt($(this).text()) || 0;
                });
                $('#myTable_new tfoot th.gf_total').text(grandTotal);
            }
            // Call the function initially
            updateFTotals();
            // Listen for changes in input values
            $('#myTable_new tbody').on('change', '.data-input-f', function() {
                updateFTotals();
            });
        });
    </script>
@endsection
