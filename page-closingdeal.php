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
global $current_user;
$currentUser = $current_user->display_name;
$alt = get_post_meta ( $post->ID, '_wp_attachment_image_alt', true );
wp_get_current_user();
$name = $current_user->display_name;
global $wp_roles;
$u = get_userdata($current_user->ID);
$role = array_shift($u->roles);
?>

<div class="wrapper" id="page-wrapper">
    <section class="<?php echo esc_attr( $container ); ?>" id="content" tabindex="-1">
        <main class="site-main" id="main-closing-deal">

            <?php if (is_user_logged_in()) : ?>
                <script async src="<?php echo get_theme_file_uri(); ?>/js/confetti.js"></script>
                <script>
                    document.addEventListener("DOMContentLoaded", function () {
                        startConfetti();

                        setTimeout(() => {
                            stopConfetti();
                        }, 2800);
                    });
                </script>

                <div class="row m-0 p-0 pb-4">
                    <div class="col-md-4 d-flex vertical-align-center mb-4 mb-md-0">
                        <figure class="card-img-top m-auto text-center">
                            <?php echo get_the_post_thumbnail( $post->ID, 'thumbnail' ); ?>
                            <figcaption class="d-none"><?php esc_html ( $alt ) ?></figcaption>
                        </figure>
                    </div>
                    <div class="col-md-8 pr-md-0 px-0">
                        <div class="card bg-grey pb-0">
                            <div class="card-body p-md-0 pb-0 p-md-3">
                                <h5 class="text-muted"><b><?php echo $pageTitle ?></b></h5>
                                <h2><b>Vielen Dank, <?php echo $currentUser ?></b></h2>
                                <?php the_content() ?>
                            </div>
                        </div>
                    </div>
                </div>

                <?php if($role == 'buyer') : ?>
                    <?php echo do_shortcode( '[contact-form-7 id="871" title="page-deal-success-buyer"]' ); ?>
                <?php else : ?>
                    <?php echo do_shortcode( '[contact-form-7 id="871" title="page-deal-success-user"]' ); ?>
                <?php endif; ?>            

            <?php else : ?>
                <?php get_template_part( 'system-templates/content', 'register' ); ?>
            <?php endif; ?>

        </main>
    </section>
</div>

<style>
    #confetti-canvas {
        position: absolute;
        top: 120px;
    }

    @media screen and (max-width:471px) {
        #confetti-canvas {
            top: 62px;
        }
    }
</style>

<?php
get_footer();