<?php
    namespace models;

    class Singleaccount extends Connecter{
        private $firstname;
        private $lastname;
        private $sa_date;
        private $daddy;
        private $missionnaries;
        private $fasting;
        private $type_jeune;
        private $id_user=1;


        public function __construct($firstname, $lastname, $sa_date) {
            $this->setFirstname($firstname);
            $this->setLastname($lastname);
            $this->setSa_date($sa_date);
        }


        // Creaton des setters
        public function setFirstname($var)
        {
            if(isset($var) && is_string($var)){
                $this->_firstname=$var;
            }
            else{
                throw new \Exception("Valeur du nom incorrecte. Veuillez verifier(fichier Singleaccount.php/setFirstname)");
            }
        }

        public function setLastname($var)
        {
            if(isset($var) && is_string($var)){
                $this->_lastname=$var;
            }
            else{
                throw new \Exception("Valeur du Prenom incorrecte. Veuillez verifier(fichier Singleaccount.php/setLastname)");
            }
        }

        public function setSa_date($var)
        {
            // ajouter la condition sur le type de $var après
            if(isset($var)){
                $this->_sa_date=$var;
            }
            else{
                throw new \Exception("La valeur de la date est incorrecte. Veuillez verifier(fichier Singleaccount.php/setSa_date)");
            }
        }

        public function setDaddy($var)
        {
            if(isset($var) && is_int($var)){
                $this->_daddy=$var;
            }
            else{
                throw new \Exception("La valeur du champ 'daddy' est incorrecte. Veuillez verifier(fichier Singleaccount.php/setDaddy)");
            }
        }

        public function setMissionnaries($var)
        {
            if(isset($var) && is_int($var)){
                $this->_daddy=$var;
            }
            else{
                throw new \Exception("La valeur du champ 'missionnaries' est incorrecte. Veuillez verifier(fichier Singleaccount.php/setMissionnaries)");
            }
        }

        public function setFasting($var)
        {
            if(isset($var) && is_int($var)){
                $this->_fasting=$var;
            }
            else{
                throw new \Exception("La valeur du champ 'fasting' est incorrecte. Veuillez verifier(fichier Singleaccount.php/setFasting)");
            }
        }

        public function setType_jeune($var)
        {
            if(isset($var) && is_string($var)){
                $this->_type_jeune=$var;
            }
            else{
                throw new \Exception("La valeur du champ 'type_jeune' est incorrecte. Veuillez verifier(fichier Singleaccount.php/setType_jeune)");
            }
        }

        public function ssetId_user($var)
        {
            if(isset($var) && is_int($var)){
                $this->_id_user=$var;
            }
            else{
                throw new \Exception("La valeur du champ 'id_user' est incorrecte. Veuillez verifier(fichier Singleaccount.php/setId_user)");
            }
        }

        // Creation des getters

        public function getFirstname(){ return $this->_firstname;}
        public function getLastname(){ return $this->_lastname; }
        public function getSa_date(){ return $this->_sa_date; }
        public function getDaddy(){ return $this->_daddy; }
        public function getMissionnaries(){ return $this->_missionnaries; }
        public function getFasting(){ return $this->_fasting; }
        public function getType_jeune(){ return $this->_type_jeune; }
        public function getId_user(){ return $this->_id_user; }
        

        // Afficher de facilement un objet pris en BD
        // public function afficherUser(array $data){
        //     foreach ($data as $key => $value) {
        //         $callMethod="get".ucfirst($key);
        //         if(method_exists($this,$callMethod)){
        //             $val=$this->$callMethod();
        //             echo($val);
        //         }
        //         else{
        //             echo("La methoder <b>$callMethod</b> n'exixte pas </br>");
        //         }
        //     }  
        // }

        // public function addSingleAccount($firstname, $lastname, $sa_date,$dad,$miss,$fasting,$type_jeune,$id_user)
        public function addSingleAccount(Singleaccount $sa)
        {
            $bdd= $this->connexionDB();
            $req= $bdd->prepare("INSERT INTO singleaccount(firstname,lastname,sa_date,daddy,missionnaries,fasting,type_jeune,id_user)
                                VALUES(:fn,:ln,:sa_date,:daddy,:miss,:fasting,:tj,:id_user)");
            $resultat=$req->execute(array(
                'fn'=>$sa->getFirstname(),
                'ln'=>$sa->getLastname(),
                'sa_date'=>$sa->getSa_date(),
                'daddy'=>$sa->getDaddy(),
                'miss'=>$sa->getMissionnaries(),
                'fasting'=>$sa->getFasting(),
                'tj'=>$sa->getType_jeune(),
                'id_user'=>$sa->getId_user()
            ));
            if($resultat){
            return $resultat;
            }
            else{
                throw new \Exception("Erreur lors de l'ajout dans la BD(Fn: Singleaccount.php/addSingleAccount)");
            }
        }

    }
