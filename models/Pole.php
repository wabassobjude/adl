<?php
    declare(strict_types=1);

    namespace models;
 
    // require_once('././autoLoad.php');
 
    class Pole extends Connecter{
        private $polename;
        private $leader;
        private $nation;

        public function __construct($polename,$leader,$nation) {
            $this->setPolename($polename);
            $this->setLeader($leader);
            $this->setNation($nation);
        }

        // Creation des setters
        public function setPolename($var){
            if(is_string($var)){
                $this->_polename=$var;
            }
            else{
                throw new \ErrorException("Erreur(from Pole Model): Le nom du pole n'est pas correct!! Veuillez entrer du texte!");
            }
        }

        public function setLeader($var){
            if(is_string($var)){
                $this->_leader=$var;
            }
            else{
                throw new \ErrorException("Erreur(from Pole Model): Le nom du Leader est pas incorrect!! Veuillez entrer du texte!");
            }
        }

        public function setNation($var){
            if(is_string($var)){
                $this->_nation=$var;
            }
            else{
                throw new \ErrorException("Erreur(from Pole Model): Veuillez entrer du texte pour le nom de la nation!");
            }   
        }

        // Cration des getters
        public function getPolename(){return $this->_polename;}
        public function getLeader(){return $this->_leader;}
        public function getNation(){return $this->_nation;}


        public function addPole($polename,$leader,$nation)
        {
            $pole= new Pole($polename,$leader,$nation);
            $bdd=$this->connexionDB();
            // $bdd=$this->connexionDB();
            $req= $bdd->prepare("INSERT INTO pole(polename,leader,nation,id_user) values(:polename,:leader,:nation,:id_user)");
            $state= $req->execute(array(
                'polename'=>$pole->getPolename(),
                'leader'=>$pole->getLeader(),
                'nation'=>$pole->getNation(),
                'id_user'=>1
            ));
            return $state;
        }

    }