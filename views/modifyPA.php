<?php
    $cssForm='././publics/CSS/forms.css';
    $cssList='././publics/CSS/displayList.css';
    $title="Modifier un C.R.P";
    ob_start();
?>

<div class="affichages">
    <h3>Informations sur le Compte-rendu de pôle(C.R.P) à modifier: <span><?=$thePole->getPolename()?></span></h3>
    <table>
        <thead>
            <tr>
                <th>Periode</th>
                <th>Date</th>
                <th>Pôle</th>
                <th>Effectif</th>
                <th>Daddy</th>
                <th>Missionnaires</th>
            </tr>
        </thead>
        <tr>
            <td><?=$thePA->getPeriode()?></td>
            <td><?=$thePA->getPa_date() ?></td>
            <td><?=$thePole->getPolename()?></td>
            <td><?=$thePA->getEffectif()?></td>
            <td><?=$thePA->getDaddy()?></td>
            <td><?=$thePA->getMissionnaries()?></td>
        </tr>
    </table>
</div>

<div class="formulaire">

    <form action="index.php? action=modifyPA&amp;idenPA=<?=$idenPA?>" method="POST">
        <h3>Modifier ce C.R.P</h3>
        <table>
            <tr>
                <td>Periode</td>
                <td>Date</td>
                <td>Pôle</td>
                <td>Effectif</td>
                <td>Daddy</td>
                <td>Missionnaires</td>
            </tr>
            <tr>
                <td><input type="week" name="periode" value="<?=$thePA->getPeriode()?>" required placeholder="Format: 2022-W07"></td>
                <td><input type="date" name="PAdate" value="<?=$thePA->getPa_date()?>" required></td>
                
                <td>
                    <select name="pole">
                        <option value="<?=$thePA->getId_pole()?>" required><?=$thePole->getPolename()?></option>
                        <?php
                            $thisPole=$thePA->getId_pole();
                            $j=count($allPoles[0]);
                            for($i=0; $i<$j; $i++){
                                if($i!=$thisPole){?>
                                    <option value="<?=$allPoles[1][$i]?>"><?=$allPoles[0][$i]->getPolename()?></option>
                                <?php }
                            }
                        ?>
                    </select>
                </td>

                <td><input type="number" name="effectif" value="<?=$thePA->getEffectif() ?>" min="0" ></td>
                <td><input type="time" name="daddy" value="<?=$thePA->getDaddy() ?>"></td>
                <td><input type="time" name="missionnaries" value="<?=$thePA->getMissionnaries()?>" required></td>
                <td><input type="submit" value="Modifier"></td>
            </tr>
        </table>
    </form>
</div>

<?php
    $pageContent=ob_get_clean();
    include('pageTemplate.php');
?>