<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Clé secrète pour reCAPTCHA
    $secret = "verification_clee"; // Remplacez par votre clé secrète
    $response = $_POST['g-recaptcha-response'];
    $remoteip = $_SERVER['REMOTE_ADDR'];

    // Vérification reCAPTCHA
    $verify = file_get_contents("https://www.google.com/recaptcha/api/siteverify?secret={$secret}&response={$response}&remoteip={$remoteip}");
    $captcha_success = json_decode($verify);

     var_dump($captcha_success);
    if ($captcha_success->success) {
        // CAPTCHA réussi
        echo "Merci ! Votre message a été envoyé.";
    } else {
        // CAPTCHA échoué
        echo "Vérification reCAPTCHA échouée. Veuillez réessayer.";
    }
} 
?>
