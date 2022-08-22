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
        <input type="date" name="laDate">
        <input type="submit" name="envoyer">
    </form>
</body>
</html>

<?php
    if(isset($_POST['envoyer'])){
        $var=$_POST['laDate'];
        echo("La date 1 est: $var </br>");
        $var=date("d-m-Y");
        var_dump($var);
        echo("</br>La date 2 est: $var");
    }
?>