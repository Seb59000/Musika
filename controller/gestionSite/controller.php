<?php
/**
 * [administrer Affiche page administrateur]
 * @return [view] [description]
 */
function administrer()
{
	if ($_SESSION['statut'] == 0 ){
        header ('Location: index.php');
    } else {
  		$idUtilisateur = $_SESSION['idUtilisateur'];
      require('model/gestionSite/model.php');
      include 'model/class/Annonce.php';
      include 'model/class/Message.php';
      include 'model/class/BonPlan.php';
      include 'model/class/Photo.php';  
      include 'model/class/Utilisateur.php';
      include 'model/class/UtilisateurBureau.php';
		  // On récupère le nb d'annonces à afficher
  		$nbTotalAnnoncesConcert = afficherNbAnnonces('Concert');
		$arrayAnnoncesConcerts = null;
    	$indexPremierConcert = 0 ;
        if ($nbTotalAnnoncesConcert>0){
			$indexPremierConcert = indexAnnonceConcert(0,$nbTotalAnnoncesConcert);	
			$arrayAnnoncesConcerts = afficherAnnoncesConcerts($indexPremierConcert);			         	
        }
  		$nbTotalAnnoncesAutres = afficherNbAnnonces('Autre');
  		$arrayAnnoncesAutres = null;
	    $indexPremierAnnonceAutres = 0 ;
        if ($nbTotalAnnoncesAutres>0){
			$indexPremierAnnonceAutres = indexAnnonceOther(0,$nbTotalAnnoncesAutres);			         	
			$arrayAnnoncesAutres = afficherAnnoncesAutres($indexPremierAnnonceAutres);			         	
        }        
  		$nbTotalAnnonces = afficherNbAnnonces('Matos');
		$arrayAnnoncesMatos = null;
      	$indexPremiereAnnonce = 0 ;
        if ($nbTotalAnnonces>0){
			$indexPremiereAnnonce = indexAnnonceMatos(0,$nbTotalAnnonces);			         	
			$arrayAnnoncesMatos = afficherAnnoncesMatos($indexPremiereAnnonce);			         	
        }
  		$nbTotalAnnoncesMusiciens = afficherNbAnnonces('Musicien');
		$arrayAnnoncesMusiciens = null;
	    $indexPremierMusicien = 0 ;
        if ($nbTotalAnnoncesMusiciens>0){
			$indexPremierMusicien = indexAnnonceMusician(0,$nbTotalAnnoncesMusiciens);			         	
			$arrayAnnoncesMusiciens = afficherAnnoncesMusiciens($indexPremierMusicien);			         	
        }
    	$nbTotalBonsPlans = afficherNbBonsPlans();
 		$arrayBonsPlans = null;
    	$indexPremierBonPlan = 0 ;
        if ($nbTotalBonsPlans>0){
			$indexPremierBonPlan = indexGoodPlans(0,$nbTotalBonsPlans);			         	
			$arrayBonsPlans = afficherBonPlan($indexPremierBonPlan);			         	
        }
		$nbTotalMessages = afficherNbMessages();
		$arrayMessages = null;
  		$indexPremierMessage = 0 ;
        if ($nbTotalMessages>0){
			$indexPremierMessage = indexMessages(0,$nbTotalMessages);			         	
			$arrayMessages = afficherMessages($indexPremierMessage);			         	
        }
  		$nbTotalPhotos = afficherNbPhotosEspaceAdmin();
		$arrayPhotos = null;
	    $indexPremierePhoto = 0 ;
        if ($nbTotalPhotos>0){
			$indexPremierePhoto = indexPhotos(0,$nbTotalPhotos);
			$arrayPhotos = afficherPhotos($indexPremierePhoto);			         	
        }
  		$nbTotalUtilisateur = afficherNbUtilisateurs();
        $arrayUtilisateurs = null;
  		$indexPremierUtilisateur = 0 ;
 		$arrayUtilisateursB = null;
		$indexPremierUtilisateurB = 0 ;
        if ($nbTotalUtilisateur>0){
			$indexPremierUtilisateur = indexUsers(0,$nbTotalUtilisateur);			         	
			$arrayUtilisateurs = afficherUtilisateursEspaceAdmin($indexPremierUtilisateur);
			$indexPremierUtilisateurB = indexUsersBureau(0,$nbTotalUtilisateur);
			$arrayUtilisateursB = afficherUtilisateursBureauAdmin($indexPremierUtilisateurB);						         	
        }
    	require('view/gestionSite/administrer.php');
    }
}
/**
 * [modifierBureau description]
 * @return [type] [description]
 */
function modifierBureau()
{
    // Si pas connecté alors redirection
    if (!isset($_SESSION['pseudo'])){
        $_SESSION['deposerAnnonce']= 'autre';
        header ('Location: index.php?page=vousDevezEtreConnecte');
    } else {
	    $fonctionOfficielle = $_GET['fonction'];
	    $_SESSION['fonction'] = $fonctionOfficielle;
	    $_SESSION['idUtilisateurBureau'] = $_GET['idUtilisateur'];  	
	  	require('view/gestionSite/modifierBureau.php');
    }
}
/**
 * [indexAnnonceConcert description]
 * @param  [type] $indexPremierConcert    [description]
 * @param  [type] $nbTotalAnnoncesConcert [description]
 * @return [type]                         [description]
 */
function indexAnnonceConcert($indexPremierConcert,$nbTotalAnnoncesConcert)
{
    // On récupère l'index du premier message auquel l'utilisateur s'est arreté dans le tableau
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
                  $_SESSION['indexPremierConcert'] = $indexPremierConcert;             
              }
        }
    } 
  return $indexPremierConcert;  
}
/**
 * [indexAnnonceMatos description]
 * @param  [type] $indexPremiereAnnonce [description]
 * @param  [type] $nbTotalAnnonces      [description]
 * @return [type]                       [description]
 */
function indexAnnonceMatos($indexPremiereAnnonce,$nbTotalAnnonces)
{
      // On récupère l'index de la premiere annonces auquel l'utilisateur s'est arreté dans le tableau
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
    return $indexPremiereAnnonce; 
}
/**
 * [indexAnnonceMusician description]
 * @param  [type] $indexPremierMusicien     [description]
 * @param  [type] $nbTotalAnnoncesMusiciens [description]
 * @return [type]                           [description]
 */
function indexAnnonceMusician($indexPremierMusicien,$nbTotalAnnoncesMusiciens)
{
    // On récupère l'index du premier Utilisateur auquel on s'est arreté dans le tableau
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
    return $indexPremierMusicien; 
}
/**
 * [indexGoodPlans description]
 * @param  [type] $indexPremierBonPlan [description]
 * @param  [type] $nbTotalBonsPlans    [description]
 * @return [type]                      [description]
 */
function indexGoodPlans($indexPremierBonPlan,$nbTotalBonsPlans)
{
    // On récupère l'index du premier message auquel l'utilisateur s'est arreté dans le tableau
    if (isset($_GET['indexPremierBonPlan'])){
    $indexPremierBonPlan = ($_GET['indexPremierBonPlan']*50);
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
  return $indexPremierBonPlan;  
}
/**
 * [indexUsersBureau description]
 * @param  [type] $indexPremierUtilisateurB [description]
 * @param  [type] $nbTotalUtilisateur       [description]
 * @return [type]                           [description]
 */
function indexUsersBureau($indexPremierUtilisateurB,$nbTotalUtilisateur)
{
  // On récupère l'index du premier Utilisateur auquel on s'est arreté dans le tableau
  if (isset($_GET['indexPremierUtilisateurB'])){
      $indexPremierUtilisateurB = ($_GET['indexPremierUtilisateurB']*10);
      $_SESSION['indexPremierUtilisateurB'] = $indexPremierUtilisateurB;
  } else {
      if (isset($_SESSION['indexPremierUtilisateurB'])){
          $indexPremierUtilisateurB = $_SESSION['indexPremierUtilisateurB'];
      }

      if (isset($_GET['avancerUtilisateur'])){
          $indexPremierUtilisateurB += 10;
          unset($_GET['avancerUtilisateur']);
          if ($indexPremierUtilisateurB > $nbTotalUtilisateur){
            $indexPremierUtilisateurB -= 10;
          } 
          $_SESSION['indexPremierUtilisateurB'] = $indexPremierUtilisateurB;
      } else if (isset($_GET['reculerUtilisateurs'])) {
            $indexPremierUtilisateurB -= 10;
            unset($_GET['reculerUtilisateurs']);
            if ($indexPremierUtilisateurB < 0){
                $indexPremierUtilisateurB = 0;
            }
            $_SESSION['indexPremierUtilisateurB'] = $indexPremierUtilisateurB;
      }
  } 
  return $indexPremierUtilisateurB; 
}

/**
 * [indexPhotos description]
 * @param  [type] $indexPremierePhoto [description]
 * @param  [type] $nbTotalPhotos      [description]
 * @return [type]                     [description]
 */
function indexPhotos($indexPremierePhoto,$nbTotalPhotos)
{
    // On récupère l'index de la premiere photo a laquelle on s'est arreté dans le tableau
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
    return $indexPremierePhoto; 
}
/**
 * [indexUsers description]
 * @param  [type] $indexPremierUtilisateur [description]
 * @param  [type] $nbTotalUtilisateur      [description]
 * @return [type]                          [description]
 */
function indexUsers($indexPremierUtilisateur,$nbTotalUtilisateur)
{
  // On récupère l'index du premier Utilisateur auquel on s'est arreté dans le tableau
  if (isset($_GET['indexPremierUtilisateur'])){
      $indexPremierUtilisateur = ($_GET['indexPremierUtilisateur']*10);
      $_SESSION['indexPremierUtilisateur'] = $indexPremierUtilisateur;
  } else {
      if (isset($_SESSION['indexPremierUtilisateur'])){
          $indexPremierUtilisateur = $_SESSION['indexPremierUtilisateur'];
      }

      if (isset($_GET['avancerUtilisateur'])){
          $indexPremierUtilisateur += 10;
          unset($_GET['avancerUtilisateur']);
          if ($indexPremierUtilisateur > $nbTotalUtilisateur){
            $indexPremierUtilisateur -= 10;
          } 
          $_SESSION['indexPremierUtilisateur'] = $indexPremierUtilisateur;
      } else if (isset($_GET['reculerUtilisateurs'])) {
            $indexPremierUtilisateur -= 10;
            unset($_GET['reculerUtilisateurs']);
            if ($indexPremierUtilisateur < 0){
                $indexPremierUtilisateur = 0;
            }
            $_SESSION['indexPremierUtilisateur'] = $indexPremierUtilisateur;
      }
  }
  return $indexPremierUtilisateur;  
}
/**
 * [indexAnnonceOther description]
 * @param  [type] $indexPremierAnnonceAutres [description]
 * @param  [type] $nbTotalAnnoncesAutres     [description]
 * @return [type]                            [description]
 */
function indexAnnonceOther($indexPremierAnnonceAutres,$nbTotalAnnoncesAutres){
    // On récupère l'index du premier Utilisateur auquel on s'est arrêté dans le tableau
    if (isset($_GET['indexPremierAnnonceAutres'])){
      $indexPremierAnnonceAutres = ($_GET['indexPremierAnnonceAutres']*10);
      $_SESSION['indexPremierAnnonceAutres'] = $indexPremierAnnonceAutres;
    } else {
        if (isset($_SESSION['indexPremierAnnonceAutres'])){
          $indexPremierAnnonceAutres = $_SESSION['indexPremierAnnonceAutres'];
        }

        if (isset($_GET['avancerAnnoncesMatos'])){
          $indexPremierAnnonceAutres += 10;
          $_SESSION['indexPremierAnnonceAutres'] = $indexPremierAnnonceAutres;
          unset($_GET['avancerAnnoncesMatos']);
          if ($indexPremierAnnonceAutres > $nbTotalAnnoncesAutres){
          $indexPremierAnnonceAutres -= 10;
          $_SESSION['indexPremierAnnonceAutres'] = $indexPremierAnnonceAutres;
          }
        } else if (isset($_GET['reculerAnnoncesMatos'])) {
            $indexPremierAnnonceAutres -= 10;
            $_SESSION['indexPremierAnnonceAutres'] = $indexPremierAnnonceAutres;
            unset($_GET['reculerAnnoncesMatos']);
            if ($indexPremierAnnonceAutres < 0){
                $indexPremierAnnonceAutres = 0;
                $_SESSION['indexPremierAnnonceAutres'] = $indexPremierAnnonceAutres;
            }
        }
    } 
    return $indexPremierAnnonceAutres;  
}
/**
 * [indexMessages description]
 * @param  [type] $indexPremierMessage [description]
 * @param  [type] $nbTotalMessages     [description]
 * @return [type]                      [description]
 */
function indexMessages($indexPremierMessage,$nbTotalMessages)
{
  // On récupère l'index du premier message auquel l'utilisateur s'est arreté dans le tableau
  if (isset($_GET['indexPremierMessage'])){
      $indexPremierMessage = ($_GET['indexPremierMessage']*10);
      $_SESSION['indexPremierMessage'] = $indexPremierMessage;
  } else {
        if (isset($_SESSION['indexPremierMessage'])){
          $indexPremierMessage = $_SESSION['indexPremierMessage'];
      }
        if (isset($_GET['avancer'])){
          $indexPremierMessage += 10;
          $_SESSION['indexPremierMessage'] = $indexPremierMessage;
          unset($_GET['avancer']);
          if ($indexPremierMessage > $nbTotalMessages){
            $indexPremierMessage -= 10;
          $_SESSION['indexPremierMessage'] = $indexPremierMessage;
          }
      } else if (isset($_GET['reculer'])) {
            $indexPremierMessage -= 10;
            unset($_GET['reculer']);
            $_SESSION['indexPremierMessage'] = $indexPremierMessage;
            if ($indexPremierMessage < 0){
                $indexPremierMessage = 0;
                $_SESSION['indexPremierMessage'] = $indexPremierMessage;
            }
      }
  }
  return $indexPremierMessage;  
}

