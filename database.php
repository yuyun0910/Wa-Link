<?php

$user = "yuyun";
$password = "1234567890";
$database = "walink";
$connect = mysqli_connect("localhost",$user,$password);

$thedatabase = mysqli_select_db($connect,$database) or die("Unable to selecct database");

$query = "CREATE TABLE friend (id int(25) NOT NULL AUTO_INCREMENT, name varchar(120) NOT NULL, address varchar(200) NOT NULL,
		  number varchar(350) NOT NULL, PRIMARY KEY(id))";
              
mysqli_query($connect,$query);
mysqli_close($connect);

?>