
<?php
/**
 * Partial template for Faqs
 *
 * @package SebraOne
 */

  $faqs_per_block = 4;
?>

<div class="col-md-12 col-12 p-0">
    <div id="faqs-wrapper" class="site-main carousel slide" data-ride="carousel" data-interval="3500">
        <div class="carousel-inner">
        <?php if( have_rows('faqsarray') ): $counter = 0; $class = ''; ?>
        <?php while( have_rows('faqsarray') ) : the_row(); ?>
            <?php echo ($counter == 0 || $counter % $faqs_per_block == 0) ? '<div class="carousel-item' . (($counter == 0)?' active':'') . '" id="faqs-block-' . $counter . '">' : '' ?>
            <div class="card faqs-card">
                <div id="faqs-<?php echo $counter ?>" class="card-header bg-darker text-white" data-toggle="collapse" href="#collapseFaqContent<?php echo $counter ?>" role="button" aria-expanded="false" aria-controls="collapseFaqContent<?php echo $counter ?>">
                    <b><?php the_sub_field('faqs_question'); ?></b>
                    <a class="pull-right-arrow" data-toggle="collapse" href="#faqs-arrow" aria-expanded="true" aria-controls="faqs-arrow">
                        <div class="btn-chevron-arrow">
                            <i class="fas fa-chevron-down text-white"></i>
                        </div>
                    </a>
                </div>
                <div id="collapseFaqContent<?php echo $counter ?>" class="collapse" role="tabpanel" aria-labelledby="heading-<?php echo $counter; ?>">
                    <div class="card card-body pb-1">
                        <div class="card-body p-0">
                            <?php the_sub_field('faqs_answer'); ?>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-12 py-3"></div>
            <?php $counter++; echo ($counter % $faqs_per_block == 0) ? '</div>' : '' ?>
        <?php endwhile; ?>
        </div>
        <?php echo ($counter % $faqs_per_block !== 0) ? '</div>' : '' ?>

        <nav class="<?php echo ($counter > $faqs_per_block) ? '' : 'd-none' ?>" aria-label="Faqs pagination navigation">
            <ul class="pagination justify-content-center">
                <li class="page-item active">
                    <a class="page-link" href="#faqs-wrapper" data-target="#faqs-wrapper" data-slide-to="0" aria-selected="true">1</a>
                </li>
                <?php if ($counter > $faqs_per_block) : ?>
                    <li class="page-item">
                    <a class="page-link" href="#faqs-wrapper" data-target="#faqs-wrapper" data-slide-to="1" aria-selected="false">2</a>
                </li>
                <?php endif; ?>
                <?php if ($counter > $faqs_per_block * 2) : ?>
                <li class="page-item">
                    <a class="page-link" href="#faqs-wrapper" data-target="#faqs-wrapper" data-slide-to="2" aria-selected="false">3</a>
                </li>
                <?php endif; ?>
            </ul>
        </nav>
	<?php endif; ?>
    </div>
</div>

<script>
jQuery(function($) {
    $(document).ready(function(){
        $('.faqs-card').each(function(){
            $(this).on("click", function() {
                $(this).find('.btn-chevron-arrow').toggleClass('chevron-rotate','');
            });
        });

        var $carousel = $('#faqs-wrapper'); //get a reference
            $carousel.carousel(); 
            $carousel.bind('slide.bs.carousel', function (e) { //attach its event
                var current=$(e.target).find('.page-item.active'); //get the current active slide
                $('.pagination li').removeClass('active') //remove active class from all the li of carousel indicator

                var indx=$(current).index(); //get its index
                if((indx+2)>$('.pagination li').length)
                    indx=-1 //if index exceeds total length of indicators present set it to -1
                $('.pagination li:nth-child('+(indx+2)+')').addClass('active');//set the respective indicator active
            });
    });
});
</script>