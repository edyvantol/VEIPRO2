<?php
require_once('ini_set.php');
session_start();

//controleer de token
if ( isset( $_SESSION[ "token" ] ) && $_SESSION[ "token" ] == $_POST[ "csrf_token" ] ) {
	$_POST[ "csrf_token" ] = null;
	$_SESSION[ "token" ] = null;
	//Controleer de referer
	if ( isset( $_SERVER[ "HTTP_REFERER" ] ) && $_SERVER[ "HTTP_REFERER" ] ==
		"https://80751.ict-lab.nl/VEIPRO2/opdracht1_form.php" ) {


		//controleer of alles velden aanwezig zijn
		if ( isset( $_POST[ "formSubmit" ] ) &&
			isset( $_POST[ "username" ] ) &&
			isset( $_POST[ "phone" ] ) &&
			isset( $_POST[ "email" ] ) &&
			isset( $_POST[ "birthday" ] ) ||
			$_POST[ "checkbox" ] == "true" &&
			isset( $_POST[ "gender" ] ) ) {

			$pattern_username = "/^[A-Z]{1}[a-z]{1,15}$/";

			$pattern_phone = "/^[0][6][0-9]{8}$/";

			$pattern_email = "/^[a-zA-Z0-9.!#$%&'*+=?^_`{|}~-]+@[a-zA-Z0-9](?:[a-zA-Z0-9-]{0,61}[a-zA-Z0-9])?(?:\.[a-zA-Z0-9](?:[a-zA-Z0-9-]{0,61}[a-zA-Z0-9])?)*$/";

			$pattern_date = "/^([12]\d{3}-(0[1-9]|1[0-2])-(0[1-9]|[12]\d|3[01]))$/";

			//check of alles okkay is
			if ( ( preg_match( $pattern_username, $_POST[ "username" ] ) ==  1 ) && ( preg_match( $pattern_phone, $_POST[ "phone" ] ) == 1 ) && ( preg_match( $pattern_email, $_POST[ "email" ] ) == 1 ) && ( preg_match( $pattern_date, $_POST[ "birthday" ] ) == 1 ) ) {
				//kijk of de gender valid is
				if ( $_POST[ "gender" ] == "male" || $_POST[ "gender" ] == "female" || $_POST[ "gender" ] == "other" ) {
					//kijk of de checkbox leeg of on is
					if ( $checkbox == null || $checkbox == "true" ) {
						//phone pattern
						//email pattern
						//birthday pattern
						//controleer of de velden geldig zijn ingevuld
						//lees de velden uit het formulier
						
						echo("Tim is een noob");
						$username = $_POST[ "username" ];
						$phone = $_POST[ "phone" ];
						$email = $_POST[ "email" ];
						$birthdate = $_POST[ "birthday" ];
						$checkbox = $_POST[ "checkbox" ];
						$gender = $_POST[ "gender" ];

						echo( $username );
						echo( $phone );
						echo( $email );
						echo( $birthdate );
						echo( $checkbox );
						echo( $gender );
					} else {
						echo( "Checkbox is notchecked" );
					}
				} else {
					echo( "Gender is an invalid type" );
				}
			} else {
				echo( "Preg is wrong" );
				echo( '<pre>' );
				print_r( $_POST );
				echo( '</pre>' );
			}
		} else {
			echo( "Something is missing" );
			echo( '<pre>' );
			print_r( $_POST );
			echo( '</pre>' );
		}

	} else {
		echo( "Referer is wrong" );
		echo($_SERVER[ "HTTP_REFERER" ]);
	}
} else {
	echo( "Token is wrong" );
}

function uuid4(){
	$data = openssl_random_pseudo_bytes (16);
	
	$data[6] = chr(ord($data[6]) & 0x0f | 0x40);
	$data[8] = chr(ord($data[8]) & 0x3f | 0x80);
	
	return vsprintf('%s%s-%s-%s-%s-%s%s%s', str_split(bin2hex($data), 4));
}
?>