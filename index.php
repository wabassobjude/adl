<?php
    require_once('controlers/frontend.php');

    try {

        if(isset($_GET['action'])){
            if($_GET['action']=='menu2'){
                formSA();
            }

            if($_GET['action']=='menu3'){
                displayForm();
            }

            if($_GET['action']=='ajouter'){
                // die(var_dump($_POST['polename']));
                addingPole($_POST['polename'], $_POST['leader'], $_POST['nation']);
            }

            if($_GET['action']=='makeSA'){
                if(isset($_POST['date']) && isset($_POST['firstname']) && isset($_POST['lastname']) && isset($_POST['daddy']) && isset($_POST['missionnaries']) && isset($_POST['jeune']) && isset($_POST['type_jeune'])){
                    addingSA($_POST['date'],$_POST['firstname'],$_POST['lastname'],$_POST['daddy'],$_POST['missionnaries'],$_POST['jeune'],$_POST['type_jeune']);
                }else{
                    throw new \Exception("Erreur lors de la recuperation des donnees du formulaire(index.php/action=makeSA)");
                }
            }

            if($_GET['action']=='makePA'){
                addingPA($_POST['periode'],$_POST['pa_date'],$_POST['pole'],$_POST['effectif'],$_POST['daddy'],$_POST['missionnaries'],$id_user);
            }

            if($_GET['action']=='acceuil'){
                formPA();
            }

            if($_GET['action']=='formFasting'){
                // afficher le formulaire d'ajout de jeune
                formFasting($_GET['idPole'],$_GET['idPA']);
            }

            if($_GET['action']=='addJeune'){
                // echo('Dans index</br>');
                // die(var_dump($_GET['PA']));
                addingFasting($_POST['periode'], $_POST['jours'],$_POST['type_jeune'],$_GET['PA']);
            }
        }
        else{
            // Si on arrive sur le site pour la premiere fois, j'affiche un formulaire d'ajout
            // formSA(); //Single Account form
            formPA(); //Pole account form
        }
    }
    catch(Exception $e){
        echo("<b><u>Une erreur est survenu lors de l'exection. La voici : </u></b>".$e->getMessage());
    }
    
?>