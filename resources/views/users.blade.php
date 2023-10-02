 <!DOCTYPE html>
<html lang="en" >
<head>
 <meta name="viewport" content="width=device-width, initial-scale=1.0">

  <title>User checking bill</title>
<link rel="stylesheet" href="./css/userstyle.css">
</head>
<body style="background-image: url('../images/bontocoffice.jpg'); background-size: cover;">


<div class="container-fluid bg-login">
  <div class="container">
    <div class="row">
        <h1>Bill Inquiry</h1>
        <img src="../images/logo.jpg" alt="Store Logo">
        <form id="billInquiryForm" >
            <!-- Add your bill inquiry form fields here -->
            <label for="meter_code">Meter Code:</label>
            <input type="text" id="meter_code" name="meter_code" required>
            
            <!-- Add more form fields as needed -->
            
            <button type="submit">Check Inquiry</button>
        </form>
        <div id="billInquiryResult">
            <!-- The inquiry result will be shown here -->
        </div>
    </div>
  </div>
</div>
</body>
</html>

