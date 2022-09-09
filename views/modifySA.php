<?php
    $cssForm='././publics/CSS/forms.css';
    $cssList='././publics/CSS/displayList.css';
    $title="Ajout d'un nouveau pole";
    ob_start();
?>
<div class="affichages">
    <h3>Compte-Rendu individuel (C.R.I) à modifier</h3>
    <table>
        <thead>
            <tr>
                <th>Date</th>
                <th>Nom et Prénom</th>
                <th>Daddy</th>
                <th>Missionnaires</th>
                <th>Jeûne(Jours et type)</th>
            </tr>
        </thead>
        <tr>
            <td> <?=$CRI->getSadate()?> </td>
            <td> <?=$CRI->getFirstname().' '.$CRI->getLastname()?> </td>
            <td> <?=$CRI->getDaddy() ?> </td>
            <td> <?=$CRI->getMissionnaries() ?> </td>
            <td> <?=$CRI->getFasting().'J '.$CRI->getType_jeune() ?> </td>
        </tr>
    </table>
</div>

<div class="formulaire">
    <form action="index.php? action=modifySA&amp;idenSA=<?=$idCRI?> " method="POST">
        <h3>Modifier ce C.R.I</h3>
        <table>
            <tr>
                <td>Date</td>
                <td>Nom </td>
                <td>Prénom</td>
                <td>Daddy</td>
                <td>Missionnaires</td>
                <td>Jeûne</td>
                <td>Type de Jeûne</td>
            </tr>
            <tr>
                <td><input type="date" name="sa_date" value="<?=$CRI->getSadate()?>" required></td>
                <td><input type="text" name="nom" value="<?=$CRI->getFirstname()?>" required></td>
                <td><input type="text" name="prenom" value="<?=$CRI->getLastname() ?>" required></td>
                <td><input type="time" name="daddy" value="<?=$CRI->getDaddy() ?>" required></td>
                <td><input type="time" name="missionnairies" value="<?=$CRI->getMissionnaries() ?>" required></td>
                <td><input type="number" name="fasting" value="<?=$CRI->getFasting() ?>" min="0" required></td>
                <td>
                    <select name="typeJeune" required>
                        <option value="">Choisir...</option>
                        <option value="Complet">Complet</option>
                        <option value="Partiel">Partiel</option>
                    </select>
                </td>
                <td class="bouton"><input type="submit" value="Modifier"></td>
            </tr>
        </table>
    </form>
</div>

<?php
   $pageContent=ob_get_clean();
   include('pageTemplate.php');
?>