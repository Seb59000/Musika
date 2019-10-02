<?php
class Message
{
    protected $_idMessage;
    protected $_pseudoExpediteur;
    protected $_email;
    protected $_sujet;
    protected $_contenu;
    protected $_date;

    public function get_idMessage(){
        return $this->_idMessage;
    }
    
    public function get_pseudoExpediteur(){
        return $this->_pseudoExpediteur;
    }

    public function get_email(){
        return $this->_email;
    }

    public function get_sujet(){
        return $this->_sujet;
    }

    public function get_contenu(){
        return $this->_contenu;
    }

    public function get_date(){
        return $this->_date;
    }
/**
 * [__construct Message]
 * @param [type] $idMessage        [description]
 * @param [type] $pseudoExpediteur [description]
 * @param [type] $email            [description]
 * @param [type] $sujet            [description]
 * @param [type] $contenu          [description]
 * @param [type] $date             [description]
 */
    public function __construct($idMessage, $pseudoExpediteur, $email, $sujet, $contenu, $date) // Constructeur
    {
        $this->_idMessage = $idMessage;
        $this->_pseudoExpediteur = $pseudoExpediteur;
        $this->_email = $email;
        $this->_sujet = $sujet;
        $this->_contenu = $contenu; 
        $this->_date = $date;
    }       
    // déclaration des méthodes
}
?>