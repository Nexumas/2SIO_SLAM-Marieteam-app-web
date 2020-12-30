<?php
session_start();


extract($_POST, EXTR_OVERWRITE);

//connexion
$conf = parse_ini_file('../admin/db.ini');

$conn = mysqli_connect($conf['host'], $conf['user'], $conf['password'], $conf['database']) or die(mysqli_error($conn));
mysqli_set_charset($conn, "utf8");

if(isset($_POST['periode'])){
    $_SESSION['stats'] = true;
    $date1 = $_POST['dateDebut'];
    $dateDebut = date ("Y/m/d", strtotime($date1));
    $date2 = $_POST['dateFin'];
    $dateFin = date ("Y/m/d", strtotime($date2));
    $resCA = 0;

    $reqCA = $conn->prepare('SELECT SUM(R.prixTotal) AS CA FROM reservation as R, traverse AS T WHERE R.idTraverse = T.idTraverse AND R.dateReservation BETWEEN "?" AND "?"');
    $reqCA->bind_param("ss",$dateDebut,$dateFin);
    $reqCA->execute();
    $value = $reqCA->get_result();

    while($data = $value->fetch_assoc()){
        $resCA = $data[0];
    }

    $_SESSION['CA'] = $resCA;
    echo $resCA;
}