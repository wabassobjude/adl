<?php
    namespace models;

    class Fasting extends Connecter{
        private $periode;
        private $jours;
        private $types;
        private $id_pa;


        public function __construct($periode,$jour,$type,$idPa) {
            $this->setPeriode($periode);
            $this->setJour($jour);
            $this->setTypes($type);
            $this->setId_pa($idPa);
        }

        // Creation des setters
        public function setPeriode($var)
        {
            if(isset($var) && is_string($var)){
                $this->_periode=$var;
            }
            else{
                throw new \Exception("Fasting/setPeriode: Veuillez entrer une chaine de caractères pour la valeur de 'Periode'");
            }
        }

        public function setJour($var)
        {
            if(isset($var) && is_int($var)){
                $this->_jours=$var;
            }
            else{
                throw new \Exception("Fasting/setJours: Veuillez entrer un entier pour la valeur de 'JOURs'");
            }
        }

        public function setTypes($var)
        {
            if(isset($var) && is_string($var)){
                $this->_types=$var;
            }
            else{
                throw new \Exception("Fasting/setTypes: Type de jeune invalide. Entrez du texte");
            }
        }

        public function setId_pa($var)
        {
            if(isset($var) && is_int($var)){
                $this->_id_pa=$var;
            }
            else{
                throw new \Exception("Fasting/setId_pa: Entrer un nombre pour la valeur de 'id_pa'");
            }
        }

        // Les getters
        public function getPeriode(){ return $this->_periode; }
        public function getJour(){ return $this->_jours; }
        public function getTypes(){ return $this->_types; }
        public function getIdPa(){ return $this->_id_pa; }

        // Ajout d'une nouvelle occurence
        public function addFasting(Fasting $fasting)
        {
            $bdd=$this->connexionDB();
            $req= $bdd->prepare("INSERT INTO fasting(periode,jours,types,id_pa) VALUES(:periode,:jour,:types,:idPa)");
            $resultat=$req->execute(array(
                'periode'=>$fasting->getPeriode(),
                'jour'=>$fasting->getJour(),
                'types'=>$fasting->getTypes(),
                'idPa'=>$fasting->getIdPa()
            ));
            if($resultat){
                return true;
            }
            else{
                throw new \Exception("Fasting/addFasting: Echec d'insertion d'un nouveau Jeune en BD");
            }
        }

        public function fastingListForPA($idPA)
        {
            $bdd=$this->connexionDB();
            $req=$bdd->query("SELECT* FROM fasting WHERE id_pa=$idPA");
            $fasts=[];
            $identifiants=[];
            while($ligne=$req->fetch(\PDO::FETCH_ASSOC)){
                $oneFast= new Fasting($ligne['periode'],$ligne['jours'],$ligne['types'], $ligne['id_pa']);
                $fasts[]=$oneFast;
                $identifiants[]=(int)$ligne['id'];
            }
            $tab=[2];
            $tab[0]=$fasts;
            $tab[1]=$identifiants;
            return $tab;
        }

    }