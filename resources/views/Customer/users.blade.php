 <!DOCTYPE html>
<html lang="en" >
<head>
 <meta name="viewport" content="width=device-width, initial-scale=1.0">

  <title>User checking bill</title>
<link rel="stylesheet" href="./css/userstyle.css">
</head>
<body style="background-image: url('../images/bontocoffice.jpg'); background-size: cover; background-color: transparent;">


<div class="container-fluid bg-login">
  <div class="container">
    <div class="row">
        <h1>Bill Inquiry</h1>
        <img src="../images/logo.jpg" alt="Store Logo"> 
        <form id="billInquiryForm" action="{{url('/user/billing_history/{meter_serial_number}')}}" method="GET">
            @csrf
            <label for="meter_serial_number">Meter Serial Number:</label>
            <input type="text" id="meter_serial_number" name="meter_serial_number" required>            
            <button type="submit">Check Inquiry</button>
        </form>
      
    </div>
  </div>
</div>
</body>
</html>

