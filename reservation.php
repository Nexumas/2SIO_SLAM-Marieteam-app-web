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
<title>MarieTeam - reservation</title>
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
                echo '<a href="../admin/modification_traversees.php">MODIFIER TRAVERSEES</a>';
                echo '<a href="../admin/stats.php">STATISTIQUES</a>';
            }
            if($isConn == true){
                echo '<a href="user/compte.php"><img src="images/profil.png" style="width: 15px; height: 15px;  vertical-align: middle;"> ' . $nameUser . '</a>';           
                echo '<a href="server/deconnexion.php">DECONNEXION</a>';
            } 
        ?>
    </div>

<?php 
echo '<form method="post" action="server/gestion_reservation.php">';
echo '<div class="reserv_header">';
echo '<p>Liaison : ' . $_SESSION['res_trav'][0] . '</p>';
echo '<p>Traverse : ' . $_SESSION['res_trav'][2] . ' ' . $_SESSION['res_trav'][3] .'</p>';
echo '</div>';

echo '<div class="content_reserv">';
echo '<table class="tab_tarif"><tr>
<th>| Passager |</th>
<th>| Tarifs   |</th>
</tr>';

$tabTarif = $_SESSION['tarif'];

for($i = 0; $i < count($tabTarif); $i++){
    echo '<tr>
    <td align="center">' . $tabTarif[$i][0] . '</td>
    <td align="center">'. $tabTarif[$i][1] .' €</td>
    <td><input type="number" name="quantite'.$i.'" placeholder="quantite"></td>
    </tr>';
}
echo '</table>';

if($isConn == true){
    echo '<button class="btn_reserv" type="submit" name="reserver"  onclick="return(confirm("Etes-vous sûr de vouloir supprimer cette entrée"));">Reserver</button>
    </form>';
}else{
    echo '<p>Vous devez être connecter pour reserver</p>';
}

?>
