<?php
/**
 * Partial template for benefits
 *
 * @package SebraOne
 */

if ( $args['data'] ) {
    $benefitsClass = $args['class'];
    $benefitsHeadline = $args['data']['headline'];
    $benefitsFootline = $args['data']['footline'];
}
?>
<div class="container">
    <div class="text-center">
        <h2 class="section-heading text-uppercase mt-md-0"><b><?php echo $benefitsHeadline ?></b></h2><!-- Welche Vorteile? -->
        <h3 class="section-subheading text-accent mb-5"><?php echo $benefitsFootline ?></h3> <!-- <b>Einfach & fair</b> den <b>besten Verkaufspreis</b> erhalten -->
    </div>
    <div class="<?php echo $benefitsClass ?>">
        <?php if( have_rows('landingpageBenefitsArray') ): $c = 0; $class = ''; ?>
            <?php while( have_rows('landingpageBenefitsArray') ) : the_row(); ?>
                 <?php 
                    $sub_icon = get_field('landingpageBenefitsIcon');
                    $sub_Headline = get_field('landingpageBenefitsHeadline');
                    $sub_Text = get_field('landingpageBenefitsText'); 
                ?>
                <?php $c++; ?>
                    <div class="col-md-4 px-md-3 py-md-0 my-3">
                        <span class="negative-margin fa-stack fa-3x">
                            <i class="<?php echo $sub_icon ?> fa-stack-2x text-primary"></i>
                        </span>
                        <div class="card px-0 mx-3 box-shadow-lg">
                            <div class="card-header">
                                <br>
                                <h4><?php echo $sub_Headline ?></h4>
                            </div>
                            <div class="card-body mb-0 border-0">
                                <p class="text-muted"><?php echo $sub_Text ?></p>
                            </div>
                        </div>
                    </div>
            <?php endwhile; ?>
        <?php endif; ?>		
    </div>
</div>