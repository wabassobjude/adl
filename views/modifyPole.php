<?php
    $cssForm='././publics/CSS/forms.css';
    $cssList='././publics/CSS/displayList.css';
    $title="Ajout d'un nouveau pole";
    ob_start();
?>

<div class="affichages pole">
    <table>
        <h3>Pôle à modifier</h3>
        <thead>
            <tr>
                <th>Nom du pôle</th>
                <th>Leader</th>
                <th>Nation</th>
            </tr>
        </thead>
        <tr>
            <td><?=$thePole->getPolename()?></td>
            <td><?=$thePole->getLeader()?></td>
            <td><?=$thePole->getNation()?></td>
        </tr>
    </table>
</div>

<div class="formulaire">
    <form action="index.php?action=modifyPole&amp;idPole=<?=$idPole?>" method="POST">
        <h3>Modifier ce pôle</h3>
        <table>
            <tr>
                <td>Nom du pôle</td>
                <td>Leader</td>
                <td>Nation</td>
            </tr>
            <tr>
                <td><input type="text" name="polename" value="<?= $thePole->getPolename()?>" required></td>
                <td><input type="text" name="leader" value="<?= $thePole->getLeader()?>" required></td>
                <td><input type="text" name="nation" value="<?= $thePole->getNation()?>" required></td>
                <td class="bouton"><input type="submit" value="Modifier"></td>
            </tr>
        </table>
    </form>
</div>

<?php
    $pageContent=ob_get_clean();
    include('pageTemplate.php');
?>