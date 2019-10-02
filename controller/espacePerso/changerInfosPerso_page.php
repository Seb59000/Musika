<?php
	session_start();
    require('../../model/model.php');
	$idUtilisateur =  $_SESSION['idUtilisateur'];
	$reqSQL = "update utilisateur set ";

// Récuperation du pseudo
	$pseudo = '';
	if ($_POST['pseudo']!=""){
		$pseudo =  htmlspecialchars($_POST['pseudo']);
    	$pseudo = str_replace("'", " ", $pseudo);
        $_SESSION['pseudo'] = $pseudo;
		$reqSQL = $reqSQL . "pseudo='".$pseudo."',";
	} else {
		$pseudo =  $_SESSION['pseudo'];
	}

// Récuperation du Message de Presentation
	$MessagePresentation = '';
	if ($_POST['MessagePresentation']!=""){
		$MessagePresentation =  htmlspecialchars($_POST['MessagePresentation']);
    	$MessagePresentation = str_replace("'", " ", $MessagePresentation);
        $_SESSION['pstation'] = $MessagePresentation;
		$reqSQL = $reqSQL . "messagePresentation='".$MessagePresentation."',";
	} else {
		echo "passé par ici<br>";
		$MessagePresentation =  $_SESSION['pstation'];
	}

// Récuperation du twitter
	$twitter = '';
	if ($_POST['twitter']!=""){
		$twitter =  htmlspecialchars($_POST['twitter']);
        $_SESSION['adresseTwitter'] = $twitter;
    	$twitter = str_replace("'", " ", $twitter);
		$reqSQL = $reqSQL . "adresseTwitter='".$twitter."',";

	}

// Récuperation du facebook
	$facebook = '';
	if ($_POST['facebook']!=""){
		$facebook =  htmlspecialchars($_POST['facebook']);
    	$facebook = str_replace("'", " ", $facebook);
        $_SESSION['adresseFacebook'] = $facebook;
		$reqSQL = $reqSQL . "adresseFacebook='".$facebook."',";

	}

// Récuperation du google
	$google = '';
	if ($_POST['google']!=""){
		$google =  htmlspecialchars($_POST['google']);
    	$google = str_replace("'", " ", $google);
        $_SESSION['adresseGooglePlus'] = $google;
		$reqSQL = $reqSQL . "adresseGooglePlus='".$google."',";
	}

// Récuperation du linkedin
	$linkedin = '';
	if ($_POST['linkedin']!=""){
		$linkedin =  htmlspecialchars($_POST['linkedin']);
    	$linkedin = str_replace("'", " ", $linkedin);

        $_SESSION['adresseLinkedin'] = $linkedin;
		$reqSQL = $reqSQL . "adresseLinkedin='".$linkedin."',";
	}


// Requetes SQL
// Si Mail renseigné
	if ($_POST['email']!=""){
		$email =  htmlspecialchars($_POST['email']);
    	$email = str_replace("'", " ", $email);
		$reqSQL = $reqSQL . "pseudo='".$email."' where idUtilisateur = '$idUtilisateur '";
		executeNoReturn($reqSQL);
		echo $reqSQL;

	} else {
		$reqSQL = substr($reqSQL, 0, -1);
		$reqSQL = $reqSQL . " where idUtilisateur = '$idUtilisateur '";
		executeNoReturn($reqSQL);
		echo $reqSQL;
	}

    // On redirige vers l'espace perso
    header ('Location: ../../index.php?page=espacePerso&infosPerso=1');
?>