<?php
  session_start();
?>

<html>
<head>
  <title>Login</title>
  <link rel="stylesheet" type="text/css" href="style.css">
  <style>
  body {
   background-color: lightblue;
  }
</style>
</head>
<body>
<div class="content-login"> 
	<table align="center" cellspacing="0" width="70%" style="margin:auto; padding: 16px;">
  <form method="post"  action="verify.php">
    <tr>
		<td colspan="2"><h1 align="center">Login</h1></td>
	</tr>
	<tr>
		<td>Username</td>
		<td><input type="text" name="username" class="input"></td>
	</tr>
	<tr>
		<td>Password</td>
		<td><input type="password" name="userpassword" class="input"></td>
	</tr>
	<tr>
		<td colspan="2" style="padding-bottom: 8px;">
		<input type="reset" class="submit" value="Reset">
		<input type="submit" class="submit right" value="Login">
		</td>
	</tr>
		
        <font color="red">
          <?php if(!empty($_GET['error'])) {
            if($_GET['error']  == "1") {
              echo "Your username and password are empty!, please input the correct username and password";
            } else if($_GET['error'] == "2"){
              echo "Incorrect username or password, please input the correct username and password";
            } else {
              echo "Session expired!";
            }
          }
          ?>
		  
        </font>
      </font>
    </center>
  </form>
  </div>
</body>
</html>

<?php
session_destroy();
?>