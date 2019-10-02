<?php
	$idMessage =  $_GET['idMessage'];

    include '../../model/model.php';

    // On vérifie que l'adresse mail n'est pas déjà utilisée
    executeNoReturn("delete from `message` where idMessage = '$idMessage'");

    // On redirige vers l'espace administrateur
    header ('Location: ../../index.php?page=administrer');
?>