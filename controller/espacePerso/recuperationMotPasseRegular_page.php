<?php
	session_start();
	$idUtilisateur = $_SESSION['idUtilisateur'];

	$motDePasse = htmlspecialchars($_POST['motDePasse']);

    // On sale la chaîne
    $motDePasse = "Need" . $motDePasse . "Coffee";
 
    // Puis on hash
    $motDePasse = hash('sha512', $motDePasse);

    // On sauvegarde en BDD
    include '../../model/model.php';

    executeNoReturn("update `utilisateur` set `motDePasse`='$motDePasse' where idUtilisateur='$idUtilisateur'");

    // On redirige vers page succès
	header('Location: ../../index.php?page=motDePasseChange');
?>