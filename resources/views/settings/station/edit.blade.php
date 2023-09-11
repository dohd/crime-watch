<div class="modal-dialog">
    {{ Form::model($station, ['route' => ['station.update', $station], 'class' => 'edit-station modal-content pt-0', 'role' => 'form', 'method' => 'PUT', 'id' => 'edit_station']) }}

        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">×</button>
        <div class="modal-header mb-1">
            <h5 class="modal-title" id="exampleModalLabel">Edit Station</h5>
        </div>
        <div class="modal-body flex-grow-1">
            <div class="mb-1">
                <label class="form-label" for="basic-icon-default-name">Enter Region</label>
                {!! Form::select('region_id',$region,null,['placeholder' => '-- Enter Region --', 'class'=>' select2 form-control','id'=> 'edit_region_id','required'=>'required']) !!}

            </div>
            <div class="mb-1">
                <label class="form-label" for="basic-icon-default-name">Enter County</label>
                {!! Form::select('county_id',$county,null,['placeholder' => '-- Enter County --', 'class'=>' select2 form-control','id'=> 'edit_county_id','required'=>'required']) !!}

            </div>
            <div class="mb-1">
                <label class="form-label" for="basic-icon-default-name">Enter Division</label>
                {!! Form::select('division_id',$division,null,['placeholder' => '-- Enter Division --', 'class'=>' select2 form-control','id'=> 'edit_division_id','required'=>'required']) !!}

            </div>
            <div class="mb-1">
                <label class="form-label" for="basic-icon-default-name">Enter Station Name</label>
                {!! Form::text('name',null,['placeholder' => 'Enter  Name', 'class'=>'  form-control','id'=> 'name','required'=>'required']) !!}
            </div>
            <div class="mb-1">
                <label class="form-label" for="basic-icon-default-name">Code</label>
                {!! Form::text('code',null,['placeholder' => 'Enter  Code', 'class'=>'  form-control','id'=> 'code',]) !!}
            </div>
        
          
            {{ Form::submit('Update Record', ['class' => 'btn btn-primary me-1 data-submit','id'=>'station-edit-data']) }}
            {{ Form::reset('Cancel', ['class' => 'btn btn-outline-secondary','data-bs-dismiss'=>'modal']) }}


        </div>
        {!! Form::close() !!}
</div>

<script>
    $(function () {
      ('use strict');
    

      var  select = $('.select2');
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
       

    });

    $("#edit_region_id").on('change', function () {
        $("#edit_county_id").val('').trigger('change');
        var region_id = $(this).val();
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        $("#edit_county_id").select2({
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
    $("#edit_county_id").on('change', function () {
        $("#edit_division_id").val('').trigger('change');
        var county_id = $(this).val();
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        $("#edit_division_id").select2({
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
</script>