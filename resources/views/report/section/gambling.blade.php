<div class="row" id="table-striped">
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title ">GAMBLING REPORT </h4>
                <a class="btn btn-warning" href="{{ route('print-special-report', request()->getQueryString()) }}" target="_blank">
                    <i data-feather="printer" class="me-25 text-white"></i>
                    <span>Print</span>
                </a> 
        </div>
            <div class="card-body">
                <p class="card-text">
                    From <code class="highlighter-rouge">{{ dateFormat($datefrom) }}</code>To<code class="highlighter-rouge">{{ dateFormat($dateto) }}</code>
                </p>
            </div>
            <div class="table-responsive">
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th >County</th>
                            <th colspan="2">MACHINES</th>
                            <th  colspan="2">CARDS</th>
                            <th  colspan="2">POOL</th>
                            <th  >TOTAL</th>
                        </tr>
                        <tr>
                            <th></th>
                            @foreach (range(1,3) as $value)
                                <th>Arrest</th>
                                <th>Number</th>
                            @endforeach
                            <th>Arrest</th>
                        </tr>
                    </thead>
                    <tbody>
                        @php
                            $total_m_arrest=0;
                            $total_m_no=0;
                            $total_c_arrest_no=0;
                            $total_c_no=0;
                            $total_p_arrest_no=0;
                            $total_p_no=0;
                        @endphp
                        @foreach ($counties as $county )
                            @php
                                $total_m_arrest+=$county->incidences->sum('gambling.m_arrest_no');
                                $total_m_no+=$county->incidences->sum('gambling.m_no');
                                $total_c_arrest_no+=$county->incidences->sum('gambling.c_arrest_no') ;
                                $total_c_no+=$county->incidences->sum('gambling.c_no');
                                $total_p_arrest_no+=$county->incidences->sum('gambling.p_arrest_no');
                                $total_p_no+=$county->incidences->sum('gambling.p_no');
                            @endphp
                            <tr>
                                <td>
                                    {{ $county->name }}
                                </td>
                                <td>{{ $county->incidences->sum('gambling.m_arrest_no') }}</td>
                                <td>{{ $county->incidences->sum('gambling.m_no') }}</td>
                                <td>{{ $county->incidences->sum('gambling.c_arrest_no') }}</td>
                                <td>{{ $county->incidences->sum('gambling.c_no') }}</td>
                                <td>{{ $county->incidences->sum('gambling.p_arrest_no') }}</td>
                                <td>{{ $county->incidences->sum('gambling.p_no') }}</td>
                                <td>{{ $county->incidences->sum('gambling.m_arrest_no') + $county->incidences->sum('gambling.c_arrest_no')+ $county->incidences->sum('gambling.p_arrest_no') }}</td>
                            
                            
                            </tr>
                        @endforeach
                    </tbody>
                    <tfoot>
                        <tr>
                            <td>TOTAL</td>
                            <th  class="ams_total">{{ $total_m_arrest }}</th>
                            <th  class="afs_total">{{ $total_m_no }}</th>
                            <th class="amg_total">{{ $total_c_arrest_no }}</th>
                            <th class="afg_total">{{ $total_c_no }}</th>
                            <th class="amg_total">{{ $total_p_arrest_no }}</th>
                            <th class="afg_total">{{ $total_p_no }}</th>
                            <th class="afg_total">{{ $total_m_arrest + $total_c_arrest_no + $total_p_arrest_no }}</th>
                        </tr>
                    </tfoot>
                </table>
            </div>
        </div>
    </div>
</div>

