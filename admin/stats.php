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
<link rel="stylesheet" href="css/style.css">

</head>

<body>
</body>