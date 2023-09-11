<div class="modal-dialog">
    {{ Form::model($user, ['route' => ['users.update', $user], 'class' => 'edit-users modal-content pt-0', 'role' => 'form', 'method' => 'PUT', 'id' => 'edit_users']) }}


   

        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">×</button>
        <div class="modal-header mb-1">
            <h5 class="modal-title" id="exampleModalLabel">Edit User</h5>
        </div>
        <div class="modal-body flex-grow-1">
            <div class="mb-1">
                <label class="form-label" for="basic-icon-default-name">Name</label>
                {!! Form::text('name',null,['placeholder' => 'Enter  Name', 'class'=>'  form-control','id'=> 'name','required'=>'required']) !!}
            </div>
            <div class="mb-1">
                <label class="form-label" for="basic-icon-default-name">Username</label>
                {!! Form::text('username',null,['placeholder' => 'Enter  Username', 'class'=>'  form-control','id'=> 'username','required'=>'required']) !!}
            </div>
            <div class="mb-1">
                <label class="form-label" for="basic-icon-default-name">Email</label>
                {!! Form::text('email',null,['placeholder' => 'Enter  Email', 'class'=>'  form-control','id'=> 'email','required'=>'required']) !!}
            </div>
         
            <div class="mb-1">
                <label class="form-label" for="basic-icon-default-name">Phone</label>
                {!! Form::text('phone',null,['placeholder' => 'Enter  Phone', 'class'=>'  form-control','id'=> 'phone','required'=>'required']) !!}
            </div>
            <div class="mb-1">
                <label class="form-label" for="basic-icon-default-name">Role</label>
                {!! Form::select('role_id',$roles,$userRole,['placeholder' => '-- Select Role --', 'class'=>' select2 form-control','id'=> 'role_id','required'=>'required']) !!}
            </div>
            <div class="mb-1">
                <label class="form-label" for="basic-icon-default-name">Status</label>
                {!! Form::select('status',['Active'=>'Active','Inactive'=>'Inactive'],null,['placeholder' => '-- Select Status --', 'class'=>' select2 form-control','id'=> 'status','required'=>'required']) !!}
            </div>
        
        
            {{ Form::submit('Save Record', ['class' => 'btn btn-primary me-1 data-submit','id'=>'region-edit-data']) }}
            {{ Form::reset('Cancel', ['class' => 'btn btn-outline-secondary','data-bs-dismiss'=>'modal']) }}


        </div>
        {!! Form::close() !!}
</div>