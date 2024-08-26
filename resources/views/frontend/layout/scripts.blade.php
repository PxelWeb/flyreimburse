@push('scripts')
<script>
    $(document).ready(function(){
      // Event delegation for the clear button
      $(document).on('click', '.clear-button', function() {
                var uniqueId = $(this).data('id');
                var canvas = document.getElementById('sign-' + uniqueId);
                var context = canvas.getContext('2d');
                context.clearRect(0, 0, canvas.width, canvas.height);
                $('#sign-' + uniqueId + '-data').val('');
            });
        var formData = new FormData();
        var passagerToAppend = '';

    let maxNum = 4; 
    let num = 0;

    $('.passenger-btn').on('click', function(){

      if (num >= maxNum) {
        // Alert or handle the maximum limit reached
        alert('Maximum number of passengers reached');
        return;
    }else{
      var passenger = $(this).data('value');
      num++;
      var uniqueId = num;
      console.log(uniqueId);

        var $inputGroup = $('<div class="input-group" data-id="'+uniqueId+'"></div>');
        var $inputField = $('<input class="input-field" type="text" name="name" required maxlength="30" />');
        var $removeButton = $('<button type="button" class="remove-button" style="margin-top:10px"><i class="fas fa-minus"></i></button>');
        $inputField.attr('placeholder', passenger);

      
        $inputGroup.append($inputField);
        $inputGroup.append($removeButton);
        $('.inputs-container-1').append($inputGroup);

        var $inputGroupPassaport = $('<div class="input-container-1" data-id="'+uniqueId+'">');
        var $inputLabel = $('<label for="uploadFile" class="uploadPassaport">');
        var $inputFile = $('<input type="file" id="passaport" required name="passaportId">');

        $inputGroupPassaport.append($inputLabel);
        $inputGroupPassaport.append($inputFile);
        $('#passaport-input').append($inputGroupPassaport);
    

        var $inputSignature = $('<div class="signature-container" data-id="'+uniqueId+'">');
        var $inputCanvas = $('<canvas width="250" height="140" id="sign-'+uniqueId+'" class="signature-canvas">');
        var $hiddenInput = $('<input type="hidden" id="sign-'+uniqueId+'-data" name="signature-'+uniqueId+'" value="">');
        var $clearButton = $('<div class="button1"><button type="button" class="clear-button" data-id="'+uniqueId+'">Clear</button></div>');

        $inputSignature.append($inputCanvas);
        $inputSignature.append($hiddenInput);
        $inputSignature.append($clearButton);
        $('#signature-input').append($inputSignature);

        attachDrawingEvents(uniqueId);

    }
    });
    
    // Optional: Add functionality to remove added elements
    $('.inputs-container-1').on('click', '.remove-button', function(){
      var uniqueId = $(this).closest('.input-group').data('id');
        $('[data-id="' + uniqueId + '"]').remove();
        num--;
    });

$('#flight-delayed-1').on('submit',function(event){
    event.preventDefault();
    

    var isChecked = $("input[name='delay']:checked").length > 0;
    if(isChecked){
    let firstForm = $(this)[0];
    let firstFormData = new FormData(firstForm);
    firstFormData.forEach((value, key)=>{
      formData.append(key,value)
    });
    var reason = $('.filter-button.active').data('reason');
    formData.append('reason',reason);
    console.log(formData);

    // console.log(this.formData);
    $('.first-form').hide();
    $('.second-form').show();
  }else{
    $('.isvalid').addClass('invalid');
  }
});

$('#flight-cancelled-1').on('submit',function(event){
    event.preventDefault();

    var isChecked = $("input[name='delay']:checked").length > 0;
    if(isChecked){
    let firstForm = $(this)[0];
    let firstFormData = new FormData(firstForm);
    firstFormData.forEach((value, key)=>{
      formData.append(key,value)
    });
    var reason = $('.filter-button.active').data('reason');
    formData.append('reason',reason);


    // console.log(this.formData);
    $('.first-form').hide();
    $('.second-form').show();
  }else{
    $('.isvalid').addClass('invalid');
  }
});

$('#denied-boarding-1').on('submit',function(event){
    event.preventDefault();

    var isChecked = $("input[name='delay']:checked").length > 0;
    if(isChecked){
    let firstForm = $(this)[0];
    let firstFormData = new FormData(firstForm);
    firstFormData.forEach((value, key)=>{
      formData.append(key,value)
    });
    var reason = $('.filter-button.active').data('reason');
    formData.append('reason',reason);

    // console.log(this.formData);
    $('.first-form').hide();
    $('.second-form').show();
  }else{
    $('.isvalid').addClass('invalid');
  }
});

$('#transit-loss-1').on('submit',function(event){
    event.preventDefault();

    var isChecked = $("input[name='delay']:checked").length > 0;
    if(isChecked){
    let firstForm = $(this)[0];
    let firstFormData = new FormData(firstForm);
    firstFormData.forEach((value, key)=>{
      formData.append(key,value)
    });
    var reason = $('.filter-button.active').data('reason');
    formData.append('reason',reason);

    // console.log(this.formData);
    $('.first-form').hide();
    $('.second-form').show();
  }else{
    $('.isvalid').addClass('invalid');
  }
});

        function preventTouchScroll(event) {
        event.preventDefault();
        }

        function updateHiddenInput(id) {
            var canvas = document.getElementById('sign-' + id);
            var dataUrl = canvas.toDataURL();
            $('#sign-' + id + '-data').val(dataUrl);
        }


      //start signature
      function attachDrawingEvents(id){
        var canvas = $('#sign-'+id)[0];
    var context = canvas.getContext('2d');
    var isDrawing = false;

    $('#sign-'+id).on('mousedown touchstart', function(e) {
      isDrawing = true;
        context.beginPath();
        var offsetX = e.offsetX || e.originalEvent.touches[0].pageX - canvas.offsetLeft;
        var offsetY = e.offsetY || e.originalEvent.touches[0].pageY - canvas.offsetTop;
        context.moveTo(offsetX, offsetY);
        // Prevent scrolling during touch interaction
        canvas.addEventListener('touchmove', preventTouchScroll);
        updateHiddenInput(id);
    });
    $('#sign-'+id).on('mousemove touchmove', function(e) {
         if (isDrawing) {
            var offsetX = e.offsetX || e.originalEvent.touches[0].pageX - canvas.offsetLeft;
            var offsetY = e.offsetY || e.originalEvent.touches[0].pageY - canvas.offsetTop;
            context.lineTo(offsetX, offsetY);
            context.stroke();
            updateHiddenInput(id);
        }
    });
    $('#sign-'+id).on('mouseup touchend', function() {
        isDrawing = false;
        // Allow scrolling again after touch interaction ends
        canvas.removeEventListener('touchmove', preventTouchScroll);
        updateHiddenInput(id);
    });
  }
   //end signature 
    var canvas = $('#sign-0')[0];
    var context = canvas.getContext('2d');
    var isDrawing = false;

    $('#sign-0').on('mousedown touchstart', function(e) {
      isDrawing = true;
        context.beginPath();
        var offsetX = e.offsetX || e.originalEvent.touches[0].pageX - canvas.offsetLeft;
        var offsetY = e.offsetY || e.originalEvent.touches[0].pageY - canvas.offsetTop;
        context.moveTo(offsetX, offsetY);
        // Prevent scrolling during touch interaction
        canvas.addEventListener('touchmove', preventTouchScroll);
        updateHiddenInput('0');
    });
    $('#sign-0').on('mousemove touchmove', function(e) {
        if (isDrawing) {
            var offsetX = e.offsetX || e.originalEvent.touches[0].pageX - canvas.offsetLeft;
            var offsetY = e.offsetY || e.originalEvent.touches[0].pageY - canvas.offsetTop;
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
   //end signature  


$('#secondForm').on('submit',function(event){
          event.preventDefault();

          let submitButton = $('.submit-button-1');
         // Change the button state to show loading process
         submitButton.prop('disabled', true).text('Loading...').addClass('loading');

        var usernameValid = true;
        var namePattern = /^[a-zA-Z]+ [a-zA-Z]+$/;

        $('input[name="name"]').each(function() {
            if (!namePattern.test($(this).val())) {
              alert('Please enter your full name')
               submitButton.prop('disabled', false).text('Submit Application').removeClass('loading');
                usernameValid = false;
                return false; // Exit loop if any field is invalid
            }
        });

         var allSignaturesFilled = true;

            $('.signature-canvas').each(function() {
                var id = $(this).attr('id').split('-')[1];
                if ($('#sign-' + id + '-data').val() === '') {
                    alert('please sign the fields!');
                    submitButton.prop('disabled', false).text('Submit Application').removeClass('loading');
                    allSignaturesFilled = false;
                    return false;
                  }
              });

              if (allSignaturesFilled && usernameValid) {
                if($('.agree_term').prop('checked')){
                  var usernames = [];
         $('input[name="name"]').each(function(){
            usernames.push($(this).val());
          });
          $('#submit-username').val(usernames.join(','));
          //collect all passaport fields
          var passportFiles = $('input[name="passaportId"]').map(function() {
            return this.files;
        }).get();

        // Append passport files to FormData
        for (var i = 0; i < passportFiles.length; i++) {
            if (passportFiles[i].length > 0) {
                for (var j = 0; j < passportFiles[i].length; j++) {
                    formData.append('passaport[]', passportFiles[i][j]);
                }
            }
        }

          let secondForm = $(this)[0];
          let secondFormData = new FormData(secondForm);
          secondFormData.forEach((value,key)=>{
            formData.append(key,value);
          });
          // Add signature data
          $('canvas.signature-canvas').each(function(index, canvas) {
                var dataURL = canvas.toDataURL('image/png');
                formData.append('sign[]',dataURLtoBlob(dataURL),'signature.png');
            });

                $.ajax({
              url: '{{ route('store') }}',
              type: 'POST',
              data: formData,
              contentType: false,
              processData: false,
              success: function(data){
                if(data.status == 'success'){
                  $('.second-form').hide();
                  $('#success-message').show()
                  window.scrollTo({ top: 0, behavior: 'smooth' });
                }else{
                  submitButton.prop('disabled', false).text('Submit Application').removeClass('loading');
                }
              },error: function(data){
                console.error(data);
                $('.second-form').hide();
                $('#error-message').show();
                window.scrollTo({ top: 0, behavior: 'smooth' });
              }
            });
          }else{
            submitButton.prop('disabled', false).text('Submit Application').removeClass('loading');
            alert('You have to agree website terms and conditions');
          }
        }
      });

           // Helper function to convert data URL to Blob
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
});
</script>
@endpush