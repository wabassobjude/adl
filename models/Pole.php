<?php
    declare(strict_types=1);

    namespace models;
 
    // require_once('././autoLoad.php');
 
    class Pole extends Connecter{
        private $polename;
        private $leader;
        private $nation;
        private $id_user;

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

        public function setId_user($var)
        {
            if(isset($var) && is_int($var)){
                $this->_id_user=$var;
            }
            else{
                throw new \ErrorException("Erreur(from Pole Model): Identifiant de l'utilisateur corrompu!");
            }
        }

        // Cration des getters
        public function getPolename(){return $this->_polename;}
        public function getLeader(){return $this->_leader;}
        public function getNation(){return $this->_nation;}
        public function getId_user(){return $this->_id_user;}


        public function addPole($polename,$leader,$nation,$id_user)
        {
            $pole= new Pole($polename,$leader,$nation);
            $pole->setId_user($id_user);
            $bdd=$this->connexionDB();
            // $bdd=$this->connexionDB();
            $req= $bdd->prepare("INSERT INTO pole(polename,leader,nation,id_user) values(:polename,:leader,:nation,:id_user)");
            $state= $req->execute(array(
                'polename'=>$pole->getPolename(),
                'leader'=>$pole->getLeader(),
                'nation'=>$pole->getNation(),
                'id_user'=>$pole->getId_user()
            ));
            return $state;
        }

        public function poleList()
        {
            $poles=[];
            $identifiants=[];
            $bdd= $this->connexionDB();
            $req= $bdd->query('SELECT* FROM pole ORDER BY polename');
            while($ligne=$req->fetch(\PDO::FETCH_ASSOC)){
                $pole= new Pole($ligne['polename'],$ligne['leader'],$ligne['nation']);
                $iden=(int)$ligne['id_user'];
                $pole->setId_user($iden);
                $poles[]=$pole;
                $identifiants[]=(int)$ligne['id'];
            }
            $tabs=[2];
            $tabs[0]=$poles;
            $tabs[1]=$identifiants;
            return $tabs;
        }

        // Get a specific pole

        public function onePole($iden)
        {
            $bdd=$this->connexionDB();
            $req=$bdd->query("SELECT* FROM pole WHERE id=$iden");

            $occurence=$req->fetch(\PDO::FETCH_ASSOC);
            $pole=new Pole($occurence['polename'],$occurence['leader'],$occurence['nation']);

            $iden=(int)$occurence['id_user'];

            $pole->setId_user($iden);

            return $pole;
        }

    }