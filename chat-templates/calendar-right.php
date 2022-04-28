<?php
$userName = $args['userName'];
$userImage = $args['userImage'];
$commentContent = $args['commentContent'];
$commentDate = $args['commentDate'];
$calendar = $args['calendar'];
$year = $args['year'];
$brand = $args['brand'];
$kilometers = $args['kilometers'];
$model = $args['model'];
$power = $args['power'];
?>

<div class="message-feed media">
	<div class="pull-left">
		<small class="mf-date d-flex"><img src="<?php echo $userImage ?>"
										   alt="avtr" class="img-avatar"><b style="line-height: 3;margin-left:5px;"><i
						class="fas fa-car mt-1"></i> <?php echo $userName ?></b></small>
	</div>
	<div class="media-body">
		<div class="col-12 mf-content pt-0 term-checked">
			<div class="p-0 mb-4 mb-md-0">
				<div class="card text-center border-0">
					<div class="card-header bg-danger text-white">
						<i class='fas fa-check'></i> <b>Termin findet statt</b>
					</div>

					<div class="card-body text-dark">
						<h3 class="card-title"><?php echo $calendar ?></h3>

						<?php if( !empty($year) && !empty($brand) && !empty($kilometers) ): ?>

							<h4 class="card-title"><?php echo ucfirst($brand) ?></h4>
							<p class="card-text">
								Baujahr: <?php echo $year ?><br>
								Model: <?php echo $model ?><br>
								Kilometerstand: <?php echo $kilometers ?>
								Leistung: <?php echo $power ?>
							</p>

						<?php endif ?>

<!--						<a class="btn btn-primary" href="/account?datetocalendar"><i class="fas fa-calendar-plus"></i> In Kalender</a>-->
					</div>
					<div class="card-footer text-muted">
						Anfrage vom <?php echo $commentDate ?>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
