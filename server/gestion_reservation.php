<?php 

session_start();

//Variables
extract($_POST, EXTR_OVERWRITE);

//connexion
$config = parse_ini_file('../admin/db.ini');

$conn = mysqli_connect($config['host'], $config['user'], $config['password'], $config['database']) or die(mysqli_error($conn));
$conn->set_charset('utf8');

//si erreur
if(mysqli_errno($conn)){
    header("HTTP/1.1 500 Internal Server Error");
}

else{

    if(isset($_POST['reserver'])){

        if(!empty($_POST['quantite0']) || !empty($_POST['quantite1']) || !empty($_POST['quantite2']) || !empty($_POST['quantite3']) || !empty($_POST['quantite4'])){

            $idUtil = $_SESSION['idUser'];//recuperation id utilisateur
            $idTrav = $_SESSION['res_trav'][1];//recuperation id traverse

            $today = date("Y/m/d H:i");//recuperation date et heure du jour

            try{

                //requete insertion reservation
                $reqReserv = $conn->prepare("INSERT INTO reservation (dateReservation, idUtilisateur, idTraverse)
                VALUES(?,?,?)");
                $reqReserv->bind_param("sis", $today, $idUtil, $idTrav);
                $reqReserv->execute();

                //requete recuperation id reservation
                $reqTraitement = $conn->prepare("SELECT idReservation FROM reservation WHERE idUtilisateur = ? AND idTraverse = ? AND dateReservation = ?");
                $reqTraitement->bind_param("iss", $idUtil, $idTrav, $today);
                $reqTraitement->execute();

                $result = $reqTraitement->get_result();

                if($result){
                    $fetch = $result->fetch_assoc();
                    $idres = $fetch['idReservation'];
                }else{
                    die('erreur id pour reservation');
                }
            
            }catch(Exception $e){
                echo $e->getMessage();
            }

            echo $idres . '</br>';

            //gestion des quantites 
            //requetes insertion quantites places reservees lies a une reservation
            try{
                if(!empty($_POST['quantite0']) && $_POST['quantite0'] >= 0){
                    $q1 = $_POST['quantite0'];
                    $idType1 = "A1";
                    $req1 = $conn->prepare("INSERT INTO associer (idReservation, idType, nombrePlaces) VALUES(?,?,?)");
                    $req1->bind_param("isi", $idres, $idType1, $q1);
                    $req1->execute();
                }else{
                    $q1 = 0;
                }
                if(!empty($_POST['quantite1']) && $_POST['quantite1'] >= 0){
                    $q2 = $_POST['quantite1'];
                    $idType2 = "A2";
                    $req2 = $conn->prepare("INSERT INTO associer (idReservation, idType, nombrePlaces) VALUES(?,?,?)");
                    $req2->bind_param("isi", $idres, $idType2, $q2);
                    $req2->execute();
                }else{
                    $q2 = 0;
                }
                if(!empty($_POST['quantite2']) && $_POST['quantite2'] >= 0){
                    $q3 = $_POST['quantite2'];
                    $idType3 = "A3";
                    $req3 = $conn->prepare("INSERT INTO associer (idReservation, idType, nombrePlaces) VALUES(?,?,?)");
                    $req3->bind_param("isi", $idres, $idType3, $q3);
                    $req3->execute();
                }else{
                    $q3 = 0;
                }
                if(!empty($_POST['quantite3']) && $_POST['quantite3'] >= 0){
                    $q4 = $_POST['quantite3'];
                    $idType4 = "B1";
                    $req4 = $conn->prepare("INSERT INTO associer (idReservation, idType, nombrePlaces) VALUES(?,?,?)");
                    $req4->bind_param("isi", $idres, $idType4, $q4);
                    $req4->execute();
                }else{
                    $q4 = 0;
                }
                if(!empty($_POST['quantite4']) && $_POST['quantite4'] >= 0){
                    $q5 = $_POST['quantite4'];
                    $idType5 = "B2";
                    $req5 = $conn->prepare("INSERT INTO associer (idReservation, idType, nombrePlaces) VALUES(?,?,?)");
                    $req5->bind_param("isi", $idres, $idType5, $q5);
                    $req5->execute();
                }else{
                    $q5 = 0;
                }

                //recupere le nombre de points de fidelite de l'utilisateur
                $reqFidelSelect = $conn->prepare("SELECT nbPoint FROM utilisateur WHERE idUtilisateur = ?");
                $reqFidelSelect->bind_param("i", $idUtil);
                $reqFidelSelect->execute();

                $resultFidel = $reqFidelSelect->get_result();
                
                if($resultFidel){
                    $fetchFidel = $resultFidel->fetch_assoc();
                    $pointFidel = $fetchFidel['nbPoint'];
                }else{
                    $pointFidel = 0;
                }

                $reqDate = $conn->prepare("SELECT TIMESTAMPDIFF(MONTH, NOW(), traverse.dateDepart) FROM traverse)");
                $reqDate->execute();

                $resultDate = $reqDate->get_result();

                if($resultDate){

                    $fetchDate = $resultDate->fetch_assoc();

                    $dateDiff = $fetchDate[1];

                    echo $pointFidel;
                    echo $dateDiff;

                    if($dateDiff >= 2){

                        $pointFidel = $pointFidel + 25;

                        $reqFidel = $conn->prepare("UPDATE utilisateur SET nbPoint = ?");
                        $reqFidel->bind_param("iss", $pointFidel);
                        $reqFidel->execute();

                        

                        
                    }else{

                    }
                }
                
                //calcul prix total
                $tarif = $_SESSION['tarif_reserv'];
                $tar1 = $tarif[0];
                $tar2 = $tarif[1];
                $tar3 = $tarif[2];
                $tar4 = $tarif[3];
                $tar5 = $tarif[4];

                $res = (($q1* $tar1) + ($q2*$tar2) + ($q3*$tar3) + ($q4*$tar4) + ($q5*$tar5));
                $_SESSION['prixTotal'] = $res;
                $_SESSION['idReserv'] = $idres;
                
                $_SESSION['purchase'] = true;
                //redirection vers page finale
                header('location:../user/confirm_purchase.php');

            }catch(Exception $e){
                echo $e->getMessage();
            }

        }
    }

}

?>