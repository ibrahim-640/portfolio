<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require '../assets/vendor/php-email-form/PHPMailer/Exception.php';
require '../assets/vendor/php-email-form/PHPMailer/PHPMailer.php';
require '../assets/vendor/php-email-form/PHPMailer/SMTP.php';

$mail = new PHPMailer(true);

try {
  // Server settings
  $mail->isSMTP();
  $mail->Host       = 'smtp.gmail.com';         // Gmail SMTP server
  $mail->SMTPAuth   = true;
  $mail->Username   = 'mwitaibrahim88@gmail.com'; // Your Gmail
  $mail->Password   = 'ixzo lyip irbm hoko ';       // ⚠️ Use App Password, NOT Gmail password
  $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
  $mail->Port       = 587;

  // Recipients
  $mail->setFrom($_POST['email'], $_POST['name']);       // From user
  $mail->addAddress('mwitaibrahim88@gmail.com', 'Ibrahim'); // To yourself

  // Content
  $mail->isHTML(true);
  $mail->Subject = $_POST['subject'];
  $mail->Body    = "
    <strong>Name:</strong> {$_POST['name']}<br>
    <strong>Email:</strong> {$_POST['email']}<br>
    <strong>Message:</strong><br>{$_POST['message']}
  ";

  $mail->send();
  echo 'Message has been sent';

} catch (Exception $e) {
  echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
}
?>
