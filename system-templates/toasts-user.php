
<?php
/**
 * Partial template for Toasts. Shows User Interface interaction (e.g. saved changed profile Name)
 *
 * @package SebraOne
 */

if ( $args['data'] ) {
    $toastHeaderStatus = $args['data']['header-status'];
    $toastBodyMessage = $args['data']['body-message'];
}

$page_title = $wp_query->post->post_title;
?>

<div class="toast" role="alert" aria-live="assertive" aria-atomic="true">
    <div class="toast-header bg-primary">
        <img src="<?php echo get_site_icon_url() ?>" class="mr-2 border-2" width="24" height="24" alt="Logo" />
        <strong class="mr-auto text-white"><?php echo $page_title ?> <?php echo $toastHeaderStatus ?></strong><br>
        <!--<small class="text-white ml-2">0 Sekunden</small>-->
        <button type="button" class="ml-2 mb-1 close text-white" data-dismiss="toast" aria-label="Close">
        <span aria-hidden="true">&times;</span>
        </button>
    </div>
    <div class="toast-body">
    <?php echo $toastBodyMessage ?>
    </div>
</div>

<script>
jQuery(function($) {
    $(':not(#maps-searchform) button[type=submit]').on('click', function() {
        $('#toaster-wrapper .toast').toast('show');
    });
});
</script>