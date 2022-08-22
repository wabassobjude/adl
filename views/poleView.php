<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ajout d'un nouveau pole</title>
</head>
<body>
    <h3>Ajouter un nouveau Pole</h3>
    <form action="index.php? action=ajouter" method="POST">
        <table>
            <tr>
                <td>Nom du pole</td>
                <td><input type="text" name="polename" placeholder="Nom du pole" required></td>
            </tr>
            <tr>
                <td>Leader</td>
                <td><input type="text" name="leader" placeholder="Nom du leader"></td>
            </tr>
            <tr>
                <td>Nation</td>
                <td><input type="text" name="nation" placeholder="Nom de la nation"></td>
            </tr>
            <tr>
                <td>
                    <input type="submit" value="Enregister">
                </td>
                
            </tr>
        </table>
    </form>
</body>
</html>