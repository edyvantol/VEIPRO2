<?php

class Security{
	public

	function StartASession() {
		$status = "";
		if ( session_status() == PHP_SESSION_NONE ) {
			session_start();
			$status = "Session started";
		} else {
			$status = "Session didn't start";
		}

		return $status;
	}

	public

	function RandomToken() {
		$token = bin2hex( openssl_random_pseudo_bytes( 32 ) );
		$_SESSION[ 'token' ] = $token;
		return $token;
	}

	public

	function TokenControle() {
		if ( session_status() == PHP_SESSION_NONE ) {
			//session didn't start
			$bool = false;
			exit( "Session failed" );
		} else {
			//session did start
			if ( isset( $_SESSION[ "token" ] ) && $_SESSION[ "token" ] == $_POST[ "csrf_token" ] ) {
				$_POST[ "csrf_token" ] = null;
				$_SESSION[ "token" ] = null;
				$bool = true;
			} else {
				$bool = false;
				exit( "Token is wrong" );
			}
		}
		return $bool;
	}

	public

	function RefererControl( $url ) {
		$bool = false;
		if ( isset( $_SERVER[ "HTTP_REFERER" ] ) && $_SERVER[ "HTTP_REFERER" ] == $url ) {
			$bool = true;
		} else {
			$bool = false;
			exit( "Referer is wrong" );
		}
		return $bool;
	}
}

/*<?php
//require_once( 'ini_set.php' );
require_once( 'Security.php' );
$Security = new Security();
$Security->StartASession();

if ( $Security->TokenControle() == true ) {
	if ( $Security->RefererControl("https://80751.ict-lab.nl/VEIPRO2/opdracht1_form.php") == true ) {
		echo("Alles ging goed");	
		if ()
	}
	else{
		exit("Token was niet goed");
	}
}
else{
	exit("Referer was niet goed");
}

?>*/
?>