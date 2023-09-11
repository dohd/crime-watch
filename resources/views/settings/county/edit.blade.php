<div class="modal-dialog">
    {{ Form::model($county, ['route' => ['county.update', $county], 'class' => 'edit-county modal-content pt-0', 'role' => 'form', 'method' => 'PUT', 'id' => 'edit_county']) }}

        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">×</button>
        <div class="modal-header mb-1">
            <h5 class="modal-title" id="exampleModalLabel">Edit County</h5>
        </div>
        <div class="modal-body flex-grow-1">
            <div class="mb-1">
                <label class="form-label" for="basic-icon-default-name">Class</label>
                {!! Form::select('region_id',$region,null,['placeholder' => '-- Enter Region --', 'class'=>' select2 form-control','id'=> 'region_id','required'=>'required']) !!}

            </div>
            <div class="mb-1">
                <label class="form-label" for="basic-icon-default-name">Name</label>
                {!! Form::text('name',null,['placeholder' => 'Enter  Name', 'class'=>'  form-control','id'=> 'name','required'=>'required']) !!}
            </div>
            <div class="mb-1">
                <label class="form-label" for="basic-icon-default-name">Code</label>
                {!! Form::text('code',null,['placeholder' => 'Enter  Code', 'class'=>'  form-control','id'=> 'code','required'=>'required']) !!}
            </div>
        
         
            {{ Form::submit('Update Record', ['class' => 'btn btn-primary me-1 data-submit','id'=>'county-edit-data']) }}
            {{ Form::reset('Cancel', ['class' => 'btn btn-outline-secondary','data-bs-dismiss'=>'modal']) }}


        </div>
        {!! Form::close() !!}
</div>