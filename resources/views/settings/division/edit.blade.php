<div class="modal-dialog">
    {{ Form::model($division, ['route' => ['division.update', $division], 'class' => 'edit-division modal-content pt-0', 'role' => 'form', 'method' => 'PUT', 'id' => 'edit_division']) }}



        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">×</button>
        <div class="modal-header mb-1">
            <h5 class="modal-title" id="exampleModalLabel">Edit Division</h5>
        </div>
        <div class="modal-body flex-grow-1">
            <div class="mb-1">
                <label class="form-label" for="basic-icon-default-name">County</label>
                {!! Form::select('county_id',$county,null,['placeholder' => '-- Enter County --', 'class'=>' select2 form-control','id'=> 'county_id','required'=>'required']) !!}

            </div>
            <div class="mb-1">
                <label class="form-label" for="basic-icon-default-name">Name</label>
                {!! Form::text('name',null,['placeholder' => 'Enter  Name', 'class'=>'  form-control','id'=> 'name','required'=>'required']) !!}
            </div>
         
        
          
            {{ Form::submit('Update Record', ['class' => 'btn btn-primary me-1 data-submit','id'=>'division-edit-data']) }}
            {{ Form::reset('Cancel', ['class' => 'btn btn-outline-secondary','data-bs-dismiss'=>'modal']) }}


        </div>
        {!! Form::close() !!}
</div>