<?php
/**
 * appel le modèle affichage et l'affichage de la page d'accueil
 * @return [view]
 */
function accueil()
{
	require('model/affichage/model.php');
	include 'model/class/Annonce.php';
    include 'model/class/UtilisateurBureau.php';
	$arrayAnnonces = afficherAnnoncesAccueil();
  	$nbTotalPhotos = afficherNbPhotos();
  	$arrayPhotos = afficherPhotosAccueil();
    $arrayUtilisateursB = afficherUtilisateursBureau();  

    require('view/affichage/accueil.php');
}
/**
 * afficherAnnoncesAccueil affiche les Annonces de la page d'Accueil
 * @return [Array] [arrayAnnoncesConcerts]
 */
function afficherAnnoncesAccueil() { 
    include 'model/class/Photo.php';
    $resultat = execute("select * from `annonce` order by date desc limit 0,3"); // from accueil
    $arrayAnnoncesConcerts = null;
    $index=0;

    while ($donnees = $resultat->fetch())
    {    
        $idAnnonce = $donnees['idAnnonce']; 
        $categorie = $donnees['categorie']; 
        $idExpediteur = $donnees['idExpediteur']; 
        $titre = $donnees['titre']; 
        $contenu = $donnees['contenu']; 
        $date = $donnees['date']; 
        $type_photo = $donnees['type_photo']; 

        $annonceConcerts = new Annonce($idAnnonce, $categorie, $idExpediteur, $titre, $contenu, $date, $type_photo); 

        $arrayAnnoncesConcerts[$index] = $annonceConcerts;
        $index++;
    }

    return $arrayAnnoncesConcerts;
}
/**
 * annoncesAutres Affiche la page des annonces catégorie autre
 * @return [view] [description]
 */
function annoncesAutres()
{
	require('model/affichage/model.php');
    include 'model/class/Annonce.php';
  	$nbTotalAnnoncesAutres = afficherNbAnnonces('Autre');
  	if ($nbTotalAnnoncesAutres>0){
		  // On récupère l'index du premier Utilisateur auquel on s'est arreté dans le tableau
		  $indexPremierAnnonceAutres = 0 ;
		  if (isset($_GET['indexPremierAnnonceAutres'])){
		    $indexPremierAnnonceAutres = ($_GET['indexPremierAnnonceAutres']*10);
		    $_SESSION['indexPremierAnnonceAutres'] = $indexPremierAnnonceAutres;
		  } else {
			    if (isset($_SESSION['indexPremierAnnonceAutres'])){
			      $indexPremierAnnonceAutres = $_SESSION['indexPremierAnnonceAutres'];
			    }

			    if (isset($_GET['avancerAnnoncesMatos'])){
			      $indexPremierAnnonceAutres += 10;
			      unset($_GET['avancerAnnoncesMatos']);
			      if ($indexPremierAnnonceAutres > $nbTotalAnnoncesAutres){
			      $indexPremierAnnonceAutres -= 10;
			      }
			      $_SESSION['indexPremierAnnonceAutres'] = $indexPremierAnnonceAutres;

			    }  else if (isset($_GET['reculerAnnoncesMatos'])) {
			          $indexPremierAnnonceAutres -= 10;
			          unset($_GET['reculerAnnoncesMatos']);
			          if ($indexPremierAnnonceAutres < 0){
			              $indexPremierAnnonceAutres = 0;
			          }
			          $_SESSION['indexPremierAnnonceAutres'] = $indexPremierAnnonceAutres;
			    }
		}
		    // On séléctionne les 10 utilisateurs correspondants
		$arrayAnnoncesMatos = afficherAnnoncesAutres($indexPremierAnnonceAutres);
	}
    require('view/affichage/annoncesAutres.php');
}
/**
 * [annoncesConcerts Affiche annonces Concerts]
 * @return [type] [arrayAnnoncesConcerts]
 */
function annoncesConcerts()
{
	require('model/affichage/model.php');
    include 'model/class/Annonce.php';

  	$nbTotalAnnoncesConcert = afficherNbAnnonces('Concert');
  	if ($nbTotalAnnoncesConcert>0){
		  // On récupère l'index du premier message auquel l'utilisateur s'est arreté dans le tableau
		  $indexPremierConcert = 0 ;
		  if (isset($_GET['indexPremierConcert'])){
		    $indexPremierConcert = ($_GET['indexPremierConcert']*10);
		    $_SESSION['indexPremierConcert'] = $indexPremierConcert;
		  } else {
		      if (isset($_SESSION['indexPremierConcert'])){
		        $indexPremierConcert = $_SESSION['indexPremierConcert'];
		      }

		      if (isset($_GET['avancerConcert'])){
		        $indexPremierConcert += 10;
		        unset($_GET['avancerConcert']);
		        if ($indexPremierConcert > $nbTotalAnnoncesConcert){
		        $indexPremierConcert -= 10;
		        } 
		        $_SESSION['indexPremierConcert'] = $indexPremierConcert;
		      } else if (isset($_GET['reculerConcert'])) {
		            $indexPremierConcert -= 10;
		            unset($_GET['reculerConcert']);
		            if ($indexPremierConcert < 0){
		                $indexPremierConcert = 0;
		            }
		            $_SESSION['indexPremierConcert'] = $indexPremierConcert;
		      }
		}
		    // On séléctionne les 10 utilisateurs correspondants
		$arrayAnnoncesConcerts = afficherAnnoncesConcerts($indexPremierConcert);
	}
    require('view/affichage/annoncesConcerts.php');
}
/**
 * [annoncesMatos Affiche annonces Matos]
 * @return [type] [description]
 */
function annoncesMatos()
{
	require('model/affichage/model.php');
    include 'model/class/Annonce.php';
  // On récupère le nb de annonces à afficher
  	$nbTotalAnnonces = afficherNbAnnonces('Matos');
  	if ($nbTotalAnnonces>0){
      // On récupère l'index de la premiere annonces auquel l'utilisateur s'est arreté dans le tableau
      $indexPremiereAnnonce = 0 ;
      if (isset($_GET['indexPremiereAnnonce'])){
        $indexPremiereAnnonce = ($_GET['indexPremiereAnnonce']*10);
        $_SESSION['indexPremiereAnnonce'] = $indexPremiereAnnonce;
      } else {
	          if (isset($_SESSION['indexPremiereAnnonce'])){
	            $indexPremiereAnnonce = $_SESSION['indexPremiereAnnonce'];
	          }

	          if (isset($_GET['avancerAnnonceMatos'])){
	            $indexPremiereAnnonce += 10;
	            unset($_GET['avancerAnnonceMatos']);
	            if ($indexPremiereAnnonce > $nbTotalAnnonces){
	            $indexPremiereAnnonce -= 10;
	            }
	            $_SESSION['indexPremiereAnnonce'] = $indexPremiereAnnonce;

	          } else if (isset($_GET['reculerAnnonceMatos'])) {
	                $indexPremiereAnnonce -= 10;
	                unset($_GET['reculerAnnonceMatos']);
	                if ($indexPremiereAnnonce < 0){
	                    $indexPremiereAnnonce = 0;
	                }
	                $_SESSION['indexPremiereAnnonce'] = $indexPremiereAnnonce;
	          }
		}
		    // On séléctionne les 10 utilisateurs correspondants
		$arrayAnnoncesMatos = afficherAnnoncesMatos($indexPremiereAnnonce);
	}
    require('view/affichage/annoncesMatos.php');
}
/**
 * [annoncesMusiciens Affiche annonces Musiciens]
 * @return [type] [description]
 */
function annoncesMusiciens()
{
	require('model/affichage/model.php');
    include 'model/class/Annonce.php';
  // On récupère le nb de annonces à afficher
  	$nbTotalAnnoncesMusiciens = afficherNbAnnonces('musicien');
  	if ($nbTotalAnnoncesMusiciens>0){
      // On récupère l'index du premier Utilisateur auquel on s'est arreté dans le tableau
      $indexPremierMusicien = 0 ;
      if (isset($_GET['indexPremierMusicien'])){
        $indexPremierMusicien = ($_GET['indexPremierMusicien']*10);
        $_SESSION['indexPremierMusicien'] = $indexPremierMusicien;
      } else {
          if (isset($_SESSION['indexPremierMusicien'])){
            $indexPremierMusicien = $_SESSION['indexPremierMusicien'];
          }

          if (isset($_GET['avancerMusicien'])){
            $indexPremierMusicien += 10;
            unset($_GET['avancerMusicien']);
            if ($indexPremierMusicien > $nbTotalAnnoncesMusiciens){
            $indexPremierMusicien -= 10;
            }
            $_SESSION['indexPremierMusicien'] = $indexPremierMusicien;
          } else if (isset($_GET['reculerMusicien'])) {
                $indexPremierMusicien -= 10;
                unset($_GET['reculerMusicien']);
                if ($indexPremierMusicien < 0){
                    $indexPremierMusicien = 0;
                }
                $_SESSION['indexPremierMusicien'] = $indexPremierMusicien;
          }
      }
      // On séléctionne les 10 annonces correspondantes
		$arrayAnnoncesMusiciens = afficherAnnoncesMusiciens($indexPremierMusicien);
	}
    require('view/affichage/annoncesMusiciens.php');
}
/**
 * [bonsPlans Affiche bons Plans]
 * @return [type] [description]
 */
function bonsPlans()
{
	require('model/affichage/model.php');
    include 'model/class/BonPlan.php';
    $nbTotalBonsPlans = afficherNbBonsPlans(`bonPlan`);
    // On récupère l'index du premier message auquel l'utilisateur s'est arreté dans le tableau
    $indexPremierBonPlan = 0 ;
    if (isset($_GET['indexPremierBonPlan'])){
      $indexPremierBonPlan = ($_GET['indexPremierBonPlan']*10);
      $_SESSION['indexPremierBonPlan'] = $indexPremierBonPlan;
    } else {
        if (isset($_SESSION['indexPremierBonPlan'])){
          $indexPremierBonPlan = $_SESSION['indexPremierBonPlan'];
        }

        if (isset($_GET['avancerConcert'])){
          $indexPremierBonPlan += 50;
          unset($_GET['avancerConcert']);
          if ($indexPremierBonPlan > $nbTotalBonsPlans){
          $indexPremierBonPlan -= 50;
          } 
          $_SESSION['indexPremierBonPlan'] = $indexPremierBonPlan;
        } else if (isset($_GET['reculerConcert'])) {
              $indexPremierBonPlan -= 50;
              unset($_GET['reculerConcert']);
              if ($indexPremierBonPlan < 0){
                  $indexPremierBonPlan = 0;
              }
              $_SESSION['indexPremierBonPlan'] = $indexPremierBonPlan;
        }
    } 
        // On séléctionne les 10 bonsPlans correspondants
    $arrayAnnoncesConcerts = afficherBonPlan($indexPremierBonPlan); 
    require('view/affichage/bonsPlans.php');
}
/**
 * [galeriePhoto Affiche galerie Photo]
 * @return [type] [description]
 */
function galeriePhoto()
{
	include 'model/class/Photo.php';
	require('model/affichage/model.php');
  	$nbTotalPhotos = afficherNbPhotos();

  	if ($nbTotalPhotos>0){
		  // On récupère l'index de la premiere photo a laquelle on s'est arreté dans le tableau
		  $indexPremierePhoto = 0 ;
		  if (isset($_GET['indexPremierePhoto'])){
		    $indexPremierePhoto = ($_GET['indexPremierePhoto']*8);
		    $_SESSION['indexPremierePhoto'] = $indexPremierePhoto;
		  } else {
		      if (isset($_SESSION['indexPremierePhoto'])){
		        $indexPremierePhoto = $_SESSION['indexPremierePhoto'];
		      }

		      if (isset($_GET['avancerPhoto'])){
		        $indexPremierePhoto += 8;
		        $_SESSION['indexPremierePhoto'] = $indexPremierePhoto;
		        unset($_GET['avancerPhoto']);
		        if ($indexPremierePhoto > $nbTotalPhotos){
		        $indexPremierePhoto -= 8;
		        $_SESSION['indexPremierePhoto'] = $indexPremierePhoto;
		        } 
		      } else if (isset($_GET['reculerPhoto'])) {
		            $indexPremierePhoto -= 8;
		            $_SESSION['indexPremierePhoto'] = $indexPremierePhoto;
		            unset($_GET['reculerPhoto']);
		            if ($indexPremierePhoto < 0){
		                $indexPremierePhoto = 0;
		                $_SESSION['indexPremierePhoto'] = $indexPremierePhoto;
		            }
		      }    
		  } 
		  // On séléctionne les 8 photos correspondantes
		  $arrayPhotos = afficherPhotos($indexPremierePhoto); 		
  	}
  	require('view/affichage/galeriePhoto.php');
}
