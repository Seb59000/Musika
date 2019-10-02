<?php 
session_start();

   include '../../model/model.php';

    $pseudo= htmlspecialchars($_POST['pseudo']);
    $email= htmlspecialchars($_POST['email']);

    // On retire les '
    $pseudo = str_replace("'", " ", $pseudo);
    $pos = strpos($email, "'");
    if ($pos==false) {
        $motDePasse = htmlspecialchars($_POST['motDePasse']);
        
        // On retire les accents
        $motDePasse = str_replace("'", " ", $motDePasse);

        // On sale la chaîne
        $motDePasse = "Need" . $motDePasse . "Coffee";
     
        // Puis on hash
        $motDePasse = hash('sha512', $motDePasse);

        // On vérifie que l'adresse mail n'est pas déjà utilisée
        $result = afficherStatutUtilisateurEmail($email);

        if ($result==2)
        { // Si l'adresse mail n'est pas déjà utilisée..

          // On vérifie que le pseudo n'est pas déjà utilisée
            $result = afficherStatutUtilisateurPseudo($pseudo);

            if ($result==2)
            { // Si le pseudo n'est pas déjà utilisée..
            // On enregistre le nouveau membre 
                executeNoReturn("insert into utilisateur (idPhoto, pseudo, messagePresentation, email, motDePasse, statut, adresseTwitter, adresseFacebook, adresseGooglePlus, adresseLinkedin) values (0,'$pseudo', 'Salut à tous', '$email','$motDePasse',0,'','','','')");

            // On enregistre temporairement le mot de passe et l'email
                $_SESSION['motDePasse']=$_POST['motDePasse'];
                $_SESSION['email']=$_POST['email'];

            // On redirige vers la page de connexion_page
                header ('Location: connexion_page.php');
            } else { // Sinon.. On renvoie Session['pseudoDejaUtilise'] = true
                $_SESSION['pseudoDejaUtilise'] = true;
                header ('Location: ../../index.php?page=enregistrer');
            }
        } else { // Sinon.. On renvoie Session['emailDejaUtilise'] = true
                $_SESSION['emailDejaUtilise'] = true;
                header ('Location: ../../index.php?page=enregistrer');
        }
    } else {
        echo "Il y a un problème avec votre adresse mail, elle contient des '. Changez d'adresse mail.";
    }
?>