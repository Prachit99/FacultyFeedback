<?php
session_start();
$_SESSION["errorMessage"]=0;
include ('../config/db_config.php');

//for Google Sign-In
if(isset($_POST['user'])){

        $_SESSION['user']=$_POST['user'];
        $_SESSION['pic']=$_POST['pic'];
        $_SESSION['email']=$_POST['email'];
        $email=$_SESSION['email'];


     
        $sql_student = "SELECT roll_no,dept_id,batch,class,sem,section FROM student where email='$email'";
        $result_student = $conn->query($sql_student);
     
        //checking for student
        if($result_student->num_rows>0){
            while($row = $result_student->fetch_assoc()) {
                    $_SESSION['dept_id']=$row["dept_id"];
                    $_SESSION['batch']=$row["batch"];
                    $_SESSION['class']=$row["class"];
                    $_SESSION['section']=$row["section"];
                    $_SESSION['sem']=$row["sem"];
                    $_SESSION['roll_no']=$row["roll_no"];
                    $_SESSION['email']=$row["email"];
                 
                }
                $_SESSION['role']="student";
                header("Location: ../dashboards/student_dashboard.php");

        }

        //invalidating for other conditions
        else{
            $_SESSION["errorMessage"]=1;
            header("Location: ../index.php");
            exit();
        }

}

//For normal Sign-In
else{

        $_SESSION['email']=$_POST['email'];
        $password=$_POST['password'];
        $email=$_SESSION['email'];


        $sql_faculty = "SELECT dept_id FROM department where email='$email'and password='$password'";
        $result_faculty = $conn->query($sql_faculty);
        $sql_student = "SELECT fname,lname,roll_no,dept_id,batch,class,sem,section FROM student where email='$email'and pass='$password'";
        $result_student = $conn->query($sql_student);



        //checking for dept cood
        if ($result_faculty->num_rows > 0) {
            while($row_faculty = $result_faculty->fetch_assoc()) {
                    $dept_id=$row_faculty['dept_id'];
            }
            $_SESSION['user']="Department Cood";
            $_SESSION['role']="dept_cood";
            $_SESSION['dept_id']=$dept_id;
            header("Location: ../dashboards/dept_cood_dashboard.php");
        }

        
        //checking for student
        else if($result_student->num_rows>0){
            while($row_student = $result_student->fetch_assoc()) {
                    $_SESSION['dept_id']=$row_student["dept_id"];
                    $_SESSION['batch']=$row_student["batch"];
                    $_SESSION['class']=$row_student["class"];
                    $_SESSION['section']=$row_student["section"];
                    $_SESSION['sem']=$row_student["sem"];
                    $_SESSION['roll_no']=$row_student["roll_no"];

                    $_SESSION['user']=$row_student['fname']." ".$row["lname"];

                   
                    $_SESSION['email']=$row_student["email"];

                 
                }
                $_SESSION['role']="student";
                header("Location: ../dashboards/student_dashboard.php");

        }

        //invalidating for other conditions
        else{
            $_SESSION["errorMessage"]=1;
            header("Location: ../index.php");
            exit();
        }




}




?>