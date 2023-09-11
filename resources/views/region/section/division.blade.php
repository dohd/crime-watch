@if (count($stations)>0)
    
<section >
    <div class="row">
<div class="col-12">
    <div class="card">
        <div class="card-header">
            <h4 class="card-title">{{ $subcounty->name }} SUB-COUNTY </h4>
        </div>
     
        <div class="table-responsive table-wrapper">
            <table class="table table-bordered" id="myTable">
                <thead class="table-dark">
                    <tr>
                       
                        <th>CATEGORY OF OFFENCE</th>
         
                        @foreach ($stations as $station)
                        <th >{{ $station->name }}</th>
                    
                          @endforeach
                          <th >TOTAL</th>
                        
                    </tr>
                </thead>
                <tbody>
                    @foreach ($crimes as $crime)
                   
                    @foreach ($crime->incidences as $incidence)
                    <tr>
                        <td>{{ $incidence->name }}</td>

                      @foreach ($stations as $station)
               
                        <td >{!! Form::number('statistic_value[]', null, [
                          'class' => 'data-input',
                          'id' => 'statistic_value' . $station->id .'_'.$crime->id.'',
                          'data-division-id' => $station->id,
                          'crime-id' => $crime->id,
                          'style' => 'width:40px;',
                      ]) !!}{!! Form::hidden('station_id[]', $station->id) !!} 
                      {!! Form::hidden('incident_file_id[]', $incidence->id) !!}</td>
                       
                          @endforeach
                          <td class="column_total">0</td>
                    </tr>
                    @endforeach
                    <tr class="table-primary">
                        <td>TOTAL</td>
                        @foreach ($stations as $station)
                        <td class="row_total">0</td>
                        @endforeach
                        <td class="total">0</td>
                    </tr>
                    @endforeach
                
                  
                </tbody>
                <tfoot class="table-warning">
                  <tr >
                      <td>TOTAL</td>
                      @foreach ($stations as $station)
                          <th id="rfooter_{{ $station->id }}" class="sub_total">0</th>
                      @endforeach
                      <th class="grand_total">0</th>
                  </tr>
              </tfoot>
            </table>
        </div>
    </div>
</div>
</div>
              
</section>
<section>
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    
                    {{ Form::submit('Save changes', ['class' => 'btn btn-primary me-1 data-submit', 'id' => 'submit-data']) }}
                    {{ Form::reset('Cancel', ['class' => 'btn btn-outline-secondary', 'data-bs-dismiss' => 'modal']) }}
                </div>
            </div>
        </div>
    </div>
</section>
@endif
<script>
      $(document).ready(function() {
            // Add the "fixed-column" class to the first cell in each row (the fixed column)
            $('#myTable tbody tr').each(function() {
                $(this).find('td:first-child').addClass('fixed-column');
            });
        
            
        });   

        $(function() {
            ('use strict');
            var newUserForm = $('.add-new-incidence');
         
            $("#spinner").hide();
            // Form Validation
            if (newUserForm.length) {
                newUserForm.validate({
                    errorClass: 'error',
                    rules: {
                        'name': {
                            required: true
                        }
                    }
                });
                newUserForm.on('submit', function(e) {
                    // var editorContent = fullEditor.root.innerHTML;
                    // document.getElementById('editorContent').value = editorContent;
                    // console.log(editorContent);
                    var isValid = newUserForm.valid();
                    e.preventDefault();
                    if (isValid) {
                        var data = $(this).serialize();
                        $("#spinner").show();
                        $("#submit-data").hide();
                        $.ajax({
                            method: "post",
                            url: $(this).attr("action"),
                            data: new FormData(this),
                            contentType: false,
                            cache: false,
                            processData: false,
                            success: function(result) {
                               // console.log(result);
                                if (result.success == true) {
                                    Swal.fire({
                                        position: 'top-end',
                                        icon: 'success',
                                        title: result.msg,
                                        showConfirmButton: false,
                                        timer: 1500,
                                        customClass: {
                                            confirmButton: 'btn btn-primary'
                                        },
                                        buttonsStyling: false
                                    });
                                    location.reload();
                                } else {
                                    $("#submit-data").show();
                                    $("#spinner").hide();
                                    Swal.fire({
                                        position: 'top-end',
                                        title: 'Error!',
                                        text: result.msg,
                                        icon: 'error',
                                        customClass: {
                                            confirmButton: 'btn btn-primary'
                                        },
                                        buttonsStyling: false
                                    });
                                }
                            }
                        });
                        newUserSidebar.modal('hide');
                    }
                });
            }




        });

         // Function to calculate the column totals
  function calculateColumnTotals() {
    $('.data-input').each(function () {
      const divisionId = $(this).data('division-id');
      console.log(divisionId);
      const crimeId = $(this).data('crime-id');
      const inputValue = parseInt($(this).val()) || 0;

      // Update the respective column total
      const columnTotal = $('.column_total').eq(divisionId - 1);
      columnTotal.text(parseInt(columnTotal.text()) + inputValue);
    });
  }

  // Function to calculate the row totals
  function calculateRowTotals() {
    $('.row_total').each(function () {
      const rowTotal = $(this);
      let total = 0;

      // Sum all data-input values in the row
      $(this).siblings('.data-input').each(function () {
        const inputValue = parseInt($(this).val()) || 0;
        total += inputValue;
      });

      rowTotal.text(total);
    });
  }

  // Function to calculate the grand total
  function calculateGrandTotal() {
    let grandTotal = 0;
    $('.row_total').each(function () {
      grandTotal += parseInt($(this).text()) || 0;
    });

    $('.grand_total').text(grandTotal);
  }

  // Event listener for data input changes
  $('.data-input').on('input', function () {
  //  console.log(2);
    calculateColumnTotals();
    calculateRowTotals();
    calculateGrandTotal();
  });

  // Initial calculation on page load
  calculateColumnTotals();
  calculateRowTotals();
  calculateGrandTotal();


    
</script>