
<html>

<head>
    <meta charset="uttf-8">
    <title>SicilyTravel - LOGIN</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="hw1.css">
    <link rel="stylesheet" href="login.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display&display=swap" rel="stylesheet">
    <script src="menu_mobile.js" defer></script>
    <link rel="shortcut icon" href="images/sicily.png" />
    
</head>

<body>
    
    <header id="intestazione">
    <div id="Overlay"></div>
      <nav>
            <div id="logo">
                <a>SicilyTravel</a>
            </div>

            <div id="tasti">
                <a href="index.php">HOME</a>
                <a href="pacchetti.php">PACCHETTI</a>
                <a href="recensioni.php">RECENSIONI</a>
                <?php
                  
                  if(isset($_SESSION['id'])){
                    echo '<a href="account.php"><img src="images/account.png"></a>';
                  }
                  else{
                    echo '<a href="login.php">LOGIN</a>';
                  }
                ?>
                <?php
                  
                  if(isset($_SESSION['id'])){
                    foreach($info as $value) {if(strcmp($value, '')==0){echo '<a id="carrello" href="carrello.php">0.00€<img src="images/carti.png"></a>';} else echo '<a id="carrello" href="carrello.php">'.$value.'.00€<img src="images/carti.png"></a>';};
                  }
                  else{
                    echo '<a id="carrello" href="carrello.php"><img src="images/carti.png"></a>';
                  }
                ?>
                <div id="menu_icon">
                  <div></div>
                  <div></div>
                  <div></div>
                </div>
            </div>

        </nav>

        <div id="menu_mobile" class="menu_mobile">
            <a href="index.php">HOME</a>
            <a href="pacchetti.php">PACCHETTI</a>
            <a href="recensioni.php">RECENSIONI</a>
            <?php
                  
              if(isset($_SESSION['id'])){
                echo '<a href="account.php"><img src="images/account.png"></a>';
              }
              else{
                echo '<a href="login.php">LOGIN</a>';
              }
              ?>
              <?php
                  
                if(isset($_SESSION['id'])){
                  foreach($info as $value) {if(strcmp($value, '')==0){echo '<a id="carrello" href="carrello.php">0.00€<img src="images/carti.png"></a>';} else echo '<a id="carrello" href="carrello.php">'.$value.'.00€<img src="images/carti.png"></a>';};
                }
                else{
                  echo '<a id="carrello" href="carrello.php"><img src="images/carti.png"></a>';
                }
              ?>
        </div>      
        <h1>
        <strong>SicilyTravel</strong><br>
                <em>Login</em>
        </h1>


        <?php
        require "db.php";
        $db=connessioneDB();
        session_start();

        if(isset($_POST['username'])&&isset($_POST['password'])){
            $u=mysqli_real_escape_string($db, $_POST["username"]);
            $p=md5(mysqli_real_escape_string($db, $_POST["password"]));
            

            $query="SELECT id, username, password FROM utente WHERE username='$u'";
            $result=mysqli_query($db, $query);

            if($result==""){
                echo '<p class="errore">"QUERY NON ESEGUITA"</p>';
            }
            else{
                $row=mysqli_fetch_array($result);
                if($row==null){
                    echo '<p class="errore"> NESSUN UTENTE TROVATO, RIPROVARE</p>';

                }
                else{
                    if($row['password']===$p){

                        $_SESSION['id']=$row['id'];
                        $_SESSION['username']=$u;
                        header('Location: index.php');
                    }
                    else{
                        echo '<p class="errore">PASSWORD ERRATA</p>';
                    }
                }
            }
        }
        mysqli_close($db);


        ?>

        <section id="log">
            
            <form name='login' method='post'>
                    <p>username</p>
                  <div><input type="text" name="username"></div>
                    <p>password</p>
                  <div><input type="password" name="password"></div>
                  
                  <div><input type="submit" value="LOGIN"></div>
                  
            </form>
            <div class="signup">Non hai un account? <a href="registrazione.php">Clicca qui!</a></div>
        </section>
        
    </header>
    

    <footer id="fo">
        Realizzato da Sofia Manno 1000015063
    </footer>

</body>

</html>