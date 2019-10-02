<?php 
    session_start();
	    $idExpediteur = $_SESSION['idUtilisateur'];
	    $idDestinataire = $_SESSION['idDestinataire'];
	    $contenu = htmlspecialchars($_POST['contenu']);

	    include '../../model/model.php';

	    executeNoReturn("insert into `messageperso`(`idExpediteur`, `idDestinataire`, `contenu`) VALUES ('$idExpediteur','$idDestinataire','$contenu')");

	    header ('Location: ../../index.php?page=espacePerso');
?>