
<?php
/**
 * Template Name: Contact Page
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

<section class="row">
    <div class="col p-0 m-0">
        <img loading="lazy" src="https://picsum.photos/200" style="object-fit:cover;width:100%;" alt="lorempixel" />
    </div>
    <div class="col p-0 m-0">
        <img loading="lazy" src="https://picsum.photos/200" style="object-fit:cover;width:100%;" alt="lorempixel" />
    </div>
    <div class="col p-0 m-0">
        <img loading="lazy" src="https://picsum.photos/200" style="object-fit:cover;width:100%;" alt="lorempixel" />
    </div>
    <div class="col p-0 m-0">
        <img loading="lazy" src="https://picsum.photos/200" style="object-fit:cover;width:100%;" alt="lorempixel" />
    </div>
    <div class="col p-0 m-0">
        <img loading="lazy" src="https://picsum.photos/200" style="object-fit:cover;width:100%;" alt="lorempixel" />
    </div>
</section>

<div class="<?php echo esc_attr( $container ); ?>" id="content" tabindex="-1">

    <div class="row">
        <!-- Do the left sidebar check -->
        <?php get_template_part( 'global-templates/left-sidebar-check' ); ?>

        <main class="site-main container" id="main">

            <?php
            while ( have_posts() ) {
                the_post();
                get_template_part( 'loop-templates/content', 'page' );

                // If comments are open or we have at least one comment, load up the comment template.
                if ( comments_open() || get_comments_number() ) {
                    comments_template();
                }
            }
            ?>

        </main><!-- #main -->

        <!-- Do the right sidebar check -->
        <?php get_template_part( 'global-templates/right-sidebar-check' ); ?>

    </div><!-- .row -->

</div><!-- #content -->

</div><!-- #page-wrapper -->

<?php
get_footer();