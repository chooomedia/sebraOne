
<?php
/**
 * Partial template for Faqs
 *
 * @package SebraOne
 */
?>

<div class="col-md-12 col-12 p-0">
    <div class="tab-content" id="nav-tabContent">
    <?php if( have_rows('faqsarray') ): $c = 0; $class = ''; ?>
    <?php while( have_rows('faqsarray') ) : the_row(); ?>
        <?php echo ($c == 0 || $c % 5 == 0) ? '<div class="fade show active" id="faqs-block-' . $c . '">' : '' ?>
        <div class="card faqs-card">
            <div id="faqs-<?php echo $c ?>" class="card-header bg-darker text-white" data-toggle="collapse" href="#collapseFaqContent<?php echo $c ?>" role="button" aria-expanded="false" aria-controls="collapseFaqContent<?php echo $c ?>">
                <b><?php the_sub_field('faqs_question'); ?></b>
                <a class="pull-right-arrow" data-toggle="collapse" href="#faqs-arrow" aria-expanded="true" aria-controls="faqs-arrow">
                    <div class="btn-chevron-arrow">
                        <i class="fas fa-chevron-down text-white"></i>
                    </div>
                </a>
            </div>
            <div id="collapseFaqContent<?php echo $c ?>" class="collapse" role="tabpanel" aria-labelledby="heading-<?php echo $c; ?>">
                <div class="card card-body pb-1">
                    <div class="card-body p-0">
                        <?php the_sub_field('faqs_answer'); ?>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-12 py-3"></div>
        <?php $c++; echo ($c % 5 == 0) ? '</div>' : '' ?>

    <?php endwhile; ?>
    <?php echo ($c % 5 !== 0) ? '</div>' : '' ?>

    <nav aria-label="Faqs pagination navigation"></nav>
        <ul class="pagination justify-content-center">
            <li class="page-item active">
                <a class="page-link" data-toggle="tab" href="#faqs-block-0" aria-controls="faqs-block-0" aria-selected="true">1</a>
            </li>
            <li class="page-item">
                <a class="page-link" data-toggle="tab" href="#faqs-block-5" aria-controls="faqs-block-5" aria-selected="false">2</a>
            </li>
            <li class="page-item">
                <a class="page-link" data-toggle="tab" href="#faqs-block-10" aria-controls="faqs-block-10" aria-selected="false">3</a>
            </li>
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
    });
});
</script>