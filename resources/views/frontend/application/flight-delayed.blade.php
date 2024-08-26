
<form id="flight-delayed-1" class="submit-form">
  <div class="main-container">
  
    <div class="search-container">
        <div class="search-box">
          <div class="input-container airport-list-container">
            <i class="fas fa-plane-departure icon"></i>
            <input type="text" id="from" placeholder="From (e.g. London or LHR)" required name="from" class="search-input airportInput">
          </div>
        </div>
    </div>

    <div id="airportList"></div>

    <div class="search-container">
        <div class="search-box">
          <div class="input-container">
            <i class="fas fa-plane-arrival icon"></i>
            <input type="text" id="to" placeholder="To (e.g. Paris or CDG)" required name="to" class="search-input airportInput">
          </div>
        </div>
     </div>
  </div>

  <div class="horizontal-container">
    <!-- Date picker -->
    <div class="calendar-input">
      <label for="dateInput" class="input-label">Select Date</label>
      <input type="date" required id="date" name="date" onfocus="this.max = new Date().toISOString().split('T')[0]">
      <i class="far fa-calendar-alt start-icon"></i>
    </div>

    <!-- Airline Search Box -->
    <div class="search-box">
      <label for="airlineInput" class="input-label">Search Airlines</label>
      <input type="text" id="airline" required placeholder="Airlines" name="airline" class="airlineInput">
    </div>
  </div>

  
  <div class="input-container1">
    <label for="uploadFile" class="upload-label">
      <i class="fas fa-upload"></i>Booking Confirmation/Boarding Pass
    </label>
    <input type="file" id="boarding_pass" required name="boarding_pass" class="upload-input" accept="image/*,.jpg,.jpeg,.png,.pdf">
  </div>
  
  <div class="question">
    <p>How long was the delay of your arrival to the final destination?</p>
  </div>

  <div class="radio-group" data-toggle="buttons">
    <label class="custom-button btn isvalid">
      <input type="radio"  id="delay" name="delay" value="0">Less than 3 hours
    </label>
    <label class="custom-button btn isvalid">
      <input type="radio"  id="delay" name="delay" value="1">More than 3 hours
    </label>
  </div>
  <button type="submit" class="submit-button" >Submit Application</button>
</form>
