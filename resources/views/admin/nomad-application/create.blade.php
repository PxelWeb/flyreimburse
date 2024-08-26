@extends('admin.layout.master')

@section('content')
<section class="section">
    <div class="section-header">
        <h1>Create Application</h1>
    </div>

    <div class="section-body">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h4>Create Nomad Application</h4>
                        <div class="card-header-action">
                            <button class="btn btn-primary passenger-btn">+ Add Passenger</button>
                        </div>
                    </div>
                    <div class="card-body">
                        <form class="submit-application">

                            <div class="form-group">
                                <label>Reason</label>
                                <select id="inputReason" class="form-control" name="reason">
                                    <option value="flight_delayed" selected>Flight Delayed</option>
                                    <option value="flight_cancelled">Flight Cancelled</option>
                                    <option value="transit_loss">Missed Connection</option>
                                    <option value="denied_boarding">Denied Boarding</option>
                                </select>
                            </div>


                            <div class="form-group">
                                <label>Username</label>
                                <input type="text" class="form-control" name="name">
                                <input type="hidden" id="submit-username" name="username">
                            </div>
                            <div class="add-passenger">

                            </div>

                            <div class="form-group">
                                <label>Email</label>
                                <input type="email" class="form-control" name="email">
                            </div>
                            <div class="form-group">
                                <label>Phone Number</label>
                                <input type="text" class="form-control" name="phone_number">
                            </div>
                            <div class="form-group">
                                <label>Booking Number</label>
                                <input type="text" class="form-control" name="booking_number">
                            </div>

                            <div class="form-group">
                                <label>Flight Number</label>
                                <input type="text" class="form-control" name="flight_number">
                            </div>
                            <div class="form-group delay1">
                                <label for="inputState">Delay</label>
                                <select id="inputState" class="form-control" name="delay">
                                    <option value="1" selected >More Than 3 Hours</option>
                                    <option value="0">Less then 3 Hours</option>
                                </select>
                            </div>

                            <div class="form-group delay2" style="display: none;">
                                <label for="inputState">Delay</label>
                                <select id="inputState" class="form-control" name="delay">
                                    <option value="0">More Than 14 Days</option>
                                    <option value="1" selected>Less then 14 Days</option>
                                </select>
                            </div>

                            <div class="form-group">
                                <label>From</label>
                                <select id="" class="form-control select2" name="from">
                                    <option value="">Select</option>
                                    @foreach(config('settings.airports') as $code => $airports)
                                        <option {{'TIA' == $code ? 'selected' : ''}}
                                                value="{{$airports}}">{{$airports.' '.$code}}</option>
                                    @endforeach
                                </select>
                            </div>
                           
                            <div class="form-group">
                                <label>To</label>
                                <select id="" class="form-control select2" name="to">
                                    <option value="">Select</option>
                                    @foreach(config('settings.airports') as $code => $airport)
                                        <option {{'BRI' == $code ? 'selected' : ''}}
                                                value="{{$airport}}">{{$airport.' '.$code}}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="form-group depart" style="display: none;">
                                <label>Depart</label>
                                <select id="" class="form-control select2" name="depart">
                                    <option value="">Select</option>
                                    @foreach(config('settings.airports') as $code => $airport)
                                        <option {{'BRI' == $code ? 'selected' : ''}}
                                                value="{{$airport}}">{{$airport.' '.$code}}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="form-group arrival" style="display: none;">
                                <label>Arrival</label>
                                <select id="" class="form-control select2" name="arrival">
                                    <option value="">Select</option>
                                    @foreach(config('settings.airports') as $code => $airport)
                                        <option {{'BRI' == $code ? 'selected' : ''}}
                                                value="{{$airport}}">{{$airport.' '.$code}}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="form-group">
                                <label>Airline</label>
                                <select id="" class="form-control select2" name="airline">
                                    <option value="">Select</option>
                                    @foreach (config('settings.airlines') as $airline)
                                    <option {{ 'Wizz Air' == $airline ? 'selected' : ''}}
                                            value="{{$airline}}">{{ $airline }}</option>
                                    @endforeach
                                </select>
                            </div>


                             <div class="form-group">
                                <label>Date</label>
                                <input type="date" class="form-control datepicker" name="date" onfocus="this.max = new Date().toISOString().split('T')[0]">
                            </div>


                            <div class="form-group">
                                <label>Passaport</label>
                                <input type="file" class="form-control" name="passaportId">
                            </div>

                            <div class="add-passaport">

                            </div>

                            <div class="form-group">
                                <label>Boarding Pass</label>
                                <input type="file" class="form-control" name="boarding_pass">
                            </div>

                            <div class="add-boarding-pass">

                            </div>

                            <div class="form-group denied_boarding" style="display: none;">
                                <label>Denied Boarding</label>
                                <input type="file" class="form-control" name="denied_boarding">
                            </div>

                            <div class="signature-container">
                                <label for="signature">Your signature:</label>
                                <canvas width="250" height="140" id="sign-0" class="signature-canvas"></canvas>
                                <input type="hidden" id="sign-0-data" name="signature-0" value="">
                                <div class="button1">
                                  <button type="button" class="clear-button" data-id="0">Clear</button>
                                </div>
                            </div>
                            <div class="add-signature">

                            </div>
                            <button type="submit" class="btn btn-primary submit-btn">Create</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection

@push('scripts')
<script>
    $(document).ready(function (){
        let maxNum = 4; 
        let num = 0;
        $('#inputReason').on('change',function(){
            var selectedValue = $(this).val();
            
            if(selectedValue == 'transit_loss'){
                $('.depart').show();
                $('.arrival').show();
                $('.delay1').show();
                $('.denied_boarding').hide();
                $('.delay2').hide()

            }else if (selectedValue == 'denied_boarding'){
                $('.denied_boarding').show();
                $('.delay1').show();
                $('.depart').hide();
                $('.arrival').hide();
                $('.delay2').hide()

            }else if (selectedValue == 'flight_cancelled'){
                $('.delay2').show();
                $('.delay1').hide();
                $('.depart').hide();
                $('.arrival').hide();
                $('.denied_boarding').hide();

            }else{
                $('.delay1').show();
                $('.depart').hide();
                $('.arrival').hide();
                $('.denied_boarding').hide();
                $('.delay2').hide()
            }
        })
        $('.passenger-btn').on('click', function(){
         if (num >= maxNum) {
  // Alert or handle the maximum limit reached
         alert('Maximum number of passengers reached');
          return;
          }else{
            num++;
            var uniqueId = num;

            var $inputGroupPassenger = $('<div class="form-group" data-id="'+uniqueId+'">');
            var $inputLabelUsername = $('<label>Username</lablel>');
            var $inputFieldUsername = $('<input type="text" class="form-control" name="name">')
            var $removeButton = $('<button type="button" class="remove-button"><i class="fas fa-minus"></i></button>');

            $inputGroupPassenger.append($inputLabelUsername);
            $inputGroupPassenger.append($inputFieldUsername);
            $inputGroupPassenger.append($removeButton);
            $('.add-passenger').append($inputGroupPassenger);


  var $inputGroupPassaport = $('<div class="form-group" data-id="'+uniqueId+'">');
  var $inputLabelPassaport = $('<label>Passaport</label>');
  var $inputFilePassaport = $('<input type="file" class="form-control" id="passaport" required name="passaportId">');

  $inputGroupPassaport.append($inputLabelPassaport);
  $inputGroupPassaport.append($inputFilePassaport);
  $('.add-passaport').append($inputGroupPassaport);

//   var $inputGroupBoarding = $('<div class="form-group" data-id="'+uniqueId+'">');
//   var $inputLabelBoarding = $('<label>Boarding Pass')


  var $inputSignature = $('<div class="signature-container" data-id="'+uniqueId+'">');
  var $inputCanvas = $('<canvas width="250" height="140" id="sign-'+uniqueId+'" class="signature-canvas">');
  var $hiddenInput = $('<input type="hidden" id="sign-'+uniqueId+'-data" name="signature-'+uniqueId+'" value="">');
  var $clearButton = $('<div class="button1"><button type="button" class="clear-button" data-id="'+uniqueId+'">Clear</button></div>');

  $inputSignature.append($inputCanvas);
  $inputSignature.append($hiddenInput);
  $inputSignature.append($clearButton);
  $('.add-signature').append($inputSignature);

  attachDrawingEvents(uniqueId);
}
});
// Optional: Add functionality to remove added elements
$('.add-passenger').on('click', '.remove-button', function(){
      var uniqueId = $(this).closest('.form-group').data('id');
        $('[data-id="' + uniqueId + '"]').remove();
        num--;
    });

    function preventTouchScroll(event) {
        event.preventDefault();
        }

        function updateHiddenInput(id) {
            var canvas = document.getElementById('sign-' + id);
            var dataUrl = canvas.toDataURL();
            $('#sign-' + id + '-data').val(dataUrl);
        }

    function getOffset(e) {
    var offsetX, offsetY;
    if (e.type.includes('touch')) {
        var rect = canvas.getBoundingClientRect();
        offsetX = e.touches[0].clientX - rect.left;
        offsetY = e.touches[0].clientY - rect.top;
    } else {
        offsetX = e.offsetX;
        offsetY = e.offsetY;
    }
    return { offsetX, offsetY };
   }

var canvas = $('#sign-0')[0];
var context = canvas.getContext('2d');
var isDrawing = false;
// Start drawing
$('#sign-0').on('mousedown touchstart', function(e) {
    isDrawing = true;
    context.beginPath();
    var { offsetX, offsetY } = getOffset(e);
    context.moveTo(offsetX, offsetY);
    updateHiddenInput('0');
    canvas.addEventListener('touchmove', preventTouchScroll, { passive: false });
});

// Continue drawing
$('#sign-0').on('mousemove touchmove', function(e) {
    if (isDrawing) {
        var { offsetX, offsetY } = getOffset(e);
        context.lineTo(offsetX, offsetY);
        context.stroke();
        updateHiddenInput('0');
    }
});

$('#sign-0').on('mouseup touchend', function() {
    isDrawing = false;
    canvas.removeEventListener('touchmove', preventTouchScroll);
    updateHiddenInput('0');
});

  // Attach drawing events to the canvas
function attachDrawingEvents(id) {
    var canvas = $('#sign-' + id)[0];
    var context = canvas.getContext('2d');
    var isDrawing = false;

    // Start drawing
    $('#sign-' + id).on('mousedown touchstart', function(e) {
        isDrawing = true;
        context.beginPath();
        var { offsetX, offsetY } = getOffset(e);
        context.moveTo(offsetX, offsetY);
        canvas.addEventListener('touchmove', preventTouchScroll, { passive: false });
        updateHiddenInput(id);
    });

    // Continue drawing
    $('#sign-' + id).on('mousemove touchmove', function(e) {
        if (isDrawing) {
            var { offsetX, offsetY } = getOffset(e);
            context.lineTo(offsetX, offsetY);
            context.stroke();
            updateHiddenInput(id);
        }
    });

    // Stop drawing
    $('#sign-' + id).on('mouseup touchend', function() {
        isDrawing = false;
        canvas.removeEventListener('touchmove', preventTouchScroll);
        updateHiddenInput(id);
    });
} 

   // Event delegation for the clear button
   $(document).on('click', '.clear-button', function() {
                var uniqueId = $(this).data('id');
                var canvas = document.getElementById('sign-' + uniqueId);
                var context = canvas.getContext('2d');
                context.clearRect(0, 0, canvas.width, canvas.height);
                $('#sign-' + uniqueId + '-data').val('');
    });


    $('.submit-application').on('submit',function(event){
        event.preventDefault();
        var formData = new FormData();

        let submitButton = $('.submit-btn');
        submitButton.prop('disabled',true);

        var allSignaturesFilled = true;
        $('.signature-canvas').each(function(){
            var id = $(this).attr('id').split('-')[1];
            if($('#sign-' + id + '-data').val() === ''){
                alert('Please Sign The Fields!');
                submitButton.prop('disabled',false)
                allSignaturesFilled = false;
                return false;
            }
        });

        if(allSignaturesFilled){
            var usernames = [];
            $('input[name="name"]').each(function(){
                usernames.push($(this).val());
            });
            $('#submit-username').val(usernames.join(','));

            var passaportFiles = $('input[name=passaportId]').map(function(){
                return this.files;
            }).get();

            for (var i = 0; i < passaportFiles.length; i++){
                if (passaportFiles[i].length > 0){
                    for (var j = 0; j < passaportFiles[i].length; j++){
                        formData.append('passaport[]',passaportFiles[i][j]);
                    }
                }
            }

            let submitForm = $(this)[0];
            let submitFormData = new FormData(submitForm);
            submitFormData.forEach((value,key)=>{
                formData.append(key,value);
            });
            $('canvas.signature-canvas').each(function(index,canvas){
                var dataUrl = canvas.toDataURL('image/png');
                formData.append('sign[]',dataURLtoBlob(dataUrl),'signature.png');
            });

            $.ajax({
                url: '{{ route('admin.nomad-application.store') }}',
                type: 'POST',
                data: formData,
                contentType: false,
                processData: false,
                success: function(data){
                    if(data.status == 'success'){
                        toastr.success(data.message);
                        setTimeout(function() {
                             window.location.reload();
                            }, 1000);
                    }
                },error: function(error) {
                    submitButton.prop('disabled',false);
                    var errors = error.responseJSON.errors;
                    if (errors) {
                        console.log(errors);
                        $.each(errors, function(index, error) {
                            toastr.error(error);
                        });
                    } else {
                        toastr.error('An unknown error occurred.');
                    }
                }
            })
        }
    })

    function dataURLtoBlob(dataUrl) {
        const byteString = atob(dataUrl.split(',')[1]);
        const mimeString = dataUrl.split(',')[0].split(':')[1].split(';')[0];
        const ab = new ArrayBuffer(byteString.length);
        const ia = new Uint8Array(ab);
        for (let i = 0; i < byteString.length; i++) {
          ia[i] = byteString.charCodeAt(i);
        }
        return new Blob([ab], { type: mimeString });
      }

    
})
</script>
@endpush
