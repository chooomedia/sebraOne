<?php
/**
 * Partial template for benefits
 *
 * @package SebraOne
 */

if ( $args['data'] ) {
    $benefits_class = $args['class'];
    $benefits_icon = $args['data']['icon'];
    $benefits_headline = $args['data']['headline'];
    $benefits_text = $args['data']['text'];
}
?>

<div class="<?php echo $benefits_class ?>">
    <?php if( have_rows('landingpageBenefitsArray') ): $c = 0; $class = ''; ?>
        <?php while( have_rows('landingpageBenefitsArray') ) : the_row(); ?>
            <?php $c++; ?>
                <div class="col-md-4 px-md-3 py-md-0 my-3">
                    <span class="negative-margin fa-stack fa-3x">
                        <i class="<?php echo $benefits_icon ?> fa-stack-2x text-primary"></i>
                    </span>
                    <div class="card px-0 mx-3 box-shadow-lg">
                        <div class="card-header">
                            <br>
                            <h4><?php echo $benefits_headline ?></h4>
                        </div>
                        <div class="card-body mb-0 border-0">
                            <p class="text-muted"><?php echo $benefits_text ?></p>
                        </div>
                    </div>
                </div>
        <?php endwhile; ?>
    <?php endif; ?>		
</div>