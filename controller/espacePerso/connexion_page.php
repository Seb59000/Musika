<?php 
    session_start();
    // Limitation nb tentatives de connexion
    if (isset($_SESSION['nbTentatives'])){
        $nbTentatives = $_SESSION['nbTentatives'];
        $nbTentatives += 1;
        $_SESSION['nbTentatives'] = $nbTentatives;
    } else {
        $_SESSION['nbTentatives'] = 1;     
    }
    // Si supp à 4 tentatives redirection vers message d'erreur
    if ($_SESSION['nbTentatives'] > 3) {
            header ('Location: ../../index.php?page=problemeConnexion');
    } else {
        require('../../model/model.php');
        // Si on arrive de la page de connexion
        if (isset($_POST['email']) && isset($_POST['motDePasse'])){
            $motDePasse = htmlspecialchars($_POST['motDePasse']);
            $email=  htmlspecialchars($_POST['email']);
        } else {
        // Si on arrive de la page d'enregistrement on récupère les var de session
            $motDePasse= htmlspecialchars($_SESSION['motDePasse']);
            $email=  htmlspecialchars($_SESSION['email']);

            // Puis on les efface
            unset ($_SESSION['motDePasse']);
            unset ($_SESSION['email']);
        }
        // On retire les accents
        $motDePasse = str_replace("'", " ", $motDePasse);

        // On sale la chaîne
        $motDePasse = "Need" . $motDePasse . "Coffee";

        // Puis on hash
        $motDePasse = hash('sha512', $motDePasse);
        // On récupère le statut de l'Utilisateur
        $statut = afficherStatutUtilisateur($motDePasse,$email);

        // Si les mails et mot de passe ne correspondent pas
        if ($statut==2){

            // On cherche si l'adresse mail existe en base de données
            $statut = afficherStatutUtilisateurMail($email);
            if ($statut==2){ // Si l'adresse mail n'existe pas en base de données
                $_SESSION['emailNonTrouve'] = true;
                header ('Location: ../../index.php?page=connexion');
            } else {  // Sinon c'est le mot de passe qui est erroné
                $_SESSION['motDePasseErrone'] = true;

                header ('Location: ../../index.php?page=connexion');
            }
        } else { // Sinon.. mails et mot de passe correspondent

            // On récupère l'Utilisateur
            $utilisateur = afficherUtilisateur($motDePasse,$email);

            // On stocke ses infos dans des var de session
            $id =$utilisateur->get_idUtilisateur();
            $idPhoto = $utilisateur->get_photo();
            $typePhoto = $utilisateur->get_typePhoto();
            $pseudo = $utilisateur->get_pseudo();
            $pstation = $utilisateur->get_messagePresentation();
            $statut = $utilisateur->get_statut();
            $adresseTwitter = $utilisateur->get_adresseTwitter();
            $adresseFacebook = $utilisateur->get_adresseFacebook();
            $adresseGooglePlus = $utilisateur->get_adresseGooglePlus();
            $adresseLinkedin = $utilisateur->get_adresseLinkedin();

            $_SESSION['idUtilisateur'] = $id;
            $_SESSION['idPhoto'] = $idPhoto;
            $_SESSION['typePhoto'] = $typePhoto;
            $_SESSION['pseudo'] = $pseudo;
            $_SESSION['pstation'] = $pstation;
            $_SESSION['statut'] = $statut;
            $_SESSION['adresseTwitter'] = $adresseTwitter;
            $_SESSION['adresseFacebook'] = $adresseFacebook;
            $_SESSION['adresseGooglePlus'] = $adresseGooglePlus;
            $_SESSION['adresseLinkedin'] = $adresseLinkedin;

            unset($_SESSION['nbTentatives']);

            // Si on viens de la page deposer une annonce on redirige vers deposerAnnonce?=.php
            if(isset($_SESSION['deposerAnnonce'])){
                if($_SESSION['deposerAnnonce']=='autre') {
                    unset($_SESSION['deposerAnnonce']);
                    header ('Location: ../../index.php?page=deposerannonceAutre');
                } else if($_SESSION['deposerAnnonce']=='concert') {
                    unset($_SESSION['deposerAnnonce']);
                    header ('Location: ../../index.php?page=deposerannonceConcert');
                } else if ($_SESSION['deposerAnnonce']=='musicien') {
                    unset($_SESSION['deposerAnnonce']);
                    header ('Location: ../../index.php?page=deposerannonceMusicien');
                } else if ($_SESSION['deposerAnnonce']=='matos') {
                    unset($_SESSION['deposerAnnonce']);
                    header ('Location: ../../index.php?page=deposerannonceMatos');
                }
            } else {
                // Sinon on redirige vers l'espace perso
                header ('Location: ../../index.php?page=espacePerso');
            }
        }
    }

