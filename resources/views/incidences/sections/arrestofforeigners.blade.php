<section id="arrestoffeoreigners-input" class="{{ $arrest_of_foreigners == 1 ? '' : 'hide' }}">
    @php
        $f_place = null;
        $f_no_of_arrest = null;
        $f_nationality = null;
        if ($arrest_of_foreigners == 1) {
            $f_place = $incidentrecord->arrestOfForeigners->f_place;
            $f_no_of_arrest = $incidentrecord->arrestOfForeigners->f_no_of_arrest;
            $f_nationality = $incidentrecord->arrestOfForeigners->f_nationality;
        }
    @endphp
    <div class="row">
        <div class="col-md-12">
            <div class="card shadow-none bg-transparent border-primary">
                <div class="card-header">
                    <h4 class="card-title">AREST OF FOREIGNERS</h4>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-xl-4 col-md-6 col-12">
                            <div class="mb-1">
                                <label class="form-label" for="disabledInput">Place </label>
                                {!! Form::text('f_place', $f_place, [
                                    'placeholder' => 'Enter Place',
                                    'class' => '  form-control',
                                    'id' => 'place',
                                ]) !!}
                            </div>
                        </div>
                        <div class="col-xl-4 col-md-6 col-12">
                            <div class="mb-1">
                                <label class="form-label" for="disabledInput">No Of Arrest </label>
                                {!! Form::text('f_no_of_arrest', $f_no_of_arrest, [
                                    'placeholder' => 'Enter No Of Arrest',
                                    'class' => '  form-control',
                                    'id' => 'no_of_arrest',
                                ]) !!}
                            </div>
                        </div>
                        <div class="col-xl-4 col-md-6 col-12">
                            <div class="mb-1">
                                <label class="form-label" for="disabledInput">Nationality </label>
                                {!! Form::select('f_nationality', $countries, $f_nationality, [
                                    'placeholder' => '-- Select Nationality --',
                                    'class' => ' select2 form-control',
                                    'id' => 'nationality',
                                ]) !!}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
