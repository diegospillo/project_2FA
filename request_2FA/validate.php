<?php
session_start();
include "./config.php";

$private_key = $_SESSION['private_key'];
$token = $_POST['token'];

$params = json_encode(array(
    'secret' => $private_key,
    'token' => $token
));

// Definisci la URL
$domain_name = get_domain_name();
$url = "$domain_name/api/validate";

// Inizializza cURL
$curl = curl_init();

// Imposta le opzioni di cURL
curl_setopt($curl, CURLOPT_URL, $url);
curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
curl_setopt($curl, CURLOPT_POST, true);
curl_setopt($curl, CURLOPT_POSTFIELDS, $params);

// Esegui la richiesta
$response = curl_exec($curl);

// Controlla gli errori
$error = curl_error($curl);

if ($error) {
    echo "Errore cURL: " . $error;
    error_API();
} else {
    $data = json_decode($response, true);
    if (isset($data['validated'])) {
        if ($data['validated'] == "true") {
            $_SESSION['validated'] = "true";
            header('Location: /Project_2fa/home/');
        } else {
            $_SESSION['validated'] = "false";
            header('Location: /Project_2fa/login/validate.php');
        }
    } else {
        error_API();
    }
}

// Chiudi la connessione cURL
curl_close($curl);
