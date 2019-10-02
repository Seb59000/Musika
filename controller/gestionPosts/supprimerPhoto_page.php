<?php
    $adresse = $_GET['adresse'];
    $idPhoto = $_GET['idPhoto'];
    $admin = $_GET['admin'];

    // On efface la photo du serveur
    unlink($adresse);

    // On efface la photo de la base de données
    include '../../model/model.php';
    executeNoReturn("delete from `photo` where idPhoto='$idPhoto'");

    if ($admin==0) {
        // On redirige vers l'espace perso
        header ('Location: ../../index.php?page=espacePerso');           
    } else {
        // On redirige vers l'espace amin
        header ('Location: ../../index.php?page=administrer');   
    }