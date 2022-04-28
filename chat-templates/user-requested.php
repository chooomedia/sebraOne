<?php
/**
 * Chat template for Request-Inviews
 *
 * @package SebraOne
 */

if ( $args['data'] ) {
    $userCarDate = $args['data']['title'];
    $userCarBuild = $args['data']['car-builded'];
    $userCarPlace = $args['data']['car-place'];
    $userCarBrand = $args['data']['car-brand'];
    $userCarKm = $args['data']['car-kilometers'];
    $userAuthor = $args['data']['author'];
    $userAuthorTime = $args['data']['author-timestamp'];
    $status = $args['data']['status'];
    $active = $args['data']['is-active'];
}
?>

<div class="p-0 mb-4 mb-md-0">
    <div class="card text-center border-0">
        <?php switch ($status):
            case 1: ?>
                <div class="card-header bg-danger text-white">
                    <i class='fas fa-check'></i> <b>Termin findet statt</b>
                </div>
            <?php break; ?>
            <?php case 2: ?>
                <div class="card-header bg-warning text-white">
                    <i class='fas fa-info-circle'></i> <b>Termin bewertet</b>
                </div>
            <?php break; ?>
            <?php case 3: ?>
                <div class="card-header bg-success text-white">
                    <i class='fas fa-check-double'></i> <b>Verkaufsabschluss</b>
                </div>
            <?php break; ?>
            <?php default: ?>
                <div class="card-header bg-danger text-white">
                    <i class='fas fa-check'></i> <b>Termin findet statt</b>
                </div>
        <?php endswitch; ?>

    <div class="card-body text-dark">
        <h3 class="card-title"><?php echo $userCarDate ?></h3>
        <h4 class="card-title"><?php echo $userCarBrand ?></h4>
        <p class="card-text">
            Baujahr: <?php echo $userCarBuild ?><br>
            Kilometerstand: <?php echo $userCarKm ?><br>
            <?php echo $userAuthor ?><br>
            <?php echo $userCarPlace ?>
        </p>
        <?php switch ($status):
            case 1: ?>
                <a class="btn btn-primary" href="/account?datetocalendar"><i class="fas fa-calendar-plus"></i> In Kalender</a>
            <?php break; ?>
            <?php case 2: ?>
                <a class="btn btn-primary" href="/account?datedetails"><i class="fas fa-info"></i> Details angeben</a>
            <?php break; ?>
            <?php case 3: ?>
                <a class="btn btn-primary" href="/account?datesuccess"><i class="fas fa-check"></i> Abschliessen</a>
            <?php break; ?>
            <?php default: ?>
                <a class="btn btn-primary" href="/account?datechange"><i class="fas fa-exchange-alt"></i> Termin ändern</a>
        <?php endswitch; ?>
    </div>
    <div class="card-footer text-muted">
    Anfrage vom <?php echo $userAuthorTime ?>
    </div>
    </div>
</div>
