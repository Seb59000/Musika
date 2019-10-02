<?php
	$idMessagePerso =  $_GET['idMessagePerso'];

    include '../../model/model.php';

    executeNoReturn("delete from `messageperso` where idMessagePerso='$idMessagePerso'");

    // On redirige vers l'espace personnel
    header ('Location: ../../index.php?page=espacePerso');
?>