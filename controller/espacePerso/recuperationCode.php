<?php
	session_start();
	
	$id = htmlspecialchars($_GET['cd']);
	$codeRecu = htmlspecialchars($_GET['rep']);

    include '../../model/model.php';

    // On récupère le code stocké en BDD
    $codeStocke = recupererCode($id);

    if ($codeStocke == $codeRecu) {
    	// On stocke l'idUtilisateur temporairement
		$_SESSION['idUserTemp'] = $id;

		// on efface les codes temporaires de la BDD
    	executeNoReturn("delete from `recuperationMDP` where idUtilisateur = '$id'");

		  if (!isset($_SESSION['idUserTemp'])){
		  	echo'not set';
		    header ('Location: ../../index.php?page=erreurChangementCode');
		  } else {
		  	  	echo'set';
		  }
		// Redirection vers page de changement de code
        header ('Location: ../../index.php?page=changementCode.php');
    } else {
    	// Redirection vers message d'erreur
        header ('Location: ../../index.php?page=erreurChangementCode.php');
    }
