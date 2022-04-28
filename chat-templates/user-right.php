<?php
	$userName = $args['userName'];
	$userImage = $args['userImage'];
	$commentContent = $args['commentContent'];
	$commentDate = $args['commentDate'];
?>

<div class="message-feed right">
	<div class="pull-right">
		<span data-toggle="tooltip" data-placement="top" title="<?php echo $userName ?>">
			<small class="mf-date">
				<img src="<?php echo $userImage ?>" alt="avtr" class="img-avatar">
				<i class="far fa-user"></i>
				<b><?php echo $userName ?></b>
			</small>
		</span>
	</div>
	<div class="media-body">
		<div class="mf-content">
			<?php echo $commentContent ?>
		</div>
		<small class="mf-date">
			<i class="far fa-clock"></i>
			<?php echo $commentDate ?>
		</small>
	</div>
</div>
