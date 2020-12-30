<?php
session_start();

$isConn = false;

if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true) {
    $isConn = true;
    $nameUser = $_SESSION['userName'];
} 
if(isset($_SESSION['admin']) && $_SESSION['admin'] == true){
    $isAdmin = true;
}
else{
    $isAdmin = false;
}

?>

<!DOCTYPE html>
<html lang="fr">
<head>
<title>MarieTeam - A propos</title>
<link rel="stylesheet" href="css/style.css">

</head>

<body>

<div class="header">
        <h3>MarieTeam</h3>
    </div>
    <div class="menu">
        <a href="index.php">ACCUEIL</a>
        <a href="consultation_des_liaisons.php">CONSULTER LES LIAISONS</a>
        <a href="apropos.php">A PROPOS</a>
        <?php 
            if($isAdmin){
            echo '<a href="../admin/stats.php">STATISTIQUES</a>';
            }
            if($isConn){
            echo '<a href="../user/compte.php"><img src="images/profil.png" style="width: 15px; height: 15px;  vertical-align: middle;"> ' .$nameUser. '</a>'; 
            echo '<a href="../server/deconnexion.php">DECONNEXION</a>';
            }
        ?>
</div>

<div>
    <h3 align="center">Qu'est ce que MarieTeam ? </h3>
</div>

</body>
</html>