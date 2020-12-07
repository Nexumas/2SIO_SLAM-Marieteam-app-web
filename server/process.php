<?php
session_start();

extract($_POST, EXTR_OVERWRITE);

//connexion
$conf = parse_ini_file('../admin/db.ini');

$conn = mysqli_connect($conf['host'], $conf['user'], $conf['password'], $conf['database']) or die(msqli_error($conn));
mysqli_set_charset($conn, "utf8");

//initialisation variables
$secteur = null;

//si echec connexion
if(mysqli_errno($conn)){
    header("HTTP/1.1 500 Internal Server Error");
}

//
if(isset($_POST['submit'])){

    $date1 = $_POST['date'];
    $date = date ("Y/m/d H:i:s", strtotime ($date1));
	$secteur = $_POST['secteur'];

    if(!empty($date) && !empty($secteur)){

        $req = $conn->prepare("SELECT * FROM liaison AS L, traverse AS T WHERE L.idLiaison = T.idLiaison AND T.dateDepart = ? AND L.idSecteur = ?");
        $req->bind_param("ss",$date, $secteur);
        $req->execute();
        $compt = 0;
        $res = array();

        

        $value = $req->get_result();
        /*$value = $conn->query($req);*/
        
        //affiche les résultats dans un tableau
        //Ligne , affiche ce que signifie chaque colone

        //stocke les résultats dans un tableau à 2 dimensions
        while ($data = $value->fetch_assoc()){
            array_push($res, array($compt, $data['portDepart'], $data['portArrive'], $data['distanceMileMarin'], $data['idTraverse']));
            $compt = $compt+1;
        }
        $_SESSION['res_liai'] = $res;
        $_SESSION['cpt_liai'] = $compt;
        header('location: ../consultation_des_liaisons.php');
        
    }else{
        echo 'Probleme: variable(s) nulle(s)';
    }

}

if(isset($_POST['nId'])){
    $nId = $_POST['nId'];
    $res = array();
    $pour_trav = $_SESSION['pour_trav'];
    $id = $pour_trav[$nId][4];

    $req = $conn->prepare("SELECT * From traverse AS T, liaison AS L, bateau AS B WHERE T.idLiaison = L.idLiaison AND T.idBateau = B.idBateau AND T.idTraverse = ?");
    $req->bind_param("s", $id);
	$req->execute();
    $value = $req->get_result();
	
    while($data = $value->fetch_assoc()){
		$nom = $data['portDepart'].'-'.$data['portArrive'];
        array_push($res, $nom, $data['idTraverse'], $data['dateDepart'], $data['heureDepart'], $data['duree'], $data['nom'], $data['idLiaison'], $data['idBateau']);
    }
    $_SESSION['res_trav'] = $res;	
	header('location: ../consultation_des_traversees.php');
}

if(isset($_POST['modif'])){
	$idTraverse = $_POST['idTraverse'];
	$dateDepart = $_POST['date'];
	$heureDepart = $_POST['heure'];
	$duree = $_POST['duree'];
	$idLiaison = $_POST['idLiaison'];
	$idBateau = $_POST['idBateau'];
	
	$req = $conn->prepare("UPDATE traverse SET dateDepart = ?, heureDepart = ?, duree = ?, idLiaison = ?, idBateau = ? WHERE idTraverse = ?");
	$req->bind_param("ssisss", $dateDepart, $heureDepart, $duree, $idLiaison, $idBateau, $idTraverse);
	$req->execute();
	
	unset($_SESSION['res_trav']);
	header('location: ../admin/modification_traversees.php');
}
?>