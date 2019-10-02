<?php
class BonPlan
{
    protected $_idBonPlan;
    protected $_titre;
    protected $_description; 
    protected $_ville; 
    protected $_rue; 
    protected $_numRue; 
    protected $_lienWeb; 
    protected $_numTel; 

    public function get_idBonPlan(){
        return $this->_idBonPlan;
    }

    public function set_idAnnonce($_idBonPlan){
        $this->_idBonPlan = $_idBonPlan;
    }
    
    public function get_titre(){
        return $this->_titre;
    }

    public function set_titre($_titre){
        $this->_titre = $_titre;
    }

    public function get_description(){
        return $this->_description;
    }

    public function set_description($_description){
        $this->_description = $_description;
    }

    public function get_ville(){
        return $this->_ville;
    }

    public function set_ville($_ville){
        $this->_ville = $_ville;
    }

    public function get_rue(){
        return $this->_rue;
    }

    public function set_rue($_rue){
        $this->_rue = $_rue;
    }

        public function get_numRue(){
        return $this->_numRue;
    }

    public function set_numRue($_numRue){
        $this->_numRue = $_numRue;
    }

    public function get_lienWeb(){
        return $this->_lienWeb;
    }

    public function set_lienWeb($_lienWeb){
        $this->_lienWeb = $_lienWeb;
    }

    public function get_numTel(){
        return $this->_numTel;
    }

    public function set_numTel($_numTel){
        $this->_numTel = $_numTel;
    }


/**
 * [__construct BonPlan]
 * @param [type] $idBonPlan   [description]
 * @param [type] $titre       [description]
 * @param [type] $description [description]
 * @param [type] $ville       [description]
 * @param [type] $rue         [description]
 * @param [type] $numRue      [description]
 * @param [type] $lienWeb     [description]
 * @param [type] $numTel      [description]
 */
    public function __construct($idBonPlan, $titre, $description, $ville, $rue, $numRue, $lienWeb, $numTel) // Constructeur
    {
        $this->_idBonPlan = $idBonPlan;
        $this->_titre = $titre; 
        $this->_description = $description; 
        $this->_ville = $ville; 
        $this->_rue = $rue; 
        $this->_numRue = $numRue; 
        $this->_lienWeb = $lienWeb; 
        $this->_numTel = $numTel; 
    }    
    // déclaration des méthodes
}
?>