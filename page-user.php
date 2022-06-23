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
$currentUser = $current_user->display_name;

?>

<div class="wrapper">
    <?php if (is_user_logged_in()) : ?>

	<div id="page-wrapper" class="profile-edit">
		<div class="explore-head">
			<div class="explore-types position-relative">
				<?php /* foreach($topMenuData as $data){
				getTemplatePart('menu-templates/menu-profile', [
					'data' => $data
				]);
			} */ ?>
				<div class="type-company item">
					<a class="active" role="button" data-target="#main" data-slide-to="0">
						<div class="type-info">
							<i class="fas fa-comment mr-2"></i>
							<h4>Benachrichtigungen</h4>
						</div>
					</a>
				</div>
				<div class="type-company item">
					<a role="button" data-target="#main" data-slide-to="1">
						<div class="type-info">
							<i class="fas fa-user mr-2"></i>
							<h4>Profil</h4>
						</div>
					</a>
				</div>
				<div class="type-company item">
					<a role="button" data-target="#main" data-slide-to="2">
						<div class="type-info">
							<i class="fas fa-user-edit mr-2"></i>
							<h4>Profil ändern</h4>
						</div>
					</a>
				</div>
				<div class="cts-prev d-lg-none">prev</div>
				<div class="cts-next cts-show d-lg-none">next</div>

				<div dir="ltr" class="resize-sensor">
					<div class="resize-sensor-expand">
						<div
							style="position: absolute; left: 0px; top: 0px; transition: all 0s ease 0s; width: 100000px; height: 100000px;">
						</div>
					</div>
					<div class="resize-sensor-shrink">
						<div style="position: absolute; left: 0; top: 0; transition: 0s; width: 200%; height: 200%">
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
    <?php endif; ?>

	<div class="<?php echo esc_attr( $container ); ?>" id="content" tabindex="-1">

		<div class="row">
      
			<main id="main" class="site-main carousel slide" data-ride="carousel" data-interval="false">
                <div id="profile-header" class="container py-0 mt-5 mb-sm-4 mb-lg-0">
                    <h1>Hallo <?php if (!is_user_logged_in()) : ?> <b>Fremder</b><?php else : ?><b><?php echo $currentUser ?></b><?php endif; ?></h1>
                </div>
                <div class="carousel-inner">
                    <?php if (!is_user_logged_in()) : ?> 
                        <div class="carousel-item">
                            <?php get_template_part( 'system-templates/content', 'register' ); ?>
                        </div>
                    <?php else : ?>
						<div class="carousel-item active">
                            <?php get_template_part( 'system-templates/comments', 'chat' ); ?>
                        </div>
                        <div class="carousel-item">
                            <?php  get_template_part( 'system-templates/content', 'profile' ); ?>
                        </div>
                        <div class="carousel-item">
                            <?php get_template_part( 'system-templates/content', 'profile-edit' ); ?>
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
