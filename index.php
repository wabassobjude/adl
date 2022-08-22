<?php
    require_once('controlers/frontend.php');

    try {

        if(isset($_GET['action'])){
            if($_GET['action']=='ajouter'){
                // die(var_dump($_POST['polename']));
                addingPole($_POST['polename'], $_POST['leader'], $_POST['nation']);
            }
        }
        else{
            // Si on arrive sur le site pour la premiere fois, j'affiche le formulaire d'ajout
            displayForm();
        }
    }
    catch(Exception $e){
        echo("<b><u>Une erreur est survenu lors de l'exection. La voici : </u></b>".$e->getMessage());
    }
    
?>