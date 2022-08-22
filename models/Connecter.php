<?php
    namespace models;
    
    class Connecter{
        // cette classe n'a pas de proprietes
        protected function connexionDB(){
            try {
                {
                    $connexion= new \PDO('mysql:host=localhost;dbname=ladul;charset=utf8','root','',array(\PDO::ATTR_ERRMODE => \PDO::ERRMODE_EXCEPTION));
                    return $connexion;
                }
            }
            catch (\Exception $e) {
                echo("Il ya eu une erreur lors de l'execution. La voici:".$e->getMessage());
                die();
            }
        }
    }
