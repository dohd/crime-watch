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
                        <h2 class="content-header-title float-start mb-0">Incidences</h2>
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
            {!! Form::open([
                'route' => 'dailyincidences.store',
                'method' => 'post',
                'class' => 'validate-form  modal-content pt-0 add-new-incidence',
                'id' => 'category_add_form',
            ]) !!}
           @include('incidences.form')
            <!-- Alians-->
            <section>
                <div class="row">
                    <div class="col-12">
                        <div class="card shadow-none bg-transparent border-primary">
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
        $('.add-new-incidence').submit(function(e) {
            $('input,select').filter(function() { return $(this).val() == ""; }).prop('disabled', true);
            $(this)[0].submit();
        });
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
            if (newUserForm.length) {
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
                        // filter out empty fields
                        $('input,select').filter(function() { return $(this).val() == ''; }).prop('disabled', true);

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
                                console.log(result);
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
            fullEditor.on('text-change', function(delta, oldDelta, source) {
                document.getElementById("editorContent").value = fullEditor.root.innerHTML;
            });
        })(window, document, jQuery);
        // Change report Type
        $("#report_type").change(function() {
            if ($(this).val() == 'Briefing Report') {
                $(".breifing_report").show();
                $(".special_report").hide();
            } else if ($(this).val() == 'Special Report') {
                $(".breifing_report").hide();
                $(".special_report").show();
            } else {
                $(".breifing_report").show();
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
        // form repeater jquery
        $('.alien-repeater, .alien-default').repeater({
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
        $("#station_id").change(function() {
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
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
                headers: {'X-CSRF-TOKEN': "{{ csrf_token() }}"}
            });
            $.ajax({
                url: '{{ route('loadincidentnumber') }}',
                type: 'post',
                dataType: 'json',
                data: {date_captured: $(this).val()},
                success: (response) =>  $('#incident_no').val(response)
            });
        });

        // form police officer
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
