<?php
    $title="Single Account";
    ob_start();
?>
<form action="index.php? action=makeSA" method="POST">
    <h3>Ajouter un compte-rendu individuel(CRI)</h3>
    <table>
        <tr>
            <td><input type="date" name="date" required></td>
            <td><input type="text" name="firstname" placeholder="Nom" required></td>
            <td><input type="text" name="lastname" placeholder="Prenom" required></td>
            <td><input type="time" name="daddy"required ></td>
            <td><input type="time" name="missionnaries"required ></td>
            <td><input type="number" name="jeune" required></td>
            <td><select name="type_jeune" required>
                <!-- <option value="">choisir</option> -->
                <option value="Partiel">Partiel</option>
                <option value="Complet">Complet</option>
            </select></td>
            <td><input type="submit" value="Enregistrer"></td>
        </tr>
    </table>
</form>
<?php
    $pageContent=ob_get_clean();
    include("pageTemplate.php");
?>
