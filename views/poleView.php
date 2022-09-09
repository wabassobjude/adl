<?php
    $cssForm='././publics/CSS/forms.css';
    $cssList='././publics/CSS/displayList.css';
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

<div class="affichages">
    <?php
        $poles=$liste;
        if(!empty($poles[0])){
            $j=count($poles[0]);?>
            <h3>Listes des Pôles enregistré</h3>
            <div class="details">
                <h4>Total: <span> <?=$j?> </span></h4>
            </div>
            
            <table>
                <thead>
                    <th>Noms des Pôles</th>
                    <th>Leaders</th>
                    <th>Nations</th>
                    <th>Actions</th>
                </thead>

                <tfoot>
                    <th>Noms des Pôles</th>
                    <th>Leaders</th>
                    <th>Nations</th>
                    <th>Actions</th>
                </tfoot>

                <tbody>
                    <?php
                        for($i=0; $i<$j; $i++){?>
                            <tr>
                                <td> <?=$poles[0][$i]->getPolename()?> </td>
                                <td> <?=$poles[0][$i]->getLeader()?> </td>
                                <td> <?=$poles[0][$i]->getNation()?> </td>
                                <td>
                                    <a href="index.php? action=poleToModify&amp;iden=<?=$poles[1][$i]?>">Modifier</a>
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
    include('pageTemplate.php');
?>