<?php
	$statut =  $_GET['statut'];
	$idUtilisateur =  $_GET['idUtilisateur'];
    require('../../model/model.php');

	// Si le statut est égal à zero
	if ($statut==0){
		// on met le statut à 1
	    executeNoReturn("update utilisateur set statut= 1 where idUtilisateur = '$idUtilisateur '");

	} else {
		// Sinon on met le statut à 0
	    executeNoReturn("update utilisateur set statut= 0 where idUtilisateur = '$idUtilisateur '");
	}

    // On redirige vers l'espace administrateur
    header ('Location: ../../index.php?page=administrer');
?>