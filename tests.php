<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="" method="POST">
        <input type="date" name="laDate" required>
        <input type="submit" name="envoyer">
    </form>
</body>
</html>

<?php
    if(isset($_POST['envoyer'])){
        $var=$_POST['laDate'];
        echo("La date 1 est: $var </br>");
        $var=date("H:i",);
        var_dump($var); 
        echo("</br>Le numero de la semaine est: $var </br>$num");
       /* TRES IMPORTANT
            TRAITEMENTS SUR LES DATES
            date("M"): Retourne l'abreviation du mois en cour;
            date("W"): Retourne le numero (dans l'annee) de la semaine en cour
       */
    }
?>