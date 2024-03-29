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
		<input id="messageContent" type="text" data-toggle="tooltip" maxlength="120" title="Bitte keine Domains, Telefonnummern oder E-Mails angeben" placeholder="Etwas mitteilen..." autofocus>
	</div>
	<div class="col-md col-2 chat-submit">
		<!--ADVICE COMMENT-->
		<!-- Do not change #sendMessage. -->
		<button id="sendMessage" class="bg-dark text-light"><i class="fas fa-paper-plane"></i></button>
	</div>
</div>
<div id="log"></div>

<style>
	#sendMessage:disabled {
		opacity: 0.3;
		transition: .3s;
	}

</style>
<script>
	jQuery(function ($) {
		$(function () {
			$('[data-toggle="tooltip"]').tooltip()
		});
		var bannedWords = ["www", "handynummer", "@", "+49", "01", "ficken", "wixxer", "nutte", "mobil", "telefonnummer", "nummer"];
		var bannedWordsRegex = new RegExp('-' + bannedWords.join("-|-") + '-', 'i');

		$("#messageContent").on("input", function (e) {
			var invalid = bannedWordsRegex.test(dashPaddedWords(this.value));
			document.querySelector('#sendMessage').disabled = (invalid ? true : false );
		});
		$("#messageContent").trigger("input").focus();

		function dashPaddedWords(str) {
			return '-' + str.replace(/./g, wordCharOrDash) + '-';
		};

		function wordCharOrDash(ch) {
			return isWordChar(ch) ? ch : '-'
		};

		function isWordChar(ch) {
			return ch.toUpperCase() != ch.toLowerCase();
		};
	});
</script>