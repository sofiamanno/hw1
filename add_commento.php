<?php

    include 'auth.php';
    if (!$userid = checkAuth()) {
        header("Location: login.php");
        exit;
    }


    if(!empty($_POST['title'])&&!empty($_POST['review'])&&!empty($_POST['voto'])){
        
        $db=ConnessioneDB();
        $t=mysqli_real_escape_string($db, $_POST['title']);
        $r=mysqli_real_escape_string($db, $_POST['review']);
        $v=mysqli_real_escape_string($db, $_POST['voto']);
        $id=$_SESSION['id'];
        $username=$_SESSION['username'];

        $query="INSERT INTO recensioni VALUES ('', '$v','$id','$t','$r','$username' ) ";
        mysqli_query($db, $query) or die ("query fallita");
    }
    
?>