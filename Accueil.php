<?php
session_start();

$isConn = false;

if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true) {
    $isConn = true;
    $nameUser = $_SESSION['userName'];
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
    </div>

    <div class="section-top">
        <div class="content">
            <h1>MarieTeam</h1>

           <?php 

           if($isConn == false){
            echo 
                '<a href="connexion.php">connexion</a>
                <h5>ou</h5>
                <a href="inscription.php">s inscrire</a>'; 
             }
            else{
                echo '<a href="user/compte.php">COMPTE: ' . $nameUser .'</a>;
                <h5>ou</h5>
                <a href="server/deconnexion.php">SE DECONNETER</a>';
            }   
            ?>
            
        </div>
       
    </div>

    <div class="content-bottom">
    <p>copyright 2020 - MarieTeam</p>
    </div>

</body>

</html>
