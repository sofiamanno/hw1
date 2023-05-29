<?php 
    include 'auth.php';
    if (!$userid = checkAuth()) {
        header("Location: login.php");
        exit;
    }
    
    $db=ConnessioneDB();
    $userid=mysqli_real_escape_string($db,$userid);
    $recensione = array();
    $query = "SELECT * FROM recensioni";
    $res_1 = mysqli_query($db, $query);
    while($row = mysqli_fetch_assoc($res_1)) {
        $recensione[]=$row;
    } 
    mysqli_free_result($res_1);
    mysqli_close($db);
    $newReview = json_encode($recensione);
    echo $newReview;
?>