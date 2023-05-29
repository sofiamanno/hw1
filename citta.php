<?php
    include "db.php";
    $db=ConnessioneDB();
    $result=mysqli_query($db, 'SELECT * FROM citta ');
    if($result==""){
        "Query non eseguita";
    }
    $citta=array();
    while($row= mysqli_fetch_assoc($result)){
        $citta[] = $row;
    }
    mysqli_close($db);
    echo json_encode($citta);
    
?>