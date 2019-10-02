<?php
	session_start();
	$idDestinataire =  $_SESSION['idDestinataire'];
	$idExpediteur =  $_SESSION['idUtilisateur'];
	$message =  htmlspecialchars($_POST['message']);

    include '../../model/model.php';

    executeNoReturn("insert into `messagePerso`(`idExpediteur`, `idDestinataire`, `contenu`) VALUES ('$idExpediteur' , '$idDestinataire','$message')");

    // On redirige vers l'espace personnel
    header ('Location: ../../index.php?page=espacePerso');
?>