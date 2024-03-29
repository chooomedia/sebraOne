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
					<p>Klicken Sie auf das Symbol in der unteren Chat-Leiste um einen Termin auszuwählen und zu buchen.
					Bitte vermeiden Sie <b>personenbezogene Informationen wie Telefonnummern, E-Mail Adresse oder Unternehmennamen.</b>
					Alles weitere können Sie den <a class="text-dark" target="_blank" href="/agbs">AGBs</a> entnehmen.</p>
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
