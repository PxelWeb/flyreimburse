<div class="box-1 second-form" style="display: none;">
    <h6>Please fill in the passenger details as in the ticket.</h6>
    <div class="form-container-1">
      <form id="secondForm" class="submit-form form2">
        <input type="hidden" name="username" id="submit-username">
        <div class="input-container-1">
          <input type="text" id="username" name="name" placeholder="Full name, as in passport" required maxlength="30">
          <i class="fas fa-user"></i>
        </div>
        
        {{-- input-for-passenger --}}
        <div class="inputs-container-1">
        </div>
  
        <div class="text">
          <p>Are you multiple passengers on the same ticket reservation code?
            Click the button because of age.</p>
        </div>
        <div class="buttons-container">
          <button type="button" class="passenger-btn" data-value="Adult">+18 (Adult)</button>
          <button type="button" class="passenger-btn" data-value="Child">-18 (Child)</button>
        </div>
        <div class="input-container-1">
          <input type="email" id="email" name="email" placeholder="E-mail" required pattern="[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}">
          <i class="fas fa-envelope"></i>
        </div>
  
        <div class="input-container-1">
          <input type="tel" id="phone_numbe" name="phone_number" placeholder="Phone number" pattern="[\+\0-9\s\-\(\)]*" required maxlength="30">
          <i class="fas fa-phone"></i>
        </div>
        <div class="input-container-1">
          <input type="text" id="flight_number" name="flight_number" placeholder="Flight number" required maxlength="10">
          <i class="fas fa-plane"></i>
        </div>
  
        <div class="input-container-1">
          <input type="text" id="booking_number" name="booking_number" placeholder="Booking number" required maxlength="10">
          <i class="fas fa-calendar-alt"></i>
        </div>
  
        <div class="input-container-1">
          <label for="uploadFile" class="uploadPassport">
            <i class="fas fa-upload" style="margin-top: 12px"></i>Upload Photo for Passport or Identity Card
          </label>
          <input type="file" id="passaport" name="passaportId" required accept="image/*,.jpg,.jpeg,.png,.pdf">
        </div>
        
        <div id="passaport-input">
        </div>
  
        <div class="signature-container">
          <label for="signature">Your signature:</label>
          <canvas width="250" height="140" id="sign-0" class="signature-canvas"></canvas>
          <input type="hidden" id="sign-0-data" name="signature-0" value="">
          <div class="button1">
            <button type="button" class="clear-button" data-id="0">Clear</button>
          </div>
        </div>
        <div id="signature-input">
        </div>
        <div class="terms_area">
          <div class="form-check">
              <input class="form-check-input agree_term" type="checkbox" value="" id="flexCheckChecked3">
              <label class="form-check-label" for="flexCheckChecked3">
                 I agree to the <a target="_blank" href="{{ route('terms-and-conditions') }}">Terms and Conditions</a> and <a target="_blank" href="{{ route('privacy-policy') }}">Privacy Statement</a>.</a>
              </label>
          </div>
      </div>
        <button type="submit" class="submit-button-1">Submit Application</button>
      </form>
    </div>
</div>