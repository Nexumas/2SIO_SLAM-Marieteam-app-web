<?php
session_start();

extract($_POST, EXTR_OVERWRITE);

//connexion
$conf = parse_ini_file('../admin/db.ini');

$conn = mysqli_connect($conf['host'], $conf['user'], $conf['password'], $conf['database']) or die(mysqli_error($conn));
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
    $date = date ("Y/m/d", strtotime ($date1));
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
		
		$reqNomSecteur = $conn->prepare("SELECT nom FROM secteur WHERE idSecteur = ?");
		$reqNomSecteur->bind_param("i", $secteur);
		$reqNomSecteur->execute();

		$resSecteur = $reqNomSecteur->get_result();

		if($resSecteur){
			while($data = $resSecteur->fetch_assoc()){
				$nomSecteur = $data['nom'];
			}
		}

        $_SESSION['res_liai'] = $res;
		$_SESSION['cpt_liai'] = $compt;
        header('location: ../consultation_des_liaisons.php?secteur='.$nomSecteur.'&date='.$date);
        
    }else{
        echo 'Probleme: variable(s) nulle(s)';
    }

}

if(isset($_POST['nId'])){
    $nId = $_POST['nId'];
	$res = array();
	$tarif = array();
	$tarif_reserv = array(); //tableau tarif pour traitement reservation - ne le supprime pas !!!!
    $pour_trav = $_SESSION['pour_trav'];
    $id = $pour_trav[$nId][4];

    $req = $conn->prepare("SELECT * From traverse AS T, liaison AS L, bateau AS B WHERE T.idLiaison = L.idLiaison AND T.idBateau = B.idBateau AND T.idTraverse = ?");
    $req->bind_param("s", $id);
	$req->execute();
    $value = $req->get_result();
	
    while($data = $value->fetch_assoc()){
		$nom = $data['portDepart'].'-'.$data['portArrive'];
        array_push($res, $nom, $data['idTraverse'], $data['dateDepart'], $data['heureDepart'], $data['duree'], $data['nom'], $data['idLiaison'], $data['idBateau'], $data['idPeriode']);
    }
	$_SESSION['res_trav'] = $res;

	$req1 = $conn->prepare("SELECT * From TypePlace AS Ty, Tarif AS Ta, Traverse AS Tr WHERE Ty.idType = Ta.idType AND Tr.idLiaison = Ta.idLiaison AND Tr.idPeriode = Ta.idPeriode AND Tr.idTraverse = ?");
	$req1->bind_param("s", $id);
	$req1->execute();
	$value1 = $req1->get_result();

	while($data1 = $value1->fetch_assoc()){
		array_push($tarif, array($data1['libelle'], $data1['prixUnite']));
		array_push($tarif_reserv, $data1['prixUnite']);//ne pas supprimer
	}
	$_SESSION['tarif'] = $tarif;
	$_SESSION['tarif_reserv'] = $tarif_reserv; // ne pas supprimer
	header('location: ../consultation_des_traversees.php');
}

if(isset($_POST['modif'])){
	$idTraverse = $_SESSION['res_trav'][1];
	if(!empty($_POST['date'])){
		$dateDepart = $_POST['date'];
	}else{
		$dateDepart = strval($_SESSION['res_trav'][2]);
	}
	if(!empty($_POST['heure'])){
		$heureDepart = $_POST['heure'];
	}else{
		$heureDepart = strval($_SESSION['res_trav'][3]);
	}
	if(!empty($_POST['duree'])){
		$duree = $_POST['duree'];
	}else{
		$duree = $_SESSION['res_trav'][4];
	}
	if(!empty($_POST['idLiaison'])){
		$idLiaison = $_POST['idLiaison'];
	}else{
		$idLiaison = $_SESSION['res_trav'][6];
	}
	if(!empty($_POST['idBateau'])){
		$idBateau = $_POST['idBateau'];
	}else{
		$idBateau = $_SESSION['res_trav'][7];
	}
	if(!empty($_POST['idPeriode'])){
		$idBateau = $_POST['idPeriode'];
	}else{
		$idBateau = $_SESSION['res_trav'][8];
	}
	
	$req = 'UPDATE traverse SET dateDepart = "'.$dateDepart.'", heureDepart = "'.$heureDepart.'", duree = '.$duree.', idLiaison = "'.$idLiaison.'", idBateau = "'.$idBateau.'" WHERE idTraverse = "'.$idTraverse.'"';
	$conn->query($req);
	
	unset($_SESSION['res_trav']);
	header('location: ../admin/modification_traversees.php');
}


//Gestion de supression de traversée

if(isset($_POST['supr'])){
	$_SESSION['aSupr'] = true;
	header('location: ../admin/modification_traversees.php');
}

if(isset($_POST['supprimer'])){
	$id = $_SESSION['res_trav'][1];
	$req = 'DELETE FROM traverse WHERE idTraverse = "'.$id.'"';
	$conn->query($req);
	unset($_SESSION['res_trav']);
	unset($_SESSION['aSupr']);
	header('location: ../consultation_des_liaisons.php');
}

if(isset($_POST['annuler'])){
	$_SESSION['aSupr'] = false;
	header('location: ../admin/modification_traversees.php');
}
?>