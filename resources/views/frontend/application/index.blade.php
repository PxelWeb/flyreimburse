@extends('frontend.layout.master')
@section('assets')
<link rel="stylesheet" href="{{ asset('frontend/style.css') }}">
<link rel="stylesheet" href="{{ asset('frontend/second-form.css') }}">
   <style>
        .ui-autocomplete {
            max-height: 150px; /* Adjust the height as needed */
            overflow-y: auto; /* Add vertical scrollbar */
            overflow-x: hidden; /* Hide horizontal scrollbar */
        }
        .ui-menu-item {
            padding: 5px; /* Add padding for better readability */
        }
        .ui-menu-item-wrapper:hover {
            background-color: #004aad !important; /* Change the background color on hover */
        }
    </style>
@endsection
@section('content')
<div id="success-message" class="alert alert-success" role="alert" style="display:none !important;">
  <i class="fa fa-check-circle" style="font-size:48px;"></i>
  <span style="margin-top:20px;display:block;">Application Submited Succesfully!</span>
</div>
<div id="error-message" class="alert alert-danger" role="alert" style="display:none !important;">
  <i class="fas fa-times" style="font-size: 48px;"></i>
  <span style="margin-top:20px;display:block;">Something Went Wrong! <br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Try Again Later</span>
</div>
<div class="box first-form">
    <h6>Has your flight been delayed or cancelled?</h6>
  <p>You may be entitled to up to €600 of compensation in case your flight has been delayed,
     cancelled or if you have been denied boarding in the last 6 years.</p>
  <p>What happeneeeed?</p>


  
  <div class="buttons" role="tablist">
    <button type="button" class="filter-button active" id="delayed-tab" data-toggle="tab" href="#flight-delayed" role="tab" aria-controls="flight-delayed" aria-selected="true" data-reason="flight_delayed">FLIGHT<br>DELAYED</button>
    <button type="button" class="filter-button" id="cancelled-tab" data-toggle="tab" href="#flight-cancelled" role="tab" aria-controls="flight-cancelled" aria-selected="false" data-reason="flight_cancelled">FLIGHT CANCELLED</button>
    <button type="button" class="filter-button" id="transit-tab" data-toggle="tab" href="#transit-loss" role="tab" aria-controls="transit-loss" aria-selected="false" data-reason="transit_loss">MISSED CONNECTION</button>
    <button type="button" class="filter-button" id="denied-tab" data-toggle="tab" href="#denied-boarding" role="tab" aria-controls="denied-boarding" aria-selected="false" data-reason="denied_boarding">DENIED BOARDING</button>       
  </div>
  
  <!-- Tab Panes -->
  <div class="tab-content">
    <div class="tab-pane fade show active" id="flight-delayed" role="tabpanel" aria-labelledby="delayed-tab">
      @include('frontend.application.flight-delayed')
    </div>
    <div class="tab-pane fade" id="flight-cancelled" role="tabpanel" aria-labelledby="cancelled-tab">
      @include('frontend.application.flight-cancelled')
    </div>
    <div class="tab-pane fade" id="transit-loss" role="tabpanel" aria-labelledby="transit-tab">
      @include('frontend.application.transit-loss')
    </div>
    <div class="tab-pane fade" id="denied-boarding" role="tabpanel" aria-labelledby="denied-tab">
      @include('frontend.application.denied-boarding')
    </div>
  </div>
</div>


@include('frontend.application.second-form')
@endsection


@push('scripts')
<script>
  $(document).ready(function(){
    $('.filter-button').on('click', function() {
      $('.filter-button').removeClass('active');
      $(this).addClass('active');
      var tabPaneId = $(this).attr('href');
      // Show the corresponding tab pane and hide others
      $('.tab-pane').removeClass('show active');
      $(tabPaneId).addClass('show active');
    });

    var availableAirports = @json(config('settings.airports'));
    var availableAirlines = @json(config('settings.airlines'));
    // Convert the object to an array of objects
    var airportList = $.map(availableAirports, function(value, key) {
            return {
                label: value + ': ' + key,
                value: value // or value, depending on what you want to use as the input value
            };
        });


    $('.airportInput').autocomplete({
      source: airportList,
      select: function(event, ui) {
        // Set the selected item to the input field
        $(this).val(ui.item.value);
        return false;
      }
    });
    
    $('.airlineInput').autocomplete({
      source: availableAirlines,
      select: function(event, ui) {
        // Set the selected item to the input field
        $(this).val(ui.item.value);
        return false;
      }
    });

    $(".airportInput").on("change", function() {
                var value = $(this).val();
                var valid = false;
                $.each(airportList, function(index, airport) {
                    if (airport.value === value) {
                        valid = true;
                        return false; // Exit the loop
                    }
                });
                if (!valid) {
                    $(this).val(''); // Clear the input if the value is not valid
                }
            });
    $(".airlineInput").on("change", function() {
      var value = $(this).val();
      if ($.inArray(value, availableAirlines) === -1) {
        $(this).val('');
      }
    });
});
</script>
@endpush

