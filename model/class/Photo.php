<?php
class Photo
{
    protected $_idPhoto;
    protected $_pseudoExpediteur;
    protected $_TypePhoto;
    protected $_date;
    protected $_commentaire;

    public function get_idPhoto(){
        return $this->_idPhoto;
    }

    public function set_idPhoto($_idPhoto){
        $this->_idPhoto = $_idPhoto;
    }

    public function get_pseudoExpediteur(){
        return $this->_pseudoExpediteur;
    }

    public function set_pseudoExpediteur($_pseudoExpediteur){
        $this->_pseudoExpediteur = $_pseudoExpediteur;
    }

    public function get_TypePhoto(){
        return $this->_TypePhoto;
    }

    public function set_TypePhoto($_TypePhoto){
        $this->_TypePhoto = $_TypePhoto;
    }
    public function get_date(){
        return $this->_date;
    }

    public function set_date($_date){
        $this->_date = $_date;
    }

    public function get_commentaire(){
        return $this->_commentaire;
    }

    public function set_commentaire($_commentaire){
        $this->_commentaire = $_commentaire;
    }
 
/**
 * [Constructeur Photo]
 * @param [type] $idPhoto          [description]
 * @param [type] $pseudoExpediteur [description]
 * @param [type] $TypePhoto        [description]
 * @param [type] $date             [description]
 * @param [type] $commentaire      [description]
 */
    public function __construct($idPhoto, $pseudoExpediteur, $TypePhoto, $date, $commentaire) 
    {
        $this->_idPhoto = $idPhoto;
        $this->_pseudoExpediteur = $pseudoExpediteur;
        $this->_TypePhoto = $TypePhoto;
        $this->_date = $date;
        $this->_commentaire = $commentaire; 
    }    
}
?>