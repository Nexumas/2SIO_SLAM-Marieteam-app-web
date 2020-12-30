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
        <a href="index.php">ACCUEIL</a>
        <a href="consultation_des_liaisons.php">CONSULTER LES LIAISONS</a>
        <a href="apropos.php">A PROPOS</a>
        <a href="../server/deconnexion.php">DECONNEXION</a>
    </div>';

    $i = 0;
    $tab = $_SESSION['user'];

    while($i < count($tab)){
        switch($i){
            case $i == 0 && $i == 1:
                echo 'Nom : ' . $tab[$i] . '</br>';
                break;
            case $i == 1:
                echo 'Prenom : ' . $tab[$i] . '</br>';
                break;
            case $i == 2:
                echo 'email : ' . $tab[$i] . '</br>';
                break;
        }
        $i = $i + 1;
    }
    echo 'Points fidélité : ' . $_SESSION['nbPoint'];

}

else{
    header('location:../connexion.php');
}
 ?>