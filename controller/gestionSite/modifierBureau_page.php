<?php
	// Récupération des données
	session_start();
	$fonctionOfficielle = $_SESSION['fonction'];
    $idUtilisateur = $_SESSION['idUtilisateurBureau'];
	$fonctionPageAccueil =  htmlspecialchars($_POST['fonction']);

    $fonctionPageAccueil = str_replace("'", "\'", $fonctionPageAccueil);

	// Insertion en BDD
    include '../../model/model.php';

    executeNoReturn("update `bureau` set `idUtilisateur`='$idUtilisateur',`fonction`='$fonctionPageAccueil' where `idBureau`='$fonctionOfficielle'");

    // On redirige vers page administrer
    header ('Location: ../../index.php?page=administrer&bureauChange=1');
?>