
<?php
/**
 * Partial template for Faqs
 *
 * @package SebraOne
 */
?>

<div class="col-md-12 col-12 p-0">
<?php if( have_rows('faqsarray') ): $c = 0; $class = ''; ?>
	<?php while( have_rows('faqsarray') ) : the_row(); ?>
	<?php $c++; ?>
    <div class="card">
        <div id="faqs-<?php echo $c ?>" class="card-header bg-darker text-white" data-toggle="collapse" href="#collapseFaqContent<?php echo $c ?>" role="button" aria-expanded="false" aria-controls="collapseFaqContent<?php echo $c ?>">
            <b><?php the_sub_field('faqs_question'); ?></b>
            <a class="pull-right-arrow" data-toggle="collapse" href="#faqs-arrow" aria-expanded="true" aria-controls="faqs-arrow">
                <div id="carbrand-arrow-<?php echo $c ?>">
                    <i class="fas fa-chevron-down text-white"></i>
                </div>
            </a>
        </div>
        <div class="collapse" id="collapseFaqContent<?php echo $c ?>">
            <div class="card card-body">
                <div class="card-body p-0 py-md-3">
                    <?php the_sub_field('faqs_answer'); ?>
                </div>
            </div>
        </div>
    </div>
    <div class="col-12 py-3"></div>
    <?php $s++; ?>
    <script>
    jQuery(function($) {
        $("#faqs-<?php echo $c ?>").on( "click", function() {
            $("#carbrand-arrow-<?php echo $c ?>").toggleClass('chevron-rotate','');
        });
    });
    </script>
    <?php endwhile; ?>
	<?php endif; ?>
</div>