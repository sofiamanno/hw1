<?php 
    include 'auth.php';
    if (!$userid = checkAuth()) {
        header("Location: login.php");
        exit;
    }

    $db=ConnessioneDB();
    $userid=mysqli_real_escape_string($db,$userid);
    $pacchettiid = urlencode($_GET["q"]);
    $query = "SELECT pacchetti_c, COUNT(id) as quantita FROM carrello WHERE utente = $userid and pacchetti_c= $pacchettiid";
    $res_1 = mysqli_query($db, $query);
    while($row = mysqli_fetch_assoc($res_1)) {
        $pacchetti[]=$row;
    } 
    mysqli_free_result($res_1);
    mysqli_close($db);
    $newpacchetti = json_encode($pacchetti);
    echo $newpacchetti;
?>