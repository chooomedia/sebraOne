<div id="seller-details-main" class="container px-0 py-0 mb-4 mt-3">
	<?php get_template_part( 'menu-templates/menu', 'improvement' ); ?>
</div>

<div id="seller-calendar-wrapper" class="container px-0 mb-4 mt-0">
	<div class="row">
		<div class="col-md-4 col-12">
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
						'chat-box-id' => '2421',
						'chat-requester-name' => 'Verkauft',
						'chat-date' => '20.12.2021 um 06:50',
						'chat-status' => '2',
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
						'chat-box-id' => '2421',
						'chat-requester-name' => 'In Bearbeitung',
						'chat-date' => '23.01.2022 um 16:20',
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
						'chat-box-id' => '2421',
						'chat-requester-name' => 'Verkauft',
						'chat-date' => '13.02.2022 um 14:53',
						'chat-status' => '3',
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
						'chat-box-id' => '2421',
						'chat-requester-name' => 'Verkauft',
						'chat-date' => '09.04.2021 um 16:33',
						'chat-status' => '4',
						'chat-checked' => true
						))
				);
			?>
			</div>
		</div>
		<div class="col-md-8 col-12">
			<form id="seller-calendar-form" action="get">
				<div class="form-group">
					<textarea rows="16" class="border-0 form-control bg-transparent"></textarea>
				</div>
			</form>
		</div>
	</div>
</div>