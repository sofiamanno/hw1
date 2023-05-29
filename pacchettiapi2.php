<?php 
    require 'auth.php';
    if (!$userid = checkAuth()) {
        header("Location: login.php");
        exit;
    }
    $db=ConnessioneDB();
    $userid=mysqli_real_escape_string($db,$userid);
    $pacchetti = array();
    if(!empty($_POST['cerca_testo'])){
        $citta= mysqli_real_escape_string($db,  $_POST['cerca_testo']) ;
        $query="SELECT citta.titolo, citta.img, pacchetti.* FROM pacchetti JOIN citta on citta.id=pacchetti.citta WHERE citta.titolo LIKE '$citta'";
        $res_1=mysqli_query($db, $query);
        while($row = mysqli_fetch_assoc($res_1)) {
                $pacchetti[]=$row;
        } 
        mysqli_free_result($res_1);
        mysqli_close($db);
        $newpacchetti = json_encode($pacchetti);
        echo $newpacchetti;
    }
   
?>