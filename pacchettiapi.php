<?php 
    require 'auth.php';
    if (!$userid = checkAuth()) {
        header("Location: login.php");
        exit;
    }
    $db=ConnessioneDB();
    $userid=mysqli_real_escape_string($db,$userid);
    $pacchetti = array();
    if(isset($_GET['q'])){
        $q=$_GET['q'];
        $query = "SELECT pacchetti.*, citta.titolo, citta.img FROM pacchetti JOIN citta ON pacchetti.citta=citta.id  WHERE citta='$q' ORDER BY pacchetti.giorno";
    }
    else{
        $query = "SELECT pacchetti.*, citta.titolo, citta.img FROM pacchetti JOIN citta ON pacchetti.citta=citta.id ORDER BY pacchetti.giorno";
    }
    $res_1 = mysqli_query($db, $query);
    while($row = mysqli_fetch_assoc($res_1)) {
            $pacchetti[]=$row;
    } 
    mysqli_free_result($res_1);
    mysqli_close($db);
    $newpacchetti = json_encode($pacchetti);
    echo $newpacchetti;
?>