<?php

    spl_autoload_register(function(string $cheminComplet)
    {
        $path=str_replace("\\","/", $cheminComplet).'.php';
        require_once($path);
    });

    /*************************************************************
     **** Cette conction qui commence à ligne 3 permet de     ****
     **** charger automatiquement les classes appellées       ****
     **** dans le code. Plus besoin du require_once!!!!       ****
     *************************************************************/

    // require_once('./models/Pole.php');

    use models\Pole;
    use models\Poleaccount;
    use models\Singleaccount;
    use models\Fasting;

    
    /******************************************************
    *******                                           *****
    *******         LES METHODES DE LA CLASSE Pole    *****
    *******                                           *****
    *******************************************************/

    function displayForm(){
            require("./views/poleView.php");
    }

    function addingPole($polename, $leader, $nation)
    {
        $polename=htmlspecialchars($polename);
        $leader=htmlspecialchars($leader);
        $nation=htmlspecialchars($nation);
        $id_user=1;
        $pole= new Pole($polename, $leader, $nation);
        $result=$pole->addPole($polename, $leader, $nation,$id_user);
        if($result){
            require('./views/poleView.php');
        }
        else{
            throw new \Exception("Fichier frontend.php: Echec d'ajout du pole");
            // throw new \Exception("Echec d'ajout du pole");
        }
        
    }

    function getPoleList(){
        $vide='';
        $emptyPole= new Pole($vide,$vide,$vide);
        $listePole=$emptyPole->poleList();
        if(!empty($listePole)){
            return $listePole;
        }
        else{
            return false;
        }
    }

    function getOnePole($iden){
        $vide='';
        $emptyPole= new Pole($vide,$vide,$vide);
        $pole=$emptyPole->onePole($iden);
        return $pole;
    }

    /******************************************************
    *******                                           *****
    *******   LES METHODES DE LA CLASSE Singleaccount *****
    *******                                           *****
    *******************************************************/

    function formSA(){
        $liste=getSingleAcountList();
        require('./views/viewSA.php');
    }
    
    function addingSA($date,$fn,$ln,$daddy,$miss,$fasting,$tj){
        $date= htmlspecialchars($date);
        $fn=htmlspecialchars($fn);
        $ln=htmlspecialchars($ln);
        $daddy=htmlspecialchars($daddy);
        $miss=htmlspecialchars($miss);
        $fasting=(int)htmlspecialchars($fasting);
        $tj=htmlspecialchars($tj);
        // $id_user=htmlspecialchars($id_user);
        $sa= new Singleaccount($fn,$ln,$date);

        $sa=$sa->hydraterSA($daddy,$miss,$fasting,$tj,1);
        // Le paramettre '1' represente l'identifiant de l'utilisateur qui realise l'operation

        $resultat=$sa->addSingleAccount($sa);
        if($resultat){
            formSA();
        }else{
            throw new \Exception("Fichier frontend.php(addinSA): Echec d'ajout du compte rendu individuel");
        }
    }

    function getSingleAcountList()
    {
        $emptySA=new Singleaccount('','','');
        $listeSA=$emptySA->singleAccountList();
        $j=count($listeSA[0]);
        if($j!=0){
            return $listeSA;
        }
        else{
            return false;
        }
    }

    /******************************************************
    *******                                         *******
    *******     Les methodes de classe              *******
    *******           Poleaccount(P.A.)             *******
    *******************************************************/
    
    function formPA(){
        $listePole=getPoleList();//Pour le formulaire
        $listAccountPole=getPoleAcountList();// Pour la tableau des C.R.P
        require('./views/viewPA.php');
    }

    function addingPA($periode,$date,$IdPole,$effectif,$daddy,$miss,$id_user)
    {
        $periode=htmlspecialchars($periode);
        $date=htmlspecialchars($date);
        $IdPole=(int)htmlspecialchars($IdPole);
        $effectif=(int)htmlspecialchars($effectif);
        $daddy=htmlspecialchars($daddy);
        $miss=htmlspecialchars($miss);
        // $id_user=htmlspecialchars($);
        $id_user=1; //J'attibue cette valeur à l'utilisateur.
        $pa= new Poleaccount($periode,$date,$effectif);
        $pa->hydraterPoleAccount($daddy,$miss,$IdPole,$id_user);

        $statut=$pa->addPoleAccount($pa);
        if($statut){
            formPA();
        }
        else{
            throw new \Exception("Fichier frontend.php(addingPA): Echec d'ajout du compte rendu du pole $statut");
        }
    }

    function getPoleAcountList()
    {
        $emptyPA=new Poleaccount('','',0);//Remplace 0 par '' pour voir le comportement de la methode
        $listePA=$emptyPA->poleAcountList();
        $j=count($listePA[0]);
        if($j!=0){
            return $listePA;
        }
        else{
            return false;
        }
    }

    /******************************************************
    *******                                           *****
    *******   LES METHODES DE LA CLASSE Fasting       *****
    *******                                           *****
    *******************************************************/
    function formFasting($idPole, $idPA)
    {
        $idenPole=(int)$idPole;
        $idenPA=(int)$idPA;
        
        $vide='';
        $emptyPole= new Pole($vide,$vide,$vide);
        $pole=$emptyPole->onePole($idenPole);
        $poleName=$pole->getPolename();

        require('./views/viewFasting.php');
    }

    function addingFasting($periode,$jours,$type,$idPA)
    {
        
        $periode=htmlspecialchars($periode);
        $jours=(int)htmlspecialchars($jours);
        $type=htmlspecialchars($type);
        $idPA=(int)htmlspecialchars($idPA);
        // die(var_dump($jours));
        $jeune= new Fasting($periode,$jours,$type,$idPA);
        // $fasting= new Fasting($periode,$jours,$type,$idPA);
        
        $state= $jeune->addFasting($jeune);
        if($state){
            formPA();
            echo("<h5 style='color:green'>Ajout reussit</h5>");
        }
    }

    /******************************************************
    *******                                           *****
    *******   LES METHODES independantes des CLASSES  *****
    *******                                           *****
    *******************************************************/

