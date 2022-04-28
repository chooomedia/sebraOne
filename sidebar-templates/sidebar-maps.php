<?php
/**
 * Sidebar Maps
 *
 * @package SebraOne
 */

if ( $args['data'] ) {
    $mapsId = $args['data']['id'];
	$searchformBool = $args['data']['searchform'];
} ?>

<div id="finderMap" class="w-100 finder-map">
	<?php if( $searchformBool ==  true ) : ?>
	<div id="main-search" class="search-box-inside-map">
		<!-- Add searchform.php -->
		<div class="main-search-inner d-flex align-items-center">
			<?php get_search_form(array('formId' => 'maps-searchform')); ?>
		</div>
	</div>
	<?php endif; ?>
	<div id="<?php echo esc_html($mapsId) ?>"></div>
</div>

<script src="https://polyfill.io/v3/polyfill.min.js?features=default"></script>
<script type="text/javascript">
	// Initialize and add the map
	var map;
	function initMap() {
		var locations = [
			['Car24 Wedding', 52.5499978, 13.3666652, 3],
			['BMW Niederlassung Potsdamer Platz', 52.509663, 13.376481, 2],
			['Autohaus Martin Sercand', 52.515816, 13.454293, 1],
		];
		// The map, centered at Uluru
		map = new google.maps.Map(document.getElementById("<?php echo esc_html($mapsId) ?>"), {
			zoom: 10,
			center: new google.maps.LatLng(52.520008, 13.404954),
			mapTypeId: google.maps.MapTypeId.ROADMAP
		});
		var infowindow = new google.maps.InfoWindow();

		var marker, i;
		return;
		for (i = 0; i < locations.length; i++) {
			marker = new google.maps.Marker({
				position: new google.maps.LatLng(locations[i][1], locations[i][2]),
				map: map
			});

			google.maps.event.addListener(marker, 'click', (function (marker, i) {
				return function () {
					infowindow.setContent(locations[i][0]);
					infowindow.open(map, marker);
				}
			})(marker, i));
		}
	}
</script>

<!-- Async script executes immediately and must be after any DOM elements used in callback. -->
<script
	src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBhfgFGniLuaniNprEgBFbR8wjRkpNeSPk&callback=initMap&libraries=geometry&v=weekly"
	async>
</script>

