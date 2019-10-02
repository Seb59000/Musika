<?php
class UtilisateurBureau
{
    protected $_idUtilisateur;
    protected $_photo;
    protected $_TypePhoto;
    protected $_pseudo;
    protected $_statut; 
    protected $_idBureau;
    protected $_fonction;
    protected $_adresseTwitter; 
    protected $_adresseFacebook; 
    protected $_adresseGooglePlus; 
    protected $_adresseLinkedin; 

    public function get_photo(){
        return $this->_photo;
    }

    public function set_photo($_photo){
        $this->_photo = $_photo;
    }

    public function get_TypePhoto(){
        return $this->_TypePhoto;
    }

    public function set_TypePhoto($_TypePhoto){
        $this->_TypePhoto = $_TypePhoto;
    }

    public function get_statut(){
        return $this->_statut;
    }

    public function set_statut($_statut){
        $this->_statut = $_statut;
    }

    public function get_pseudo(){
        return $this->_pseudo;
    }

    public function set_pseudo($_pseudo){
        $this->_pseudo = $_pseudo;
    }
    
    public function get_idUtilisateur(){
        return $this->_idUtilisateur;
    }

    public function set_idUtilisateur($_idUtilisateur){
        $this->_idUtilisateur = $_idUtilisateur;
    }
 
    public function get_idBureau(){
        return $this->_idBureau;
    }

    public function set_idBureau($_idBureau){
        $this->_idBureau = $_idBureau;
    }
 
    public function get_fonction(){
        return $this->_fonction;
    }

    public function set_fonction($_fonction){
        $this->_fonction = $_fonction;
    }

    public function get_adresseTwitter(){
        return $this->_adresseTwitter;
    }

    public function set_adresseTwitter($_adresseTwitter){
        $this->_adresseTwitter = $_adresseTwitter;
    }
    public function get_adresseFacebook(){
        return $this->_adresseFacebook;
    }

    public function set_adresseFacebook($_adresseFacebook){
        $this->_adresseFacebook = $_adresseFacebook;
    }
    public function get_adresseGooglePlus(){
        return $this->_adresseGooglePlus;
    }

    public function set_adresseGooglePlus($_adresseGooglePlus){
        $this->_adresseGooglePlus = $_adresseGooglePlus;
    }
    public function get_adresseLinkedin(){
        return $this->_adresseLinkedin;
    }

    public function set_adresseLinkedin($_adresseLinkedin){
        $this->_adresseLinkedin = $_adresseLinkedin;
    }
/**
 * [__construct UtilisateurBureau]
 * @param [type] $idUtilisateur     [description]
 * @param [type] $photo             [description]
 * @param [type] $TypePhoto         [description]
 * @param [type] $pseudo            [description]
 * @param [type] $statut            [description]
 * @param [type] $idBureau          [description]
 * @param [type] $fonction          [description]
 * @param [type] $adresseTwitter    [description]
 * @param [type] $adresseFacebook   [description]
 * @param [type] $adresseGooglePlus [description]
 * @param [type] $adresseLinkedin   [description]
 */
    public function __construct($idUtilisateur, $photo, $TypePhoto, $pseudo, $statut, $idBureau, $fonction, $adresseTwitter, $adresseFacebook, $adresseGooglePlus, $adresseLinkedin) // Constructeur
    {
        $this->_idUtilisateur = $idUtilisateur;
        $this->_photo = $photo;
        $this->_TypePhoto = $TypePhoto;
        $this->_pseudo = $pseudo;
        $this->_idBureau = $idBureau; 
        $this->_statut = $statut;
        $this->_fonction = $fonction;
        $this->_adresseTwitter = $adresseTwitter; 
        $this->_adresseFacebook = $adresseFacebook; 
        $this->_adresseGooglePlus = $adresseGooglePlus; 
        $this->_adresseLinkedin = $adresseLinkedin;
    }    
    // déclaration des méthodes
}
?>