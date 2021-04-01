<?php
/**
 * Partial template for User Profile
 *
 * @package SebraOne
 */

 // Exit if accessed directly.
defined( 'ABSPATH' ) || exit;
?>

<div id="signup-wrapper" class="mb-5">
	<div class="row">
		<div class="col-12 mb-4">
			<div class="card">
				<div class="card-body">
					<h2 class="card-title"><b><?php get_the_title() ?></b></h2>
					<p><?php the_content() ?></p>
				</div>
			</div>
		</div>
	</div>
</div>