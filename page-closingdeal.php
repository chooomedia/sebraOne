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

?>
<div class="wrapper" id="page-wrapper">
    <section class="<?php echo esc_attr( $container ); ?>" id="content" tabindex="-1">
        <div class="row">
            <main class="site-main container" id="main-closing-deal">

            <?php if (is_user_logged_in()) : ?>
                <div class="card">
                    <div class="card-body p-0 p-md-3 mb-5">
                        <h2><b><?php echo $pageTitle ?></b></h2>
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