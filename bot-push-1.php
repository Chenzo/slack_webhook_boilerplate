<?php
include 'config.php';
header('Content-Type: application/json');

class Attachms {
	public $fallback = "";
	public $pretext = "";
	//public $color = "";
	public $mrkdwn = true;
	public $thumb_url = "";
	public $image_url = "";
	public $fields;
	public $channel;
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

$theMessage->fallback = "New open task [Urgent]: <http://www.google.com|Test out Slack message attachments>";
$theMessage->pretext = "New open task [Urgent]: <http://www.google.com|Test out Slack message attachments>";
//$theMessage->color ="#D00000";
$theMessage->channel = "@chenzo"; //Private message someone...
$theMessage->mrkdwn = true;
$theMessage->thumb_url = "http://1stdigitalinfantry.com/images/placeholder.jpg";
$theMessage->image_url = "http://1stdigitalinfantry.com/images/placeholder.jpg";
$theMessage->fields = array(array(
                        "title" => "Notes",
		               "value" => "This is much easier than I thought it would be.",
		               "short" => false),
						array(
							"title" => "This is bold already",
							"value" => "This is a _italic word_ test",
							"mrkdwn" => true));

echo json_encode($theMessage, JSON_UNESCAPED_SLASHES);


function sendIt($theMessage) {

	$ch = curl_init( WEBHOOK_URL );
	curl_setopt( $ch, CURLOPT_SSL_VERIFYPEER, false );
	curl_setopt( $ch, CURLOPT_POST, true );
	curl_setopt( $ch, CURLOPT_POSTFIELDS, $theMessage );
	curl_exec( $ch );
	curl_close( $ch );

}


//sendIt(json_encode($theMessage, JSON_UNESCAPED_SLASHES));

?>