<?php
session_start();
// On recupère la page à afficher //
if (isset($_GET['page'])) {
    $getPage = $_GET['page'];
    // Section pages simple affichage
    if ($getPage == 'connexion') {
        require('view/espacePerso/connexion.php');
    }
    elseif ($getPage == 'enregistrer') {
        require('view/espacePerso/enregistrer.php');
    }
    elseif ($getPage == 'recuperation') {
        require('view/espacePerso/recuperation.php');
    }
    elseif ($getPage == 'contact') {
        require('view/gestionPosts/contact.php');
    } 
    elseif ($getPage == 'adresseMailNonTrouvee') {
        require('view/espacePerso/adresseMailNonTrouvee.php');
    }
    else {
        if ($getPage == 'accueil') {
            require('controller\affichage\controller.php');
            accueil();
        }
        elseif ($getPage == 'administrer') {
            require('controller\gestionSite\controller.php');
            administrer();
        }
        elseif ($getPage == 'annoncesAutres') {
            require('controller\affichage\controller.php');
            annoncesAutres();
        }
        elseif ($getPage == 'annoncesConcerts') {
            require('controller\affichage\controller.php');
            annoncesConcerts();
        }
        elseif ($getPage == 'annoncesMatos') {
            require('controller\affichage\controller.php');
            annoncesMatos();
        }
        elseif ($getPage == 'annoncesMusiciens') {
            require('controller\affichage\controller.php');
            annoncesMusiciens();
        }
        elseif ($getPage == 'bonsPlans') {
            require('controller\affichage\controller.php');
            bonsPlans();
        }
        elseif ($getPage == 'galeriePhoto') {
            require('controller\affichage\controller.php');
            galeriePhoto();
        }
        elseif ($getPage == 'changementCode') {
            require('controller\espacePerso\controller.php');
            changementCode();
        }
        elseif ($getPage == 'changerInfosPerso') {
            require('controller\espacePerso\controller.php');
            changerInfosPerso();
        }
        elseif ($getPage == 'changerMotDePasseRegular') {
            require('controller\espacePerso\controller.php');
            changerMotDePasseRegular();
        }
        elseif ($getPage == 'deposerannonceAutre') {
            require('controller\gestionPosts\controller.php');
            deposerannonceAutre();
        }
        elseif ($getPage == 'deposerannonceConcert') {
            require('controller\gestionPosts\controller.php');
            deposerannonceConcert();
        }
        elseif ($getPage == 'deposerannonceMatos') {
            require('controller\gestionPosts\controller.php');
            deposerannonceMatos();
        }    
        elseif ($getPage == 'deposerannonceMusicien') {
            require('controller\gestionPosts\controller.php');
            deposerannonceMusicien();
        }
        elseif ($getPage == 'deposerBonPlan') {
            require('controller\gestionPosts\controller.php');
            deposerBonPlan();
        }
        elseif ($getPage == 'deposerPhotogalerie') {
            require('controller\gestionPosts\controller.php');
            deposerPhotogalerie();
        }
        elseif ($getPage == 'envoyerMessageAdminUtilisateur') {
            require('controller\gestionPosts\controller.php');
            envoyerMessageAdminUtilisateur();
        }
        elseif ($getPage == 'envoyerMessagePerso') {
            require('controller\gestionPosts\controller.php');
            envoyerMessagePerso();
        }
        elseif ($getPage == 'espacePerso') {
            require('controller\espacePerso\controller.php');
            espacePerso();
        }
        elseif ($getPage == 'modifierBureau') {
            require('controller\gestionSite\controller.php');
            modifierBureau();
        }
        elseif ($getPage == 'televerserPhoto') {
            require('controller\espacePerso\controller.php');
            televerserPhoto();
        }         
        // Par défaut on redirige vers l'accueil //
        else {
            require('controller\affichage\controller.php');
            accueil();
        }
    }
}
else {
    require('controller\affichage\controller.php');
    accueil();
    accueil();
    accueil();
    accueil();
    accueil();
    accueil();
    accueil();
    accueil();    accueil();
    accueil();
    accueil();
    accueil();
    accueil();
    accueil();
    accueil();
    accueil();    accueil();
    accueil();
    accueil();
    accueil();
    accueil();
    accueil();
    accueil();
    accueil();    accueil();
    accueil();
    accueil();
    accueil();
    accueil();
    accueil();
    accueil();
    accueil();
}