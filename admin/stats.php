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
<link rel="stylesheet" href="../css/style.css">

</head>

<body>
    <!-- DEBUT NAVBAR -->
    <div class="header">
        <h3>MarieTeam</h3>
    </div>
    <div class="menu">
        <a href="../index.php">ACCUEIL</a>
        <a href="../consultation_des_liaisons.php">CONSULTER LES LIAISONS</a>
        <a href="../apropos.php">A PROPOS</a>
    </div>
    <!-- FIN NAVBAR  -->

    <!-- DEBUT Sélection de la date-->

    <!-- Form code begins -->
    <form method="post" action="../server/display.php">
	<div class="form-group">
	<td>
        <input class="form-control" name="dateDebut" placeholder="Début de la période" type="date"/>
        <input class="form-control" name="dateDebut" placeholder="Fin de la période" type="date"/>
	</td>
	<td>
		<button class="btn btn-primary" name="submit" type="submit">Submit</button>
	</td>
	</div>
	</form>
	<!-- Form code ends --> 
</body>