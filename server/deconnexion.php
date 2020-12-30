<?php 
session_start();
if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true) {
    echo 'veuillez patientez';
    session_destroy();
    header('Location:../index.php');
}else{
    echo 'erreur';
}