<?php 
include 'config.php';
require_once('includes/helpers.class.php');

/*
Need to set the header to content-type header of the response must match the disposition of your content, application/json.
*/
header('Content-Type: application/json');

$id =  isset($_GET['v']) ? $_GET['v'] : "";
$r = isset($_GET['r']) ? $_GET['r'] : "";

$token = $_POST["token"];
$theCommand = $_POST["text"];


$rs = $helpers->generateRandomString();
/*

This is what's posted...

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




/*
This is the JSON we should send back:
{
    "text": "It's 80 degrees right now.",
    "attachments": [
        {
            "text":"Partly cloudy today and tomorrow"
        }
    ]
}
*/

echo $rs;


class Attachms {
	public $text = "";
	public $attachments;
	public $response_type = "ephemeral"; //ephemeral is private...
}

$theMessage = new Attachms();

//$theMessage->response_type = "in_channel";
$theMessage->text ="This bot received your data";
$theMessage->attachments = array(array(
                        "title" => "Title Text",
		               "text" => "This is all a success.",
		               "color" => "#ff0000"));


echo json_encode($theMessage);

 ?>