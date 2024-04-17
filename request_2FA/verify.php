<?php
session_start();
include "../connection.php";
include "./config.php";
$token = $_POST['token'];
$conn = new_connection();
$sql = "SELECT * FROM utenti WHERE id='" . $_SESSION['id'] . "'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // output data of each row
    $row = $result->fetch_assoc();

    $params = json_encode(array(
        'secret' => $row['private_key'],
        'token' => $token
    ));

    // Definisci la URL
    $domain_name = get_domain_name();
    $url = "$domain_name/api/verify";

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
        if (isset($data['verified'])) {
            if ($data['verified'] == "true") {
                $_SESSION['state_login'] = "true";
                $_SESSION['verified'] = "true";
                $sql = "UPDATE utenti SET state = 'validate' WHERE id = '" . $_SESSION['id'] . "'";
                $result = $conn->query($sql);
                if ($result) {
                    header('Location: /Project_2fa/home/');
                } else {
                    echo "Error: " . $sql . "<br>" . $conn->error;
                }
            } else {
                $_SESSION['verified'] = "false";
                header('Location: /Project_2fa/signup/verify.php');
            }
        } else {
            error_API();
        }
    }

    // Chiudi la connessione cURL
    curl_close($curl);
} else {
    echo "0 results";
}
