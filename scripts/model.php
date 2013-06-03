<?php
session_start();

if ( isset($_POST['email']) && !empty($_POST['email']) ) {
	$email = $_POST['email'];
	
	include_once('../core/settings/general.php');
	include_once(DOCUMENT_ROOT.'/core/classes/pre_sign.php');
	$sign = new PreSign();
	$sign->pre_sign_email = $email;
	$sign->pre_sign_session = session_id();
	$sign->pre_sign_ip = $_SERVER['REMOTE_ADDR'];
	$action = $sign->pre_sign();
	if ( $action )
		echo $action;
	else
		echo 0;

} else
	echo 1;
?>