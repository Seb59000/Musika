<?php
function execute($requeteSQL) {
    try
    {
        $connexionBDD = new PDO('mysql:host=localhost;dbname=musikalassault;charset=utf8', 'root', '');
    }
    catch (Exception $e)
    {
        die('Erreur : ' . $e->getMessage());
    }       
    $resultat = $connexionBDD->query($requeteSQL);
    return $resultat;
}
/**
 * [afficherNbAnnonces description]
 * @param  [type] $categorie [description]
 * @return [type]            [description]
 */
function afficherNbAnnonces($categorie) {
    $sql = "SET @p0='".$categorie."'; CALL `afficherNbAnnonces`(@p0);";
    $resultat = execute($sql);  // from tableauAnnoncesAutres
    $count = 2;
    while ($donnees = $resultat->fetch())
    {            
        $count = $donnees['nb'];     
    }
    return $count;
}

/**
 * [afficherAnnoncesConcerts description]
 * @param  [type] $indexPremierAnnonceConcert [description]
 * @return [type]                             [description]
 */
function afficherAnnoncesConcerts($indexPremierAnnonceConcert) { 
    $sql = "SET @p0='".$indexPremierAnnonceConcert."'; CALL `afficherAnnoncesConcerts`(@p0);";
    $resultat = execute($sql);  // from utilisateur/tableauAnnoncesAutres.php
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
 * [afficherAnnoncesMatos description]
 * @param  [type] $indexPremiereAnnonce [description]
 * @return [type]                       [description]
 */
function afficherAnnoncesMatos($indexPremiereAnnonce) {
    $sql = "SET @p0='".$indexPremiereAnnonce."'; CALL `afficherAnnoncesMatos`(@p0);";
    $resultat = execute($sql);  // from utilisateur/tableauAnnoncesAutres.php
    $arrayAnnoncesMatos = null;
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

        $annonceMatos = new Annonce($idAnnonce, $categorie, $idExpediteur, $titre, $contenu, $date, $type_photo); 

        $arrayAnnoncesMatos[$index] = $annonceMatos;
        $index++;
    }

    return $arrayAnnoncesMatos;
}
/**
 * [afficherAnnoncesMusiciens description]
 * @param  [type] $indexPremiereAnnonce [description]
 * @return [type]                       [description]
 */
function afficherAnnoncesMusiciens($indexPremiereAnnonce) {
    $sql = "SET @p0='".$indexPremiereAnnonce."'; CALL `afficherAnnoncesMusiciens`(@p0);";
    $resultat = execute($sql);  // from utilisateur/tableauAnnoncesAutres.php
    $arrayAnnoncesMusiciens = null;
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

        $annonceMusiciens = new Annonce($idAnnonce, $categorie, $idExpediteur, $titre, $contenu, $date, $type_photo); 

        $arrayAnnoncesMusiciens[$index] = $annonceMusiciens;
        $index++;
    }

    return $arrayAnnoncesMusiciens;
}
/**
 * [afficherAnnoncesAutres description]
 * @param  [type] $indexPremierAnnonceAutres [description]
 * @return [type]                            [description]
 */
function afficherAnnoncesAutres($indexPremierAnnonceAutres) {
    $sql = "SET @p0='".$indexPremierAnnonceAutres."'; CALL `afficherAnnoncesAutres`(@p0);";
    $resultat = execute($sql);  // from utilisateur/tableauAnnoncesAutres.php
    $arrayAnnoncesAutres = null;
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

        $annonceAutres = new Annonce($idAnnonce, $categorie, $idExpediteur, $titre, $contenu, $date, $type_photo); 

        $arrayAnnoncesAutres[$index] = $annonceAutres;
        $index++;
    }

    return $arrayAnnoncesAutres;
}
/**
 * [afficherNbBonsPlans description]
 * @return [type] [description]
 */
function afficherNbBonsPlans() {
    $resultat = execute("CALL `afficherNbBonsPlans`()");  // from tableauAnnoncesAutres
    $count = 2;
    while ($donnees = $resultat->fetch())
    {            
        $count = $donnees['nb'];     
    }
    return $count;
}
/**
 * [afficherBonPlan description]
 * @param  [type] $indexPremierBonPlan [description]
 * @return [type]                      [description]
 */
function afficherBonPlan($indexPremierBonPlan) {
    $sql = "SET @p0='".$indexPremierBonPlan."'; CALL `afficherBonPlan`(@p0);";
    $resultat = execute($sql);
    $arrayBonPlan = null;
    $index=0;

    while ($donnees = $resultat->fetch())
    {    
        $idBonPlan = $donnees['idBonPlan']; 
        $titre = $donnees['titre']; 
        $description = $donnees['description']; 
        $adresse = $donnees['adresse']; 
        $lienWeb = $donnees['lienWeb']; 
        $numTel = $donnees['numTel']; 

        $bonPlan = new BonPlan($idBonPlan, $titre, $description, $adresse, $lienWeb, $numTel); 

        $arrayBonPlan[$index] = $bonPlan;
        $index++;
    }

    return $arrayBonPlan;
}
/**
 * [afficherNbMessages description]
 * @return [type] [description]
 */
function afficherNbMessages() {
    $resultat = execute("CALL `afficherNbMessages`()");
    $count = 2;
    while ($donnees = $resultat->fetch())
    {            
        $count = $donnees['nb'];     
    }
    return $count;
}
/**
 * [afficherMessages description]
 * @param  [type] $indexPremierMessage [description]
 * @return [type]                      [description]
 */
function afficherMessages($indexPremierMessage) {
    // On séléctionne les 10 messages correspondants
    $sql = "SET @p0='".$indexPremierMessage."'; CALL `afficherMessages`(@p0);";   
    $resultat = execute($sql);

    $arrayMessages = null;
    $index=0;

    while ($donnees = $resultat->fetch())
    {    
        $idMessage = $donnees['idMessage']; 
        $pseudoExpediteur = $donnees['pseudoExpediteur']; 
        $email = $donnees['email']; 
        $sujet = $donnees['sujet']; 
        $contenu = $donnees['contenu']; 
        $date = $donnees['date']; 
        $message = new Message($idMessage, $pseudoExpediteur, $email, $sujet, $contenu, $date); 

        $arrayMessages[$index] = $message;
        $index++;
    }

    return $arrayMessages;
}
/**
 * [afficherNbPhotosEspaceAdmin description]
 * @return [type] [description]
 */
function afficherNbPhotosEspaceAdmin() {
    $resultat = execute("CALL `afficherNbPhotosEspaceAdmin`()");  // from accueil
    $count = 2;
    while ($donnees = $resultat->fetch())
    {            
        $count = $donnees['nb'];     
    }
    return $count;
}
/**
 * [afficherPhotos description]
 * @param  [type] $indexPremierePhoto [description]
 * @return [type]                     [description]
 */
function afficherPhotos($indexPremierePhoto) { 
    $sql = "SET @p0='".$indexPremierePhoto."'; CALL `afficherPhotos`(@p0);"; 
    $resultat = execute($sql); //from accueil

    $arrayPhotos = null;
    $index=0;

    while ($donnees = $resultat->fetch())
    {    
        $idPhoto = $donnees['idphoto']; 
        $pseudoExpediteur = $donnees['pseudo']; 
        $type = $donnees['type']; 
        $date = $donnees['date']; 
        $commentaire = $donnees['commentaire']; 

        $photo = new Photo($idPhoto, $pseudoExpediteur, $type, $date, $commentaire); 

        $arrayPhotos[$index] = $photo;
        $index++;
    }
    return $arrayPhotos;
}
/**
 * [afficherUtilisateursBureauAdmin description]
 * @param  [type] $indexPremierUtilisateurB [description]
 * @return [type]                           [description]
 */
function afficherUtilisateursBureauAdmin($indexPremierUtilisateurB) {
    $sql = "SET @p0='".$indexPremierUtilisateurB."'; CALL `afficherUtilisateursBureauAdmin`(@p0);";
    $resultat = execute($sql);

    $arrayUtilisateur = null;
    $index=0;

    while ($donnees = $resultat->fetch())
    {    
        $idUtilisateur = $donnees['idUtilisateur']; 
        $idPhoto = $donnees['idPhoto']; 
        $typePhoto = $donnees['typePhoto']; 
        $pseudo = $donnees['pseudo']; 
        $idBureau = $donnees['idBureau']; 
        $statut = $donnees['statut'];
        $fonction = $donnees['fonction'];
        $adresseTwitter = $donnees['adresseTwitter']; 
        $adresseFacebook = $donnees['adresseFacebook']; 
        $adresseGooglePlus = $donnees['adresseGooglePlus']; 
        $adresseLinkedin = $donnees['adresseLinkedin']; 
        
        $utilisateur = new UtilisateurBureau($idUtilisateur, $idPhoto, $typePhoto, $pseudo, $statut, $idBureau, $fonction, $adresseTwitter, $adresseFacebook, $adresseGooglePlus, $adresseLinkedin); 

        $arrayUtilisateur[$index] = $utilisateur;
        $index++;
    }

    return $arrayUtilisateur;
}
/**
 * [afficherNbUtilisateurs description]
 * @return [type] [description]
 */
function afficherNbUtilisateurs() {
    $resultat = execute("CALL `afficherNbUtilisateurs`()");
    $count = 2;
    while ($donnees = $resultat->fetch())
    {            
        $count = $donnees['nb'];     
    }
    return $count;
}
/**
 * [afficherUtilisateursEspaceAdmin description]
 * @param  [type] $indexPremierUtilisateur [description]
 * @return [type]                          [description]
 */
function afficherUtilisateursEspaceAdmin($indexPremierUtilisateur) {
    $sql = "SET @p0='".$indexPremierUtilisateur."'; CALL `afficherUtilisateursEspaceAdmin`(@p0);";
    $resultat = execute($sql);

    $arrayUtilisateur = null;
    $index=0;

    while ($donnees = $resultat->fetch())
    {    
        $idUtilisateur = $donnees['idUtilisateur']; 
        $idPhoto = $donnees['idPhoto']; 
        $typePhoto = $donnees['typePhoto']; 
        $pseudo = $donnees['pseudo']; 
        $messagePresentation = $donnees['messagePresentation']; 
        $email = $donnees['email']; 
        $statut = $donnees['statut'];
        $adresseTwitter = $donnees['adresseTwitter']; 
        $adresseFacebook = $donnees['adresseFacebook']; 
        $adresseGooglePlus = $donnees['adresseGooglePlus']; 
        $adresseLinkedin = $donnees['adresseLinkedin'];  

        $utilisateur = new Utilisateur($idUtilisateur, $idPhoto, $typePhoto, $pseudo, $messagePresentation, $statut, $adresseTwitter, $adresseFacebook, $adresseGooglePlus, $adresseLinkedin); 

        $utilisateur->set_email($email);

        $arrayUtilisateur[$index] = $utilisateur;
        $index++;
    }

    return $arrayUtilisateur;
}

