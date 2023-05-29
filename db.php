<?php 
    function ConnessioneDB(){
        $db_host="127.0.0.1";
        $db_user="root";
        $db_password="";
        $db_name="hw1";
        $db=mysqli_connect($db_host, $db_user, $db_password);
        if($db == FALSE) die ("Impossibile connettersi al server database");
        mysqli_select_db($db, $db_name) or die("Impossibile trovare il database");
        return $db;

  }

  
function verifica_log(){
  if($_SESSION['ID']==null){  
      header('Location: index.php');
      session_destroy();
  }
}

?>