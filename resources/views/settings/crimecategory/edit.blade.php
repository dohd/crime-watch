<div class="modal-dialog">
    {{ Form::model($crimecategory, ['route' => ['crimecategory.update', $crimecategory], 'class' => 'edit-crimecategory modal-content pt-0', 'role' => 'form', 'method' => 'PUT', 'id' => 'edit_crimecategory']) }}
    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">×</button>
    <div class="modal-header mb-1">
        <h5 class="modal-title" id="exampleModalLabel">Edit Category </h5>
    </div>
    <div class="modal-body flex-grow-1">
        <div class="mb-1">
            <label class="form-label" for="basic-icon-default-name">Enter Category</label>
            {!! Form::text('name', null, [
                'placeholder' => 'Enter  Category',
                'class' => '  form-control',
                'id' => 'name',
                'required' => 'required',
            ]) !!}
        </div>
        {{ Form::submit('Update Record', ['class' => 'btn btn-primary me-1 data-submit', 'id' => 'submit-data']) }}
        {{ Form::reset('Cancel', ['class' => 'btn btn-outline-secondary', 'data-bs-dismiss' => 'modal']) }}
    </div>
    {!! Form::close() !!}
</div>
