<?php
    $title="Ajout d'un nouveau pole";
    ob_start();
?>

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

<?php
    $pageContent=ob_get_clean();
    include('pageTemplate.php');
?>