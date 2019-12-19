<?php
session_start();
include ('../config/db_config.php');

$sql = "SELECT acad_year from current_state";
$res = $conn->query($sql);                     
while($r=$res->fetch_assoc()){ 
  $acad_year=$r['acad_year'];
}
if(isset($_POST["class"])){
$class=$_POST["class"];
$sql = "DELETE FROM student where class='{$class}' and acad_year='acad_year'";
  if ($conn->query($sql) === TRUE){
    echo "Records Deleted successfully";
  } else{
    echo "Error: " . $sql. "<br>" . $conn->error;
  }

}




  ?>