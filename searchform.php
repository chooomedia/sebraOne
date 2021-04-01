<?php
/**
 * The template for displaying search forms
 *
 * @package SebraOne
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;
?>

<div class="container mb-5">
	<form method="get" name="search-form" class="p-lg-2" id="searchform" action="/<?php echo esc_url( home_url( '/' ) ); ?>" role="search">
		<label class="sr-only" for="search-form"><?php esc_html_e( 'Search', 'SebraOne' ); ?></label>
		<?php if(!is_search()) : ?>
		<legend class="text-white">Jetzt Auto verkaufen</legend>
		<p class="text-white text-center">zum besten Preis in deiner Umgebung</p>
		</fieldset>
		<?php endif ?>
		<div class="inner-form">
			<div class="input-field first-wrap">
				<div class="icon-wrap">
				<i class="fa fa-map-marker" aria-hidden="true"></i>
				</div>
				<input id="search" type="text" placeholder="Wohnort / PLZ *" required />
			</div>
			<div class="input-field second-wrap">
				<div class="icon-wrap">
				<i class="fa fa-calendar" aria-hidden="true"></i>
				</div>
				<input class="number" id="depart" type="text" placeholder="Baujahr" />
			</div>
			<div class="input-field third-wrap">
				<div class="icon-wrap">
				<i class="fa fa-tachometer" aria-hidden="true"></i>
				</div>
				<input class="number" id="return" type="text" placeholder="Kilometerstand" />
			</div>
			<div class="input-field fouth-wrap">
				<div class="icon-wrap">
				<i class="fa fa-car" aria-hidden="true"></i>
				</div>
				<select data-trigger="" name="choices-single-defaul">
					<option placeholder="">Marke</option>
					<option>Audi</option>
					<option>BMW</option>
					<option>Citroen</option>
				</select>
			</div>
			<div class="input-field  ">
				<button class="btn btn-search bg-primary" type="submit">
				<i class="fa fa-search pr-2" aria-hidden="true"></i>Händler finden</button>
			</div>
		</div>
	</form>
</div>

<!-- Add required Scripts for Search Checkbox and Calendar -->
<script src="<?php echo get_template_directory_uri(); ?>/js/choices.js"></script>
<script src="<?php echo get_template_directory_uri(); ?>/js/flatpickr.js"></script>

<script>
	const choices = new Choices('[data-trigger]', {
		searchEnabled: false,
		itemSelectText: '',
	});

</script>
