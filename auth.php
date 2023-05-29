<?php 
    require 'db.php';
    session_start();

    function checkAuth() {
        
        if(isset($_SESSION['id'])) {
            return $_SESSION['id'];
        } else 
            return 0;
    }
    
?>