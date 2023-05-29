<?php

    include 'db.php';
    $db=connessioneDB();

    $u=mysqli_real_escape_string($db, $_POST["username"]);
    $p=mysqli_real_escape_string($db, $_POST["password"]);
    

    session_start();
    $id=$_SESSION["id"];

    $risultato= array(false);


     if(isset($u)&& isset($p)){
      
        $query = "SELECT username FROM utente
                    WHERE username = '$u'";
        $res = mysqli_query($db, $query) or die(mysqli_error($db));
        if(mysqli_num_rows($res) === 0){
            $password = md5($p);
            $query_u= "UPDATE utente 
                        SET username='$u'
                        WHERE
                        id ='$id'
                        and
                        password='$password'";
            $res = mysqli_query($db, $query_u) or die(mysqli_error($db));
            if(mysqli_affected_rows($db) > 0 ){
                $risultato[0]=true;
            }
            else
                $risultato[0]=false;
    
        }
        else
            $risultato[0]=false;    
    }
    echo json_encode($risultato);

?>
