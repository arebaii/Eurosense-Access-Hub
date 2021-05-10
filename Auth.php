<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Api Eurosense</title>
  <link rel="preconnect" href="https://fonts.gstatic.com">
  <link href="https://fonts.googleapis.com/css2?family=Lato&display=swap" rel="stylesheet">

  <link rel = "icon" href = "./icons/icon.png" type = "image/x-icon">

  <link rel="stylesheet" href="Auth-test.css">
</head>
<body>


<div id= "header">
  <div id="logo"> <p>
     <img alt= "logo" src="./icons/logo_v2.png" id="logo">
  </div>
</div>

 

<div id="login"> 
<form method="post" action="check.php">
    <div>
      <input type="text"  placeholder="Username "  name="login">
    </div>
    <div>
       <input type="password"  placeholder="Password"  name="pass" >
     <br>
    <div id="submit">
      <a href="forgottennPassword"><span id="forgot-pass">Forgot password?</span>
    <input type="submit" class="submit_button" value="Log in">  </a>
    </div>
     
 
</form> 
</div>






</body>


</html>