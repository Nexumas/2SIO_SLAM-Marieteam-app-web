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

    if(!empty($date) /** && !empty($secteur)*/){

        $req = $conn->prepare("SELECT * FROM liaison AS L, traverse AS T WHERE L.idLiaison = T.idLiaison AND T.dateDepart = ?");
        $req->bind_param("s",$date);
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
    $secteur = 'Sc001';
}

if(isset($_POST['Sc002'])){
    $secteur = 'Sc002';
}

?>