<?php
include 'model.php';
$remove = new wa();
$id = $_REQUEST['id'];
$delete = $remove->delete($id);

if($delete){
  header('location: list.php');
}

?>
