
<?php
/**
 * Partial template for seller details
 *
 * @package SebraOne
 */
if ( $args['data'] ) {
    $sellerDetailsBackgrUrl = $args['data']['backgr'];
    $sellerDetailsAvatarTypeUrl = $args['data']['avatar'];
    $sellerDetailsCrypedTitle = $args['data']['cTitle'];
    $sellerDetailsVerified = $args['data']['verified'];
    $sellerDetailsInfo = $args['data']['info'];
    $sellerDetailsPaymentIndicator = $args['data']['payment-range'];
}
?>

<div id="page-seller-details-wrapper-head" class="container-fluid px-0" style="background: url('<?php echo $sellerDetailsBackgrUrl ?>');background-size:cover;">
    <div class="overlay px-3">
        <div id="page-seller-details-wrapper-head-inner" class="container-fluid">
            <div class="card bg-transparent card-seller-details border-0">
                <div class="card-body grid px-0 pt-4 px-lg-0 pb-2 mb-4">
                    <div class="card-avatar seller-details" style="background-image: url('<?php echo $sellerDetailsAvatarTypeUrl ?>);"></div>
                    <h1 class="card-title text-white d-flex mb-0">
                        <?php echo $sellerDetailsCrypedTitle ?>
                        <?php if ($sellerDetailsVerified) : ?>
                            <div class="badge-verified seller-details"></div>
                        <?php endif; ?>
                    </h1>
                    <h5 class="card-text text-white"><?php echo $sellerDetailsInfo ?></h5>
                </div>
                <div class="card-img-bottom">
                    <div class="card-img-head mb-2">
                        <div class="card-head-btn level-promoted ad-badge"><i class="fas fa-star"></i></div>
                        <div class="card-head-btn"><?php echo $sellerDetailsPaymentIndicator ?></div>
                        <div class="card-head-btn"><i class="fas fa-star"></i></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>