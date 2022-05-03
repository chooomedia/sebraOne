<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after
 *
 * @package SebraOne
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

$container = get_theme_mod( 'SebraOne_container_type' );
?>

<?php get_template_part( 'sidebar-templates/sidebar', 'footerfull' ); ?>
</div><!-- #page we need this extra closing tag here -->

<?php wp_footer(); ?>

<div id="bug-issue-form-modal-wrapper">
<!-- Modal -->
	<div class="modal fade" id="bug-issue-form-modal" tabindex="-1" role="dialog" aria-labelledby="bug-issue-form-modal-ModalCenterTitle" aria-hidden="true">
		<div class="modal-dialog modal-dialog-centered" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title" id="bug-issue-form-modal-ModalLongTitle"><b>Fehler melden</b></h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<div class="modal-body">
					<?php echo do_shortcode( '[contact-form-7 id="501" title="bug-issue-form"]' ); ?>
				</div>
			</div>
		</div>
	</div>
</div>
<script>
    window.onload = function() {
        const $ = jQuery;
        document.addEventListener( 'wpcf7submit', function( event ) {
			setTimeout( "$('#bug-issue-form-modal').modal('hide');", 3000);
    }
</script>

<?php if( have_rows('sectionfaqs') ): ?>
<div id="contact-form-modal-wrapper">
	<!-- Modal -->
	<div class="modal fade" id="contact-issue-form-modal" tabindex="-1" role="dialog" aria-labelledby="contact-issue-form-modal-ModalCenterTitle" aria-hidden="true">
		<div class="modal-dialog modal-dialog-centered" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title" id="contact-issue-form-modal-ModalLongTitle"><b>Schreiben</b> Sie uns</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<div class="modal-body">
					<?php echo do_shortcode( '[contact-form-7 id="639" title="contact-corm"]' ); ?>
				</div>
			</div>
		</div>
	</div>
</div>
<script>
    window.onload = function() {
        const $ = jQuery;
        setTimeout( "$('#contact-issue-form-modal').modal('hide');", 3000);
    }
</script>
<?php endif; ?>

</body>
</html>
