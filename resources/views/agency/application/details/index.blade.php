@php
    $usernames = explode(',', $applicationDetail->username);
@endphp

@extends('agency.layout.master')
@section('content')
<style>

  .logo-container {
  position: absolute;
   top: 10px; 
   right: 70px; 
 }
 
 .logo {
   width: 230px; 
   height: auto;
 }
 hr {
   width: 85%;
   margin: 0 auto; 
   border: 1.5px solid #d2d1d1; 
   margin-top: 10px;
 }
 
 .container {
   display: flex;
   flex-direction: column;
   align-items: center;
   justify-content: center;
   text-align: center;
 }
 
 .logo-container {
   margin-bottom: 20px; 
 }
 
 .title {
   width: 100%;
 }
 .title h1 {
   font-size: 18px;
   margin-top: 100px;
   
 }
 
 
 
 
 .content {
  margin-top: -70px;
   display: flex;
   justify-content: space-between;
   width: 100%;
   padding: 20px;
  
 }
 
 .left-side {
   display: flex;
   flex-direction: column;
   align-items: center; 
   flex: 1;
   margin-top: 40px;
 }
 
 
 .right-side {
   flex: 1;
   display: flex;
   flex-direction: column;
   align-items: center;
   justify-content: center;
   text-align: left;
   margin-right: 70px;
   @media (max-width:860px) {
     margin-right: 0px;
   }
 }
 
 .right-side p {
   width: 95%;
   font-size: 16px;
   font-family: sans-serif;
   @media (max-width:860px) {
     width: 75%;
   font-size: 13px;
   }
 }
 
 .bold-text {
   font-family: sans-serif;
   font-weight: bold;
   display: block;
   font-size: 16px;
   text-align: center;
   margin-bottom: -20px;
   @media (max-width:860px) {
     margin-bottom: 10px;
   font-size: 13px;
   }
 }
 
 .name-container {
   display: flex;
   flex-direction: column;
   align-items: flex-start;
   margin-left: 0px;
   margin-bottom: 20px;
   width: 65%; 
   position: relative;
   @media (max-width:860px) {
     width: 55%; 
   }
 }
 
 .name-field {
   width: 100%;
   border: none;
   border-bottom: 1px solid #c7c7c7;
   padding: 25px;
   outline: none;
   text-align: left; 
  
 }
 
 
 .name-container label {
   position: absolute;
   bottom: -20px;
   left: 0;
   font-size: 13px;
   color: #212020; 
 }
 
 
 
 
 .name-container1 {
   margin-left: 0px;
   margin-bottom: 20px;
   width: 85%; 
   position: relative;
 }
 
 .name-field1 {
   width: 100%;
   border: none;
   border-bottom: 1px solid #c7c7c7;
   padding: 25px;
   outline: none;
   text-align: left; 
  
 }
 
 
 .name-container1 label {
   position: absolute;
   bottom: -20px;
   left: 0;
   font-size: 13px;
   color: #151414; 
   
 }
 
 
 .middle-text {
   margin-top: -30px;
   flex: 1;
   width: 85%; 
   text-align: left; 
 }
 
 
 
 .middle-text ol {
   padding-left: 20px;
 }
 
 .middle-text ol ul {
   list-style-type: circle;
   padding-left: 20px;
   
 }
 
 
 .container3 {
   display: flex;
   align-items: center;
 }
 
 .name-container3 {
   margin-left: 0px;
   margin-bottom: 20px;
   width: 65%;
   position: relative;
   display: flex;
   flex-direction: column;
   @media (max-width:860px) {
     width: 45%;
     margin-bottom: 50px;
   }
   
 }
 
 .name-field3 {
   width: 100%;
   border: none;
   border-bottom: 1px solid #c7c7c7;
   padding: 25px;
   outline: none;
   text-align: left;
   margin-right: 10px;
 
 }
 
 .name-container3 label {
   position: absolute;
   bottom: -20px;
   left: 0;
   font-size: 13px;
   color: #212020;
   @media (max-width:860px) {
     bottom: -50px;
   }
 }
 
 .content1 {
  margin-top: -70px;
 display: flex;
 justify-content: space-between;
 width: 40%;
 padding: 40px;
 @media (max-width:860px) {
   flex-direction: column;
 }
 }
 
 
 .email-address {
   color: blue;
   font-size: 15px;
 
 }
 
</style>

    <!-- Main Content -->
    <section class="section">
        <div class="section-header">
          <h1>Application</h1>
          <div class="section-header-breadcrumb">
            <div class="breadcrumb-item active"><a href="{{ route('agency.dashboard') }}">Dashboard</a></div>
            <div class="breadcrumb-item">Invoice</div>
          </div>
        </div>

        <div class="section-body">
          <div class="invoice">
              <div class="application-print">
                  <div class="row">
                      <div class="col-lg-12">
                          <div class="invoice-title">
                            <h2>Application Details</h2>
                            <div class="invoice-number">Case #{{ $applicationDetail->id }}</div>
                          </div>
                          <hr>
                          <div class="row">
                              <div class="col-md-6">
                                <p style="margin: auto">BOOKING NUMBER: <strong>{{ $applicationDetail->booking_number }}</strong></p>
                                <p>FLIGHT NUMBER: <strong>{{ $applicationDetail->flight_number }}</strong></p>
                                <p style="margin: auto">Email: <strong>{{ $applicationDetail->email }}</strong></p>
                                <p style="margin: auto">Phone Number: <strong>{{ $applicationDetail->phone_number }}</strong></p>
                                <p style="margin: auto">DATE: <strong>{{ $applicationDetail->date }}</strong></p>
                                @php
                                 $clients = explode(',',$applicationDetail->username)
                                @endphp
                                <p style="margin: auto">CLIENT/s:
                                @foreach ($clients as $client )
                                <p style="margin: auto"><strong>{{$client}}</strong></p>
                                @endforeach
                              </div>
                              <div class="col-md-6">
                                <address>
                                  @if ($applicationDetail->user)
                                  <p style="margin: auto">Agency: <strong>{{ $applicationDetail->user->name }}</strong></p>
                                  @endif
                                  <p style="margin: auto">FROM: <strong>{{ $applicationDetail->from }}</strong></p>
                                  <p style="margin: auto">TO: <strong>{{ $applicationDetail->to }}</strong></p>
                                  <p style="margin: auto">AIRLINE: <strong>{{$applicationDetail->airline}}</strong></p>
                                  <p style="margin: auto">CASE: <strong>#{{ $applicationDetail->id }}</strong></p>
                                  <p>DATE OF APPLICATION: <strong>{{ $applicationDetail->created_at }}</strong></p>
                                  @if ($applicationDetail->reason == 'transit_loss')
                                  <p style="margin: auto"><strong>Transit Loss</strong></p>
                                  <p style="margin: auto">DEPART: <strong>{{ $applicationDetail->depart }}</strong></p>
                                  <p>ARRIVAL: <strong>{{ $applicationDetail->arrival }}</strong></p>
                                  @endif
                              </address>
                              </div>
                          </div>
                          <div class="row">
                                  <div class="col-md-6">
                                      <address>
                                        <p>REASON OF APPLICATION: <strong>{{ strtoupper($applicationDetail->reason) }}</strong></p>
                                        <p style="margin: auto">How long was the delay of your arrival to the final destination?</p>
                                        <p><strong>{{ check($applicationDetail->reason,$applicationDetail->delay) }}</strong></p>
                                      </address>
                                  </div>
                                  <div class="col-md-6">
                                    <div class="btn-group btn-group-toggle status" data-toggle="buttons">
                                      <label  data-id="{{ $applicationDetail->id }}" class="btn btn-secondary disabled {{ $applicationDetail->status == 'new_arrival' ? 'active' : '' }}">
                                      <input type="radio" name="status" id="new" value="new_arrival" autocomplete="off"> New application
                                      </label>
                                      <label data-id="{{ $applicationDetail->id }}" class="btn btn-secondary disabled {{ $applicationDetail->status == 'delivered' ? 'active' : '' }}">
                                      <input type="radio" name="status" id="delivered" value="delivered" autocomplete="off"> Delivered
                                      </label>
                                      <label data-id="{{ $applicationDetail->id }}" class="btn btn-secondary disabled {{ $applicationDetail->status == 'in_pay_process' ? 'active' : '' }}">
                                      <input type="radio" name="status" id="pay" value="in_pay_process" autocomplete="off"> In pay process
                                      </label>
                                      <label data-id="{{ $applicationDetail->id }}" class="btn btn-secondary disabled {{ $applicationDetail->status == 'refused' ? 'active' : '' }}">
                                      <input type="radio" name="status" id="refused" value="refused" autocomplete="off"> Refused
                                      </label>
                                      <label data-id="{{ $applicationDetail->id }}" class="btn btn-secondary disabled {{ $applicationDetail->status == 'completed' ? 'active' : '' }}">
                                      <input type="radio" name="status" id="complete" value="completed" autocomplete="off"> Completed
                                      </label>
                                   </div>
                                  </div>
                          </div>
                          <hr>
                          <h2>Documents</h2>
                          <div class="row">
                            <div class="col-md-4">
                              <div class="section-title">PASSAPORT</div>
                                @php
                                $passaports = explode(',',$applicationDetail->passaport);
                                $signs = explode(',',$applicationDetail->sign);
                                $length = min(count($passaports),count($signs));
                                @endphp
                              @for ($i = 0; $i < $length ; $i++)
                              <p class="section-lead">Passaport of {{$usernames[$i]}}</p>
                              <div class="card card-document">
                                @if (strpos(mime_content_type('storage/'.$passaports[$i]),'image/') === 0)
                                <img src="{{ asset('storage/'.$passaports[$i]) }}" class="card-img-top passaport-img image_container" alt="...">
                                @elseif (strpos(mime_content_type('storage/'.$passaports[$i]),'application') === 0)
                                <a href="{{ route('download.file',['filename'=>'storage/'.$passaports[$i]]) }}" class="btn btn-primary ml-2">Download</a>
                                @endif
                                <div class="card-body">
                                </div>
                              </div>
                              @endfor
                              </div>
                          
                              <div class="col-md-4">
                                <div class="section-title">AUTHORIZE FORM</div>
                                @for ($i = 0 ; $i < $length; $i++)
                                <div class="card card-document">
                                  <button type="button" class="btn btn-link" data-bs-toggle="modal" data-bs-target="#assignmentModal{{ $i }}" data-bs-backdrop="false">
                                    View Assignment of {{ $usernames[$i] }}
                                  </button>
                                  <div class="card-body">
                                    <img src="{{ asset('storage/'.$signs[$i]) }}" class="card-img-top passaport-img image_container" alt="...">
                                  </div>
                                  </div>      
                                  <!-- Modal -->
                                  <div class="modal fade" id="assignmentModal{{ $i }}" tabindex="-1" aria-labelledby="assignmentModalLabel" aria-hidden="true" data-bs-backdrop="false">
                                    <div class="modal-dialog" style="max-width: 900px;">
                                      <div class="modal-content">
                                        <div class="modal-header">
                                          <h5 class="modal-title" id="exampleModalLabel">Authorization Form</h5>
                                          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                         <div class="container">
                                            <div class="logo-container">
                                            <img src="{{ asset('areimburse login-logo-2.jpg') }}"  alt="Logo" class="logo" style="width: 250px;margin-left: 600px;">
                                            </div>
                                            <div class="title">
                                              <h1>ASSIGNMENT AGREEMENT</h1>
                                              <hr>
                                            </div>
                                            <div class="content">
                                              <div class="left-side">
                                                <span class="bold-text">"Customer" or "Assignor”</span>
                                                <div class="name-container" style="margin-top:40px;">
                                                  <p><strong>Our Case Number:</strong> #{{ $applicationDetail->id }}</p>
                                                  <p><strong>Full Name:</strong> {{ $usernames[$i]}}</p>
                                                  <p><strong>Booking Number:</strong> {{ $applicationDetail->booking_number }}</p>
                                                  <p><strong>Flight Number:</strong> {{ $applicationDetail->flight_number }}</p>
                                                  <p><strong>Date:</strong> {{ $applicationDetail->date }}</p>
                                                </div>
                                              </div>
                                              <div class="right-side">
                                                <p>
                                                  <span class="bold-text">"Fly Reimburse” or "Assignee”</span>
                                                </p>
                                                <p>
                                                  FlyReimburse Albania company with Tax registration no. M41803026E, under the Albanian National Business Registration (Fly Reimburse)<br>
                                                  Address: Tirane, Str. Bulevardi Bajram Curri, Flat nr 25, Store nr 5, Tirane
                                                </p>
                                              </div>
                                            </div>
                                            
                                        
                                           <div class="middle-text">
                                              <p>By Signing this document, both parties agree to the following:</p>
                                              <ol>
                                                <li>The Customer hereby assigns and transfers full ownership of their Claim to Fly Reimburse. This assignment includes the legal rights to claim for compensation due to financial loss, damages, or reimbursement under Regulation (EC) No. 261/2004, UK Air Passenger Rights Law (“UK261”), the Montreal Convention of 1999 (MC99), the Brazilian Consumer Code and Brazilian Aeronautical Code, Turkish “SHY” passenger regulation, Canadian Transportation Act: Air Passenger Protection Regulations, or gesture of arising from the disrupted flight(s) identified by the above mentioned booking reference (i.e. the "Claim”).</li>
                                                <li>Fly Reimburse accept this transfer and hereby acquires the customer's right to the Claim, agreeing to act against third parties with all rights and obligations.</li>
                                                <li>This Assignment Agreement is made in accordance with the Fly Reimburse Terms and Conditions and Our Fees, which have already been read and accepted by the Customer at flyreimburse.com.</li>
                                                <li>This Assignment Agreement entitles Fly Reimburse to the same rights and powers the Customer previously held within the scope of the Claim. Specifically, Fly Reimburse is entitled to:
                                                  <ol type="a">
                                                    <li>Act before any third parties in all both amicable and judicial proceedings, in any instance.</li>
                                                    <li>Initiate, submit, and terminate any legal and extrajudicial proceeding related to the Claim (either individually or as a collective with other customers).</li>
                                                    <li>Obtain information required from third parties, including administrative bodies responsible for enforcing air passenger rights regulations, where permitted by civil and administrative laws.</li>
                                                    <li>Appoint and mandate any law firm, solicitor or counsel to represent and assist Fly Reimburse in all amicable and judicial proceedings in connection with the Claim.</li>
                                                  </ol>
                                                </li>
                                                <li>This Assignment Agreement shall be effective as of the date the Customer signs it and shall be used as notification in writing to any third party, including the operating carrier. When such notification is legally mandatory, the third party shall consider this Assignment Agreement effective from the date of the notification. This Assignment Agreement can also include the documents "Claim-PDF" (a payment request from Fly Reimburse to the operating carrier) and Fly Reimburse's Electronic Signature Certificate (also known as the "Certificate of Completion").</li>
                                                <li>The Customer hereby affirms that they have not assigned the Claim to any other third party prior to this Assignment. The Customer understands that they may not assign the Claim again, assert the Claim in their own name, or accept any direct contact or payment from the operating carrier.</li>
                                                <li>The Customer authorizes Fly Reimburse to request that any third party only process the Customer's personal data for the purpose of verifying and resolving the Claim, according to applicable data protection laws.</li>
                                                <li>If this Assignment Agreement is written in two languages, the English language version shall prevail in the case of any inconsistencies.</li>
                                              </ol>
                                            </div>
                                          
                                           <div class="content">
                                            <div class="left-side">
                                              <div class="name-container">
                                                <img src="{{ asset('storage/'.$signs[$i]) }}" alt="">
                                                <p><Strong>Customer’s Signature </Strong></p>
                                              </div>
                                              <div class="name-container">
                                                <p><strong>Complete name: </strong>{{ $usernames[$i] }}</p>
                                              </div>
                                            </div>
                                            <div class="right-side">
                                              <div class="name-container3">
                                                <p><strong>Created At: </strong>{{date('Y-m-d',strtotime($applicationDetail->created_at))}}</p>
                                            </div>
                                            </div>
                                           </div>
                                           <hr style="margin-top: -50px;">
                                           <div class="content1">
                                           <div class="email-container">
                                           <span class="email-address">info&#64;flyreimburse.com</span>
                                           </div>
                                           <div class="email-container">
                                           <span class="email-address">&nbsp;&nbsp;&nbsp;www.flyreimburse.com</span>
                                           </div>
                                          </div>
                                         </div>
                                      </div>
                                        <div class="modal-footer">
                                          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                          <button type="button" class="btn btn-primary btn-generate-pdf" data-id="{{ $applicationDetail->id }}"
                                            data-username="{{ $usernames[$i] }}" data-sign="{{ 'storage/'.$signs[$i] }}">Save</button>
                                        </div>
                                      </div>
                                    </div>
                                  </div>
                                @endfor
                              </div>
                              
                              <div class="col-md-4">
                                <div class="section-title">BOARDING PASS</div>
                                <p class="section-lead"> Boarding Pass of {{$usernames[0]}}</p>
                                @if (strpos(mime_content_type('storage/'.$applicationDetail->boarding_pass),'image/') === 0)
                                <div class="card card-document">
                                  <img src="{{ asset('storage/'.$applicationDetail->boarding_pass) }}" class="card-img-top passaport-img image_container" alt="...">
                                  <div class="card-body">
                                  </div>
                                </div>
                                @elseif (strpos(mime_content_type('storage/'.$applicationDetail->boarding_pass),'application/') === 0)
                                <a href="{{ route('download.file',['filename'=>'storage/'.$applicationDetail->boarding_pass]) }}" class="btn btn-primary ml-2">Download</a>
                                @endif
                              </div>

                                @if ($applicationDetail->schedule_change)
                                <div class="col-md-4">
                                  <div class="section-title">SCHEDULE CHANGE</div>
                                  <p class="section-lead">Schedule Change of {{ explode(',',$applicationDetail->username)[0] }}</p>
                                  @if (strpos(mime_content_type('storage/'.$applicationDetail->schedule_change),'image/') === 0)
                                  <div class="card" style="width: 18rem;">
                                    <img src="{{ asset('storage/'.$applicationDetail->schedule_change) }}" class="card-img-top passaport-img image_container" alt="...">
                                    <div class="card-body">
                                    </div>
                                  </div>
                                  @elseif (strpos(mime_content_type('storage/'.$applicationDetail->schedule_change),'application/') === 0)
                                  <a href="{{ route('download.file',['filename'=>'storage/'.$applicationDetail->schedule_change]) }}" class="btn btn-primary ml-2">Download</a>
                                  @endif
                                </div>
                                @endif


                                @if ($applicationDetail->denied_boarding)
                                <div class="col-md-4">
                                  <div class="section-title">DENIED BOARDING</div>
                                  <p class="section-lead">Denied Boarding of {{ explode(',',$applicationDetail->username)[0] }}</p>
                                  @if (strpos(mime_content_type('storage/'.$applicationDetail->denied_boarding),'image/') === 0)
                                  <div class="card" style="width: 18rem;">
                                    <img src="{{ asset('storage/'.$applicationDetail->denied_boarding) }}" class="card-img-top passaport-img image_container" alt="...">
                                    <div class="card-body">
                                    </div>
                                  </div>
                                  @elseif (strpos(mime_content_type('storage/'.$applicationDetail->denied_boarding),'application/') === 0)
                                  <a href="{{ route('download.file',['filename'=>'storage/'.$applicationDetail->denied_boarding]) }}" class="btn btn-primary ml-2">Download</a>
                                  @endif
                                </div>
                                @endif
                            </div>
                          {{-- <h2>Expences</h2>
                          @if (!is_null($applicationDetail->new_billet) && !is_null($applicationDetail->hotel) && !is_null($applicationDetail->taxi) && !is_null($applicationDetail->food))
                          <div class="row">
                            <div class="col-md-4">
                              <div class="section-title">PASSAPORT</div>
                              <p class="section-lead">Passaport of {{ explode(',',$applicationDetail->username)[0] }}</p>
                              <div class="card" style="width: 18rem;">
                                @php
                                $images = explode(',',$applicationDetail->passaport)
                                @endphp
                                @foreach ($images as $image )
                                <img src="{{ asset('storage/'.$image) }}" class="card-img-top passaport-img image_container" alt="...">
                                @endforeach
                                <div class="card-body">
                                </div>
                              </div>
                              </div>
                              <div class="col-md-4">
                                <div class="section-title">BOARDING PASS</div>
                                <p class="section-lead"> Boarding Pass of {{ explode(',',$applicationDetail->username)[0] }}</p>
                                <div class="card" style="width: 18rem;">
                                  <img src="{{ asset('storage/'.$applicationDetail->boarding_pass) }}" class="card-img-top passaport-img image_container" alt="...">
                                  <div class="card-body">
                                  </div>
                                </div>
                                </div>
                                <div class="col-md-4">
                                  <div class="section-title">SIGNATURE</div>
                                  <p class="section-lead">Signature of {{ explode(',',$applicationDetail->username)[0] }}</p>
                                  <div class="card" style="width: 18rem;">
                                    <img src="{{ asset('storage/'.$applicationDetail->sign) }}" class="card-img-top passaport-img image_container" alt="...">
                                    <div class="card-body">
                                    </div>
                                  </div>
                                </div>
                                @if ($applicationDetail->schedule_change)
                                <div class="col-md-4">
                                  <div class="section-title">SIGNATURE</div>
                                  <p class="section-lead">Schedule Change of {{ explode(',',$applicationDetail->username)[0] }}</p>
                                  <div class="card" style="width: 18rem;">
                                    <img src="{{ asset('storage/'.$applicationDetail->schedule_change) }}" class="card-img-top passaport-img image_container" alt="...">
                                    <div class="card-body">
                                    </div>
                                  </div>
                                </div>
                                @endif
                                @if ($applicationDetail->denied_boarding)
                                <div class="col-md-4">
                                  <div class="section-title">SIGNATURE</div>
                                  <p class="section-lead">Denied Boarding of {{ explode(',',$applicationDetail->username)[0] }}</p>
                                  <div class="card" style="width: 18rem;">
                                    <img src="{{ asset('storage/'.$applicationDetail->denied_boarding) }}" class="card-img-top passaport-img image_container" alt="...">
                                    <div class="card-body">
                                    </div>
                                  </div>
                                </div>
                                @endif
                          </div>
                          @endif
                          <h5>There is no Expences</h5> --}}
                      </div>
                  </div>
              </div>
              <hr>
              <div class="text-md-right">
                  <button class="btn btn-warning btn-icon icon-left print_application"><i class="fas fa-print"></i> Print</button>
              </div>
          </div>
      </div>
      </section>


@endsection

@push('scripts')
<script>
$(document).ready(function() {
  
    // Event handler for the "Save changes" button
$('.btn-generate-pdf').click(function() {
    var id = $(this).data('id');
    var username = $(this).data('username');
    var sign = $(this).data('sign');
    $.ajax({
      method: 'GET',
      url: '{{ route('pdf.download') }}',
      data: {
        id : id,
        username: username,
        sign: sign
      },xhrFields: {
                responseType: 'blob'
            },
            success: function(data) {
              console.log('work')
            // Create a blob from the response
            var blob = new Blob([data], { type: 'application/pdf' });
            // Check if the device is mobile
            var isMobile = /iPhone|iPad|iPod|Android/i.test(navigator.userAgent);
            // Handle opening the PDF based on device type
            if (isMobile) {
                // For mobile devices, use the FileSaver.js library to trigger download
                saveAs(blob, ''+username+'/document.pdf');
            } else {
                // For desktops, open the PDF in a new tab/window
                var url = window.URL.createObjectURL(blob);
                window.open(url);
            }
        },error: function(error){
        console.log(error);
      }
    });
});

    // ChangeStatus
    $('.btn-group .btn').on('click', function(event) {
        event.preventDefault();
        let status = $(this).find('input').val();
        let id = $(this).data('id');
        let btn = $(this); // Store $(this) in a variable
        $('.btn-group .btn').removeClass('active');

        Swal.fire({
            title: "Are you sure?",
            text: "After changing the application status, the user will be notified of the process.",
            icon: "warning",
            showCancelButton: true,
            confirmButtonColor: "#3085d6",
            cancelButtonColor: "#d33",
            confirmButtonText: "Yes, update it!"
        }).then((result) => {
            if (result.isConfirmed) {
                $.ajax({
                    method: 'put',
                    url: "{{ route('agency.application.update-status') }}",
                    data: {
                        status: status,
                        id: id
                    },
                    success: function(data) {
                        if (data.status == 'success') {
                            btn.addClass('active'); // Use stored btn variable
                            btn.find('input').prop('checked', true);
                        }
                    },
                    error: function(error) {
                        console.error('Error:', error);
                    }
                });
            }
        });
    });

    // Show Images
    $(document).on('click', '.image_container', function() {
        var imgUrl = $(this).attr('src');
        $.fancybox.open({
            src: imgUrl,
            type: 'image'
        });
    });

    // Print Page As PDF
    $('.print_application').on('click', function() {
        let printBody = $('.application-print');
        let originalContents = $('body').html();
        $('body').html(printBody.html());

        window.print();

        $('body').html(originalContents);
    });

});
</script>
@endpush
