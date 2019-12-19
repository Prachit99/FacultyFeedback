<?php
session_start();
include ('../config/db_config.php');

if(isset($_POST["f_id"])){
$f_id=$_POST["f_id"];
$sql = "DELETE FROM faculty where f_id='{$f_id}'";
  if ($conn->query($sql) === TRUE){
    echo "Record Deleted successfully";
  } else{
    echo "Error: " . $sql. "<br>" . $conn->error;
  }

}

  ?>