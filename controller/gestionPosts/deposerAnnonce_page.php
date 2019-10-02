<?php 
    session_start();
    require('../../model/model.php');
	$extension = "";
	$categorie = $_GET['categorie'];
	$_SESSION['erreurPhoto'] = "";

  	// Si il y a une photo //

	if (file_exists($_FILES["fileToUpload"]['tmp_name'])){
	    $target_dir = "../../public/img/PhotosAnnonce/";
	    $target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
	    $uploadOk = 1;
	    $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

	    // Verify if image file is a actual image or fake image

	    if(isset($_POST["submit"])) {
	        $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
	        if($check !== false) {
	            $uploadOk = 1;
	        } else {
	        	$_SESSION['erreurPhoto'] = "Votre fichier n'est pas une image.<br>";
	            $uploadOk = 0;
	        }
	    }

	    // Verify file size

	    if ($_FILES["fileToUpload"]["size"] > 500000) {
	        $uploadOk = 0;
	        $_SESSION['erreurPhoto'] = "Désolé, votre photo est trop volumineuse.<br>";
	    }

	    // Allow certain file formats

	    if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
	    && $imageFileType != "gif" ) {
	        $_SESSION['erreurPhoto'] = "Seul les types JPG, JPEG, PNG & GIF sont autorisés.";
	        $uploadOk = 0;
	    }

	    // Verify if $uploadOk is set to 0 by an error

	    if ($uploadOk == 0) {
	        $_SESSION['erreurPhoto'] = $_SESSION['erreurPhoto']."Photo non téléchargé.<br>";
	            // on redirige en fonction de la catégorie d'annonce dont on vient
	            if ($categorie=='autre'){
	            	header ('Location: ../../index.php?page=deposerannonceAutre');
	            } else if ($categorie=='concert'){
	            	header ('Location: ../../index.php?page=deposerannonceConcert');
	            } else  if ($categorie=='matos'){
	            	header ('Location: ../../index.php?page=deposerannonceMatos');
	            } else {
	            	header ('Location: ../../index.php?page=deposerannonceMusicien');
	            }

	    } else {  // if everything is ok, try to upload file
	        if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {

	        	// Enregistrement en BDD
	            $extension = recupererExtension($imageFileType);
	            $idDerniereAnnonce = enregistrerAnnonceAvecPhotoBDD($extension);
	            
	            // On renomme la photo dans le dossier d'arrivée
	            $extension = renomer($imageFileType, $idDerniereAnnonce);

	            // On redirige
	            header ('Location: ../../index.php?page=confirmationDepotAnnonce');
	        } else { // Si on n'y arrive pas
	            $_SESSION['erreurPhoto'] = "Désolé, il y a eu une erreur pendant le téléchargement de votre photo.";
	            // on redirige en fonction de la catégorie d'annonce dont on vient
	            if ($categorie=='autre'){
	            	header ('Location: ../../index.php?page=deposerannonceAutre');
	            } else if ($categorie=='concert'){
	            	header ('Location: ../../index.php?page=deposerannonceConcert');
	            } else  if ($categorie=='matos'){
	            	header ('Location: ../../index.php?page=deposerannonceMatos');
	            } else {
	            	header ('Location: ../../index.php?page=deposerannonceMusicien');
	            }
	        }
	    }
	} else {  // Si il n'y a pas de photo //

	    $idExpediteur = $_SESSION['idUtilisateur'];


	    $titre = htmlspecialchars($_POST['titre']);
	    $contenu = htmlspecialchars($_POST['contenu']);

    	$titre = str_replace("'", "\'", $titre, $count);
    	$contenu = str_replace("'", "\'", $contenu, $count);


	    if ($categorie=='concert'){
    		if (!isset($_POST['date'])){
				$_SESSION['choisirDate'] = "1";
				header ('Location: ../../index.php?page=deposerannonceConcert');
			} else {
    			executeNoReturn("insert into annonce (categorie, idExpediteur, titre, contenu, date, type_photo) values ('concert','$idExpediteur','$titre','$contenu','$date','0')");
	    		header ('Location: ../../index.php?page=confirmationDepotAnnonce');
			}
	    } else {
			if (isset($_POST['date'])){ // On verifie que la date a été renseignée.
		    	$date = htmlspecialchars($_POST['date']);
	    		$date = str_replace("'", " ", $date, $count);
				executeNoReturn("insert into annonce (categorie, idExpediteur, titre, contenu, date, type_photo) values ('$categorie','$idExpediteur','$titre','$contenu','$date','0')");			
			} else {
			executeNoReturn("insert into annonce (categorie, idExpediteur, titre, contenu, date, type_photo) values ('$categorie','$idExpediteur','$titre','$contenu',now(),'0')");
			}	    	
	    	header ('Location: ../../index.php?page=confirmationDepotAnnonce');
	    }
	}

    function enregistrerAnnonceAvecPhotoBDD($extension){
        $idDerniereAnnonce = 0;
        $idExpediteur = $_SESSION['idUtilisateur'];
		$categorie = $_GET['categorie'];

		if ($categorie == 'concert')
		{
			SuppressOldConcerts();
		}
		if (isset($_POST['date'])){
	    	$date = htmlspecialchars($_POST['date']);
    		$date = str_replace("'", " ", $date, $count);
		}
	    $titre = htmlspecialchars($_POST['titre']);
	    $contenu = htmlspecialchars($_POST['contenu']);

    	$titre = str_replace("'", "\'", $titre, $count);
    	$contenu = str_replace("'", "\'", $contenu, $count);
    	
	    if ($categorie=='concert'){
    		if (!isset($_POST['date'])){
				$_SESSION['choisirDate'] = "1";
				header ('Location: ../../index.php?page=deposerannonceConcert');
			} else {
    			executeNoReturn("insert into annonce (categorie, idExpediteur, titre, contenu, date, type_photo) values ('concert','$idExpediteur','$titre','$contenu','$date','$extension')");
    			echo "insert into annonce (categorie, idExpediteur, titre, contenu, date, type_photo) values ('concert','$idExpediteur','$titre','$contenu','$date','$extension')";
			}
	    } else {
    		executeNoReturn("insert into annonce (categorie, idExpediteur, titre, contenu, date, type_photo) values ('$categorie','$idExpediteur','$titre','$contenu',now(),'$extension')");
	    }

	    // Recuperation id Derniere annonce postée
        $idDerniereAnnonce = afficheridAnnonce();

        return $idDerniereAnnonce;
    }

    function recupererExtension($imageFileType){
        if($imageFileType == "jpg") {
            $extension = ".jpg";
        } else if($imageFileType == "png") {
            $extension = ".png";
        } else if($imageFileType == "jpeg") {
            $extension = ".jpeg";
        } else if($imageFileType == "gif") {
            $extension = ".gif";
        }

        return $extension;
    }

    function renomer($imageFileType, $idDerniereAnnonce){
        $ancienNom = "../../public/img/PhotosAnnonce/";
        $ancienNom = $ancienNom . basename($_FILES["fileToUpload"]["name"]);

        $nouveauNom ="../../public/img/PhotosAnnonce/";
        $nouveauNom = $nouveauNom . $idDerniereAnnonce;

        if($imageFileType == "jpg") {
            $nouveauNom = $nouveauNom . ".jpg";
        } else if($imageFileType == "png") {
            $nouveauNom = $nouveauNom . ".png";
        } else if($imageFileType == "jpeg") {
            $nouveauNom = $nouveauNom . ".jpeg";
        } else if($imageFileType == "gif") {
            $nouveauNom = $nouveauNom . ".gif";
        }

        rename($ancienNom, $nouveauNom);
    }
