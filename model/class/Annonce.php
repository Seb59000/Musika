<?php
class Annonce
{
    protected $_idAnnonce;
    protected $_categorie;
    protected $_idExpediteur;
    protected $_titre;
    protected $_contenu; 
    protected $_date;
    protected $_type_photo; 

    public function get_idAnnonce(){
        return $this->_idAnnonce;
    }

    public function set_idAnnonce($_idAnnonce){
        $this->_idAnnonce = $_idAnnonce;
    }
    
    public function get_categorie(){
        return $this->_categorie;
    }

    public function set_categorie($_categorie){
        $this->_categorie = $_categorie;
    }

    public function get_idExpediteur(){
        return $this->_idExpediteur;
    }

    public function set_idExpediteur($_idExpediteur){
        $this->_idExpediteur = $_idExpediteur;
    }

    public function get_titre(){
        return $this->_titre;
    }

    public function set_titre($_titre){
        $this->_titre = $_titre;
    }

    public function get_contenu(){
        return $this->_contenu;
    }

    public function set_contenu($_contenu){
        $this->_contenu = $_contenu;
    }
    
    public function get_date(){
        return $this->_date;
    }

    public function set_date($_date){
        $this->_date = $_date;
    }

    public function get_type_photo(){
        return $this->_type_photo;
    }

    public function set_type_photo($_type_photo){
        $this->_type_photo = $_type_photo;
    }
    /**
     * [__construct Annonce]
     * @param [type] $idAnnonce    [description]
     * @param [type] $categorie    [description]
     * @param [type] $idExpediteur [description]
     * @param [type] $titre        [description]
     * @param [type] $contenu      [description]
     * @param [type] $date         [description]
     * @param [type] $type_photo   [description]
     */
    public function __construct($idAnnonce, $categorie, $idExpediteur, $titre, $contenu, $date, $type_photo) // Constructeur
    {
        $this->_idAnnonce = $idAnnonce;
        $this->_categorie = $categorie;
        $this->_idExpediteur = $idExpediteur;
        $this->_titre = $titre; 
        $this->_contenu = $contenu; 
        $this->_date = $date; 
        $this->_type_photo = $type_photo; 
    }    
    // déclaration des méthodes
}
?>