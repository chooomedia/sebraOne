<?php
/**
 * Chat template for Chat Boxes (toasts)
 *
 * @package SebraOne
 */

if ( $args['data'] ) {
    $chatBoxLink = $args['data']['chat-link'];
    $chatBoxId = $args['data']['chat-box-id'];
    $chatRequesterName = $args['data']['chat-requester-name'];
    $chatDate = $args['data']['chat-date'];
    $chatStatus = $args['data']['chat-status'];
    $chatChecked = $args['data']['chat-checked'];
    $year = $args['data']['year'];
    $brand = $args['data']['brand'];
    $model = $args['data']['model'];
    $power = $args['data']['power'];
    $kilometers = $args['data']['kilometers'];
}
?>
<a href="<?php echo $chatBoxLink ?>">
    <div id="chat-box-<?php echo $chatBoxId ?>" class="toast show mb-4 mx-auto" role="alert" aria-live="assertive" aria-atomic="true">
        <?php switch ($chatStatus):
            case 1: ?>
                <div class="toast-header bg-danger text-white">
            <?php break; ?>
            <?php case 2: ?>
                <div class="toast-header bg-darker text-white">
            <?php break; ?>
            <?php case 3: ?>
                <div class="toast-header bg-warning text-white">
            <?php break; ?>
            <?php case 4: ?>
                <div class="toast-header bg-success text-white" role="alert">
        <?php endswitch; ?>
            <div class="bg-warning rounded mr-2"></div>
        <strong class="mr-auto">
            <i class="fas fa-car mt-1"></i> <?php echo $chatRequesterName ?>
        </strong>
        <small class="text-white">
            <i class="far fa-clock"></i> <?php echo $chatDate ?>
        </small>
        <!--<button type="button" class="ml-2 mb-1 close" data-dismiss="toast" aria-label="Close">
        <span class="text-white" aria-hidden="true">&times;</span>
        </button>-->
    </div>
	<div class="toast-body">
		<p><?php echo $brand ?> <?php echo $model ?> <?php echo $power ?> <?php echo $year ?> <?php echo $kilometers ?></p>
	</div>
    <div class="toast-body">
    <?php switch ($chatStatus):
            case 1: ?>
                <i class='fas fa-check'></i> <b>Termin findet statt</b>
            <?php break; ?>
            <?php case 2: ?>
                <i class='fas fa-info-circle'></i> <b>Termin bewertet</b>
            <?php break; ?>
            <?php case 3: ?>
                <i class='fas fa-check-double'></i> <b>Verkaufsabschluss</b>
            <?php break; ?>
            <?php case 4: ?>
                <i class='fas fa-handshake'></i> <b>Abgeschlossen</b>
            <?php break; ?>
            <?php default: ?>
                <i class='fas fa-check'></i> <b>Termin findet statt</b>
        <?php endswitch; ?>
    </div>
    </div>
</a>
<!--<script>
    jQuery(function($) {
        $('#chat-box-<?php echo $chatBoxId ?>').toast('show');
    });
</script>-->
