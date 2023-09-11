<section id="moneymatters-input" class="{{ $money_matters == 1 ? '' : 'hide' }}">
    @php
    $amount = null;
    $currency = null;
    $m_no_of_arrest = null;
    $circumstances = null;
    if ($money_matters == 1) {
        $amount = $incidentrecord->moneyMatter->amount;
        $currency = $incidentrecord->moneyMatter->currency;
        $m_no_of_arrest = $incidentrecord->moneyMatter->m_no_of_arrest;
        $circumstances = $incidentrecord->moneyMatter->circumstances;
       
    }
@endphp
    <div class="row">
        <div class="col-md-12">
            <div class="card shadow-none bg-transparent border-primary">
                <div class="card-header">
                    <h4 class="card-title">MONEY MATTERS</h4>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-xl-3 col-md-6 col-12">
                            <div class="mb-1">
                                <label class="form-label" for="disabledInput">Amount </label>
                                {!! Form::number('amount',$amount,['placeholder' => 'Enter Amount', 'class'=>'  form-control','id'=> 'amount']) !!}
                            </div>
                        </div>
                        <div class="col-xl-3 col-md-6 col-12">
                            <div class="mb-1">
                                <label class="form-label" for="disabledInput">Currency </label>
                                {!! Form::text('currency',$currency,['placeholder' => 'Enter Currency', 'class'=>'  form-control','id'=> 'currency']) !!}
                            </div>
                        </div>
                        <div class="col-xl-3 col-md-6 col-12">
                            <div class="mb-1">
                                <label class="form-label" for="disabledInput">No. Of Arrest </label>
                                {!! Form::text('m_no_of_arrest',$m_no_of_arrest,['placeholder' => 'Enter No Of Arrest', 'class'=>'  form-control','id'=> 'm_no_of_arrest']) !!}
                            </div>
                        </div>
                        <div class="col-xl-3 col-md-6 col-12">
                            <div class="mb-1">
                                <label class="form-label" for="disabledInput">Circumstances </label>
                                {!! Form::text('circumstances',$circumstances,['placeholder' => 'Enter Circumstances', 'class'=>'  form-control','id'=> 'circumstances']) !!}
                            </div>
                        </div>
                    </div>
                        
                   
                   
                    </div>
                </div>
            </div>
        </div>

</section>