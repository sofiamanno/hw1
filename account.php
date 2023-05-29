<?php 
    include 'auth.php';
    if (!$userid = checkAuth()) {
        header("Location: login.php");
        exit;
    }
?>
<html>
<?php 
        $db=ConnessioneDB();
        $userid=mysqli_real_escape_string($db,$userid);
        $query = "SELECT * FROM utente WHERE id= $userid";
        $res_1 = mysqli_query($db, $query);
        $pacchetti = array();
        $userinfo = mysqli_fetch_assoc($res_1);   
        $query1 = "SELECT ROUND(sum(c.prezzo)) FROM carrello l, pacchetti c where c.id=l.pacchetti_c and l.utente = $userid";
        $res_2= mysqli_query($db,$query1);
        $info= mysqli_fetch_assoc($res_2); 

        //$cartinfo = json_encode($info);
    ?>


<head>
    <meta charset="uttf-8">
    <title>SicilyTravel - Account</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="hw1.css">
    <link rel="stylesheet" href="account.css">
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
                <em>Il tuo Account</em>
        </h1>
        
        <a id="out" href="logout.php">LOGOUT</a>

    </header>

    <section class="scelte">

        <div>
        <img src="images/password.png"/>
        <a href="cambio_pass.php"><p>Cambia Password</p></a>
        </div>
        
        
        <div>
        <img src="images/username.png"/>
        <a href="cambio_username.php"><p>Cambia Username</p></a>
        </div>
        
        
        <div>
        <img src="images/delacc.png"/>
        <a href="delete_account.php"><p>Elimina Account</p></a>
        </div>
        
    </section>

                  
    <footer id="fo">
        Realizzato da Sofia Manno 1000015063
    </footer>

</body>

</html>