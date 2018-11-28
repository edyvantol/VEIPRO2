<?php
//require_once( 'ini_set.php' );
require_once( 'Security.php' );
$Security = new Security();
$Security->StartASession();

if ( $Security->TokenControle() == true ) {
	if ( $Security->RefererControl("https://80751.ict-lab.nl/VEIPRO2/opdracht1_form.php") == true ) {
		echo("Alles ging goed");	
	}
	else{
		exit();
	}
}
else{
	exit();
}

?>