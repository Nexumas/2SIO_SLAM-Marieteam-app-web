<?php

$isConfirm = false;

if(isset($_SESSION['purchase']) && $_SESSION['purchase'] == true){
    $isConfirm = true;
}

if($isConfirm = true){
    echo '<p>Compte : ' .$_SESSION['userName'].'</p></br>';
    echo '<p>id de reservation ' . $_SESSION['idReserv']. '</p></br>';
    echo '<p>prix total : ' . $_SESSION['prixTotal'] . '</p></br>';
    echo '<button href="../Accueil.php">Retour Accueil</button>';

}else{
    die('erreur aucune confirmation !');
}


?>