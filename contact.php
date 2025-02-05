
<?php

//Import PHPMailer classes into the global namespace
//These must be at the top of your script, not inside a function
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

if (isset($_POST["submit"])) {
	$name = $_POST['name'];
	$email = $_POST['email'];
	$message = $_POST['message'];

	}

//Load Composer's autoloader
require 'PHPMailer/Exception.php';
require 'PHPMailer/PHPmailer.php';
require 'PHPMailer/SMTP.php';

//Create an instance; passing `true` enables exceptions
$mail = new PHPMailer(true);

try {
    //Server settings                     //Enable verbose debug output
    $mail->isSMTP();                                            //Send using SMTP
    $mail->Host       = 'smtp.gmail.com';                     //Set the SMTP server to send through
    $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
    $mail->Username   = 'usertest24398@gmail.com';                     //SMTP username
    $mail->Password   = 'jonhstbcdmpeguzy';                               //SMTP password
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;            //Enable implicit TLS encryption
    $mail->Port       = 465;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`

    //Recipients
    $mail->setFrom('usertest24398@gmail.com', 'Contact Form');
    $mail->addAddress('kumawatxmat@gmail.com', 'Kumawat User');     //Add a recipient

    //Content
    $mail->isHTML(true);                                  //Set email format to HTML
    $mail->Subject = 'Here is the subject';
    $mail->Body    = "Sender Name: $name <br> Sender Email: $email <br> Message: $message";

    $mail->send();
    	echo "<div class='alert alert-success'>Email sent successfully!</div>";
	} 
	catch (Exception $e) {
    	echo "<div class="alert">Mail couldn't be sent. Mailer Error: {$mail->ErrorInfo}</div>";
	}

?>