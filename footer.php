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

<div class="position-fixed">
	<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#bug-issue-form-modal">
		Fehler melden
	</button>
</div>

<div id="bug-issue-form-modal-wrapper">
<!-- Modal -->
<div class="modal fade" id="bug-issue-form-modal" tabindex="-1" role="dialog" aria-labelledby="bug-issue-form-modal-ModalCenterTitle" aria-hidden="true">
	<div class="modal-dialog modal-dialog-centered" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="bug-issue-form-modal-ModalLongTitle">Fehler melden</h5>
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

</body>

</html>
