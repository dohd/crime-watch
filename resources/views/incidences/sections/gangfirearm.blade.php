<section id="gangfirearm-input" class="{{ $gangfirearm == 1 ? '' : 'hide' }}">
    @php
    $total_no_of_gang = null;
    $no_armed = null;
    $rifle = null;
    $pistol = null;
    $toy_pistol = null;
    $home_made = null;
    $other_weapons = null;
    if ($gangfirearm == 1) {
        $total_no_of_gang = $incidentrecord->gangFirearm->total_no_of_gang;
        $no_armed = $incidentrecord->gangFirearm->no_armed;
        $rifle = $incidentrecord->gangFirearm->rifle;
        $pistol = $incidentrecord->gangFirearm->pistol;
        $toy_pistol = $incidentrecord->gangFirearm->toy_pistol;
        $home_made = $incidentrecord->gangFirearm->home_made;
        $other_weapons = $incidentrecord->gangFirearm->other_weapons;
   
    }
@endphp
    <div class="row">
        <div class="col-md-12">
            <div class="card shadow-none bg-transparent border-primary">
                <div class="card-header">
                    <h4 class="card-title">GANG FIREARM DETAIL</h4>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-xl-3 col-md-6 col-12">
                            <div class="mb-1">
                                <label class="form-label" for="disabledInput">Total Gang No </label>
                                {!! Form::text('total_no_of_gang',$total_no_of_gang,['placeholder' => 'Enter No', 'class'=>'  form-control','id'=> 'total_no_of_gang']) !!}
                            </div>
                        </div>
                        <div class="col-xl-3 col-md-6 col-12">
                            <div class="mb-1">
                                <label class="form-label" for="disabledInput">How Many Armed </label>
                                {!! Form::text('no_armed',$no_armed,['placeholder' => 'Enter No', 'class'=>'  form-control','id'=> 'no_armed']) !!}
                            </div>
                        </div>
                        <div class="col-xl-3 col-md-6 col-12">
                            <div class="mb-1">
                                <label class="form-label" for="disabledInput">Rifle</label>
                                {!! Form::text('rifle',$rifle,['placeholder' => 'Enter No', 'class'=>'  form-control','id'=> 'rifle']) !!}
                            </div>
                        </div>
                        <div class="col-xl-3 col-md-6 col-12">
                            <div class="mb-1">
                                <label class="form-label" for="disabledInput">Pistol</label>
                                {!! Form::text('pistol',$pistol,['placeholder' => 'Enter No', 'class'=>'  form-control','id'=> 'pistol']) !!}
                            </div>
                        </div>
                    </div>

                        <div class="row">
                           


                           
                            <div class="col-xl-3 col-md-6 col-12">
                                <div class="mb-1">
                                    <label class="form-label" for="disabledInput">Toy Pistol</label>
                                    {!! Form::text('toy_pistol',$toy_pistol,['placeholder' => 'Enter No', 'class'=>'  form-control','id'=> 'toy_pistol']) !!}
                                </div>
                            </div>
                            <div class="col-xl-3 col-md-6 col-12">
                                <div class="mb-1">
                                    <label class="form-label" for="disabledInput">Home Made</label>
                                    {!! Form::text('home_made',$home_made,['placeholder' => 'Enter No', 'class'=>'  form-control','id'=> 'home_made']) !!}
                                </div>
                            </div>
                            <div class="col-xl-3 col-md-6 col-12">
                                <div class="mb-1">
                                    <label class="form-label" for="disabledInput">Other Weapons</label>
                                    {!! Form::text('other_weapons',$other_weapons,['placeholder' => 'Enter No', 'class'=>'  form-control','id'=> 'other_weapons']) !!}
                                </div>
                            </div>
                       

                     

                    </div>
                        
                   
                   
                    </div>
                </div>
            </div>
        </div>
    
</section>