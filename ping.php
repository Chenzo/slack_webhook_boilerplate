<?php
include 'config.php';
header('Content-Type: application/json');

class Attachms {
	public $fallback = "";
	public $pretext = "";
	public $color = "";
	public $thumb_url = "";
	//public $image_url = "";
	public $fields;
	public $mrkdwn_in = ["text", "fields"];
	//public $channel;
}

/*

rework to this:

{

    "attachments": [
        
{"fallback":"New open task [Urgent]: <http://www.google.com|Test out Slack message attachments>",
 "pretext":"New open task [Urgent]: <http://www.google.com|Test out Slack message attachments>",
 "color": "#ff0000",
 "mrkdwn_in": ["text", "fields"],
 "thumb_url":"http://1stdigitalinfantry.com/images/placeholder.jpg",
 "fields":[
	 {"title":"Notes",
	  "value":"<http://www.google.com|Yes> | <http://www.google.com|No>",
	  "short":false},
	 {"title":"This is bold already",
	  "value":"This is a _italic word_ test"}]}
		]
}

also try to add "channel": "#other-channel" or USER...
*/

$theMessage = new Attachms();

$theMessage->fallback = "Test Message Sent!";
$theMessage->pretext = "Boilerplate Message fired: <https://github.com/Chenzo/slack_webhook_boilerplate|Github: Slack Webhook Boilerplate>";
$theMessage->color ="#D00000";
//$theMessage->channel = "@chenzo"; //Private message someone...
$theMessage->thumb_url = REMOTE_HOST . "rocket_league-badge.png";
//$theMessage->image_url = "http://1stdigitalinfantry.com/images/placeholder.jpg";
$theMessage->fields = array(array(
                        "title" => "Notes",
		               "value" => "Channel Link #general",
		               "short" => false),
						array(
							"title" => "This is bold already",
							"value" => "This is a _italic word_ test"),
						array(
							"title" => "Click This To Get A Private Message",
							"value" => "<" . REMOTE_HOST . "ping.php|ping>")
						);

echo json_encode(array("attachments" => array($theMessage))); //JSON_UNESCAPED_SLASHES


function sendIt($theMessage) {

	$ch = curl_init( WEBHOOK_URL );
	curl_setopt( $ch, CURLOPT_SSL_VERIFYPEER, false );
	curl_setopt( $ch, CURLOPT_POST, true );
	curl_setopt( $ch, CURLOPT_POSTFIELDS, $theMessage );
	curl_exec( $ch );
	curl_close( $ch );

}


sendIt(json_encode($theMessage)); //JSON_UNESCAPED_SLASHES

?>