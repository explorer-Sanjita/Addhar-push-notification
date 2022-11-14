<?php
if (!defined('BASEPATH')) exit('No direct script access allowed');

// Import PHPMailer classes into the global namespace
// These must be at the top of your script, not inside a function
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\OAuth;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;
use League\OAuth2\Client\Provider\Google;

// Load Composer's autoloader
require FCPATH.'vendor/autoload.php';

if (!function_exists('sendMail')) {

function sendMail($data=[]){
	try {
		$mail = new PHPMailer; //Create a new PHPMailer instance
		$mail->isSMTP(); //Tell PHPMailer to use SMTP
		//$mail->SMTPDebug = 2; //Enable SMTP debugging  // 0 = off (for production use) // 1 = client messages // 2 = client and server messages
		$mail->Host = 'smtp.gmail.com'; //Set the hostname of the mail server
		$mail->Port = 587; //Set the SMTP port number - 587 for authenticated TLS, a.k.a. RFC4409 SMTP submission
		$mail->SMTPSecure = 'tls'; //Set the encryption system to use - ssl (deprecated) or tls
		$mail->SMTPAuth = true; //Whether to use SMTP authentication
		$mail->AuthType = 'XOAUTH2'; //Set AuthType to use XOAUTH2
		$email_from = GMAIL_EMAIL_ID;  //Fill in authentication details here //Either the gmail account owner, or the user that gave consent
		$clientId = GMAIL_CLIENT_ID;
		$clientSecret = GMAIL_CLIENT_SECRET;
		$refreshToken = GMAIL_REFRESH_TOKEN; //Obtained by configuring and running get_oauth_token.php  //after setting up an app in Google Developer Console.
		$provider = new Google([
			'clientId' => $clientId,
			'clientSecret' => $clientSecret
		]);  //Create a new OAuth2 provider instance
		$mail->setOAuth(
			new OAuth([
				'provider' => $provider,
				'clientId' => $clientId,
				'clientSecret' => $clientSecret,
				'refreshToken' => $refreshToken,
				'userName' => $email_from
			])
		); //Pass the OAuth provider instance to PHPMailer
		//Recipients
		$mail->setFrom($email_from, "HR Team");
		//$mail->addAddress('joe@example.net', 'Joe User');     // Add a recipient
		$mail->addAddress($data['email']);               // Name is optional
		//$mail->addReplyTo($email_from, $from_name);
		//$mail->addCC('cc@example.com');
		//$mail->addBCC('bcc@example.com');

		// Attachments
		//$mail->addAttachment('/var/tmp/file.tar.gz');         // Add attachments
		//$mail->addAttachment('/tmp/image.jpg', 'new.jpg');    // Optional name

		// Content
		//$mail->isHTML(true);                                  // Set email format to HTML
		$mail->Subject = $data['subject'];
		$mail->CharSet = 'utf-8';
        $mail->msgHTML($data['message']);
		$mail->AltBody = strip_tags($data['message']);

		if($mail->send()) return true;
		return false;
	} catch (Exception $e) {
		echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
	}
}

}

	
?>