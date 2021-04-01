<?php
/**
 * Template Name: User Page Template
 *
 * Description: A page template that provides a key component of WordPress as a CMS
 * by meeting the need for a carefully crafted introductory page. The front page template
 * in Twenty Twelve consists of a page content area for adding text, images, video --
 * anything you'd like -- followed by front-page-only widgets in one or two columns.
 *
 * @package SebraOne
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

get_header(); 

$container = get_theme_mod( 'SebraOne_container_type' );

?>

<div class="wrapper py-0" id="page-wrapper">
	<!-- Adds Thumbnail defined from Pages-Parameters of Wp Pages -->
	<?php $thumb = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), 'large' );?>

	<div class="front" style="background-image: url('<?php echo $thumb['0'];?>');">
		<div class="container mb-5" id="main-search">
			<form class="p-lg-2">
				<fieldset class="text-white text-center">
					<legend>Jetzt Auto verkaufen</legend>
                    <p>zum besten Preis in deiner Umgebung</p>
				</fieldset>
				<div class="inner-form">
					<div class="input-field first-wrap">
						<div class="icon-wrap">
							<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24">
								<path
									d="M12 2C8.13 2 5 5.13 5 9c0 5.25 7 13 7 13s7-7.75 7-13c0-3.87-3.13-7-7-7zm0 9.5c-1.38 0-2.5-1.12-2.5-2.5s1.12-2.5 2.5-2.5 2.5 1.12 2.5 2.5-1.12 2.5-2.5 2.5z">
								</path>
							</svg>
						</div>
						<input id="search" type="text" placeholder="Dein Wohnort (PLZ)" />
					</div>
					<div class="input-field second-wrap">
						<div class="icon-wrap">
							<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24">
								<path
									d="M17 12h-5v5h5v-5zM16 1v2H8V1H6v2H5c-1.11 0-1.99.9-1.99 2L3 19c0 1.1.89 2 2 2h14c1.1 0 2-.9 2-2V5c0-1.1-.9-2-2-2h-1V1h-2zm3 18H5V8h14v11z">
								</path>
							</svg>
						</div>
						<input class="datepicker" id="depart" type="text" placeholder="29 Aug 2018" />
					</div>
					<div class="input-field third-wrap">
						<div class="icon-wrap">
							<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24">
								<path
									d="M17 12h-5v5h5v-5zM16 1v2H8V1H6v2H5c-1.11 0-1.99.9-1.99 2L3 19c0 1.1.89 2 2 2h14c1.1 0 2-.9 2-2V5c0-1.1-.9-2-2-2h-1V1h-2zm3 18H5V8h14v11z">
								</path>
							</svg>
						</div>
						<input class="datepicker" id="return" type="text" placeholder="30 Aug 2018" />
					</div>
					<div class="input-field fouth-wrap">
						<div class="icon-wrap">
							<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24">
								<path
									d="M12 12c2.21 0 4-1.79 4-4s-1.79-4-4-4-4 1.79-4 4 1.79 4 4 4zm0 2c-2.67 0-8 1.34-8 4v2h16v-2c0-2.66-5.33-4-8-4z">
								</path>
							</svg>
						</div>
						<select data-trigger="" name="choices-single-defaul">
							<option placeholder="">Marke</option>
							<option>Audi</option>
							<option>BMW</option>
							<option>Citroen</option>
						</select>
					</div>
					<div class="input-field fifth-wrap">
						<button class="btn btn-search bg-primary" type="button"><svg class='search-icon' xmlns='http://www.w3.org/2000/svg' width='24' height='24' viewBox='0 0 24 24'><path d='M23.832 19.641l-6.821-6.821c2.834-5.878-1.45-12.82-8.065-12.82-4.932 0-8.946 4.014-8.946 8.947 0 6.508 6.739 10.798 12.601 8.166l6.879 6.879c1.957.164 4.52-2.326 4.352-4.351zm-14.886-4.721c-3.293 0-5.973-2.68-5.973-5.973s2.68-5.973 5.973-5.973c3.294 0 5.974 2.68 5.974 5.973s-2.68 5.973-5.974 5.973z'/></svg>Händler finden</button>
					</div>
				</div>
			</form>
		</div>
	</div>

	<div class="<?php echo esc_attr( $container ); ?>" id="content" tabindex="-1">

		<div class="row mt-5">
            <div class="container">
                <main class="site-main" id="main">

                    <?php
                while ( have_posts() ) {
                    the_post();
                    get_template_part( 'loop-templates/content', 'front' );

                    // If comments are open or we have at least one comment, load up the comment template.
                    if ( comments_open() || get_comments_number() ) {
                        comments_template();
                    }
                }
                ?>

                </main><!-- #main -->
            </div>

		</div><!-- .row -->

	</div><!-- #content -->

	<script src="<?php echo get_template_directory_uri(); ?>/js/choices.js"></script>
	<script src="<?php echo get_template_directory_uri(); ?>/js/flatpickr.js"></script>

	<script>
		const choices = new Choices('[data-trigger]', {
			searchEnabled: false,
			itemSelectText: '',
		});

	</script>

</div><!-- #page-wrapper -->

<?php
get_footer();
