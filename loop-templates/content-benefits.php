<?php
/**
 * Partial template for benefits
 *
 * @package SebraOne
 */

if ( $args['data'] ) {
    $benefitsClass = $args['class'];
    $benefitsIcon = $args['data']['icon'];
    $benefitsHeadline = $args['data']['headline'];
    $benefitsText = $args['data']['text'];
}
?>

<div class="<?php echo $benefitsClass ?>">
    <?php if( have_rows('landingpageBenefitsArray') ): $c = 0; $class = ''; ?>
        <?php while( have_rows('landingpageBenefitsArray') ) : the_row(); ?>
            <?php $c++; ?>
                <div class="col-md-4 px-md-3 py-md-0 my-3">
                    <span class="negative-margin fa-stack fa-3x">
                        <i class="<?php echo $benefitsIcon ?> fa-stack-2x text-primary"></i>
                    </span>
                    <div class="card px-0 mx-3 box-shadow-lg">
                        <div class="card-header">
                            <br>
                            <h4><?php echo $benefitsHeadline ?></h4>
                        </div>
                        <div class="card-body mb-0 border-0">
                            <p class="text-muted"><?php echo $benefitsText ?></p>
                        </div>
                    </div>
                </div>
        <?php endwhile; ?>
    <?php endif; ?>		
</div>