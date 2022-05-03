<?php
/**
 * Partial template for customer review slider
 *
 * @package SebraOne
 */

if ( $args['data'] ) {
    $consumerReviewId = $args['id'];
    $consumerReviewClass = $args['class'];
}
?>

<div id="<?php echo esc_html($consumerReviewId) ?>" class="container pt-md-4 text-white">
    <div class="<?php echo esc_html($consumerReviewClass) ?> slider pb-md-4 pb-3" id="customerReviews">				
        <?php if( have_rows('reviews_array') ): $c = 0; $class = ''; ?>
            <?php while( have_rows('reviews_array') ) : the_row(); ?>
                <?php $c++; ?>
                <div class="col-md-4 col-12 mb-md-5 mx-0 mb-5 bg-transparent border-0">
                    <div class="customer-review card-body text-center arrow-bottom">
                        <p class="text-white title-large"><q><?php echo get_sub_field('customerReviewText') ?></q></p>
                        <div class="text-white"><?php echo get_sub_field('customerReviewName') ?></div>
                        <h4 class="my-3 text-white"><b><?php echo get_sub_field('customerReviewStars') ?></b></h4>
                    </div>
                </div>
            <?php endwhile; ?>
        <?php endif; ?>
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