
<div class="row mt-3">
    <?php
    if( isset( $message ) ) {
    ?>    
        <div class="col-12 alert alert-<?=$message['type'];?> alert-dismissible fade show" role="alert">
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            <div class="alert-message">
                <?=$message['mess'];?>
            </div>
        </div>
    <?php    
     } 
    ?>
    <div class="col-6">
        <h5>Liste des personnages</h5>
        <table class="table">
            <thead>
                <tr>
                <th scope="col">#</th>
                <th scope="col">Suppr.</th>
                <th scope="col">Perso.</th>
                </tr>
            </thead>
            <tbody>
                <?php
                foreach( $listAllPlayers as $player ) {
                    echo '<tr><td>' . $player['id'] . 
                    '</td><td>
                    <a href="index.php?controller=personnages&action=delete&id=' . $player['id'] .
                    '">X</a>
                    </td><td>
                    <a href="index.php?controller=personnages&action=update&id='.$player['id'] .'">' .
                    $player['nom'] . '</a>
                    </td></tr>';
                }
                ?>
            </tbody>
        </table>
    </div>

    <div class="col-6">
        <h5>Ajouter ou modifier un personnage</h5>
        <?php
            $nomAModifier = isset($nom) && $nom ? $nom : '';
        ?>
        <form class="row" action="index.php" method="post">
            <div class="col-auto">
            <?php 
            $action = 'create';
            if( isset( $idPlayer ) ) { 
                $action = 'updateValide';
            ?>    
                <input type="hidden" value="<?=$idPlayer?>" name="id"/>
            <?php } ?>   
            <input type="hidden" value="personnages" name="controller"/>
            <input type="hidden" value="<?=$action?>" name="action"/>    
            <input type="text" class="form-control" name="nom" placeholder="Entrer un nom" value="<?=$nomAModifier?>" />
            </div>
            <div class="col-auto">
                <button type="submit" class="btn btn-primary mb-3" name="ok">OK</button>
            </div>
        </form>
    </div>
</div>