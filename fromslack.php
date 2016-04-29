<?php 
include 'config.php';
require_once('slack.class.php');

/*
Need to set the header to content-type header of the response must match the disposition of your content, application/json.
*/
header('Content-Type: application/json');


/*
Data Sent from Slack:

token=clDjjWSgrPckXy22Pk8XiMmu
team_id=T0001
team_domain=example
channel_id=C2147483705
channel_name=test
user_id=U2147483697
user_name=Steve
command=/weather
text=94070
response_url=https://hooks.slack.com/commands/1234/5678
*/

$token = $_POST["token"];
$theWords = $_POST["text"];
$team_id = $_POST["team_id"];
$team_domain = $_POST["team_domain"];
$channel_id = $_POST["channel_id"];
$channel_name = $_POST["channel_name"];
$user_id = $_POST["user_id"];
$user_name = $_POST["user_name"];
$command = $_POST["command"];
$response_url = $_POST["response_url"];







/*
This is an example of the JSON we should send back:
{
    "text": "It's 80 degrees right now.",
    "attachments": [
        {
            "text":"Partly cloudy today and tomorrow"
        }
    ]
}
*/
if (SLASH_TOKEN == $token) {

    class Attachms {
    	public $text = "";
    	public $attachments;
    	//public $response_type = "ephemeral"; //ephemeral is private...
    }

    $theMessage = new Attachms();

    //$theMessage->response_type = "in_channel";
    $theMessage->text ="This bot received your data";
    $theMessage->attachments = array(array(
                            "title" => "Your Command Was This:",
    		               "text" => $theWords,
    		               //"color" => "#ff0000"
                           ));


    $jsonMessage = json_encode($theMessage); //, JSON_UNESCAPED_SLASHES

    $slack->sendIt($response_url, $jsonMessage, true);

}

 ?>