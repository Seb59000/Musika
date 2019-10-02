<?php
	$idBonPlan =  $_GET['idBonPlan'];

    include '../../model/model.php';
    // On Efface le bon plan
    executeNoReturn("delete from `bonplan` where idBonPlan = '$idBonPlan'");

	// On redirige vers l'espace administrateur
    header ('Location: ../../index.php?page=administrer&supprBonPlan=1');
?>