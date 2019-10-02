<?php 
	session_start();

	unset($_SESSION['statut']);
    unset($_SESSION['pseudo']);
    unset($_SESSION['idUtilisateur']);  
    unset($_SESSION['idPhoto']);
    unset($_SESSION['pstation']);
    header ('Location: ../../index.php?page=index');
?>