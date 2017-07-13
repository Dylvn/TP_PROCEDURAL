<?php

require 'vendor/autoload.php';

$key = array_search($_SESSION['login'], $users['login']);
$email = $users['email'][$key];

$cookies = array();

foreach ($_COOKIE as $key => $value) {
    if (is_int($key)) {
        $cookies[$key] = array();
        array_push($cookies[$key],$articles['title'][$key]);
        array_push($cookies[$key],$articles['prix'][$key]);
    }
}

$message = '';

foreach ($cookies as $key => $value) {
    
    foreach ($cookies[$key] as $clef => $valeur) {
        if ($clef == 0) {
            $message .= '<p>Item choisis :';
            $message .= $valeur;
        } elseif ($clef == 1) {
            $message .= '<br>Prix :';
            $message .= $valeur;
            $message .= '€</p>';
        }
    }
    
}

$mail = new PHPMailer;

$mail->isSMTP();                                   // Set mailer to use SMTP
$mail->Host = 'smtp.gmail.com';  // Specify main and backup SMTP servers
$mail->SMTPAuth = true;                               // Enable SMTP authentication
$mail->Username = 'test@gmail.com';                 // SMTP username
$mail->Password = '';                           // SMTP password
$mail->SMTPSecure = 'tls';                            // Enable TLS encryption, `ssl` also accepted
$mail->Port = 587;                                    // TCP port to connect to

$mail->setFrom('test@gmail.com', 'Mailer');
$mail->addAddress( $email, $_SESSION['login'] );     // Add a recipient

$mail->isHTML(true);                                  // Set email format to HTML

$mail->Subject = 'Votre liste d\'email';
$mail->Body    = $message;
$mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

if(!$mail->send()) {
    $_SESSION['error'] = 'Une erreur c\'est produite';
} else {
    $_SESSION['success'] = 'Votre message a bien été envoyé !';
    // unset cookies
    if (isset($_SERVER['HTTP_COOKIE'])) {
        $cookies = explode(';', $_SERVER['HTTP_COOKIE']);
        foreach($cookies as $key => $cookie) {
            if ($key != 0 || end($cookies) != $key) {

                $parts = explode('=', $cookie);
                $name = trim($parts[0]);
                setcookie($name, '', time()-1000);
                setcookie($name, '', time()-1000, '/');
            }
        }
    }
}

header('Location: index.php');

