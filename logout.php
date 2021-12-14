<?php
session_start();
unset($_SESSION['password']);
unset($_SESSION['login']);
session_destroy();
header("Location:home.php");
?>