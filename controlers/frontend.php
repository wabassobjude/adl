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
    use models\Singleaccount;

    function displayForm(){
        require("./views/poleView.php");
    }

    function formSA(){
        require('./views/viewSA.php');
    }

    /*LES METHODES DE LA CLASSE Pole */

    function addingPole($polename, $leader, $nation)
    {
        $polename=htmlspecialchars($polename);
        $leader=htmlspecialchars($leader);
        $nation=htmlspecialchars($nation);
        $pole= new Pole($polename, $leader, $nation);
        $result=$pole->addPole($polename, $leader, $nation);
        if($result){
            require('./views/poleView.php');
        }
        else{
            throw new \Exception("Fichier frontend.php: Echec d'ajout du pole");
            // throw new \Exception("Echec d'ajout du pole");
        }
        
    }


    /*LES METHODES DE LA CLASSE Singleaccount */
    
    function addingSA($date,$fn,$ln,$daddy,$miss,$fasting,$tj){
        $date= htmlspecialchars($date);
        $fn=htmlspecialchars($fn);
        $ln=htmlspecialchars($ln);
        $daddy=htmlspecialchars($daddy);
        $miss=htmlspecialchars($miss);
        $fasting=htmlspecialchars($fasting);
        $tj=htmlspecialchars($tj);
        // $id_user=htmlspecialchars($id_user);
        $sa= new Singleaccount($fn,$ln,$date);

        $sa=$sa->hydraterSA($daddy,$miss,$fasting,$tj);

        var_dump($daddy);
        echo("L'espace entre les deux</br>");
        // die(var_dump($sa->getSa_date()));

        $resultat=$sa->addSingleAccount($sa);
        if($resultat){
            require('./views/viewSA.php');
        }else{
            throw new \Exception("Fichier frontend.php(addinSA): Echec d'ajout du compte rendu individuel");
        }
    }