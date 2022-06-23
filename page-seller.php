<?php
/**
 * Template Name: Seller Page Template
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
<div class="wrapper" id="page-wrapper">

<div class="<?php echo esc_attr( $container ); ?>" id="content" tabindex="-1">

<div class="row">
    
    <main id="main" class="site-main carousel slide"data-ride="carousel" data-interval="false">
        <div class="carousel-inner">
            <?php if (!is_user_logged_in()) : ?> 
                <div class="carousel-item">
                    <?php get_template_part( 'system-templates/content', 'register' ); ?>
                </div>
            <?php else : ?>
                <div class="carousel-item">
                    <?php  get_template_part( 'system-templates/content', 'profile' ); ?>
                </div>
                <div class="carousel-item">
                    <?php get_template_part( 'system-templates/content', 'profile-edit' ); ?>
                </div>
                <div class="carousel-item">
                    <?php get_template_part( 'system-templates/comments', 'chat' ); ?>
                </div>
            <?php endif; ?>

            <?php
                while ( have_posts() ) {
                the_post();

                // If comments are open or we have at least one comment, load up the comment template.
                if ( comments_open() || get_comments_number() ) {
                    comments_template();
                }
            }
        ?>
        </div>
    </main><!-- #main -->

</div><!-- .row -->

</div><!-- #content -->

</div><!-- #page-wrapper -->

<?php
get_footer();