<?php
require_once 'recaptchalib.php';
$privatekey = getenv('RECAPTCHA_PRIVATE');
$resp = recaptcha_check_answer ($privatekey,
  $_SERVER["REMOTE_ADDR"],
  $_POST["recaptcha_challenge_field"],
  $_POST["recaptcha_response_field"]);

if (!$resp->is_valid) {
  echo 'success';
} else {
  var_dump($resp);
  die ("The reCAPTCHA wasn't entered correctly. Go back and try it again." .
    "(reCAPTCHA said: $resp->error)");
}
?>