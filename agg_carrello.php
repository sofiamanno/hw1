<?php 
        require 'auth.php';
        $userid = checkAuth();
        $db=ConnessioneDB();
        $userid=mysqli_real_escape_string($db,$userid);
        $query = "SELECT * FROM utente WHERE id= $userid";
        $res_1 = mysqli_query($db, $query);
        $pacchetti = array();
        $userinfo = mysqli_fetch_assoc($res_1);   
        $query1 = "SELECT ROUND(sum(c.prezzo)) as total FROM carrello l, pacchetti c where c.id=l.pacchetti_c and l.utente = $userid";
        $res_2= mysqli_query($db,$query1);
        $info= mysqli_fetch_assoc($res_2); 
        $cartinfo = json_encode($info);
        echo $cartinfo;
?>