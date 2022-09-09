<?php
    $cssForm='././publics/CSS/forms.css';
    $title="Ajouter le jeune";
    ob_start();
?>

<div class="jeune formulaire">
    <form action="index.php?action=addJeune&amp;PA=<?=$idenPA ?>" method="POST">
        <h3>Ajouter le jeune pour le Pôle <b class="gras">"<u><?=$poleName?></u>"</b> </h3>
        <em>Apres, il sera mieux d'afficher toutes les infomations du Pôle concerné</em>
        <table>
            <tr>
                <td>Pôle</td>
                <td>Période</td>
                <td>Jours</td>
                <td>Type</td>
            </tr>
            <tr>
                <td><input type="text" name="polename" value="<?= $poleName ?>" disabled></td>
                <td><input type="week" name="periode" placeholder="Ex: 2022-W15" required></td>
                <td><input type="number" name="jours" placeholder="Nombre de jours" min="1" required></td>
                <td>
                    <select name="type_jeune" required>
                        <option value="">choisir...</option>
                        <option value="Partiel">Partiel</option>
                        <option value="Complet">Complet</option>
                    </select>
                </td>
                <!-- <td><input type="hidden" name="idenPA" value=""></td> -->
                <td class="bouton"><input type="submit" value="Envoyer"></td>
            </tr>
        </table>
    </form>
</div>

<?php
   $pageContent=ob_get_clean();
   include('pageTemplate.php');
?>