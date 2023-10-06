<section id="basic-input">
    <div class="card bg-primary text-white">
        <div class="card-header">
            <h4 class="card-title text-white">
                @if (request('is_dcir'))
                    DAILY CRIME INCIDENCE REPORT [NO: {{ $report_numbers }}]
                @else
                    DAILY OPERATION REPORT [NO: {{ $report_numbers }}]
                @endif
            </h4>
            <a class="btn btn-warning" href="{{ route('print-dcir-report', [encrypt_data($report_numbers),encrypt_data($is_dcir)]) }}" target="_blank">
                <i data-feather="printer" class="me-25 text-white"></i>
                <span>Print</span>
            </a> 
    </div>
</div>
</div>

    @foreach ($counties as $county )
    <div class="row">
        <div class="col-md-12">
           
           
            <div class="card shadow-none bg-transparent border-primary ">
                <div class="card-header">
                    <h4 class="card-title">COUNTY: {{ $county->name }}</h4>
                </div>
                <div class="card-content">
                    <div class="card-body">
                        @foreach($county->divisions as $division )
                       
                        @foreach($division->divincidences as $incidence)
                        <h5> DIVISION: {{ $division->name }}</h5>
                        <p class="card-text">
                            {!! $incidence->description !!}
                        </p>
                        @endforeach
                        @endforeach
                    </div>
                </div>
            </div>


        </div>
    </div>
    @endforeach
</section>

<script>
    feather.replace();
    // Add the custom color class to the icon
    const iconElement = document.querySelector('i[data-feather="printer"]');
   // iconElement.classList.add('feather-icon-red');
  </script>


