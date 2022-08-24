<?php
    namespace models;
    
    class Poleaccount extends Connecter{
        private $periode;
        private $pa_date;
        private $id_pole;
        private $effectif;
        private $daddy;
        private $missionnaries;
        private $id_user;


        // Constructeur

        public function __construct($periode,$pa_date,$effectif) {
            $this->setPeriode($periode);
            $this->setPa_date($pa_date);
            $this->setEffectif($effectif);
        }

        // Definition des setters
        public function setPeriode($var)
        {
            if(isset($var) && $var!=0){
                $this->_periode=$var;
            }
            else{
                throw new \Exception("Mauvaise valeur de periode(Poleaccount/setPeriode)");
            }
        }

        public function setPa_date($var)
        {
            if(isset($var)){
                $this->_pa_date=$var;
            }
            else{
                throw new \Exception("Mauvaise valeur de la date(Poleaccount/setPa_date)");
            }
        }

        public function setId_pole($var)
        {
            if(isset($var) && is_int($var)){
                $this->_id_pole=$var;
            }
            else{
                throw new \Exception("Mauvaise valeur de l'identifiant du pole(Poleaccount/setId_pole)");
            }
        }

        public function setEffectif($var)
        {
            if(isset($var) && is_int($var) && $var>0){
                $this->_effectif=$var;
            }
            else{
                throw new \Exception("Errerur!!! Verifiez la valeur de 'effectifs'(Poleaccount/setEffectif)");
            }
        }

        public function setDaddy($var)
        {
            if(isset($var)){
                $this->_daddy=$var;
            }
            else{
                throw new \Exception("La valeur du champ 'daddy' est incorrecte. Veuillez verifier(fichier Poleaccount.php/setDaddy)");
            }
        }

        public function setMissionnaries($var)
        {
            if(isset($var)){
                $this->_missionnaries=$var;
            }
            else{
                throw new \Exception("La valeur du champ 'missionnaries' est incorrecte. Veuillez verifier(fichier Poleaccount.php/setMissionnaries)");
            }
        }

        public function setId_user($var)
        {
            if(isset($var) && is_int($var) && $var>0){
                $this->_id_user=$var;
            }
            else{
                throw new \Exception("La valeur du champ 'id_user' est incorrecte. Veuillez verifier(fichier Poleaccount.php/setId_user)");
            }
        }

        // Les getters

        public function getPeriode(){ return $this->_periode; }
        public function getPa_date(){ return $this->_pa_date; }
        public function getId_pole(){ return $this->_id_pole; }
        public function getEffectif(){ return $this->_effectif; }
        public function getDaddy(){ return $this->_daddy; }
        public function getMissionnaries(){ return $this->_missionnaries;}
        public function getId_user(){ return $this->_id_user; }

        // Hydratation de la classe
        public function hydraterPoleAccount($daddy,$missionnaries,$id_pole,$idUser)
        {
            $this->setDaddy($daddy);
            $this->setMissionnaries($missionnaries);
            $this->setId_pole($id_pole);
            $this->setId_user($idUser);
            return;
        }

        public function addPoleAccount(Poleaccount $pa)
        {
            $bdd= $this->connexionDB();
            $req=$bdd->prepare("INSERT INTO poleaccount(periode,pa_date,id_pole,effectif,daddy,missionnaries,id_user)
                                VALUES(:periode,:paDate,:id_pole,:effectif,:daddy,:missionnaries,:idUser)");
            $resultat=$req->execute(array(
                'periode'=>$pa->getPeriode(),
                'paDate'=>$pa->getPa_date(),
                'id_pole'=>$pa->getId_pole(),
                'effectif'=>$pa->getEffectif(),
                'daddy'=>$pa->getDaddy(),
                'missionnaries'=>$pa->getMissionnaries(),
                'idUser'=>$pa->getId_user()
            ));
            if($resultat){
                return $resultat;
            }
            else{
                throw new \Exception("Erreur lors de l'insertion dans la BD(Fn: Poleaccount.php/addPoleAccount)");
            }
        }

    }