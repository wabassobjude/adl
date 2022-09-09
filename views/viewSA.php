<?php
    $cssForm='././publics/CSS/forms.css';
    $cssList='././publics/CSS/displayList.css';
    $title="Single Account";
    ob_start();
?>

<div class="formulaire">
    <form action="index.php? action=makeSA" method="POST">
        <h3>Ajouter un compte-rendu individuel(C.R.I)</h3>
        <table>
            <tr>
                <td>Date</td>
                <td>Nom</td>
                <td>Prenom</td>
                <td>Dady</td>
                <td>Missionnaires</td>
                <td>Jeûne</td>
            </tr>
            <tr>
                <td><input type="date" name="date" required></td>
                <td><input type="text" name="firstname" placeholder="Nom" required></td>
                <td><input type="text" name="lastname" placeholder="Prenom" required></td>
                <td><input type="time" name="daddy"required ></td>
                <td><input type="time" name="missionnaries"required ></td>
                <td><input type="number" name="jeune" min="0" placeholder="Nombre de jours" required></td>
                <td><select name="type_jeune" required>
                    <!-- <option value="">choisir</option> -->
                    <option value="Partiel">Partiel</option>
                    <option value="Complet">Complet</option>
                </select></td>
                <td class="bouton"><input type="submit" value="Enregistrer" ></td>
            </tr>
        </table>
    </form>
</div>

<div class="affichages">
    <?php
        if($liste!=false){
                $j=count($liste[0]);
            ?>
            <h3>Liste des Comptes-Rendus individuel (C.R.I) déjà enregistrés</h3>
            <div class="details">
                <h4>Total C.R.I: <span><?=$j?></span></h4>
            </div>
            <table>
                <thead>
                    <tr>
                        <th>Dates</th>
                        <th>Noms et Prenoms</th>
                        <th>Daddy</th>
                        <th>Missionnaires</th>
                        <th>Jeûnes</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tfoot>
                    <tr>
                        <th>Dates</th>
                        <th>Noms et Prenoms</th>
                        <th>Daddy</th>
                        <th>Missionnaires</th>
                        <th>Jeûnes</th>
                        <th>Actions</th>
                    </tr>
                </tfoot>
                <tbody>
                    <?php
                        for($i=0; $i<$j; $i++){?>
                            <tr>
                                <td><?=$liste[0][$i]->getSadate()?></td>
                                <td><?=$liste[0][$i]->getFirstname().' '.$liste[0][$i]->getLastname()?> </td>
                                <td><?=$liste[0][$i]->getDaddy()?> </td>
                                <td><?=$liste[0][$i]->getMissionnaries() ?> </td>
                                <td><?=$liste[0][$i]->getFasting().''.'j'.' '.$liste[0][$i]->getType_jeune()?> </td>
                                <td>
                                    <a href="index.php? action=SAtoModify&amp;iden=<?=$liste[1][$i]?>">Modifier</a>
                                </td>
                            </tr>
                        <?php }
                    ?>
                </tbody>
            </table>
       <?php }
    ?>
</div>

<?php
    $pageContent=ob_get_clean();
    include("pageTemplate.php");
?>
