<?php
session_start();
include ('../config/db_config.php');
require '../class/class.phpmailer.php';
require '../class/class.smtp.php';

if(isset($_SESSION['dept_id'])){
	$dept_id=$_SESSION['dept_id'];
}else{
	$dept_id=$_POST['dept_id'];
}

?>

<!DOCTYPE html>
<html>
<head>
	<script src="../scripts/jquery.min.js"></script>
	<link rel="stylesheet" href="../styles/bootstrap.min.css" />
	<script src="../scripts/bootstrap.min.js"></script>
</head>
<body>

</body>
</html>

<?php 

$message = '';
$fname; $lname; $email;

function sendReminderMail($email, $fname, $lname) {

	$mail = new PHPMailer;
	$mail->IsSMTP();								//Sets Mailer to send message using SMTP
	$mail->Host = 'smtp.gmail.com';		//Sets the SMTP hosts of your Email hosting, this for Godaddy
	$mail->Port = '587';							//Sets the default SMTP server port
	$mail->SMTPAuth = true;				//Sets SMTP authentication. Utilizes the Username and Password variables
	$mail->Username = 'feedbacksystemkjsce@gmail.com';					//Sets SMTP username
	$mail->Password = 'kjsce1234';					//Sets SMTP password
	$mail->SMTPSecure = 'tls';							//Sets connection prefix. Options are "", "ssl" or "tls"
	$mail->From = 'feedbacksystemkjsce@gmail.com';			//Sets the From email address for the message
	$mail->FromName = 'Faculty Feedback System KJSCE';			//Sets the From name of the message
	$mail->AddAddress('gayatrivasan1@gmail.com');		//Adds a "To" address
	$mail->WordWrap = 50;							//Sets word wrapping on the body of the message to a given number of characters
	$mail->IsHTML(true);							//Sets message type to HTML		
	$mail->Subject = 'Reminder to fill Feedback form';			//Sets the Subject of the message
	$mail->Body = 'Hey '.$fname.' '.$lname.', Please fill in the Faculty Feedback forms.';	//An HTML or plain text message body
	//$mail->AddCC("manvi.shah@somaiya.edu");
	if($mail->Send())								//Send an Email. Return true on success or false on error
	{
		$message = '<label class="text-success">Mailed successfully...</label>';
	}
	

}

if(isset($_POST["mailReminder"]))
{
	

	
	
	$roll_no=$_POST['roll_no'];
	$html_code = ' <link rel="stylesheet" href="../styles/bootstrap.min.css">';



	$s = "SELECT fname,lname,email from student where roll_no='$roll_no'";
	$r= $conn->query($s);
	while($res=$r->fetch_assoc()){
		$fname=$res['fname'];
		$lname=$res['lname'];
		$email=$res['email'];
	}

		sendReminderMail($email, $fname, $lname);

	}

 ?>