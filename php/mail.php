<?php
	require_once 'recaptchalib.php';
	$privatekey = getenv('RECAPTCHA_PRIVATE');
	$resp = recaptcha_check_answer ($privatekey,
                                $_SERVER["REMOTE_ADDR"],
                                $_POST["recaptcha_challenge_field"],
                                $_POST["recaptcha_response_field"]);

	if (!$resp->is_valid) {
	  if (isset($_SERVER['HTTP_REFERER'])) {
	    $target = $_SERVER['HTTP_REFERER'];
	  } else {
	    $target = '/contact.php?rer=' . $resp->error;
	  }
	  header("Location: $target");
	}

	define( "RECIPIENT_NAME", "Roydon" );
  define( "RECIPIENT_EMAIL", "roydon@roydon.fi" );
  define( "EMAIL_SUBJECT", "Viestiä nettisivuilta" );

  // Read the form values
  $success = false;
  $senderName = isset( $_POST['senderName'] ) ? preg_replace( "/[^\.\-\' a-zA-Z0-9]/", "", $_POST['senderName'] ) : "";
  $senderEmail = isset( $_POST['senderEmail'] ) ? preg_replace( "/[^\.\-\_\@a-zA-Z0-9]/", "", $_POST['senderEmail'] ) : "";
  $message = isset( $_POST['message'] ) ? preg_replace( "/(From:|To:|BCC:|CC:|Subject:|Content-Type:)/", "", $_POST['message'] ) : "";

  // If all values exist, send the email
  if ( $senderName && $senderEmail && $message ) {
    $recipient = RECIPIENT_NAME . " <" . RECIPIENT_EMAIL . ">";
    $headers = "From: " . $senderName . " <" . $senderEmail . ">";
    $success = mail( $recipient, EMAIL_SUBJECT, $message, $headers );
  }
  // Return an appropriate response to the browser
  if ( isset($_GET["ajax"]) ) {
    echo $success ? "success" : "error";
  } else {
    header('Location: /contact.php?res=' . $success);
  }
?>