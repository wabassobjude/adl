<?php
    $cssForm='././publics/CSS/forms.css';
    $cssList= '././publics/CSS/displayList.css';
    $title="Ajouter le jeune";
    ob_start();
?>

<div class="jeune formulaire">
    <form action="index.php?action=addJeune&amp;PA=<?=$idenPA ?>" method="POST">
        <h3>Ajouter le jeûne pour le Pôle <b class="gras">"<u><?=$poleName?></u>"</b> </h3>
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

<div class="affichages">
    <?php
        if($hisFastings!=false){$total= count($hisFastings[0]) ?>
            <h3>Liste des  jeûnes déjà enregistrés pour ce Pôle: <span> <?=$poleName?> </span></h3>
            <div class="details">
                <h4>Total: <span><?=$total?></span> </h4>
            </div>
            <table>
                <thead>
                    <tr>
                        <th>Periodes</th>
                        <th>Nombres de jours</th>
                        <th>Types</th>
                        <th>Nom du Pôle</th>
                    </tr>
                </thead>
                <!-- <tfoot>
                    <tr>
                        <th>Periodes</th>
                        <th>Nombres de jours</th>
                        <th>Types</th>
                        <th>Nom du Pôle</th>
                    </tr>
                </tfoot> -->
                <tbody>
                    <?php
                        for($i=0; $i<$total; $i++){?>
                            <tr>
                                <td> <?=$hisFastings[0][$i]->getPeriode() ?> </td>
                                <td> <?=$hisFastings[0][$i]->getJour() ?> </td>
                                <td> <?=$hisFastings[0][$i]->getTypes() ?> </td>
                                <td> <?=$poleName ?> </td>
                            </tr>
                        <?php }
                    ?>
                </tbody>
            </table>
        <?php }
        else{
            echo('Aucun jeune pour ce pole');
        }
    ?>
</div>

<?php
   $pageContent=ob_get_clean();
   include('pageTemplate.php');
?>