<?php

//connexion
$config = parse_ini_file('../admin/db.ini');

$conn = mysqli_connect($config['host'], $config['user'], $config['password'], $config['database']);

//message confirmation de connxion -- Test
if(!$conn){
    die('Error 403 - Echec de la connexion au serveur !');
}
else{
    echo '<p>success</p>';
}


//Variables
extract($_POST, EXTR_OVERWRITE);



?>