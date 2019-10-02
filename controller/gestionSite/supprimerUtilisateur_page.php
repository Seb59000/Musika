<?php
	$idUtilisateur =  $_GET['idUtilisateur'];
    include '../../model/model.php';

    // On vérifie que l'adresse mail n'est pas déjà utilisée
    executeNoReturn("delete from `utilisateur` where idUtilisateur = '$idUtilisateur'");

    // On redirige vers l'espace administrateur
    header ('Location: ../../index.php?page=administrer');