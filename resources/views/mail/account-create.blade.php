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
        Hi {{ $name }}<br>
        We are delighted to have you on our FlyReimburse platform.<br>
        If you have any questions or need assistance with your flight reimbursement process,<br>
        please do not hesitate to contact us.<br>
        <p>
            To get started, please log in to your account by clicking the link below:
        </p>
        <p>
            <a href="https://system.flyreimburse.com/login">Log in to FlyReimburse</a>
        </p>
        
        Best regards,
        The FlyReimburse Team
    </div>
    <h3 style="text-align: center;">Login Credentials</h3>
    <table>
        <tbody>
            <tr>
                <th>Email</th>
                <td>{{ $email }}</td>
            </tr>
            <tr>
                <th>Password</th>
                <td>{{ $password }}</td>
            </tr>
        </tbody>
    </table>
</div>
</div>
</body>
</html>