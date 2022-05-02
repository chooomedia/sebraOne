<?php
/**
 * Partial template for benefits
 *
 * @package SebraOne
 */

if ( $args['data'] ) {
    $benefitsClass = $args['class'];
    $benefitsHeadline = $args['data']['headline'];
    $benefitsSubline = $args['data']['subline'];
}
?>

<div class="<?php echo $benefitsClass ?>">
    <?php if( have_rows('benefitsArray') ): $c = 0; $class = ''; ?>
        <?php while( have_rows('benefitsArray') ) : the_row(); ?>
            <?php $c++; ?>
                <div class="col-md-4 px-md-3 py-md-0 my-3">
                    <span class="negative-margin fa-stack fa-3x">
                        <i class="<?php the_sub_field('benefits_icon'); ?> fa-stack-2x text-primary"></i>
                    </span>
                    <div class="card px-0 mx-3 box-shadow-lg">
                        <div class="card-header">
                            <br>
                            <h4><?php the_sub_field('benefits_headline'); ?></h4>
                        </div>
                        <div class="card-body mb-0 border-0">
                            <p class="text-muted"><?php the_sub_field('benefits_text') ?></p>
                        </div>
                    </div>
                </div>
        <?php endwhile; ?>
    <?php endif; ?>		
</div>