<?php

class Slack {

	public function sendIt($theURL, $theMessage, $testing=false) {

		if ($testing) {
			echo $theMessage; 
		} else {
			$ch = curl_init( $theURL );
			curl_setopt( $ch, CURLOPT_SSL_VERIFYPEER, false );
			curl_setopt( $ch, CURLOPT_POST, true );
			curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
			curl_setopt( $ch, CURLOPT_POSTFIELDS, $theMessage );
			$cResult = curl_exec( $ch );
			curl_close( $ch );
		}

	}

}

$slack = new Slack;

?>