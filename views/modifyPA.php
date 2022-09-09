<?php
    $cssForm='././publics/CSS/forms.css';
    $cssList='././publics/CSS/displayList.css';
    $title="Modifier un C.R.P";
    ob_start();
?>

<div class="affichages">
    <h3>Informations sur l'ancien Compte-rendu de pôle(C.R.P): <span><?=$thePole->getPolename()?></span></h3>
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
    <h3>Modifier le pôle</h3>
    <form action="index.php? action=modifyPA&amp;idenPA=" method="POST">
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
                <td><input type="text" name="periode" value="<?=$thePA->getPeriode()?>"></td>
                <td><input type="text" name="PAdate" value="<?=$thePA->getPa_date()?>"></td>
                
                <td>
                    <select name="pole" id="">
                        <option value="<?=$thePA->getId_pole()?>"><?=$thePole->getPolename()?></option>
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

                <td><input type="number" name="effectif" value="<?=$thePA->getEffectif() ?>"></td>
                <td><input type="time" name="daddy" value="<?=$thePA->getDaddy() ?>"></td>
                <td><input type="time" name="missionnaries" value="<?=$thePA->getMissionnaries()?>"></td>
                <td><input type="submit" value="Modifier"></td>
            </tr>
        </table>
    </form>
</div>

<?php
    $pageContent=ob_get_clean();
    include('pageTemplate.php');
?>