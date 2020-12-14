<?php
session_start();

$isConn = false;

if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true) {
    $isConn = true;
} 

?>

<!DOCTYPE html>
<html lang="fr">
<head>
<title>MarieTeam - Compte</title>
<link rel="stylesheet" href="../css/style.css">

</head>

<body>

<?php if($isConn == true){
    echo '<div class="header">
        <h3>MarieTeam</h3>
    </div>
    <div class="menu">
        <a href="Accueil.php">ACCUEIL</a>
        <a href="consultation_des_liaisons.php">CONSULTER LES LIAISONS</a>
        <a href="apropos.php">A PROPOS</a>
        <a href=""> COMPTE: ' . $_SESSION['userName'] . '</a>
        <a href="../server/deconnexion.php">DECONNEXION</a>
    </div>';

    $i = 0;
    $tab = $_SESSION['user'];

    while($i < count($tab)){
        echo $tab[$i] . '</br>';
        $i = $i + 1;
    }
    echo $_SESSION['nbPoint'];

}

else{
    die ('lol ... you are not loged ...');
}
 ?>