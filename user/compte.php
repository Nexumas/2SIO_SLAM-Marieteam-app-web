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
<link rel="stylesheet" href="../css/style.css">

</head>

<body>

<?php if($conn == true){
    echo '<div class="header">
        <h3>MarieTeam</h3>
    </div>
    <div class="menu">
        <a href="Accueil.php">ACCUEIL</a>
        <a href="consultation_des_liaisons.php">CONSULTER LES LIAISONS</a>
        <a href="apropos.php">A PROPOS</a>
        <a href="">MON COMPTE</a>
    </div>';

    
}

else{
    die ('lol ... you are not loged ...');
}
 ?>