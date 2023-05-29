<html>

<head>
    <meta charset="uttf-8">
    <title>SicilyTravel - Sign Up</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="hw1.css">
    <link rel="stylesheet" href="registrazione.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display&display=swap" rel="stylesheet">
    <script src="menu_mobile.js" defer></script>
    <script src="registrazione.js" defer></script>
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
                <em>Registrazione</em>
        </h1>

        <section id="signup">
            
            <form name='dati' method='post'>
                    <p>username</p>
                    <div><input type="text" name="username" id="username"></div>
                    <span id="errore_username" class="errore"></span>
                    <br>

                    <p>e-mail</p>
                    <div><input type="text" name="mail" id="mail"></div>
                    <span id="errore_mail" class="errore"></span>
                    <br>

                    <p>password</p>
                    <div><input type="password" name="password" id="password"></div>
                    <span id="errore_password" class="errore"></span>
                    <br>

                    <p>conferma password</p>
                    <div><input type="password" name="password_v" id="password_v"></div>
                    <span id="errore_password_v" class="errore"></span>
                    <br>

                    <div><input type="submit" value="VAI!"></div>
                  
            </form>
           
        </section>
        
    </header>
    

    <footer id="fo">
        Realizzato da Sofia Manno 1000015063
    </footer>

</body>

</html>