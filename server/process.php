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
    if(isset($_SESSION['secteur'])){
        $secteur = $_SESSION['secteur'];
    }
    else{
        $secteur = 'Sc001';
    }

    if(!empty($date) /** && !empty($secteur)*/){

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
            array_push($res, array($compt, $data ['portDepart'], $data['portArrive'], $data['distanceMileMarin'], $data['idTraverse']));
            $compt = $compt+1;
        }
        $_SESSION['res_liai'] = $res;
        $_SESSION['cpt_liai'] = $compt;
        header('location:../consultation_des_liaisons.php');
        
    }else{
        echo 'Probleme: variable(s) nulle(s)';
    }

}

if(isset($_POST['Sc001'])){
    $_SESSION['secteur'] = 'Sc001';
}

if(isset($_POST['Sc002'])){
    $_SESSION['secteur'] = 'Sc002';
}

if(isset($_POST['nId'])){
    $nId = $_POST['nId'];
    $res = array();
    $pour_trav = $_SESSION['pour_trav'];
    $id = $pour_trav[$nId][4];
    echo $id;

    $req = "SELECT * FROM traverse WHERE idTraverse = ?";
    mysqli_bind_param($stmt, "s", $id);
    $stmt = mysqli_stmt_init($conn);
    if(!mysqli_stmt_prepare($stmt, $req)){
        echo 'Échec lors de la préparation de la requête';
    }
    else{
        $value = mysqli_getresult($stmt);
        while($data = mysqli_fetch_array($value)){
            $res = array_push($data['idTraverse'], $data['dateDepart'], $data['heureDepart'], $data['duree'], $data['idLiaison'], $data['idBateau']);
        }
        $_SESSION['res_trav'] = $res;
        header('../consultation_des_traversees.php');
    }
    
}

?>