<?php 
    include 'auth.php';
    if (!$userid = checkAuth()) {
        exit;
    }


    $db=ConnessioneDB();
    $userid=mysqli_real_escape_string($db,$userid);
    $pacchettiid = urlencode($_GET["q"]);

    $query = "DELETE FROM carrello WHERE utente=$userid and pacchetti_c=$pacchettiid LIMIT 1";
    $res = mysqli_query($db,$query);
?>