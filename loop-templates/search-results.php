<?php
/**
 * Loop template for Search Results
 *
 * @package SebraOne
 */

if ( $args['data'] ) {
    $resultPriceRange = $args['data']['price-range'];
    $resultSellerId = $args['data']['seller-id'];
    $resultSellerName = $args['data']['seller-name'] ?? $resultSellerId;
    $resultSellerProofed = $args['data']['seller-proofed'];
    $resultSellerText = $args['data']['seller-text'];
    $resultLogoUrl = $args['data']['seller-logo'];
    $resultSellerKpis = $args['data']['seller-kpis'];
    /*
    $userAuthorTime = $args['data']['author-timestamp'];
    $status = $args['data']['status'];
    $active = $args['data']['is-active'];*/
}
?>
<!--ADVICE COMMENT-->
<!-- Do not change #create-deal. -->
<?php if ( $queries ) : ?>
<div class="card card-result mb-3" id="create-deal" data-seller-id="<?php echo $resultSellerId ?>">
	<a href="<?php echo $resultSellerId ?>">
	<div class="card-img-top bg-turquoise">
		<div class="card-img-head">
			<div class="card-head-btn level-promoted ad-badge"><i class="fas fa-star"></i></div>
			<div class="card-head-btn"><?php echo $resultPriceRange ?></div>
			<!--<div class="card-head-btn"><i class="fas fa-star"></i></div>-->
		</div>
	</div>
	</a>
	<a href="<?php echo $resultSellerId ?>">
		<div class="card-body pt-4 px-3 pb-2">
			<div class="card-avatar" style="background-image: url(<?php echo $resultLogoUrl ?>);"></div>
			<h6 class="card-title pt-3 d-flex mb-1"><?php echo $resultSellerName ?><?php if ($resultSellerProofed) : ?>
				<div class="badge-verified"></div><?php endif; ?></h6>
			<p class="card-text"><?php echo $resultSellerText ?></p>
		</div>
	</a>
	<div class="card-body p-0 pb-1">
		<div class="card-footer bg-white d-flex py-2 px-3 border-0">
			<a class="btn bg-grey rounded-circle">
				<i class="fa fa-car"></i>
			</a>
			<div class="text-muted float-left">
				<?php echo $resultSellerKpis ?>
			</div>
			<a class="btn bg-grey rounded-circle" href="#">
				<i class="fas fa-search-plus"></i>
			</a>
			<!--<a class="btn bg-grey rounded-circle" href="#">
				<i class="far fa-heart"></i>
			</a>-->
		</div>
	</div>
</div>

<?php else : ?>
<?php get_template_part( 'loop-templates/no-results', null, array(
	'data' => array(
		'headline' => 'Nichts gefunden',
		'content' => 'Hier gibt es leider nichts zu sehen.'
	)
	) );
?>

<?php endif ?>