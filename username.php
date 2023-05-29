<?php
    include "db.php";
    $db=connessioneDB();
    $query="SELECT username FROM utente";
    $result=mysqli_query($db, $query);
    if($result==""){
        "Query non eseguita";
    }

    $usernames=array();
    while($row=mysqli_fetch_assoc($result)){
        $usernames[]=$row;
    }
    mysqli_close($db);
    echo json_encode($usernames);
?>