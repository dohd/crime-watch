<div class="modal-dialog">
    {{ Form::model($incidentfile, ['route' => ['incidentfile.update', $incidentfile], 'class' => 'edit-incidentfile modal-content pt-0', 'role' => 'form', 'method' => 'PUT', 'id' => 'edit_incidentfile']) }}

    @php
        $is_regional=false;
        if($incidentfile->is_regional==1){
            $is_regional=true;

        }
        $is_drug=false;
        if($incidentfile->is_drug==1){
            $is_drug=true;

        }
        $is_sgbv=false;
        if($incidentfile->is_sgbv==1){
            $is_sgbv=true;

        }
    @endphp

        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">×</button>
        <div class="modal-header mb-1">
            <h5 class="modal-title" id="exampleModalLabel">Edit  Incident File </h5>
        </div>
        <div class="modal-body flex-grow-1">
            <div class="mb-1">
                <label class="form-label" for="basic-icon-default-name">Category</label>
                {!! Form::select('crime_category_id',$category,null,['placeholder' => '-- Enter Category --', 'class'=>' select2 form-control','id'=> 'crime_category_id','required'=>'required']) !!}

            </div>
            <div class="mb-1">
                <label class="form-label" for="basic-icon-default-name">DOR  Or DCIR</label>
                {!! Form::select('is_dcir',['1'=>'DCIR','0'=>'DOR'],null,['placeholder' => '-- Select If Bas Or Post --', 'class'=>' select2 form-control','id'=> 'is_dcir','required'=>'required']) !!}
            </div>
         
            <div class="mb-1">
                <label class="form-label" for="basic-icon-default-name">Name</label>
                {!! Form::text('name',null,['placeholder' => 'Enter  Name', 'class'=>'  form-control','id'=> 'name','required'=>'required']) !!}
            </div>
            <div class="mb-1">
                <div class="demo-inline-spacing">
                    <div class="col-xl-6 nNnncNnol-md-6 col-12">
                        <div class="form-check form-check-inline">
                            {!! Form::checkbox('is_drug', '1', $is_drug, [
                                'class' => ' checkbox form-check-input',
                                'id' => 'is_drug',
                                'data-target' => 'is_drug',
                            ]) !!}
                            <label class="form-check-label" for="is_drug">Drug Incidence</label>
                        </div>
                    </div>
                    <div class="col-xl-6 nNnncNnol-md-6 col-12">
                        <div class="form-check form-check-inline">
                            {!! Form::checkbox('is_sgbv', '1', $is_sgbv, [
                                'class' => 'checkbox form-check-input',
                                'id' => 'is_sgbv',
                                'data-target' => 'mobinjustice-input',
                            ]) !!}
                            <label class="form-check-label" for="is_sgbv">Sbvg Incidence</label>
                        </div>
                    </div>
                    <div class="col-xl-6 nNnncNnol-md-6 col-12">
                      <div class="form-check form-check-inline">
                          {!! Form::checkbox('is_regional', '1', $is_regional, [
                              'class' => 'checkbox form-check-input',
                              'id' => 'is_regional',
                              'data-target' => 'is_regional',
                          ]) !!}
                          <label class="form-check-label" for="is_regional">Region Incidence</label>
                      </div>
                  </div>
                    
                   
                </div>
              </div>

       
            {{ Form::submit('Update Record', ['class' => 'btn btn-primary me-1 data-submit','id'=>'submit-data']) }}
            {{ Form::reset('Cancel', ['class' => 'btn btn-outline-secondary','data-bs-dismiss'=>'modal']) }}


        </div>
        {!! Form::close() !!}
</div>