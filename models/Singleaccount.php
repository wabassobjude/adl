<?php
    namespace models;

    class Singleaccount extends Connecter{
        private $firstname;
        private $lastname;
        private $sadate;
        private $daddy;
        private $missionnaries;
        private $fasting;
        private $type_jeune;
        private $id_user=1;


        public function __construct($firstname, $lastname, $sadate) {
            $this->setFirstname($firstname);
            $this->setLastname($lastname);
            $this->setSadate($sadate);
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

        public function setSadate($var)
        {
            // ajouter la condition sur le type de $var après
            if(isset($var)){
                $this->_sadate=$var; //sa_date: single account date
            }
            else{
                throw new \Exception("La valeur de la date est incorrecte. Veuillez verifier(fichier Singleaccount.php/setSadate)");
            }
        }

        public function setDaddy($var)
        {
            if(isset($var)){
                $this->_daddy=$var;
            }
            else{
                throw new \Exception("La valeur du champ 'daddy' est incorrecte. Veuillez verifier(fichier Singleaccount.php/setDaddy)");
            }
        }

        public function setMissionnaries($var)
        {
            if(isset($var)){
                $this->_missionnaries=$var;
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

        public function setId_user($var)
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
        public function getSadate(){ return $this->_sadate; }
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

        // public function addSingleAccount($firstname, $lastname, $sadate,$dad,$miss,$fasting,$type_jeune,$id_user)
        
        public function hydraterSA($dad,$miss,$fasting,$type_jeune,$idUser)
        {

            $this->setDaddy($dad);
            $this->setMissionnaries($miss);
            $this->setFasting($fasting);
            $this->setType_jeune($type_jeune);
            $this->setId_user($idUser);
            return $this;
        }
        
        public function addSingleAccount(Singleaccount $sa)
        {
            $bdd= $this->connexionDB();
            $req= $bdd->prepare("INSERT INTO singleaccount(firstname,lastname,sadate,daddy,missionnaries,fasting,type_jeune,id_user)
                                VALUES(:fn,:ln,:sadate,:daddy,:miss,:fasting,:tj,:id_user)");
            $resultat=$req->execute(array(
                'fn'=>$sa->getFirstname(),
                'ln'=>$sa->getLastname(),
                'sadate'=>$sa->getSadate(),
                // 'sadate'=>"2002-08-08 12:30",
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

        public function singleAccountList()
        {
            $bdd= $this->connexionDB();
            $req= $bdd->query("SELECT* FROM singleaccount ORDER BY id DESC");
            $SA=[];
            $identifies=[];
            while($occurence=$req->fetch(\PDO::FETCH_ASSOC)){
                $oneSA= new Singleaccount($occurence['firstname'],$occurence['lastname'],$occurence['sadate']);
                $fasting=(int)$occurence['fasting'];
                $idenUser=(int)$occurence['id_user'];
                $oneSA=$oneSA->hydraterSA($occurence['daddy'],$occurence['missionnaries'],$fasting,$occurence['type_jeune'],$idenUser);
                $SA[]=$oneSA;
                $identifies[]=$occurence['id'];
            }

            $tab=[2];
            $tab[0]=$SA;
            $tab[1]=$identifies;
            return $tab;
        }

        /**
         * Cette methode permet de recuperer un SingleAccount donné en BD.
         * Elle prend en argument l'ID et retourne un objet de type Singleaccount
         */
        public function oneSingleAccount($idSA)
        {
            $bdd=$this->connexionDB();
            $ligne= $bdd->query("SELECT* FROM singleaccount WHERE id=$idSA");
            $data=$ligne->fetch(\PDO::FETCH_ASSOC);
            $sa= new Singleaccount($data['firstname'],$data['lastname'],$data['sadate']);
            $jeune=(int)$data['fasting'];
            $idenUser=(int)$data['id_user'];
            $sa->hydraterSA($data['daddy'],$data['missionnaries'],$jeune,$data['type_jeune'],$idenUser);

            return $sa;
        }

        /**
         * Cette methode permet de modifier un CRI donné. Elle prend en argument
         * le nouveau Singleaccount ainsi que son ID.
         * Elle retourne un 
         */
        public function modifySingleAccount(Singleaccount $sa,$idSA)
        {
            $bdd=$this->connexionDB();
            $modify=$bdd->prepare("UPDATE singleaccount SET
                                        firstname=:nom,
                                        lastname=:prenom,
                                        sadate=:sa_date,
                                        daddy=:dad,
                                        missionnaries=:miss,
                                        fasting=:fastings,
                                        type_jeune=:type_fasting,
                                        id_user=:idUser
                                        WHERE id=$idSA");
            $state=$modify->execute(array(
                                    'nom'=>$sa->getFirstname(),
                                    'prenom'=>$sa->getLastname(),
                                    'sa_date'=>$sa->getSadate(),
                                    'dad'=>$sa->getDaddy(),
                                    'miss'=>$sa->getMissionnaries(),
                                    'fastings'=>$sa->getFasting(),
                                    'type_fasting'=>$sa->getType_jeune(),
                                    'idUser'=>$sa->getId_user()
                                ));
            if($state){
                return $state;
            }
            else{
                throw new \Exception("Singleaccount/modifySingleAccount: Erreur de modification du CRI");
            }
        }

    }
