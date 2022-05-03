<input type="text" style="height: 0px; width:0px; border: 0px;" id="datepicker">

<div id="chat-bar" class="col-12 row m-0 bg-secondary msb-reply mb-1 p-0">
	<div class="col-md col-2 hat-calendar">
		<!--ADVICE COMMENT-->
		<!-- Do not change #sendDatetime. -->
		<button id="sendDatetime" class="text-light" data-toggle="tooltip" data-placement="top"
				title="Kalenderfunktion">
			<i class="far fa-calendar-check"></i>
		</button>
	</div>
	<div class="col-md-10 col-8 m-0 p-0">
		<input id="messageContent" type="text" maxlength="120" placeholder="Etwas mitteilen...">
	</div>
	<div class="col-md col-2 chat-submit">
		<!--ADVICE COMMENT-->
		<!-- Do not change #sendMessage. -->
		<button id="sendMessage" class="bg-dark text-light"><i class="fas fa-paper-plane"></i></button>
	</div>
</div>

<script>
/* Bann Words for Chat Message Input */
document.getElementById('messageContent').onkeyup = function(e) {
	e.preventDefault();
	var banned_words = ['www', '@', 'handynummer', 'rufnummer', 'nummer', '0', '1', '2', '3', '4', '5', '6', '7', '8', '9'];
	var textvalue = document.getElementById('messageContent').value;
	for(var i=0; i<banned_words.length; i++) {
		if (~textvalue.indexOf(banned_words[i])){
			document.getElementById('sendMessage').disabled = true;
		} else {
			document.getElementById('sendMessage').disabled = false;
		}
	}
}
</script>

<style>
	#sendMessage:disabled {
		opacity: 0.3;
	}
</style>