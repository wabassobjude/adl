<?php
    $cssForm='././publics/CSS/forms.css';
    $title="Ajout d'un nouveau pole";
    ob_start();
?>

<div class="formulaire">
    <form action="index.php? action=ajouter" method="POST">
        <h3>Ajouter un nouveau Pôle</h3>
        <table>
            <tr>
                <td>Nom du pôle</td>
                <td>Leader</td>
                <td>Nation</td>
            </tr>
            <tr>
                <td><input type="text" name="polename" placeholder="Nom du pôle" required></td>
                <td><input type="text" name="leader" placeholder="Nom du leader"></td>
                <td><input type="text" name="nation" placeholder="Nom de la nation"></td>
                <td class="bouton"><input type="submit" value="Enregister"></td>
            </tr>
        </table>
    </form>
</div>

<?php
    $pageContent=ob_get_clean();
    include('pageTemplate.php');
?>