<?php
            //connettiamoci al DB
            session_start();
            include 'db.php';
            $db=ConnessioneDB();
            if(!empty($_POST["username"]) && !empty($_POST["mail"])&& !empty($_POST["password"])&& !empty($_POST["password_v"])){
                $u=mysqli_real_escape_string($db, $_POST["username"]);
                if(mysqli_num_rows(mysqli_query($db,"SELECT id, username FROM utente WHERE username='$u'"))>0)
                {
                    echo "!!!";
                    exit();
                }
                $m=mysqli_real_escape_string($db, $_POST["mail"]);
                if(mysqli_num_rows(mysqli_query($db,"SELECT id, username FROM utente WHERE mail='$m'"))>0)
                {
                    echo "!!!";
                    exit();
                }
                $p=md5(mysqli_real_escape_string($db, $_POST["password"]));
                mysqli_query($db,"INSERT INTO utente VALUES ('','$u','$p','$m')") or die ("Impossibile eseguire la query");
                $resulta=mysqli_query($db, "SELECT id, username FROM utente WHERE username='$u'");
                $rowa = mysqli_fetch_array($resulta);
                $_SESSION['id']=$rowa['id'];
                $_SESSION['username']=$rowa['username'];
            }
?>