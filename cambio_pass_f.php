<?php
    
    include 'db.php';
    $db=connessioneDB();

    $o=mysqli_real_escape_string($db, $_POST["vecchia_password"]);
    $p=mysqli_real_escape_string($db, $_POST["password"]);
    $p_c=mysqli_real_escape_string($db, $_POST["password_c"]);

    $o=md5($o);
    $p=md5($p);
    $p_c=md5($p_c);

    session_start();
    $id=$_SESSION["id"];

    $risultato= array(false);

     if(isset($o)&& isset($p)&& isset($p_c)){
      
        $query = "SELECT id FROM utente
                    WHERE password ='$o' and id='$id'";
        $res = mysqli_query($db, $query) or die(mysqli_error($db));
        if(mysqli_num_rows($res) > 0){
            if($p_c===$p){
                $query_u= "UPDATE utente 
                        SET password='$p'
                        WHERE
                        id ='$id'";
                $res = mysqli_query($db, $query_u) or die(mysqli_error($db));
                $risultato[0]=true;
            }
            else {
                $risultato[0]=false;
            }
        }
        else
            $risultato[0]=false;
     }
     echo json_encode($risultato);

?>  
