<?php
/**
 * [execute description]
 * @param  [type] $requeteSQL [description]
 * @return [type]             [description]
 */
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
 * [afficherNbPhotosEspacePerso description]
 * @param  [type] $idUtilisateur [description]
 * @return [type]                [description]
 */
function afficherNbPhotosEspacePerso($idUtilisateur) {
    $sql = "SET @p0='".$idUtilisateur."'; CALL `afficherNbPhotosEspacePerso`(@p0);";
    $resultat = execute($sql);  // from tableauAnnoncesAutres
    $count = 2;
    while ($donnees = $resultat->fetch())
    {            
        $count = $donnees['nb'];     
    }
    return $count;
}
/**
 * [afficherPhotosEspacePerso description]
 * @param  [type] $idUtilisateur [description]
 * @return [type]                [description]
 */
function afficherPhotosEspacePerso($idUtilisateur) { 
    // On séléctionne les 8 photos correspondantes
    $sql = "SET @p0='".$idUtilisateur."'; CALL `afficherPhotosEspacePerso`(@p0);"; 
    $resultat = execute($sql); 

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
 * [afficherNbAnnoncesEspacePerso description]
 * @param  [type] $idUtilisateur [description]
 * @return [type]                [description]
 */
function afficherNbAnnoncesEspacePerso($idUtilisateur) {
    $sql = "SET @p0='".$idUtilisateur."'; CALL `afficherNbAnnoncesEspacePerso`(@p0);";
    $resultat = execute($sql);  // from tableauAnnoncesAutres
    $count = 2;
    while ($donnees = $resultat->fetch())
    {            
        $count = $donnees['nb'];     
    }
    return $count;
}
/**
 * [afficherAnnoncesEspacePerso description]
 * @param  [type] $idUtilisateur [description]
 * @return [type]                [description]
 */
function afficherAnnoncesEspacePerso($idUtilisateur) {
      // On séléctionne les 10 annonces correspondant
    $sql = "SET @p0='".$idUtilisateur."'; CALL `afficherAnnoncesEspacePerso`(@p0);";
    $resultat = execute($sql);  
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
 * [afficherNbMessagesEnvoyes description]
 * @param  [type] $idUtilisateur [description]
 * @return [type]                [description]
 */
function afficherNbMessagesEnvoyes($idUtilisateur) {
    $resultat = execute("SET @p0='".$idUtilisateur."'; CALL `afficherNbMessagesEnvoyes`(@p0);");
    $count = 2;
    while ($donnees = $resultat->fetch())
    {            
        $count = $donnees['nb'];     
    }
    return $count;
}
/**
 * [afficherMessagesPersoEnvoyes description]
 * @param  [type] $idUtilisateur [description]
 * @return [type]                [description]
 */
function afficherMessagesPersoEnvoyes($idUtilisateur) {
    $sql = "SET @p0='".$idUtilisateur."'; CALL `afficherMessagesPersoEnvoyes`(@p0);";
    $resultat = execute($sql);
    $arrayMessagesPerso = null;
    $index=0;

    while ($donnees = $resultat->fetch())
    {    
        $idMessagePerso = $donnees['idMessagePerso']; 
        $idExpediteur = $donnees['idExpediteur']; 
        $idDestinataire = $donnees['idDestinataire']; 
        $pseudo = $donnees['pseudo']; 
        $contenu = $donnees['contenu']; 

        $messagePerso = new MessagePerso($idMessagePerso, $idExpediteur, $idDestinataire, $pseudo, $contenu); 

        $arrayMessagesPerso[$index] = $messagePerso;
        $index++;
    }
    return $arrayMessagesPerso;
}
/**
 * [afficherNbMessagesRecus description]
 * @param  [type] $idUtilisateur [description]
 * @return [type]                [description]
 */
function afficherNbMessagesRecus($idUtilisateur) {
    $resultat = execute("SET @p0='".$idUtilisateur."'; CALL `afficherNbMessagesRecus`(@p0);");
    $count = 2;
    while ($donnees = $resultat->fetch())
    {            
        $count = $donnees['nb'];     
    }
    return $count;
}
/**
 * [afficherMessagesPersoRecus description]
 * @param  [type] $idUtilisateur [description]
 * @return [type]                [description]
 */
function afficherMessagesPersoRecus($idUtilisateur) {
    $sql = "SET @p0='".$idUtilisateur."'; CALL `afficherMessagesPersoRecus`(@p0);";
    $resultat = execute($sql);
    $arrayMessagesPerso = null;
    $index = 0;
    while ($donnees = $resultat->fetch())
    {    
        $idMessagePerso = $donnees['idMessagePerso']; 
        $idExpediteur = $donnees['idExpediteur']; 
        $idDestinataire = $donnees['idDestinataire']; 
        $pseudo = $donnees['pseudo']; 
        $contenu = $donnees['contenu']; 

        $messagePerso = new MessagePerso($idMessagePerso, $idExpediteur, $idDestinataire, $pseudo, $contenu); 

        $arrayMessagesPerso[$index] = $messagePerso;
        $index++;
    }
    return $arrayMessagesPerso;
}

