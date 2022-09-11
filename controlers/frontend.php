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

    /*
        Cette fonction permet d;afficher le formulaire d'ajout d'un nouveau 'Pole'
    */
    function displayForm(){
        $liste=getPoleList();
        require("./views/poleView.php");
    }

    /*
        Ceci est une fonction qui permet d'acceder à la classe 'Pole' et d'ajouter
        un nouveau Pole dans la BD.
    */
    function addingPole($polename, $leader, $nation)
    {
        $polename=htmlspecialchars($polename);
        $leader=htmlspecialchars($leader);
        $nation=htmlspecialchars($nation);
        $id_user=1;
        $pole= new Pole($polename, $leader, $nation);
        $result=$pole->addPole($polename, $leader, $nation,$id_user);
        if($result){
            // require('./views/poleView.php');
            displayForm();
        }
        else{
            throw new \Exception("Fichier frontend.php: Echec d'ajout du pole");
            // throw new \Exception("Echec d'ajout du pole");
        }
        
    }

    /*
        Cette fonction permet de recuperer la liste des la BD
    */
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

    /*Cette fonction permet d'acceder à la classe 'Pole' et recuperer un pole specifique
      dans la BD en passant son ID en argument.
    */
    function getOnePole($iden){
        $vide='vide';
        $emptyPole= new Pole($vide,$vide,$vide);
        $pole=$emptyPole->onePole($iden);
        return $pole;
    }

    /*Ceci est une fonction du controleur qui permet de afficher le formulaire de
      modification d'un pole tout en affichant les anciennes valeurs de de pole en
      en haut de page.
    */
    function poleFormModification($idenPole)
    {
        $thePole=getOnePole($idenPole);
        $idPole= $idenPole; //Cet ID en envoyé au formualaire pour identifier le pole.
        require('./views/modifyPole.php');
    }

    /*
        Cette fonction permet de modifier un 'Pole'. Elle prend en paramettre les
        nouvelles informations du nouveau Pole ainsi l'ID du Pole à modifier
    */
    function modifyingPole($polename,$leader,$nation,$idenPole,$idUser)
    {
        $idPole=(int)$idenPole;
        $newPole= new Pole($polename,$leader,$nation);
        $newPole->setId_user($idUser);
        $state= $newPole->modifyPole($newPole,$idPole);
        if($state){
            displayForm();
        }
        else{
            throw new \Exception("frontend/modifyingPole: Echec de mofication...");
        }
    }

    /******************************************************
    *******                                           *****
    *******   LES METHODES DE LA CLASSE Singleaccount *****
    *******                                           *****
    *******************************************************/

    /*
        Cette fonction est chargée d'afficher le formulaire d'ajout d'un C.R.I 
        Elle recupere aussi la liste des CRI deja enregistrés et les tranfere à la vue
        'viewSA' qui se chargera de les afficher. 
    */
    function formSA(){
        $liste=getSingleAcountList();
        require('./views/viewSA.php');
    }
    
    /*
        Cette fonction permet d'ajouter un nouveau C.R.I. Elle appele les methodes
        'hydraterSA', 'addSingleAccount' de la classe 'Singleaccount'
    */
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

    function modifyingSA($date, $nom, $prenom, $daddy, $miss, $jeune, $typeJeune, $idenSA)
    {
        // Sanctifiction des données de l'utilsateur.
        $date=htmlspecialchars($date);
        $prenom=htmlspecialchars($prenom);
        $daddy=htmlspecialchars($daddy);
        $miss=htmlspecialchars($miss);
        $jeune=(int)htmlspecialchars($jeune);
        $typeJeune=htmlspecialchars($typeJeune);
        $idenSA=(int)$idenSA;

        $sa=new Singleaccount($nom,$prenom,$date);
        $idUser=1; // Apres avoir géré les session, changer cet identifiant
        $sa->hydraterSA($daddy,$miss,$jeune,$typeJeune,$idUser);

        $state=$sa->modifySingleAccount($sa,$idenSA);
        if($state){
            formSA();
        }
        else{
            throw new \Exception("Frontend:modifyingSA | Echex de modification de C.R.I");
        }

    }

    /*
        Cette fonction permet de recuperer la liste des C.R.I deja enregistrés.
    */
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

    // Modifier un C.R.I
    function modifyCRI($idCRI)
    {
        $idCRI=(int)$idCRI;
        $sa=new Singleaccount('','','');
        $CRI=$sa->oneSingleAccount($idCRI);
        require('./views/modifySA.php');
    }
    /******************************************************
    *******                                         *******
    *******     Les methodes de classe              *******
    *******           Poleaccount(P.A.)             *******
    *******************************************************/
    
    /*
        Cette fonction permet d'afficher le formulaire d'ajout d'un nouveau C.R.P 
        Elle recupere la liste des CRP ainsi que celle des poles deja enregistré et la passe à la vue 'viewPA'
        qui se charge de les afficher.
    */
    function formPA(){
        $listePole=getPoleList();//Pour le formulaire
        $listAccountPole=getPoleAcountList();// Pour la tableau des C.R.P
        require('./views/viewPA.php');
    }

    /*
        Cette fonction est chargée de reuperer les données du formulaire d'ajout d'un CRP
        et de les passer àla methode 'addPoleAccount' qui se charge de les ajouter dans la BD
    */
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

    /*
        Cette fonction appelle la methode 'poleAcountList' de la classe 'Poleaccount'
        qui retourne la liste des CRP deja enregistré.
    */
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
    
    /*
        Cette fonction appele la methode 'onePoleaccount' qui permet de recuperer un
        un compte-rendu specifique
    */
    function getOnePoleAccount($idPA)
    {
        $empty='';
        $emptyPA= new Poleaccount($empty,$empty,0);
        $PA= $emptyPA->onePoleaccount($idPA);
        return $PA;
    }

     /**
     * Afficher le C.R.P àmodifier
    */

    function formPAmodification($idPole,$idenPA)
    {
        $idPole=(int)htmlspecialchars($idPole);
        $idenPA=(int)htmlspecialchars($idenPA);
        $thePA=getOnePoleAccount($idenPA);
        $thePole=getOnePole($idPole);
        $allPoles=getPoleList();
        require('./views/modifyPA.php');
    }

    function modifyingPA($periode, $date, $idPole, $effectif, $daddy, $miss,$idUser,$idPA)
    {
        $periode=htmlspecialchars($periode);
        $date=htmlspecialchars($date);
        $idPole=(int)htmlspecialchars($idPole);
        $effectif=(int)htmlspecialchars($effectif);
        $daddy=htmlspecialchars($daddy);
        $miss=htmlspecialchars($miss);
        $idPA=htmlspecialchars($idPA);

        $newPA= new Poleaccount($periode, $date,$effectif);
        $idUser=1; //Changer cet ID lorsque j'aurais pris en compte les SESSIONS
        $newPA->hydraterPoleAccount($daddy, $miss, $idPole,$idUser);
        
        $state= $newPA->modifyOnePA($newPA,$idPA);
        if($state){
            formPA();
        }
        else{
            throw new \Exception("Frontend(modifyingPA):Echec de modification du C.R.P");
        }
    }


    /******************************************************
    *******                                           *****
    *******   LES METHODES DE LA CLASSE Fasting       *****
    *******                                           *****
    *******************************************************/

    /*
        Cette fonction appelle la vue 'viewFasting.php' qui affiche le formulaire d'ajout
        d'un compte-rendu de jeune pour un Pole donné. Elle prend en paramettre l'ID du
        'Poleaccount' ainsi que celui du 'Pole'
    */
    function formFasting($idPole, $idPA)
    {
        $idenPole=(int)$idPole;
        $idenPA=(int)$idPA;
        
        $vide='';
        $emptyPole= new Pole($vide,$vide,$vide);
        $pole=$emptyPole->onePole($idenPole);
        $poleName=$pole->getPolename();

        $entier=1;
        $emptyFasting= new Fasting('',$entier,'',$entier);
        $hisFastings=$emptyFasting->fastingListForPA($idenPA);

        require('./views/viewFasting.php');
    }

    /*
        cette fonction permet de recuperer les données du formulaire d'ajout d'un compte
        rendu de jeune pour un Pole et de les passer à la fonction 'addFasting' de la 
        classe Fasting.
    */
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

    /**
     * Cette fonction prend en arguments une heure(type: string) prise de la BD ainsi
     * qu'un entier et calcule le volume de priere d'un pole.
     * 
     */
    function volumePriere($times, $effectif)
    {
        $heure=$times[0].$times[1];
        $heure=(int)$heure;
        $minutes=$times[3].$times[4];
        $minutes=(int)$minutes;
        $enMinute=(($heure*60)+$minutes)*$effectif;

        $h=0;
        $jours=0;
        while($enMinute>=60){
            $h+=1;
            $enMinute= $enMinute-60;
        }
        if($enMinute==0){
            $enMinute='00';
        }elseif($enMinute<10){
            $enMinute='0'.$enMinute;
        }
        $volH=$h.'H'.$enMinute;
        return $volH;
    }