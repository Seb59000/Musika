<?php
class MessagePerso
{
    protected $_idMessagePerso;
    protected $_idExpediteur;
    protected $_idDestinataire;
    protected $_pseudoDestinataire;
    protected $_contenu;

    public function get_idMessagePerso(){
        return $this->_idMessagePerso;
    }
    
    public function get_idExpediteur(){
        return $this->_idExpediteur;
    }

    public function get_idDestinataire(){
        return $this->_idDestinataire;
    }

    public function get_pseudoDestinataire(){
        return $this->_pseudoDestinataire;
    }

    public function get_contenu(){
        return $this->_contenu;
    }
/**
 * [__construct MessagePerso]
 * @param [type] $idMessagePerso     [description]
 * @param [type] $idExpediteur       [description]
 * @param [type] $idDestinataire     [description]
 * @param [type] $pseudoDestinataire [description]
 * @param [type] $contenu            [description]
 */
        public function __construct($idMessagePerso, $idExpediteur, $idDestinataire, $pseudoDestinataire, $contenu) // Constructeur
    {
        $this->_idMessagePerso = $idMessagePerso;
        $this->_idExpediteur = $idExpediteur;
        $this->_idDestinataire = $idDestinataire;
        $this->_pseudoDestinataire = $pseudoDestinataire;
        $this->_contenu = $contenu;
    } 
}
?>