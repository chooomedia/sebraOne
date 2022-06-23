<?php
/**
 * Template Name: Closing Deal / Verkaufsabschluss
 *
 * Description: Simple template to close deals
 *
 * @package SebraOne
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;
get_header(); 

$pageTitle = get_the_title();
$container = get_theme_mod( 'SebraOne_container_type' );
$currentUser = $current_user->display_name;
$alt = get_post_meta ( $image_id, '_wp_attachment_image_alt', true );
?>
<div class="wrapper" id="page-wrapper">
    <section class="<?php echo esc_attr( $container ); ?>" id="content" tabindex="-1">
        <div class="row">
            <main class="site-main container" id="main-closing-deal">

            <?php if (is_user_logged_in()) : ?>
                <div class="card mb-4">
                    <figure>
                    <img class="card-img-top" src="<?php echo get_the_post_thumbnail( $post->ID, 'full' ); ?>" alt="<?php esc_html ( $alt ) ?>">
                    <figcaption class="d-none"><?php esc_html ( $alt ) ?></figcaption>
                    </figure>
                    <div class="card-body p-0 p-md-3">
                        <h2><b>Vielen Dank, <?php echo $currentUser ?></b></h2>
                        <h5 class="text-muted"><b><?php echo $pageTitle ?></b></h5>
                        <?php the_content() ?>
                    </div>
                </div>

                <?php echo do_shortcode( '[contact-form-7 id="501" title="bug-issue-form"]' ); ?>

            <?php else : ?>

                <?php printf(
				'<div id="search-search" class="row vh-50"><p>%s<p>',
				esc_html__( 'It seems we can&rsquo;t find what you&rsquo;re looking for. Perhaps searching can help.', 'SebraOne' )
			);
			get_search_form(array('formId' => 'searchform-search'));
			printf('</div>'); ?>

            <?php endif; ?>

            </main>
        </div> 
    </section>
</div>

<?php
get_footer();