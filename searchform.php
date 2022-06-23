<?php
/**
 * The template for displaying search forms
 *
 * @package SebraOne
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;
	$pageTitle = get_the_title();
	if ( $args['formId'] ) {
		$searchboxId = $args['formId']; // searchform or map-searchform
	}
?>

<div class="my-md-3 mt-2 mb-5">
	<!--ADVICE COMMENT-->
	<!-- Do not change the following input names: userplace, carbuildyear, carkilometers, choices-single-default. -->
	<form method="get" name="search-form" class="p-lg-2" id="<?php echo $searchboxId ?>"
		action="<?php echo home_url( '/results/' ); ?>" role="search">
		<label class="sr-only" for="search-form"><?php esc_html_e( 'Search', 'SebraOne' ); ?></label>
		<?php if( !is_search() || !is_404() ) : ?>
			<?php if (!is_page('landingpage')) : ?>
			<div class="searchbox-inner-comment">
				<legend class="text-white">Jetzt Auto verkaufen</legend>
				<p class="text-white text-center">kostenlos zum besten Preis in Ihrer Umgebung</p>
				</fieldset>
			</div>
			<?php endif ?>
		<?php endif ?>
		<div class="inner-form bg-grey">
			<div class="input-field first-wrap">
				<div class="icon-wrap">
					<i class="fas fa-industry"></i>
				</div>
				<select class="selectpicker brand" data-live-search="true" name="choices-single-default">
					<optgroup label="Beliebte Marken">
						<?php echo do_shortcode( '[brand-dropdown count="5"]' ); ?>
					</optgroup>
					<optgroup label="Andere Marken">
						<?php echo do_shortcode( '[brand-dropdown offset="5"]' ); ?>
					</optgroup>
				</select>
			</div>
			<div id="test" class="input-field first-wrap">
				<div class="icon-wrap">
					<i class="fas fa-car-side"></i>
				</div>
				<select class="selectpicker type" data-live-search="true" name="choices-model-default">
					<?php echo do_shortcode( '[type-dropdown]' ); ?>
				</select>
			</div>

			<div class="input-field power-wrap">
				<div class="icon-wrap">
					<i class="fas fa-cogs"></i>
				</div>
				<select class="selectpicker power" data-live-search="true" name="choices-power-default">
					<?php echo do_shortcode( '[power-dropdown]' ); ?>
				</select>
			</div>

			<div class="input-field second-wrap">
				<div class="icon-wrap">
					<i class="fa fa-map-marker" aria-hidden="true"></i>
				</div>
				<input id="search" type="text" name="userPlace" placeholder="Stadt / PLZ *" />
			</div>
			<div class="input-field third-wrap">
				<div class="icon-wrap">
					<i class="fa fa-calendar" aria-hidden="true"></i>
				</div>
				<input class="number" id="depart" name="carBuildyear" type="text" placeholder="Baujahr" />
			</div>
			<div class="input-field fourth-wrap">
				<div class="icon-wrap">
					<i class="fa fa-tachometer-alt" aria-hidden="true"></i>
				</div>
				<input class="number" id="return" name="carKilometers" type="text" placeholder="KM Stand" />
			</div>
			<div class="input-field fifth-wrap">
				<button class="btn btn-search bg-primary" type="submit">
					<i class="fa fa-search pr-2" aria-hidden="true"></i>Händler finden</button>
			</div>
		</div>
	</form>
</div>

<?php
/**
* Modal Info Module
* Pass specific Data into the Modal i.e. Error Handling (Login, Search) and so on.
* @param number:type 1 = Register Type, 2 = Login Type, 3 = Info-Type
* @param string:id Builds DIV ID to wrapping container
* @param string:class Adds DIV Class to wrapping container
* @param function:title Show the Title of Modal
* @param string:text Display Text also HTML or JS insert posibile
* @param bool:show-button Show Modal Button (open/close)
* @param string:button Define Button Title
* @param bool:is-event for Error Handling: Search, Login...
* @param string:event-function-name Defines the JS Function to Call Modal
* @param bool:show-footer Show Modal footer with Buttons?
* @param bool:is-active Helperclass to change visibility
*/
get_template_part( 'system-templates/modal-info', null, array(
	'id' => 'modal-info-results',
	'class' => 'container',
	'data'  => array(
		'type' => 1,
		'title' => strval($pageTitle),
		'text' => 'Um die zu den Suchergebnissen zu gelangen registriere dich jetzt kostenlos.',
		'show-button' => false,
		'button' => 'jetzt registrieren',
		'is-event' => true,
		'event-function-name' => 'nologgedin',
		'show-footer' => false,
		'is-active' => false
	))
);
?>
