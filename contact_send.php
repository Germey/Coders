<?php


define("WEBMASTER_EMAIL", $_POST['sendto']);
if (WEBMASTER_EMAIL == '' || WEBMASTER_EMAIL == 'Testemail') {
	die('<span class="error_message">The recipient email is not correct</span>');	
} 

define("EMAIL_SUBJECT", $_POST['subject']);
if (EMAIL_SUBJECT == '' || EMAIL_SUBJECT == 'Subject') {
	define("EMAIL_SUBJECT",'Contact');	
}

$name = stripslashes($_POST['name']);
$email = trim($_POST['email']);
$message = stripslashes($_POST['message']);

$custom = $_POST['fields'];
$custom = substr($custom, 0, -1);
$custom = explode(',', $custom);

$message_addition = '';
foreach ($custom as $c) {
	if ($c !== 'name' && $c !== 'email' && $c !== 'message') {
		$message_addition .= '<b>'.$c.'</b>: '.$_POST[$c].'<br />';
	}
}

if ($message_addition !== '') {
	$message = $message.'<br /><br />'.$message_addition;
}


$message = '<html><body>'.nl2br($message)."</body></html>";
$mail = mail(WEBMASTER_EMAIL, EMAIL_SUBJECT, $message,
     "From: ".$name." <".$email.">\r\n"
    ."Reply-To: ".$email."\r\n"
    ."X-Mailer: PHP/" . phpversion()
	."MIME-Version: 1.0\r\n"
	."Content-Type: text/html; charset=utf-8");


if($mail)
{
echo '<span class="confirm_message">Your message has been sent. Thank you!</span>';
}
else
{
echo '<span class="error_message">Your message has not been send!</span>';
}

?>