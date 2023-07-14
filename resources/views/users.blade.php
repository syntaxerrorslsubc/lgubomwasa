 <!DOCTYPE html>
<html lang="en" >
<head>
 <meta name="viewport" content="width=device-width, initial-scale=1.0">

  <title>User checking bill</title>
<link rel="stylesheet" href="./css/userstyle.css">
</head>
<body>

	<div class="topnav">
    <div class="login-container">
    <form action="/action_page.php">
     <left> <button type="submit">Login</button></left>
    </form>
  </div>
</div>

	
  <center><input type="hidden" name="_token" value="{{ csrf_token() }}" /> 
        <br><br>
        <img src="../images/logo.jpg" alt="Store Logo" class="brand-image img-circle elevation-3 bg-gradient-light" style="opacity: .8;width: 8rem;height: 8rem;max-height: unset">
        </a> <br>
  <b><h1 style="color:black;">BILLING QUERY</h1></body> </center>
  </b>
  	<div class="flex-parent jc-center">
  <input type="search" placeholder="Meter Code" required>
</div>

<div class="jc-center">
 <center> <button type="submit">Check Bill</button></center>
</div>
</body>
</html>

