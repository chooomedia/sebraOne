<?php
/**
 * Section Footer CTA block
 *
 * @package SebraOne
 */

get_header(); 

if ( $args['data'] ) {
    $cta_id = $args['id'];
    $cta_class = $args['class'];
    $cta_background = $args['data']['ctabackgroundcolor'];
    $cta_spacing = $args['data']['ctaspacing'];
    $cta_headline = $args['data']['ctaheadline'];
    $cta_text = $args['data']['ctatext'];
    $cta_btn_text = $args['data']['ctalinkname'];
    $cta_link = $args['data']['ctalink'];
}
?>

<?php if( have_rows('sectionFooterCta') ) : ?>
    <section class="page-section py-5 text-light" style="background-color: <?php echo esc_html($cta_background) ?>;" id="<?php echo $cta_id ?>">
        <div class="<?php echo $cta_class ?> py-5 my-md-0" style="margin: <?php echo $cta_spacing ?> auto;">
            <div class="pt-md-5 col-12 text-center mb-5">
                <h2 class="section-heading text-uppercase"><?php echo $cta_headline ?><!--Auf was <b>warten Sie noch?</b>--></h2>
                <p class="text-white section-subheading mb-md-4"><?php echo $cta_text ?><!--Stellen Sie heute noch eine Anfrage und bekommen Sie den besten Preis für Ihr Fahrzeug. --></p>
            </div>
            <div class="pb-md-5 col-12 d-flex justify-content-center">
                <a id="cta-button" class="btn btn-lg bg-gradient text-white" href="<?php echo $cta_link ?>" style="padding-left:5rem;padding-right:5rem;"><?php echo $cta_btn_text ?><!-- Jetzt Fahrzeug verkaufen --></a>
            </div>
        </div>
    </section>
<?php endif; ?>