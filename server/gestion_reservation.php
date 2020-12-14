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

    }

}

?>