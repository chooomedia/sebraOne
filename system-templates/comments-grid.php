<?php
$user_id = $current_user_id = get_current_user_id();
?>
<div id="chatRulesInfoBox" class="card mt-3 mb-4">
	<h5 class="card-header">Herzlich Willkommen bei Chat</h5>
	<div class="card-body">
		<h5 class="card-title">Dieser Chat dient für die Übersicht und den Ablauf des Verkaufprozesses</h5>
		<p class="card-text">
			<div class="row p-0 m-0">
				<a href="#chat-bar" target="_self">
					<div id="exampleCalendarChattBtn" class="col bg-primary text-white mb-1">
						<i class="far fa-calendar-check"></i>
					</div>
				</a>
				<div class="col">
					Klicken Sie auf das Symbol in der unteren Chat-Leiste um einen Termin auszuwählen und zu buchen.
					Bitte vermeiden Sie <b>personenbezogene Informationen wie Telefonnummern, E-Mail Adresse oder Unternehmennamen.</b>
					Alles weitere können Sie den <a class="text-dark" target="_blank" href="/agbs">AGBs</a> entnehmen.
				</div>
			</div>
		</p>
		<a href="#" id="chatRulesAcceptedBtn" class="btn btn-primary">Okay, verstanden</a>
	</div>
</div>
<div id="comments-chat-wrapper" class="pt-3">
	<div class="container vw-100 p-0">
		<div class="row">
			<div id="messages-history" class="col-md-4 col-12">

				<!--ADVICE COMMENT-->
				<!-- In the block with #chat-block, render the template from the folder: chat-templates/chat-toast.php  -->
				<!-- Do not change #chat-block. -->
				<div id="chat-block">
					<?php /**
						* Chatbox
						* Pass specific Data into the Template
						* @param chat-box-id Number: Generate unique id for id-element
						* @param string:chat-requester-name String: Pass anonymized name of Requester
						* @param string:chat-date String: Show Date of Request (d-M-Y) um HH:MM
						* @param string:car-status String: Show status of request-type in chatbox
						* @param bool:chat-active Helperclass to change visibility
						*/
						get_template_part( 'chat-templates/chat-toast', null, array(
							'data'  => array(
								'chat-link' => '/#213132?s',
								'chat-box-id' => '1236',
								'chat-requester-name' => 'SELLER-183519',
								'chat-date' => '22.02.2022 um 02:23',
								'chat-status' => '1',
								'chat-checked' => true
								))
						);
					?>
					<?php /**
						* Chatbox
						* Pass specific Data into the Template
						* @param chat-box-id Number: Generate unique id for id-element
						* @param string:chat-requester-name String: Pass anonymized name of Requester
						* @param string:chat-date String: Show Date of Request (d-M-Y) um HH:MM
						* @param string:car-status String: Show status of request-type in chatbox
						* @param bool:chat-active Helperclass to change visibility
						*/
						get_template_part( 'chat-templates/chat-toast', null, array(
							'data'  => array(
								'chat-link' => '/#213132?s',
								'chat-box-id' => '2421',
								'chat-requester-name' => 'SELLER-23420',
								'chat-date' => '13.02.2022 um 14:53',
								'chat-status' => '3',
								'chat-checked' => true
								))
						);
					?>
				</div>
			</div>
			<div id="messages-main" class="col-md-8 col-12 tile tile-alt" >

				<!--ADVICE COMMENT-->
				<!-- In the block with #chat-wrapper, render the template from the folder: chat-templates/calendar-left(right).php or chat-templates/user-left(right).php  -->
				<div id="chat-wrapper" style="" class="col-12 px-0">
					<div class="message-feed right">
						<div class="pull-right">
							<span data-toggle="tooltip" data-placement="top" title="Ich (Chris)"><small
									class="mf-date"><img src="https://bootdey.com/img/Content/avatar/avatar2.png"
										alt="avtr" class="img-avatar"> <i class="far fa-user"></i><b>
										USER-<?php echo $user_id ?></b></small></span>
						</div>
						<div class="media-body">
							<div class="mf-content">
								Anfrage wurde für <b>PLZ 10822</b> gestellt. Zu verkaufende Fahrzeugmarke ist
								<b>AUDI</b>.
							</div>
							<small class="mf-date"><i class="far fa-clock"></i> 20.02.2015 um 09:30</small>
						</div>
					</div>

					<div class="message-feed media">
						<div class="pull-left">
							<small class="mf-date d-flex"><img src="https://bootdey.com/img/Content/avatar/avatar1.png"
									alt="avtr" class="img-avatar"><b style="line-height: 3;margin-left:5px;"><i
										class="fas fa-car mt-1"></i> SELLER-383764</b></small>
						</div>
						<div class="media-body">
							<div class="col-12 mf-content pt-0 term-checked">
								<?php /**
								* Request results
								* Pass specific Data into the Template
								* @param title Show Date of generated CPT (DD.MM.YYYY HH:MM Uhr) or Rating or Car Manufactor
								* @param string:car-brand Car manufacturer
								* @param string:car-builded String: The year of manufacture of the user's car
								* @param string:car-place Shows how many km have already been driven with the vehicle
								* @param string:author Shows the person who made the request
								* @param string:author-timestamp Shows how many km have already been driven with the vehicle
								* @param string:status Shows the status of the request (1 = appointment request, 2 = appointment confirmed, 3 = sold)
								* @param bool:is-active Helperclass to change visibility
								*/
								get_template_part( 'chat-templates/user-requested', null, array(
									'data'  => array(
										'title' => '22.02.2021 14:30 Uhr',
										'car-brand' => 'Audi',
										'car-builded' => '1988',
										'car-place' => '10882 Berlin Spandau',
										'car-kilometers' => '234.122 km',
										'author' => 'Max M.',
										'author-timestamp' => '20. Februar 2021',
										'status' => 1,
										'is-active' => true
									))
								);
							?>
							</div>
						</div>
					</div>

					<div class="message-feed right">
						<div class="pull-right">
							<span data-toggle="tooltip" data-placement="top" title="Ich (Chris)"><small
									class="mf-date"><img src="https://bootdey.com/img/Content/avatar/avatar2.png"
										alt="avtr" class="img-avatar"> <i class="far fa-user"></i><b>
										USER-<?php echo $user_id ?></b></small></span>
						</div>
						<div class="media-body">
							<div class="mf-content">
								Hallo Verkäufer, Sie können mich auch unter der <span
									class="p-2 bg-light border-light rounded content-blocked text-muted"
									data-toggle="tooltip" data-placement="top" title="Inhalt entfernt"><i
										class="fas fa-exclamation-circle"></i><b>0xxxxxxxx</b></span> anrufen
							</div>
							<small class="mf-date"><i class="far fa-clock"></i> 20.02.2015 um 15:10</small>
						</div>
					</div>

					<div class="message-feed media">
						<div class="pull-left">
							<small class="mf-date d-flex"><img src="https://bootdey.com/img/Content/avatar/avatar1.png"
									alt="avtr" class="img-avatar"><b style="line-height: 3;margin-left:5px;"><i
										class="fas fa-car mt-1"></i> SELLER-383764</b></small>
						</div>
						<div class="media-body">
							<div class="mf-content bg-primary text-white">
								Hallo <b>USER-394032</b>, danke für Ihre Nachricht. Bitte lassen Sie uns wie vereinbart
								treffen. Danke
							</div>
							<small class="mf-date"><i class="far fa-clock"></i> 20.02.2015 um 17:24</small>
						</div>
					</div>

					<div class="message-feed media">
						<div class="pull-left">
							<small class="mf-date d-flex"><img src="https://bootdey.com/img/Content/avatar/avatar1.png"
									alt="avtr" class="img-avatar"><b style="line-height: 3;margin-left:5px;"><i
										class="fas fa-car mt-1"></i> SELLER-383764</b></small>
						</div>
						<div class="media-body">
							<div class="col-12 mf-content pt-0 term-rate">
								<?php
								get_template_part( 'chat-templates/user-requested', null, array(
									'data'  => array(
										'title' => '★★★★★',
										'car-brand' => 'Audi',
										'car-builded' => '2020',
										'car-place' => '10882 Berlin Wedding',
										'car-kilometers' => '5.601 km',
										'author' => 'Peter Meyer',
										'author-timestamp' => '26. Februar 2021',
										'status' => 2,
										'is-active' => true
										))
								);
							?>
							</div>
						</div>
					</div>

					<div class="message-feed right">
						<div class="pull-right">
							<span data-toggle="tooltip" data-placement="top" title="Ich (Chris)"><small
									class="mf-date"><img src="https://bootdey.com/img/Content/avatar/avatar2.png"
										alt="avtr" class="img-avatar"> <i class="far fa-user"></i><b>
										USER-<?php echo $user_id ?></b></small></span>
						</div>
						<div class="media-body">
							<div class="col-12 mf-content pt-0 term-success">
								<?php
								get_template_part( 'chat-templates/user-requested', null, array(
									'data'  => array(
										'author' => 'SELLER-1234',
										'title' => '52.500 €',
										'car-brand' => 'Audi A6 Quattro',
										'car-builded' => '2020',
										'car-place' => '10882 Berlin',
										'car-kilometers' => '5.601 km',
										'author-timestamp' => '28. Februar 2021',
										'status' => 3,
										'is-active' => true
										))
								);
							?>
							</div>
						</div>
					</div>

					<div id="chat-bar" class="col-12 row m-0 bg-secondary msb-reply mb-1 p-0">
						<!--<div class="col">
							<button class="text-light" data-toggle="tooltip" data-placement="top" title="Name einfügen">
								<i class="fas fa-user mt-1"></i>
							</button>
						</div>-->
						<div class="col-md col-2 hat-calendar">
							<button class="text-light" data-toggle="tooltip" data-placement="top"
								title="Terminanfrage">
								<i class="far fa-calendar-check"></i>
							</button>
						</div>
						<div class="col-md-10 col-8 m-0 p-0">
							<input type="text" maxlength="120" placeholder="Etwas mitteilen..." pattern="[^()/><\][\\\x22,;|]@+">
						</div>
						<div class="col-md col-2 chat-submit">
							<button class="bg-dark text-light" data-toggle="tooltip" data-placement="top"
								title="Nachricht versenden"><i class="fas fa-paper-plane"></i></button>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<script>
	jQuery(function ($) {
		/* Activate bootstrap tooltip */
		$(function () {
			$('[data-toggle="tooltip"]').tooltip()
		});

		/* Save/check status of chat rules infobox in localstorge */
		$(function () {
			if (localStorage.getItem('acceptChatRules') == null) {
				localStorage.setItem('acceptChatRules', 'false'); //store a key/value
				$('#chatRulesInfoBox').show();
			}

			let chatRulesBool = localStorage.getItem('acceptChatRules');

			if (chatRulesBool == 'true') {
				$('#chatRulesInfoBox').hide();
			}

			$('#chatRulesAcceptedBtn').on('click', function () {
				localStorage.setItem('acceptChatRules', 'true');
				$('#chatRulesInfoBox').hide();
			});
		});
	});
</script>

<script src="//ajax.aspnetcdn.com/ajax/jquery.ui/1.10.3/jquery-ui.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery-ui-timepicker-addon/1.6.3/jquery-ui-timepicker-addon.min.js"></script>
<link rel="stylesheet" href="//ajax.aspnetcdn.com/ajax/jquery.ui/1.10.3/themes/sunny/jquery-ui.css">
<link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/jquery-ui-timepicker-addon/1.6.3/jquery-ui-timepicker-addon.min.css">
