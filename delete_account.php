<?php
// Connessione al database
include 'db.php';
$db=connessioneDB();



// ID dell'account da cancellare
session_start();
$id=$_SESSION["id"];

// Query per cancellare l'account
$query = "DELETE FROM utente WHERE id = $id";

if ($db->query($query) === TRUE) {
    
    // Cancellazione riuscita, effettua il logout
    session_start();
    session_destroy();
    // Reindirizzamento alla homepage
    header("Location: index.php");
    exit;
    
} 
    else {
    echo "Errore durante la cancellazione dell'account: " . $db->error;
}

// Chiusura della connessione al database
$db->close();
?>
