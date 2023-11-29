<div class="row">
    <div class="col-12">
        <h2 class="text-center">Jouer</h2>
    </div>
</div>
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
        <table class="table">
            <thead>
                <tr>
                <th colspan="2">Choisir un personnage</th>
                </tr>
            </thead>
            <tbody>
                <?php
                foreach( $listAllPlayers as $player ) {
                    echo '<tr><td>' . $player['id'] . '</td><td>
                    <a href="index.php?controller=jouer&action=utiliser&id='.$player['id'] .'">' .
                    $player['nom'] . '</a>
                    </td></tr>';
                }
                ?>
            </tbody>
        </table>
    </div>

    <div class="col-6">
        <?php
        if( isset( $persoToPlay ) ) {
        ?>
        <div class="card mt-3">
            <div class="card-header">Information joueur</div>
            <div class="card-body">
                <p>Nom : <b><?=$persoToPlay->getNom()?></b></p>
                <p>Dégats : <?=$persoToPlay->getDegats()?></p>
                <p>Expérience : <?=$persoToPlay->getExperience()?> (<?=$persoToPlay->getLimitExp();?>)</p>
                <p>Niveau : <?=$persoToPlay->getNiveau()?></p>
            </div>
        </div>
        <?php } ?>
    </div>
</div>
<?php
if( isset( $listPersoToHit ) ) {
?>
<div class="row">
    <div class="col-6">
        <div class="card mt-3">
            <div class="card-header">Qui frapper</div>
            <div class="card-body">
            <?php
                foreach( $listPersoToHit as $cle=>$persoToHit ) {
                    echo '<a href="index.php?controller=jouer&action=frapper&idhit='. $persoToHit->getId() . '">' . $persoToHit->getNom() . '</a> ( dégâts : ' . $persoToHit->getDegats() . ', expériences : ' . $persoToHit->getExperience() . ')<br/>';
                }
                ?>
            </div>
        </div>

    </div>
    <div class="col-6">

    </div>
</div>
<?php
}
?>