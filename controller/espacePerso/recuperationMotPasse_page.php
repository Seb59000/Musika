<?php  
	session_start();
    include '../../model/model.php';
    $email=  htmlspecialchars($_POST['email']);

    // On récupère le statut de l'Utilisateur
    $statut = afficherStatutUtilisateurMail($email);

    // Si le mail n'est pas dans la base de donnée
    if ($statut==2){
    	// On stocke le mail dans une var de session
        $_SESSION['mailTemp'] = $email;

    	// On redirige vers le message d'erreur correspondant
            header ('Location: ../../index.php?page=adresseMailNonTrouvée');

    } else { // Sinon..
    	// Création d'un code aléatoire
		$random = rand(5, 15000);

	    // On récupère l'ID de l'Utilisateur
	    $id = afficherIdUtilisateur($email);

	    // On stocke l'id et le code en BDD
	    executeNoReturn("insert into recuperationMDP (idUtilisateur, code) values ('$id','$random')");
	    
    	
		// Envoie de Mail //

		// message
		$subject = "Récupération de mot de passe Musika l'Assault";
		$msg = "Pour récupérer votre mot de passe veuillez suivre le lien suivant\nhttp://127.0.0.1:8080/MusikalAssault/controleur/recuperationCode.php?rep=".$random."&cd=".$id;

		// use wordwrap() if lines are longer than 70 characters
		$msg = wordwrap($msg,70);
		$headers = 'From: webmaster@MusikaLAssault.com' . "\r\n" .
		    'Reply-To: webmaster@MusikaLAssault.com' . "\r\n" .
		    'X-Mailer: PHP/' . phpversion();
		// envoie email
		//mail($email,$subject,$msg,$headers);

		// Redirection
        header ('Location: ../../index.php?page=recuperationMotDePasseConfirmation');
    }
?>