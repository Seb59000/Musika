<?php
/**
 * [deposerannonceAutre depose annonce Autre]
 * @return [view] [description]
 */
function deposerannonceAutre()
{
	if (!isset($_SESSION['pseudo'])){
        $_SESSION['deposerAnnonce']= 'autre';
        header ('Location: index.php?page=vousDevezEtreConnecte');
    } else {
    require('view/gestionPosts/deposerannonceAutre.php');
    }
}
/**
 * [deposerannonceConcert depose annonce Concert]
 * @return [view] [description]
 */
function deposerannonceConcert()
{
	if (!isset($_SESSION['pseudo'])){
        $_SESSION['deposerAnnonce']= 'concert';
        header ('Location: index.php?page=vousDevezEtreConnecte');
    } else {
    require('view/gestionPosts/deposerannonceConcert.php');
    }
}
/**
 * [deposerannonceMusicien depose annonce Musicien]
 * @return [view] [description]
 */
function deposerannonceMusicien()
{
	if (!isset($_SESSION['pseudo'])){
        $_SESSION['deposerAnnonce']= 'musicien';
        header ('Location: index.php?page=vousDevezEtreConnecte');
    } else {
    require('view/gestionPosts/deposerannonceMusicien.php');
    }
}
/**
 * [deposerannonceMatos depose annonce Matos]
 * @return [view] [description]
 */
function deposerannonceMatos()
{
	if (!isset($_SESSION['pseudo'])){
        $_SESSION['deposerAnnonce']= 'matos';
        header ('Location: index.php?page=vousDevezEtreConnecte');
    } else {
    require('view/gestionPosts/deposerannonceMatos.php');
    }
}
/**
 * [deposerBonPlan depose Bon Plan]
 * @return [view] [description]
 */
function deposerBonPlan()
{
	if (!isset($_SESSION['pseudo'])){
        $_SESSION['deposerAnnonce']= 'musicien';
        header ('Location: index.php?page=vousDevezEtreConnecte');
    } else {
    require('view/gestionPosts/deposerBonPlan.php');
    }
}
/**
 * [deposerPhotogalerie depose Photo galerie]
 * @return [view] [description]
 */
function deposerPhotogalerie()
{
	if (!isset($_SESSION['idUtilisateur'])){
        header ('Location: index.php?page=vousDevezEtreConnectePhoto');
	} else {
	    require('view/gestionPosts/deposerPhotogalerie.php');
	}
}
/**
 * [envoyerMessageAdminUtilisateur envoyer Message AdminUtilisateur]
 * @return [view] [description]
 */
function envoyerMessageAdminUtilisateur()
{
    $_SESSION['idDestinataire'] =  $_GET['idDestinataire'];
	require('view/gestionPosts/envoyerMessageAdminUtilisateur.php');
}
/**
 * [envoyerMessagePerso description]
 * @return [view] [description]
 */
function envoyerMessagePerso(){
    $_SESSION['idDestinataire'] =  $_GET['idDestinataire'];
    require('view/gestionPosts/envoyerMessagePerso.php');
}