
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
        <div class="card-header bg-darker text-white" data-toggle="collapse" href="#collapseFaqContent<?php echo $c ?>" role="button" aria-expanded="false" aria-controls="collapseFaqContent<?php echo $c ?>">
            <b><?php the_sub_field('faqs_question'); ?></b>
            <a class="pull-right-arrow" data-toggle="collapse" href="#test-block" aria-expanded="true" aria-controls="test-block">
                <div id="carbrand-arrow-0">
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
    <?php endwhile; ?>
	<?php endif; ?>
</div>

<script>
jQuery(function($) {
	$.each($(".card-header[data-toggle='collapse']"), function(index) {
		$(this).on( "click", function() {
			$("#carbrand-arrow-"+ index +"").toggleClass('chevron-rotate','');
		});;
	});

	if (window.matchMedia("(min-width: 471px)").matches) {
		$('[data-toggle="tooltip"]').tooltip();
	}

	if($('#nav-searchbox-tab')) {

		$('#nav-searchbox-tab').on('change', function() {
			$('#nav-searchbox').removeClass('active');
		});

		$('#nav-home-tab').on('change', function() {
			$('#nav-home').removeClass('active');
		});

	};

});
</script>