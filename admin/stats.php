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
if($isAdmin && $isConn ){
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


    if(isset($_SESSION['Cat']) && isset($_SESSION['CA'])){
        echo '<table><tr><td>Chiffre d affaire engendré </td><td>||</td><td> ',$_SESSION['CA'],'</td></tr></table>';
        echo '';
        echo '';
        echo '<table><tr><td>Catégorie </td><td>||</td><td> nombre de places vendues</td></tr>';
        $i = 0;
        while($i<count($_SESSION['Cat'])){
            echo '<tr><td>',$_SESSION['Cat'][$i][0],' </td><td>||</td><td> ',$_SESSION['Cat'][$i][1],'</td></tr>';
            $i = $i+1;
        }
        echo '<tr><td>Total </td><td>||</td><td> ',$_SESSION['Total'],'</td></tr></table>';
        unset($_SESSION['Cat']);
        unset($_SESSION['CA']);
        unset($_SESSION['Total']);
    }else{
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
        </form>';
    }
    
    echo '</body>

    </html>';
}

else{
    header('location:../index.php');
}

?>