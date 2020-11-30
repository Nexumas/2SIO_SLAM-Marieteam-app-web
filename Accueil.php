<?php
session_start();

if($_SESSION['isConnect'] == true){
    $conn = true;
}
else{
   $conn = false; 
}

?>

<!DOCTYPE html>
<html lang="fr">
<head>
<title>MarieTeam - Accueil</title>
<link rel="stylesheet" href="css/style.css">

</head>

<body>

    <div class="header">
        <h3>MarieTeam</h3>
    </div>
    <div class="menu">
        <a href="Accueil.php">ACCUEIL</a>
        <a href="consultation_des_liaisons.php">CONSULTER LES LIAISONS</a>
        <a href="apropos.php">A PROPOS</a>
        <?php if($conn == true){echo '<a href="">MON COMPTE</a>';} ?>
    </div>

    <div class="section-top">
        <div class="content">
            <h1>MarieTeam</h1>

           <?php 

           if($conn == false){
            echo 
                '<a href="connexion.php">connexion</a>
                <h5>ou</h5>
                <a href="inscription.php">s inscrire</a>'; 
             }
            else{
                echo '<a href="user/compte.php">Mon compte</a>';
            }   
            ?>
            
        </div>
       
    </div>

    <div class="content-bottom">
    <p>copyright 2020 - MarieTeam</p>
    </div>

</body>

</html>
