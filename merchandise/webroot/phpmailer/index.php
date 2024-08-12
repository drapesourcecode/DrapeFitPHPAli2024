<?php

  // Import PHPMailer classes into the global namespace
  // These must be at the top of your script, not inside a function
  use PHPMailer\PHPMailer\PHPMailer;
  use PHPMailer\PHPMailer\Exception;

//Load Composer's autoloader
  require 'vendor/autoload.php';

  function sendSmtpEmail($to, $subject, $message,$headers=array()) {
   $mail = new PHPMailer;
   $mail->SMTPDebug = 0;
   $mail->isSMTP();
   $mail->Host = 'mail.drapefittest.com';
   $mail->Port = 465;
   $mail->SMTPSecure = 'tls';
   $mail->SMTPAuth = true;
   $mail->Username = 'support@drapefittest.com';
   // You will need an API Key with 'Send via SMTP' permissions.
   // Create one here: https://app.sparkpost.com/account/credentials
   $mail->Password = 'l7mY6UU6l}WP';

   // sparkpostbox.com is a sending domain used for testing
   // purposes and is limited to 5 messages per account.
   // Visit https://app.sparkpost.com/account/sending-domains
   // to register and verify your own sending domain.

   $mail->setFrom('support@drapefittest.com');

   $mail->addAddress($to);
   $mail->AddBCC('devadash143@gmail.com', 'firstadd');
   $mail->Subject = $subject;
   $mail->Body = $message;
   //$mail->addCustomHeader('X-MSYS-API', '{"campaign_id" : "PHPExample"}');

   if (!$mail->send()) {
   echo "Message could not be sent\n";
  echo "Mailer Error: " . $mail->ErrorInfo . "\n";
    return FALSE;
   } else {
          echo "Message could  be sent\n";
  echo "Mailer Error: " . $mail->ErrorInfo . "\n";
    return TRUE;
   }
   
   

  }
  $From='support@drapefittest.com';
  $to='devadash143@gmail.com';
  $subject="helloTEST";
  $message="CORE";
  $message1="CAKE";

  $headers = 'MIME-Version: 1.0' . "\r\n";
  $headers.= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
  
  
  mail($to, $subject, $message, $headers, '-f'.$From);
  sendSmtpEmail($to, $subject, $message1,$headers=array());
