@php
    $usernames = explode(',',$applicationDetail->username);
@endphp
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" 
    rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" 
    crossorigin="anonymous">
    <title>Document</title>
    <style>
      table {
          width: 50%;
          border-collapse: collapse;
          margin: 20px auto;
      }
      th, td {
          border: 1px solid #dddddd;
          text-align: left;
          padding: 8px;
      }
      th {
          background-color: #f2f2f2;
          width: 30%;
      }
  </style>
</head>
<body class="bg-light">
  <div dir="ltr">﻿<div style="width:600px">
    <div style="text-align:center;margin-bottom:40px">
      <img src="https://system.flyreimburse.com/areimburse%20login-logo-2.jpg" height="80px;" alt="" class="CToWUd" data-bit="iit">
    </div>
    <div style="text-align:center;font-family:'Segoe UI';font-size:11.5;margin-left:50px;margin-right:50px">
      Thank you for applying for flight compensation in Fly Reimburse!.<br>
      Your request will be delivered shortly to the airline and we will notify you about your case. <br>
    </div>

    <h3 style="text-align: center;">Application Details</h3>
    <table class="table">
        <tbody>
            <tr>
                <th>Case Number</th>
                <td># {{ $applicationDetail->id }}</td>
            </tr>
            <tr>
                <th>Booking Number</th>
                <td>{{ $applicationDetail->booking_number }}</td>
            </tr>
            <tr>
                <th>Flight Number</th>
                <td>{{ $applicationDetail->flight_number }}</td>
            </tr>
            <tr>
                <th>Email</th>
                <td>{{ $applicationDetail->email }}</td>
            </tr>
            <tr>
                <th>Phone Number</th>
                <td>{{$applicationDetail->phone_number}}</td>
            </tr>
            <tr>
                <th>Date</th>
                <td>{{ $applicationDetail->date }}</td>
            </tr>
            <tr>
                <th>Client/s</th>
                <td>@foreach ($usernames as $username)
                  {{ $username.'' }}
                @endforeach</td>
            </tr>
            <tr>
                <th>From</th>
                <td>{{ $applicationDetail->from }}</td>
            </tr>
            <tr>
                <th>To</th>
                <td>{{ $applicationDetail->to }}</td>
            </tr>
            @if ($applicationDetail->reason == 'transit_loss')
              <tr>
                <th>Depart</th>
                <td>{{ $applicationDetail->depart }}</td>
              </tr>

              <tr>
                <th>Arrival</th>
                <td>{{ $applicationDetail->arrival }}</td>
              </tr>
            @endif
            <tr>
                <th>Airline</th>
                <td>{{ $applicationDetail->airline }}</td>
            </tr>
            <tr>
              <th>Reason</th>
              <td>{{ $applicationDetail->reason }}</td>
            </tr>
            <tr>
              <th>Delay</th>
              <td>{{ check($applicationDetail->reason,$applicationDetail->delay) }}</td>
            </tr>
            <!-- Additional data rows can be added as needed -->
        </tbody>
    </table>
    <div style="text-align:center";>
      <br>
      Sincerely, <br>
      Fly Reimburse
    </div>
    {{-- <div style="background-color:#f7f8f8;text-align:center;padding:20px;margin-top:50px;font-family:'Segoe UI';font-size:11.5">
      <span style="color:#888888;font-size:11px">FOLLOW US:</span>
      <div style="margin:20px;text-align:center">
        <a href="https://www.facebook.com/vidora.al/" style="margin-right:30px" target="_blank" data-saferedirecturl="https://www.google.com/url?q=https://www.facebook.com/vidora.al/&amp;source=gmail&amp;ust=1716984762472000&amp;usg=AOvVaw0jX_JoZygfjxlr1PI8Kr09"><img src="https://ci3.googleusercontent.com/meips/ADKq_NaMLmZj6UfAy6_A7tWyQwe1Ah9cB8EAMDzFbn1Yx2jk1uXcVHGW4deJf1p5UEpo32KlCxMyZlmzch_6jKw=s0-d-e1-ft#https://www.vidora.al/forms/fb_logo.png" alt="" style="border-radius:80px" class="CToWUd" data-bit="iit"> </a>
        <a href="https://www.linkedin.com/company/vidora-llc/" style="margin-right:30px" target="_blank" data-saferedirecturl="https://www.google.com/url?q=https://www.linkedin.com/company/vidora-llc/&amp;source=gmail&amp;ust=1716984762472000&amp;usg=AOvVaw31vuizti4I-vZwW0IfHGGH"><img src="https://ci3.googleusercontent.com/meips/ADKq_Nas0b-6sTJxTyWijCtoXV84ccYu9HCgDEb-QcVrMFpH72u15x_D3aSoZxDO1yEo1i9_f6gqBLwesVv-4AviFvWnb7c=s0-d-e1-ft#https://www.vidora.al/forms/linkedin_logo.png" alt="" style="border-radius:80px" class="CToWUd" data-bit="iit"> </a>
        <a href="https://www.instagram.com/vidora.al/" target="_blank" data-saferedirecturl="https://www.google.com/url?q=https://www.instagram.com/vidora.al/&amp;source=gmail&amp;ust=1716984762472000&amp;usg=AOvVaw0YS0iKFh4k4IXJiokGm-JX"><img src="https://ci3.googleusercontent.com/meips/ADKq_NasgDF3TO4pXQveipbVRt_13KIKhCxGzKOg8nakbWW6rkq5TBlOSv4_vtx2QRZSuiBPSrUmrjBj3eqogP4=s0-d-e1-ft#https://www.vidora.al/forms/ig_logo.png" alt="" style="border-radius:80px" class="CToWUd" data-bit="iit"> </a>
      </div>
      <div style="margin:10px;margin-top:80px;text-align:center;font-family:'Segoe UI';font-size:11.5">
        Have any questions? Contact us at <a href="mailto:service@vidora.al" target="_blank">service@vidora.al</a>
        
        <br><br>
        <a href="https://www.vidora.al/TERMAT%20DHE%20KUSHTET.pdf" target="_blank" data-saferedirecturl="https://www.google.com/url?q=https://www.vidora.al/TERMAT%2520DHE%2520KUSHTET.pdf&amp;source=gmail&amp;ust=1716984762472000&amp;usg=AOvVaw3kGv4tUFZoBB5KVY1PEai4">Terms and Conditions</a> | <a href="https://www.vidora.al/POLITIKAT%20E%20PRIVATESISE.pdf" target="_blank" data-saferedirecturl="https://www.google.com/url?q=https://www.vidora.al/POLITIKAT%2520E%2520PRIVATESISE.pdf&amp;source=gmail&amp;ust=1716984762472000&amp;usg=AOvVaw0HnqiEr3JZ-TtBysLMpgJA">Privacy Policy</a>
  
        <br><br><br><br>
        This email, any attachments and the information contained therein ("this message") are confidential and intended solely for the use of the addressee(s). <br>
        If you have received this message in error please send it back to the sender and delete it. Unauthorized publication, use, dissemination or disclosure of this message, either in whole or in part is strictly prohibited.
      </div><div class="yj6qo"></div><div class="adL">
    </div></div><div class="adL">
  </div></div><div class="adL"> --}}
  
  </div></div>
  </body>
</html>