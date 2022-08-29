<!DOCTYPE html>
<html lang="fr">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="<?=$cssForm?>">
        <link rel="stylesheet" href="<?=$cssList?>">
        <title><?= $title?></title>
    </head>
    <body>

        <?= include('menu.php');?>
        <?= $pageContent;?>
        
    </body>
</html>