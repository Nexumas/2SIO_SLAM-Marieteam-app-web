<?php

session_start();

$isConfirm = false;

if(isset($_SESSION['purchase']) && $_SESSION['purchase'] == true){
    $isConfirm = true;
}

if($isConfirm = true){
    $un = $_SESSION['userName'];
    $id =  $_SESSION['idReserv'];
    $pt = $_SESSION['prixTotal'];
    echo '<p>Compte : ' .$un.'</p></br>';
    echo '<p>id de reservation ' .$id. '</p></br>';
    echo '<p>prix total : ' .$pt. '</p></br>';
    echo '<button href="../index.php">Retour Accueil</button>';

}else{
    die('erreur aucune confirmation !');
}


?>