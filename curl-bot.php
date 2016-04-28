<?php
$last = "";
define( "ENVATO_TOKEN", "ZTUyBGh*******uqtQ8uwL****6TR" );
define( "SLACK_WEBHOOK", "https://hooks.slack.com/services/T0BR4EA9G/CD0BREL0SW/w5sbJwuXogF1cFAevwZNaCIZ" );
 
date_default_timezone_set("Asia/Dhaka"); //important
 
$lastUpdate = trim( file_get_contents( "update.txt" ) );
$headers = array( 'Authorization: Bearer ' . ENVATO_TOKEN );
$ch      = curl_init( "https://api.envato.com/v2/market/author/sales" );
curl_setopt( $ch, CURLOPT_HTTPHEADER, $headers );
curl_setopt( $ch, CURLOPT_SSL_VERIFYPEER, false );
curl_setopt( $ch, CURLOPT_RETURNTRANSFER, true );
 
$data = curl_exec( $ch );
curl_close( $ch );
 
if ( $data ) {
    $jsonData = json_decode( $data, true );
    foreach ( $jsonData as $item ) {
        $soldAt   = $item['sold_at'];
        $itemName = $item['item']['name'];
 
        if ( ! $last ) {
            $last = $soldAt;
        }
 
 
        if ( $soldAt != $lastUpdate ) {
            $localTime = date("d M, Y H:i:s A",strtotime($soldAt));
            $messageText = "One {$itemName} was sold at {$localTime}";
 
            $message = array(
                "payload" =>
                    json_encode(array(
                        "text" => $messageText,
                    ))
            );
 
            $ch = curl_init( SLACK_WEBHOOK );
            curl_setopt( $ch, CURLOPT_SSL_VERIFYPEER, false );
            curl_setopt( $ch, CURLOPT_POST, true );
            curl_setopt( $ch, CURLOPT_POSTFIELDS, $message );
            curl_exec( $ch );
            curl_close( $ch );
 
            if(!$lastUpdate){
                break;
            }
 
        } else {
            break; //no new sales since last time
        }
    }
}
 
if($last) file_put_contents( "update.txt", $last );