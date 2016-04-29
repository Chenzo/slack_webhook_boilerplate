<?php
include 'config.php';
require_once('slack.class.php');
header('Content-Type: application/json');



class Attachms {
	public $fallback = "";
	public $pretext = "";
	public $mrkdwn_in = array("text", "fields");
	public $color = "";
	public $thumb_url = "";
	//public $image_url = "";
	public $fields;
	
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
		               "value" => "Channel Link <#general>",
		               "short" => false),
						array(
							"title" => "This is bold already",
							"value" => "This is a _italic word_ test"),
						array(
							"title" => "Click This To Get A Private Message",
							"value" => "<" . REMOTE_HOST . "ping.php|ping>")
						);


	$jsonMessage = json_encode(array("channel" => "#twb", "attachments" => array($theMessage))); //, JSON_UNESCAPED_SLASHES

    $slack->sendIt(WEBHOOK_URL, $jsonMessage, false);

?>