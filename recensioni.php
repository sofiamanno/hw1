<?php 
    
    include "auth.php";

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
        
        if(!empty($_POST['title']) && !empty($_POST['review'])){
            
            $title = mysqli_real_escape_string($db,$_POST['title']);
            $review = mysqli_real_escape_string($db,$_POST['review']);
            $voto = mysqli_real_escape_string($db,$_POST['voto']);
            
            $ID = null;
            $utente=null;
    
            $query2 = "SELECT *from utente where id = '".$_SESSION['id']."'";
            $res = mysqli_query($db, $query2) or die("Errore: ".mysqli_error($conn));
            while($row = mysqli_fetch_assoc($res)){
                $ID = $row['id'];
                $utente=$row['username'];

            }
    
            $query = "INSERT into recensioni(id_recensore,titolo,recensione,voto,utente) values ('$ID',\"$title\",\"$review\",\"$voto\",\"$utente\")";
            if(mysqli_query($db,$query)){
                $posted = true;
            }
            else $posted=false;
            mysqli_close($db);
    
        }
        //$cartinfo = json_encode($info);
    ?>

<head>
<meta charset="uttf-8">
    <title>SicilyTravel - Recensioni</title>
    
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="hw1.css">
    <link rel="stylesheet" href="recensioni.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display&display=swap" rel="stylesheet">
    <script src="recensioni.js" defer></script>
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
                <em>Recensioni</em>
        </h1>

    </header>

    <article>
        <div class="containerForm">
                <form name="reviewForm" id="reviewForm" >
                    <label name="title"> Titolo Recensione (max 150 caratteri)</label></br>
                    <label><input type="text" id="title" name="title" placeholder="Scrivi il titolo..."></label></br>
                    <label name="review">La tua Recensione (max 2000 caratteri)</label></br>
                    <label><textarea id="review" name="review" placeholder="Scrivi la tua recensione..." rows="7" cols="50"></textarea></label></br>
                    <label><span>Dai un voto alla tua esperienza con noi</span></label></br>
                    <label><select name='voto'></br>
                    <option value='1'>1/5</option>
                    <option value='2'>2/5</option>
                    <option value='3'>3/5</option>
                    <option value='4'>4/5</option>
                    <option value='5'>5/5</option>
                    </select></label></br>
                    <label> <input type="submit" id="submit" value="INVIA"></label>
                </form>
            </div>

            <div class="sezioni">

            </div>

           
        </article>
        

                  
    <footer id="fo">
        Realizzato da Sofia Manno 1000015063
    </footer>

</body>

</html>