<?php 

if(isset($_POST['submit'])) {
    if(!isset($_POST['g-recaptcha-response']) || empty($_POST['g-recaptcha-response'])) {
        echo 'reCAPTHCA verification failed, please try again.';
    } else {
        $secret = '6LeiK5ocAAAAAKBWqEDwocrNKAXMPwgsA0bxPibb';

        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, 'https://www.google.com/recaptcha/api/siteverify?secret='.$secret.'&response='.$_POST['g-recaptcha-response']);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        $response = curl_exec($ch);
        curl_close($ch);
        $response = json_decode($response);

        if($response->success) {
            // What happens when the CAPTCHA was entered incorrectly
            echo 'Successful verification.';
        } else {
            // Your code here to handle a successful verification
            echo 'reCAPTHCA verification failed, please try again.';
        }
    }
}

 ?>


<html>
  <head>
    <title>Google reCAPTCHA v2 Checkbox</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/css/bootstrap.min.css">
	<script src="https://www.google.com/recaptcha/api.js" async defer></script>
  </head>
  <body>
<div class="container pt-5">
<form action="index.php" method="post">
<!----Recaptcha creation--->	
    
    <div class="g-recaptcha" data-sitekey="6LeiK5ocAAAAAAM7YFzQhKcCoIZsrUi-rIo_mWzh"></div>
	<input class="btn btn-info" type="submit" name="submit" value="SUBMIT" >
</form>
</div>
</body>
</html>