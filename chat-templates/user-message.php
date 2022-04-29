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
		<input id="messageContent" type="text" maxlength="120" placeholder="Etwas mitteilen..." pattern="[^()/><\][\\\x22,;|]@+">
	</div>
	<div class="col-md col-2 chat-submit">
		<!--ADVICE COMMENT-->
		<!-- Do not change #sendMessage. -->
		<button id="sendMessage" class="bg-dark text-light" data-toggle="tooltip" data-placement="top"
				title="Nachricht versenden"><i class="fas fa-paper-plane"></i></button>
	</div>
</div>
