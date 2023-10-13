@extends('layouts.app')
@section('title', 'Daily-Incident')
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

    .table-container {
        overflow-x: auto;
        max-width: 100%;
        position: relative;
    }

    .frozen-header {
        position: sticky;
        top: 0;
        background-color: #f0f0f0;
        z-index: 2;
    }

    .frozen-column {
        position: sticky;
        left: 0;
        z-index: 1;
        background-color: #f0f0f0;
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
                        <h2 class="content-header-title float-start mb-0">Edit Incidence</h2>
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
            {{ Form::model($incidentrecord, ['route' => ['dailyincidences.update', $incidentrecord], 'class' => 'validate-form  modal-content pt-0 add-new-incidence', 'role' => 'form', 'method' => 'PUT', 'id' => 'category_add_form6']) }}
                @include('incidences.form')
                <!-- Alians-->
                <section>
                    <div class="row">
                        <div class="col-12">
                            <div class="card">
                                <div class="card-body">
                                    <button type="button" id="spinner" class="btn btn-primary me-1">
                                        <span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>
                                        <span class="ms-25 align-middle">Loading...</span>
                                    </button>
                                    <button type="submit" id="submit-data" class="btn btn-primary me-1 data-submit">Save Changes</button>
                                    <button type="reset" class="btn btn-outline-secondary">Cancel</button>    
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
        // form submission
        $(function() {
            var newUserForm = $('.add-new-incidence');
            var select = $('.select2');
            var assetPath = $('body').attr('data-asset-path');
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
            if (!newUserForm.length) return;
            newUserForm.validate({
                errorClass: 'error',
                rules: {
                    name: {required: true}
                }
            });
            // Form Submission
            newUserForm.submit(function(e) {
                e.preventDefault();
                var isValid = newUserForm.valid();
                if (isValid) {
                    // filter empty fields
                    $('input, select').filter(function() { 
                        // exclude firearm and ammunition
                        if ($('#firearm').prop('checked')) {
                            id = $(this).attr('id') || '';
                            if (id.includes('firearm_')) return false;
                            if (id.includes('serial_')) return false;
                            if (id.includes('ammu_')) return false;
                        }
                        return $(this).val() == ''; 
                    }).prop('disabled', true);

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
        });

        // full editor 
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
            fullEditor.on('text-change', function(delta, oldDelta, source) {
                document.getElementById("editorContent").value = fullEditor.root.innerHTML;
            });
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
            if ($(this).is(":checked")) {
                $("#addincident-input").show();
            } else {
                $("#addincident-input").hide();
            }
        });
        $("#gangfirearm").change(function() {
            if ($(this).is(":checked")) {
                $("#gangfirearm-input").show();
            } else {
                $("#gangfirearm-input").hide();
            }
        });
        $("#gambling").change(function() {
            if ($(this).is(":checked")) {
                $("#gambling-input").show();
            } else {
                $("#gambling-input").hide();
            }
        });
        $("#mob_injustice").change(function() {
            if ($(this).is(":checked")) {
                $("#mobinjustice-input").show();
            } else {
                $("#mobinjustice-input").hide();
            }
        });
        $("#money_matters").change(function() {
            if ($(this).is(":checked")) {
                $("#moneymatters-input").show();
            } else {
                $("#moneymatters-input").hide();
            }
        });
        $("#police_officers").change(function() {
            if ($(this).is(":checked")) {
                $("#policeofficers-input").show();
            } else {
                $("#policeofficers-input").hide();
            }
        });
        $("#arrest_of_foreigners").change(function() {
            if ($(this).is(":checked")) {
                $("#arrestoffeoreigners-input").show();
            } else {
                $("#arrestoffeoreigners-input").hide();
            }
        });
        $("#criminal_gang").change(function() {
            if ($(this).is(":checked")) {
                $("#criminalgang-input").show();
            } else {
                $("#criminalgang-input").hide();
            }
        });
        $("#school").change(function() {
            if ($(this).is(":checked")) {
                $("#school-input").show();
            } else {
                $("#school-input").hide();
            }
        });
        $("#illicitbrew").change(function() {
            if ($(this).is(":checked")) {
                $("#illicitbrew-input").show();
            } else {
                $("#illicitbrew-input").hide();
            }
        });
        $("#terrorism").change(function() {
            if ($(this).is(":checked")) {
                $("#terrorism-input").show();
            } else {
                $("#terrorism-input").hide();
            }
        });
        $("#boarder").change(function() {
            if ($(this).is(":checked")) {
                $("#boarder-input").show();
            } else {
                $("#boarder-input").hide();
            }
        });
        $("#contraband").change(function() {
            if ($(this).is(":checked")) {
                $("#contraband-input").show();
            } else {
                $("#contraband-input").hide();
            }
        });
        $("#cattle_rustling").change(function() {
            if ($(this).is(":checked")) {
                $("#cattlerustling-input").show();
            } else {
                $("#cattlerustling-input").hide();
            }
        });
        $("#ethnic_clashes").change(function() {
            if ($(this).is(":checked")) {
                $("#ethnicclashes-input").show();
            } else {
                $("#ethnicclashes-input").hide();
            }
        });
        $("#stock_theft").change(function() {
            if ($(this).is(":checked")) {
                $("#stocktheft-input").show();
            } else {
                $("#stocktheft-input").hide();
            }
        });
        $("#alien").change(function() {
            if ($(this).is(":checked")) {
                $("#alien-input").show();
            } else {
                $("#alien-input").hide();
            }
        });
        $("#wildlife").change(function() {
            if ($(this).is(":checked")) {
                $("#wildlife-input").show();
            } else {
                $("#wildlife-input").hide();
            }
        });
        $("#firearm").change(function() {
            if ($(this).is(":checked")) {
                $("#firearm-input").show();
                $("#ammunition-input").show();
                $("#magnexpl-input").show();
            } else {
                $("#firearm-input").hide();
                $("#ammunition-input").hide();
                $("#magnexpl-input").hide();
            }
        });

        $("#incident_file_id").change(function() {
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            $.ajax({
                url: '{{ route('getcrimecategory') }}',
                type: 'post',
                dataType: 'json',
                data: {
                    incident_file_id: $(this).val(),
                },
                success: function(response) {
                    $('#incident_file_category').val(response.crimecategory.name);
                    $('#crime_category_id').val(response.crimecategory.id);
                }
            });
        });
        
        $("#station_id").change(function() {
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': "{{ csrf_token() }}"
                }
            });
            $.ajax({
                url: '{{ route('getStationRelated') }}',
                type: 'post',
                dataType: 'json',
                data: {
                    station_id: $(this).val(),
                },
                success: function(response) {
                    $('#region_id').val(response.region.id);
                    $('#county_id').val(response.county.id);
                    $('#division_id').val(response.division.id);
                    $('#region_name').val(response.region.name);
                    $('#county_name').val(response.county.name);
                    $('#division_name').val(response.division.name);
                }
            });
        });

        $('.kd-input').change(function() {
            $('.kd-input').each(function() {
                const male = $(this).siblings('.male').val();
                const female = $(this).siblings('.female').val();
                if (!male) $(this).siblings('.male').val(0);
                if (!female) $(this).siblings('.female').val(0);
            });
        });

        const checkboxes = document.querySelectorAll('.checkbox');
        const divs = document.querySelectorAll('.hide');
        checkboxes.forEach(checkbox => {
            checkbox.addEventListener('change', function() {
                // Uncheck other checkboxes and hide associated divs
                checkboxes.forEach(cb => {
                    if (cb !== this) {
                        cb.checked = false;
                        hideAssociatedDiv(cb);
                    }
                });
                // Show associated div when checkbox is checked
                if (this.checked) {
                    showAssociatedDiv(this);
                } else {
                    hideAssociatedDiv(this);
                }
            });
        });
        function showAssociatedDiv(checkbox) {
            const targetDivId = checkbox.dataset.target;
            const targetDiv = document.getElementById(targetDivId);
            if (targetDiv) targetDiv.style.display = 'block';
        }
        function hideAssociatedDiv(checkbox) {
            const targetDivId = checkbox.dataset.target;
            const targetDiv = document.getElementById(targetDivId);
            if (targetDiv) targetDiv.style.display = 'none';
        }

        $("#date_captured").change(function() {
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': "{{ csrf_token() }}",
                }
            });
            $.ajax({
                url: '{{ route('loadincidentnumber') }}',
                type: 'post',
                dataType: 'json',
                data: {
                    date_captured: $(this).val(),
                },
                success: function(response) {
                    $('#incident_no').val(response);
                }
            });
        });

        // mobinjustice section repeater
        $('.mobinjustice-repeater, .mobinjustice-default').repeater({
            show: function() {
                $(this).slideDown();
                $(this).find('.select2').select2();
                // Feather Icons
                if (feather) feather.replace({width: 14,height: 14});
            },
            hide: function(deleteElement) {
                if (confirm('Are you sure you want to delete this?')) {
                    $(this).slideUp(deleteElement);
                }
            }
        });

        // alien section repeater
        $('.alien-repeater, .alien-default').repeater({
            show: function() {
                $(this).slideDown();
                $(this).find('.select2').select2();
                // Feather Icons
                if (feather) feather.replace({width: 14,height: 14});
            },
            hide: function(deleteElement) {
                if (confirm('Are you sure you want to delete this?')) {
                    $(this).slideUp(deleteElement);
                }
            }
        });
        // police officer section repeater
        $('.policeofficer-repeater, .policeofficer-default').repeater({
            show: function() {
                $(this).slideDown();
                $(this).find('.select2').select2();
                // Feather Icons
                if (feather) feather.replace({width: 14,height: 14});
            },
            hide: function(deleteElement) {
                if (confirm('Are you sure you want to delete this?')) {
                    $(this).slideUp(deleteElement);
                }
            }
        });
        // illicit brew section repeater
        $('.illicitbrew-repeater, .illicitbrew-default').repeater({
            show: function() {
                $(this).slideDown();
                $(this).find('.select2').select2();
                // Feather Icons
                if (feather) feather.replace({width: 14,height: 14});
            },
            hide: function(deleteElement) {
                if (confirm('Are you sure you want to delete this?')) {
                    $(this).slideUp(deleteElement);
                }
            }
        });
    </script>
@endsection
