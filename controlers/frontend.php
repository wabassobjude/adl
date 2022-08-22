<?php

    spl_autoload_register(function(string $cheminComplet)
    {
        $path=str_replace("\\","/", $cheminComplet).'.php';
        require_once($path);
    });

    // require_once('./models/Pole.php');

    use models\Pole;

    function displayForm(){
        require("./views/poleView.php");
    }

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
                echo("Fichier frontend.php: Echec d'ajout du pole");
                return;
                // throw new \Exception("Echec d'ajout du pole");
            }
            
        }