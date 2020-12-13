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
        <?php if($isConn == true){echo '<a href="user/compte.php"> COMPTE: ' . $nameUser . '</a>';           
                              echo '<a href="server/deconnexion.php">DECONNEXION</a>';
                              } ?>
    </div>

<?php 
echo '<p>Liaison : ' . $_SESSION['res_trav'][0] . '</p>';
echo '<p>Traverse : ' . $_SESSION['res_trav'][2] . ' ' . $_SESSION['res_trav'][3] .'</p>';
?>
