<?php
/**
 * Partial template for Modal Module
 *
 * @package SebraOne
 */

if ( $args['data'] ) {
	$modalType = $args['data']['type'];
	$num = intval($modalType);
    $modalID = $args['id'];
    $modalTitle = $args['data']['title'];
    $modalText = $args['data']['text'];
    $modalBtn = $args['data']['button'];
    $modalIsEvent = $args['data']['is-event'];
    $modalfctnName = $args['data']['event-function-name'];
    $modalBtnShw = $args['data']['show-button'];
    $modalFooter = $args['data']['show-footer'];
	$modalShow = $args['data']['is-active'];
} ?>

<?php if ($modalShow) : ?>

<?php if ($modalBtnShw) : ?>
<!-- Button trigger modal -->
<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#<?php echo $modalID ?>">
	<?php echo $modalBtn ?>
</button>
<?php else : ?>
<script>
	/**API Call - if there an Error do that */
	jQuery(function ($) {
		function <?php echo $modalfctnName ?>() {
				/* This Calls the Modal */
				$("#<?php echo $modalID ?>").modal('show');
			} <?php echo $modalfctnName ?> ();
	});
</script>
<?php endif; ?>

<?php switch ($num):
	case 1: ?>
<div id="register-modal">
	<!-- Modal -->
	<div class="modal fade" id="<?php echo $modalID ?>" tabindex="-1" role="dialog"
		aria-labelledby="<?php echo $modalID ?>-ModalCenterTitle" aria-hidden="true">
		<div class="modal-dialog modal-dialog-centered" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title" id="<?php echo $modalID ?>ModalLongTitle">Jetzt Registrieren</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<div class="modal-body">
					<?php get_template_part('system-templates/content', 'register', null); ?>
				</div>
				<?php if ($modalFooter) : ?>
				<div class="modal-footer">
					<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
					<button type="button" class="btn btn-primary">Save changes</button>
				</div>
				<?php else : ?>
				<div class="modal-footer"></div>
				<?php endif; ?>
			</div>
		</div>
	</div>
</div>
<?php break; ?>
<?php case 2: ?>
<div id="login-modal">
	<!-- Modal -->
	<div class="modal fade" id="<?php echo $modalID ?>" tabindex="-1" role="dialog"
		aria-labelledby="<?php echo $modalID ?>-ModalCenterTitle" aria-hidden="true">
		<div class="modal-dialog modal-dialog-centered" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title" id="<?php echo $modalID ?>ModalLongTitle">Hinweis -
						<?php echo $modalTitle ?></h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<div class="modal-body">
					<?php get_template_part('system-templates/content', 'login', null); ?>
				</div>
				<?php if ($modalFooter) : ?>
				<div class="modal-footer">
					<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
					<button type="button" class="btn btn-primary">Save changes</button>
				</div>
				<?php else : ?>
				<div class="modal-footer"></div>
				<?php endif; ?>
			</div>
		</div>
	</div>
</div>
<?php break; ?>
<?php case 3: ?>
<div id="info-modal">
	<!-- Modal -->
	<div class="modal fade" id="<?php echo $modalID ?>" tabindex="-1" role="dialog"
		aria-labelledby="<?php echo $modalID ?>-ModalCenterTitle" aria-hidden="true">
		<div class="modal-dialog modal-dialog-centered" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title" id="<?php echo $modalID ?>ModalLongTitle">Hinweis -
						<?php echo $modalTitle ?></h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<div class="modal-body">
					<?php echo $modalText ?>
				</div>
				<?php if ($modalFooter) : ?>
				<div class="modal-footer">
					<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
					<button type="button" class="btn btn-primary">Save changes</button>
				</div>
				<?php else : ?>
				<div class="modal-footer"></div>
				<?php endif; ?>
			</div>
		</div>
	</div>
</div>
<?php break; ?>
<?php case 4: ?>
<div id="error-modal">
	<!-- Modal -->
	<div class="modal fade" id="<?php echo $modalID ?>" tabindex="-1" role="dialog"
		aria-labelledby="<?php echo $modalID ?>-ModalCenterTitle" aria-hidden="true">
		<div class="modal-dialog modal-dialog-centered" role="document">
			<div class="modal-content">
				<div class="modal-header bg-alert">
					<h5 class="modal-title" id="<?php echo $modalID ?>ModalLongTitle">Fehler - <?php echo $modalTitle ?>
					</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<div class="modal-body">
					<?php echo $modalText ?>
				</div>
				<?php if ($modalFooter) : ?>
				<div class="modal-footer">
					<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
					<button type="button" class="btn btn-primary">Save changes</button>
				</div>
				<?php else : ?>
				<div class="modal-footer"></div>
				<?php endif; ?>
			</div>
		</div>
	</div>
</div>
<?php break; ?>
<?php default: ?>
<div id="info-modal">
	<!-- Modal -->
	<div class="modal fade" id="<?php echo $modalID ?>" tabindex="-1" role="dialog"
		aria-labelledby="<?php echo $modalID ?>-ModalCenterTitle" aria-hidden="true">
		<div class="modal-dialog modal-dialog-centered" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title" id="<?php echo $modalID ?>ModalLongTitle">Hinweis -
						<?php echo $modalTitle ?></h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<div class="modal-body">
					<?php echo $modalText ?>
				</div>
				<?php if ($modalFooter) : ?>
				<div class="modal-footer">
					<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
					<button type="button" class="btn btn-primary">Save changes</button>
				</div>
				<?php else : ?>
				<div class="modal-footer"></div>
				<?php endif; ?>
			</div>
		</div>
	</div>
</div>
<?php endswitch; ?>
<?php endif; ?>