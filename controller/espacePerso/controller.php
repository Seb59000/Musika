<?php
/**
 * [televerserPhoto affiche televerser Photo]
 * @return [type] [description]
 */
function televerserPhoto()
{
  if (!isset($_SESSION['idUtilisateur'])){
    header ('Location: index.php?page=vousDevezEtreConnectePhoto');
  } else {
	require('view/espacePerso/televerserPhoto.php');
  }	
}
/**
 * [changerMotDePasseRegular affiche page pour changer MotDePasseRegular]
 * @return [type] [description]
 */
function changerMotDePasseRegular()
{
	if (!isset($_SESSION['pseudo'])){
	    header ('Location: index.php?page=erreurChangementCode');
	} else {
		require('view/espacePerso/changerMotDePasseRegular.php');
	}
}

/**
 * [espacePerso affiche l'espace Perso]
 * @return [type] [description]
 */
function espacePerso()
{
	if (!isset($_SESSION['idUtilisateur'])){
	    header ('Location: index.php?page=connexion');
	} else {
		$idUtilisateur = $_SESSION['idUtilisateur'];
		require('model/espacePerso/model.php');
        include 'model/class/MessagePerso.php';
        include 'model/class/Annonce.php';
    	include 'model/class/Photo.php';  
        $indexPremiereAnnonce = 0;
		$indexPremierePhoto = 0 ;
		$indexPremierMessage = 0;
		$indexPremierMessageRecu = 0 ;

        $arrayPhotos = null;
		$arrayAnnonces = null;
		$arrayMessages = null;
		$arrayMessagesRecus = null;
		// On récupère le nb de photos à afficher
  		$nbTotalPhotos = afficherNbPhotosEspacePerso($idUtilisateur);
		if ($nbTotalPhotos>0){
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
		    $arrayPhotos = afficherPhotosEspacePerso($indexPremierePhoto,$idUtilisateur);
		}

  		// On récupère le nb de annonces à afficher
  		$nbTotalAnnonces = afficherNbAnnoncesEspacePerso($idUtilisateur);
  		if ($nbTotalAnnonces>0){
			  // On récupère l'index de la premiere annonce à laquelle on s'est arreté dans le tableau
			  $indexPremiereAnnonce = 0 ;
			  if (isset($_GET['indexPremiereAnnonce'])){
			    $indexPremiereAnnonce = ($_GET['indexPremiereAnnonce']*10);
			    $_SESSION['indexPremiereAnnonce'] = $indexPremiereAnnonce;
			  } else {
			      if (isset($_SESSION['indexPremiereAnnonce'])){
			        $indexPremiereAnnonce = $_SESSION['indexPremiereAnnonce'];
			      }

			      if (isset($_GET['avancerAnnonce'])){
			        $indexPremiereAnnonce += 10;
			        unset($_GET['avancerAnnonce']);
			        if ($indexPremiereAnnonce > $nbTotalAnnonces){
			        $indexPremiereAnnonce -= 10;
			        } 
			        $_SESSION['indexPremiereAnnonce'] = $indexPremiereAnnonce;

			      } else if (isset($_GET['reculerAnnonce'])) {
			            $indexPremiereAnnonce -= 10;
			            unset($_GET['reculerAnnonce']);
			            if ($indexPremiereAnnonce < 0){
			                $indexPremiereAnnonce = 0;
			            }
			            $_SESSION['indexPremiereAnnonce'] = $indexPremiereAnnonce;
			      }
			  }
			  $arrayAnnonces = afficherAnnoncesEspacePerso($indexPremiereAnnonce,$idUtilisateur);	
  		}

		  // On récupère le nb de messages envoyés à afficher
		  $nbTotalMessages = afficherNbMessagesEnvoyes($idUtilisateur);

		  if ($nbTotalMessages>0){
			  // On récupère l'index du premier message auquel l'utilisateur s'est arreté dans le tableau
			  if (isset($_GET['indexPremierMessage'])){
			    $indexPremierMessage = ($_GET['indexPremierMessage']*10);
			    $_SESSION['indexPremierMessage'] = $indexPremierMessage;
			  } else {
			      if (isset($_SESSION['indexPremierMessage'])){
			        $indexPremierMessage = $_SESSION['indexPremierMessage'];
			      }
			      if (isset($_GET['avancerMPEnvoyes'])){
			        $indexPremierMessage += 10;
			        $_SESSION['indexPremierMessage'] = $indexPremierMessage;
			        unset($_GET['avancerMPEnvoyes']);
			        if ($indexPremierMessage > $nbTotalMessages){
			        $indexPremierMessage -= 10;
			        $_SESSION['indexPremierMessage'] = $indexPremierMessage;
			        }
			      } else if (isset($_GET['reculerMPEnvoyes'])) {
			            $indexPremierMessage -= 10;
			            unset($_GET['reculerMPEnvoyes']);
			            $_SESSION['indexPremierMessage'] = $indexPremierMessage;
			            if ($indexPremierMessage < 0){
			                $indexPremierMessage = 0;
			                $_SESSION['indexPremierMessage'] = $indexPremierMessage;
			            }
			      }   
			  } 
			  // On séléctionne les 10 messages correspondants
			  $arrayMessages = afficherMessagesPersoEnvoyes($idUtilisateur,$indexPremierMessage);
		  }

		  // On récupère le nb de messages recus à afficher
		  $nbTotalMessagesRecus = afficherNbMessagesRecus($idUtilisateur);

		  if ($nbTotalMessagesRecus>0){
			  // On récupère l'index du premier message auquel l'utilisateur s'est arreté dans le tableau
			  if (isset($_GET['indexPremierMessageRecu'])){
			    $indexPremierMessageRecu = ($_GET['indexPremierMessageRecu']*10);
			    $_SESSION['indexPremierMessageRecu'] = $indexPremierMessageRecu;
			  } else {
			      if (isset($_SESSION['indexPremierMessageRecu'])){
			        $indexPremierMessageRecu = $_SESSION['indexPremierMessageRecu'];
			      }
			      if (isset($_GET['avancer'])){
			        $indexPremierMessageRecu += 10;
			        $_SESSION['indexPremierMessageRecu'] = $indexPremierMessageRecu;
			        unset($_GET['avancer']);
			        if ($indexPremierMessageRecu > $nbTotalMessagesRecus){
			        $indexPremierMessageRecu -= 10;
			        $_SESSION['indexPremierMessageRecu'] = $indexPremierMessageRecu;
			        }
			      } else if (isset($_GET['reculer'])) {
			            $indexPremierMessageRecu -= 10;
			            unset($_GET['reculer']);
			            $_SESSION['indexPremierMessageRecu'] = $indexPremierMessageRecu;
			            if ($indexPremierMessageRecu < 0){
			                $indexPremierMessageRecu = 0;
			                $_SESSION['indexPremierMessageRecu'] = $indexPremierMessageRecu;
			            }
			      }    
			  } 
	 		  // On séléctionne les 10 messages correspondants
			  $arrayMessagesRecus = afficherMessagesPersoRecus($idUtilisateur,$indexPremierMessageRecu);			  		  	
		  }
  		require('view/espacePerso/espacePerso.php');
  	}
}
/**
 * [changementCode affiche changement Code]
 * @return [type] [description]
 */
function changementCode()
{
   	if (!isset($_SESSION['idUserTemp'])){
	    header ('Location: index.php?page=erreurChangementCode');
	} else {
	  	require('view/espacePerso/changementCode.php');
	}
}

function changerInfosPerso()
{
	if (!isset($_SESSION['pseudo'])){
        $_SESSION['deposerAnnonce'] = 'musicien';
        header ('Location: index.php?page=vousDevezEtreConnecte');
    } else {
	require('view/espacePerso/changerInfosPerso.php');
    }
}

