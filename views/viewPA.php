<?php
    $title="Compte-rendu pole";
    ob_start();
?>

<form action="index.php? action=makePA" method="POST">
    <h3>Compte-rendu d'un pôle</h3>
    <table>
        <tr>
            <td><label for="">Periode</label></td>
            <td><label for="">Date</label></td>
            <td><label for="">Effectif</label></td>
            <td><label for="pole">Pôle</label></td>
            <td><label for="">Pr Daddy</label></td>
            <td><label for="">Missionnares</label></td>
        </tr>
        <tr>
            <td><input type="week" name="periode" required></td>
            <td><input type="date" name="pa_date" required></td>
            <td><input type="number" name="effectif" required></td>
            <td><select name="pole" id="pole" required>
                <option value="">choisir</option>
            <?php
                $allPoles=$listePole;
                if($allPoles!=false){
                    $j=count($allPoles[0]);
                    for($i=0; $i<$j; $i++){ ?>
                    
                        <option value="<?=$allPoles[1][$i]?>"><?php echo($allPoles[0][$i]->getPolename())?></option>
                   <?php }
                }
            ?>
                
            </select></td>
            <td><input type="time" name="daddy"required ></td>
            <td><input type="time" name="missionnaries"required ></td>
            <td><input type="submit" value="Enregistrer"></td>
        </tr>
    </table>
</form>

<?php
    $pageContent=ob_get_clean();
    include('pageTemplate.php');
?>