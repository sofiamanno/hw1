<?php 
    require 'db.php';

    if (!isset($_GET["q"])) {
        echo "Non dovresti essere qui";
        exit;
    }

    header('Content-Type: application/json');
    $db=connessioneDB();
    $mail = mysqli_real_escape_string($db, $_GET["q"]);
    $query = "SELECT mail FROM utente
                WHERE mail = '$mail'";

    $res = mysqli_query($db, $query) or die(mysqli_error($db));
    echo json_encode(array('exists' => mysqli_num_rows($res) > 0 ? true : false));
    mysqli_close($db);
?>