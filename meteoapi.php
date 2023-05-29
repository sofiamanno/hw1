<?php
if(!isset($_GET['q'])){
    exit;
}
$q=$_GET['q'];
// URL dell'API WeatherAPI
$url = "http://api.weatherapi.com/v1/current.json?key=183b8acdd852454f86c82803232505&q='$q'";

// Inizializza la sessione curl
$curl = curl_init();

// Imposta l'URL e altre opzioni per la richiesta curl
curl_setopt($curl, CURLOPT_URL, $url);
curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);

// Esegui la richiesta curl
$response = curl_exec($curl);

// Controlla se la richiesta ha avuto successo
if ($response === false) {
    $error = curl_error($curl);
    // Gestisci l'errore in qualche modo
    echo "Errore nella richiesta curl: " . $error;
} else {
    // Decodifica la risposta JSON in un array associativo
    $data = json_decode($response, true);

    // Ritorna la risposta come JSON
    header('Content-Type: application/json');
    echo json_encode($data);
}

// Chiudi la sessione curl
curl_close($curl);
?>
