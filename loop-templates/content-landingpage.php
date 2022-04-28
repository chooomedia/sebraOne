<?php
/**
 * Landingpage Block Template.
 * @param   array $block The block settings and attributes.
 * @param   string $content The block inner HTML (empty).
 * @param   bool $is_preview True during AJAX preview.
 * @param   (int|string) $post_id The post ID this block is saved to.
 */

// Create id attribute allowing for custom "anchor" value.
$id = 'testimonial-' . $block['id'];
if( !empty($block['anchor']) ) {
    $id = $block['anchor'];
}

// Create class attribute allowing for custom "className" and "align" values.
$className = 'landingpage';
if( !empty($block['className']) ) {
    $className .= ' ' . $block['className'];
}

// Load values and assign defaults.
$image = get_field('benefitsImage') ?: 295;
$lpText = get_field('benefitsText');

?>
<div class="container">
    <div id="<?php echo esc_attr($id); ?>" class="<?php echo esc_attr($className); ?>">
        <blockquote class="lp-blockquote">
            <span class="fas fa-text"><?php echo $text; ?></span>
            <span class="fas fa-author"><?php echo $author; ?></span>
            <span class="fas fa-robot"><?php echo $role; ?></span>
        </blockquote>
        <div class="lp-image">
            <?php echo wp_get_attachment_image( $image, 'full' ); ?>
        </div>
    </div>
</div>