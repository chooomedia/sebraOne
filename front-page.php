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
	<?php if (!wp_get_attachment_image_src( get_post_thumbnail_id($post->ID ), 'large' )): ?>
	<div class="front" style="background: #000;">
		<?php else : ?>
		<?php $thumb = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), 'large' ); ?>
		<div class="front" style="background-image: url('<?php echo $thumb['0'];?>');">
			<?php endif ?>
			<div id="main-search" class="vh-100">
				<!-- Add searchform.php -->
				<?php get_template_part( 'searchform' ); ?>
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

	</div><!-- #page-wrapper -->

	<?php
get_footer();
