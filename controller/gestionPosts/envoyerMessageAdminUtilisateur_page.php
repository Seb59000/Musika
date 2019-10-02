<?php
	session_start();
	$idUtilisateur =  $_SESSION['idDestinataire'];
	$message =  htmlspecialchars($_POST['message']);

    include '../../model/model.php';

    executeNoReturn("insert into `messagePerso`(`idExpediteur`, `idDestinataire`, `contenu`) VALUES (36 , '$idUtilisateur','$message')");

    // On redirige vers l'espace administrateur
    header ('Location: ../../index.php?page=administrer');
?>