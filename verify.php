<?php
session_start();

if(empty($_POST['username']) && empty($_POST['userpassword'])) {
  header("location:login.php?error=1");
  
} else {
  $login = $_POST['username'];
  $password = $_POST['userpassword'];
  
  if($login == 'yuyun' && $password == 'yuyun0910') {
    $_SESSION['login'] = $login;
    $_SESSION['password'] = $password;
    header("location:home.php");
	
  } else {
    header("location:login.php?error=2");
  }
}
?>