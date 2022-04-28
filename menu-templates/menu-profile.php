<?php
/**
 * Partial template for scrollable profile edit menu
 *
 * @package SebraOne
 */
if ( $args['data'] ) {
    $topMenuProfileHref = $args['href'];
    $topMenuProfileIcon = $args['icon'];
    $topMenuProfileTitle = $args['title'];
}
?>
	
<div class="type-company item">
	<a href="#<?php echo esc_html($topMenuProfileHref) ?>" role="button"
		data-slide-to="<?php $i++ ?>">
		<div class="type-info">
			<i class="fas <?php echo esc_html($topMenuProfileIcon) ?> mr-2"></i>
			<h4><?php echo esc_html($topMenuProfileTitle) ?></h4>
		</div>
	</a>
</div>