<?php
session_start();

include_once('core/settings/general.php'); // Settings

$smarty->assign('current_year', date("Y"));
$smarty->assign('date_today', date("d/m/Y"));

// 1 - Success | 2 - Warning | 3 - Error
if ( isset($_SESSION['warning']) && $_SESSION['warning'][0] == 1 ) { $smarty->assign('warning',1); $smarty->assign('warning_type',$_SESSION['warning'][1]); $smarty->assign('warning_message',$_SESSION['warning'][2]); $_SESSION['warning'][0] = 0; } else $smarty->assign('warning');

$array_pages = array('home');

if ( in_array($page, $array_pages) && $subpage == '' ) {
	include('content/'.$page.'.php');
	$main_page_content = $page.'.html';

} elseif ( in_array($page, $array_pages) && $subpage != '' ) {
	include('content/'.$page.'.php');
	$main_page_content = $page.'.html';

}

$smarty->assign('main_page_content',$main_page_content);
$smarty->display('index.html');
?>