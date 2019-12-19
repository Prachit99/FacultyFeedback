<?php
session_start();
include ('../config/db_config.php');
if(isset($_SESSION['dept_id'])){
  $dept_id=$_SESSION['dept_id'];
}else{
  $dept_id=$_POST['dept_id'];
}


if(isset($_POST['insert'])){

$c_id=$_POST['c_id'];
$f_id=$_POST['f_id'];
$class=$_POST['class'];
$section=$_POST['section'];


$querycheck = mysqli_query($conn,"SELECT * FROM courses_faculty where course_code='$c_id' and class='$class' and section_or_batch='$section' and dept_id='$dept_id'");
$countrows = mysqli_num_rows($querycheck);
if($countrows==1){
$sql = "UPDATE courses_faculty SET f_id='$f_id' WHERE course_code='$c_id' and class='$class' and section_or_batch='$section' and dept_id='$dept_id'";
  if ($conn->query($sql) === TRUE){
    echo "Record Updated successfully";
  } else{
    echo "Error: " . $sql2 . "<br>" . $conn->error;
  }
}
if($countrows==0){
	$sql = "INSERT INTO courses_faculty values('{$c_id}','{$f_id}',{dept_id},'{$class}','{$section}')";
   if ($conn->query($sql) === TRUE){
    echo "Record Updated successfully";
  } else{
    echo "Error: " . $sql . "<br>" . $conn->error;
  }
}
    



exit();
}



if(isset($_POST['delete'])){

$c_id=$_POST['c_id'];
$f_id=$_POST['f_id'];
$class=$_POST['class'];
$section=$_POST['section'];

$sql = "DELETE FROM courses_faculty where course_code='{$c_id}' and f_id='{$f_id}' and class='{$class}' and section_or_batch='{$section}' and dept_id='{$dept_id}'";

if ($conn->query($sql) === TRUE) {
    echo "Record deleted successfully";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}


exit();
}




session_destroy();
?>