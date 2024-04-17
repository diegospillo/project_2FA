<?php
session_start();
include "../connection.php";
include "./config.php";

$username = $_POST['username'];
$password = md5($_POST['password']);

$conn = new_connection();

$sql = "SELECT * FROM utenti WHERE username = '" . $username . "'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    $_SESSION['signup'] = "false";
    header('Location: /Project_2fa/signup/');
} else {
    $_SESSION['signup'] = "true";
    $_SESSION['username'] = $username;

    $params = json_encode(array(
        'username' => $username
    ));

    // Definisci la URL
    $domain_name = get_domain_name();
    $url = "$domain_name/api/register";

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
        // Decodifica la risposta JSON (se attesa)
        $data = json_decode($response, true);
        if (isset($data['id'])) {
            // Utilizza i dati della risposta
            $sql = "INSERT INTO utenti (id, username, password, private_key, state) VALUES ('" . $data['id'] . "','" . $username . "', '" . $password . "', '" . $data['secret'] . "', 'verify')";
            $result = $conn->query($sql);
            if ($result) {
                echo "Utente registrato!";
                $_SESSION['signup'] = "true";
                $_SESSION['id'] = $data['id'];
                $_SESSION['secret'] = $data['secret'];
                $_SESSION['data_url'] = $data['data_url'];
                header('Location: /Project_2fa/signup/register.php');
            } else {
                echo "Error: " . $sql . "<br>" . $conn->error;
            }
        } else {
            error_API();
        }
    }

    // Chiudi la connessione cURL
    curl_close($curl);
}