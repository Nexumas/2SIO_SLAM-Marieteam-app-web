<?php

session_start();

$isConfirm = false;

if(isset($_SESSION['purchase']) && $_SESSION['purchase'] == true){
    $isConfirm = true;
}

if($isConfirm = true){
    $name = $_SESSION['userName'];
    $id = $_GET['id'];
    $pt = $_GET['prixt'];

    echo '<p>Compte : ' .$name.'</p></br>';
    echo '<p>id de reservation ' .$id. '</p></br>';
    echo '<p>prix total : ' .$pt. ' €</p></br>';
    echo '<a href="../index.php">Retour Accueil</a>';

}else{
    die('erreur aucune confirmation !');
}


?>