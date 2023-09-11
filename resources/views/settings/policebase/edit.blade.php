<div class="modal-dialog">
    {{ Form::model($policebase, ['route' => ['policebase.update', $policebase], 'class' => 'edit-policebase modal-content pt-0', 'role' => 'form', 'method' => 'PUT', 'id' => 'edit_policebase']) }}

        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">×</button>
        <div class="modal-header mb-1">
            <h5 class="modal-title" id="exampleModalLabel">Edit Police Base</h5>
        </div>
        <div class="modal-body flex-grow-1">
            <div class="mb-1">
                <label class="form-label" for="basic-icon-default-name">Station</label>
                {!! Form::select('station_id',$station,null,['placeholder' => '-- Enter Station --', 'class'=>' select2 form-control','id'=> 'station_id','required'=>'required']) !!}

            </div>
            <div class="mb-1">
                <label class="form-label" for="basic-icon-default-name">Patrol Base Or Post</label>
                {!! Form::select('is_base',['1'=>'Patrol Base','0'=>'Post'],null,['placeholder' => '-- Select If Bas Or Post --', 'class'=>' select2 form-control','id'=> 'is_base','required'=>'required']) !!}
            </div>
            <div class="mb-1">
                <label class="form-label" for="basic-icon-default-name">Name</label>
                {!! Form::text('name',null,['placeholder' => 'Enter  Name', 'class'=>'  form-control','id'=> 'name','required'=>'required']) !!}
            </div>
        
         
            {{ Form::submit('Update Record', ['class' => 'btn btn-primary me-1 data-submit','id'=>'submit-data']) }}
            {{ Form::reset('Cancel', ['class' => 'btn btn-outline-secondary','data-bs-dismiss'=>'modal']) }}


        </div>
        {!! Form::close() !!}
</div>