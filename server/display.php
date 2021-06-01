<?php
session_start();


extract($_POST, EXTR_OVERWRITE);

//connexion
$conf = parse_ini_file('../admin/db.ini');

$conn = mysqli_connect($conf['host'], $conf['user'], $conf['password'], $conf['database']) or die(mysqli_error($conn));
mysqli_set_charset($conn, "utf8");

if(isset($_POST['periode'])){
    $_SESSION['stats'] = true; //sert à l'affichage de la page stats.php
    $date1 = $_POST['dateDebut'];
    $dateDebut = date ("Y/m/d", strtotime($date1)); //change le format de la date
    $date2 = $_POST['dateFin'];
    $dateFin = date ("Y/m/d", strtotime($date2)); //change le format de la date

    //Pour le CA
    $resCA = 0;

    $reqCA = $conn->prepare("SELECT SUM(R.prixTotal) AS CA FROM reservation as R, traverse AS T WHERE R.idTraverse = T.idTraverse AND T.dateDepart BETWEEN ? AND ?"); //sélectionne la somme de prixTotal des réservations des traversées dans la période donnée
    $reqCA->bind_param("ss",$dateDebut,$dateFin);
    $reqCA->execute();
    $value = $reqCA->get_result();

    while($data = $value->fetch_assoc()){
        $resCA = $data['CA'];
    }

    $_SESSION['CA'] = $resCA; //pour le transport du chiffre d'affaire dans stats.php


    //Pour les passagers
    $resPassager = array(); //pour stocker la catégorie et le nombre de passagers de celle-ci
    $resTotal = 0; //pour stocker le total de passagers

    $reqPassager = $conn->prepare("SELECT Ty.libelle AS libelle, SUM(A.nombrePlaces) AS Passagers FROM associer AS A, reservation AS R, traverse AS Tr, typeplace as Ty WHERE A.idReservation = R.idReservation AND R.idTraverse = Tr.idTraverse AND A.idType = Ty.idType AND Tr.dateDepart BETWEEN ? AND ? GROUP BY Ty.libelle"); //renvoit le total de passager par catégorie dans la période donnée
    $reqPassager->bind_param("ss",$dateDebut,$dateFin);
    $reqPassager->execute();
    $value2 = $reqPassager->get_result();

    while($data2 = $value2->fetch_assoc()){
        array_push($resPassager, array($data2['libelle'], $data2['Passagers'])); //stocke le nombre de passagers par catégorie
    }

    $i = 0;
    while($i<count($resPassager)){
        $resTotal = $resTotal + $resPassager[$i][1]; //calcule le total de passagers
        $i = $i + 1;
    }


    $_SESSION['Cat'] = $resPassager; //transport du nombre de passagers par catégorie vers stats.php
    $_SESSION['Total'] = $resTotal; //transport du total de passagers vers stats.php

    header("location:../admin/stats.php");

}

?>