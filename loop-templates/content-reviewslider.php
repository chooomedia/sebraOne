
<?php
/**
 * Partial template for customer review slider
 *
 * @package SebraOne
 */

if ( $args['data'] ) {
    $consumerReviewId = $args['id'];
    $consumerReviewClass = $args['class'];
    $consumerReviewHeadline = $args['data']['headline'];
    $consumerReviewFootline = $args['data']['footline'];
}
?>

<div id="<?php echo esc_html($consumerReviewId) ?>" class="container pt-md-4 text-white">
    <div class="text-center">
        <div class="rounded-circle">
                <i class="fas fa-4x fa-quote-left"></i>
            </div>
            <h2 class="section-heading text-uppercase mt-md-0 mb-md-5 mb-5"><?php echo $consumerReviewHeadline ?></h2>
        </div>
    </div>

    <div class="<?php echo esc_html($consumerReviewClass) ?> slider pb-md-4 pb-md-5 pb-3" id="customerReviews">				
        <?php if( have_rows('customersReviewArray') ): $c = 0; $class = ''; ?>
            <?php while( have_rows('customersReviewArray') ) : the_row(); ?>
                <?php 
                    $sub_text = get_sub_field('customerReviewText');
                    $sub_name = get_sub_field('customerReviewName');
                    $sub_stars = get_sub_field('customerReviewStars'); 
                ?>

                <?php $c++; ?>
                <div class="col-md-4 col-12 mb-md-5 mx-0 mb-5 bg-transparent border-0">
                    <div class="customer-review card-body text-center arrow-bottom">
                        <p class="text-white title-large"><q><?php echo $sub_text ?></q></p>
                        <div class="text-white"><?php echo $sub_name ?></div>
                        <h4 class="my-3 text-white"><b><?php echo $sub_stars ?></b></h4>
                    </div>
                </div>

            <?php endwhile; ?>
        <?php endif; ?>
    </div>

    <div id="trusted-logos" class="container-fluid px-md-5">
        <div class="container py-4">
            <div class="row y-4">
                <div class="col-8 mx-auto">
                    <div class="row d-flex justify-content-center align-items-center">
                        <div class="col-lg-3 col-12">
                            <img loading="lazy" class="filter-brightness" src="<?php echo get_template_directory_uri() ?>/src/img/trustpilot-logo-sebra1.png" alt="Trusitpilot Sebra1 5 Stars Rating" />
                        </div>
                        <div class="col-lg-9 col-12 mx-auto text-center">
                            <h4 class="large text-white"><?php echo esc_html($consumerReviewFootline) ?></h4>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
   jQuery(document).ready(function() {
    jQuery(".slider").slick({
        lazyLoad: 'ondemand',
        infinite: true,
        slidesToShow: 3,
        slidesToScroll: 1,
        autoplay: true,
        autoplaySpeed: 3300,
        responsive: [{
            breakpoint: 1024,
            settings: {
                slidesToShow: 2,
                infinite: true
                }
            }, {

            breakpoint: 467,
            settings: {
                slidesToShow: 1,
                dots: true
                }
            }, {
            breakpoint: 300,
            settings: "unslick" // destroys slick
            }]
        });
    });
</script>