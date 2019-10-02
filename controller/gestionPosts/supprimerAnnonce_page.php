<?php
	$idAnnonce =  $_GET['idAnnonce'];

    include '../../model/model.php';
    // On vérifie que l'adresse mail n'est pas déjà utilisée
    executeNoReturn("delete from `annonce` where idAnnonce = '$idAnnonce'");

if (isset($_GET['location'])) {
	// On redirige vers l'espace perso
    header ('Location: ../../index.php?page=espacePerso');
} else {
	// On redirige vers l'espace administrateur
    header ('Location: ../../index.php?page=administrer');
}