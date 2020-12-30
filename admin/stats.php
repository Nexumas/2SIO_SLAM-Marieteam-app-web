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
<title>MarieTeam - Accueil</title>
<link rel="stylesheet" href="../css/style.css">

</head>

<body>

<?php
if($isAdmin && $isConn){
    echo 
        '<div class="header">
            <h3>MarieTeam</h3>
        </div>
        <div class="menu">
            <a href="../index.php">ACCUEIL</a>
            <a href="../consultation_des_liaisons.php">CONSULTER LES LIAISONS</a>
            <a href="../apropos.php">A PROPOS</a>';
        echo '<a href="../user/compte.php"><img src="../images/profil.png" style="width: 15px; height: 15px;  vertical-align: middle;"> ' .$nameUser. '</a>'; 
        echo '<a href="../server/deconnexion.php">DECONNEXION</a>';
        echo '</div>';

        echo'
        <form method="post" action="../server/display.php">
        <div class="form-group">
        <td>
            <input class="form-control" name="dateDebut" placeholder="Début de la période" type="date"/>
            <input class="form-control" name="dateFin" placeholder="Fin de la période" type="date"/>
        </td>
        <td>
            <button class="btn btn-primary" name="periode" type="submit">Submit</button>
        </td>
        </div>
        </form>
    </body>

    </html>';
}else{
    header('location:../index.php');
}