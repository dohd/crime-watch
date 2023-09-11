<div class="modal-dialog">
    {{ Form::model($region, ['route' => ['region.update', $region], 'class' => 'edit-region modal-content pt-0', 'role' => 'form', 'method' => 'PUT', 'id' => 'edit_region']) }}


   

        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">×</button>
        <div class="modal-header mb-1">
            <h5 class="modal-title" id="exampleModalLabel">Edit Region</h5>
        </div>
        <div class="modal-body flex-grow-1">
            <div class="mb-1">
                <label class="form-label" for="basic-icon-default-name">Name</label>
                {!! Form::text('name',null,['placeholder' => 'Enter  Name', 'class'=>'  form-control','id'=> 'name','required'=>'required']) !!}
            </div>
        
        
            {{ Form::submit('Save Record', ['class' => 'btn btn-primary me-1 data-submit','id'=>'region-edit-data']) }}
            {{ Form::reset('Cancel', ['class' => 'btn btn-outline-secondary','data-bs-dismiss'=>'modal']) }}


        </div>
        {!! Form::close() !!}
</div>