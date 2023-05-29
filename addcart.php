<?php 
    include 'auth.php';
    if (!$userid = checkAuth()) {
        exit;
    }


    $db=ConnessioneDB();
    $userid=mysqli_real_escape_string($db,$userid);
    $pacchettiid = urlencode($_GET["q"]);

    $query = "INSERT INTO carrello(utente,pacchetti_c) VALUES ('$userid','$pacchettiid')";
    $res = mysqli_query($db,$query);
?>