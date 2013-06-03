<?php
$meta_title = 'Home';
$page_title = 'Home';


//print_r($_SESSION);


//include_once('../core/settings/general.php');
include_once(DOCUMENT_ROOT.'/core/classes/logs.php');

$list_logs = new Logs();
$list = $list_logs->get_log();

if ( !isset($_SESSION['results']) ) {
	$smarty->assign('logs', $list);
	$smarty->assign('reports');
} else {
	$smarty->assign('logs', $_SESSION['results']);
	$smarty->assign('reports',1);
}



$printers = new Logs();
$list_printers = $printers->get_printers();
$smarty->assign('printers', $list_printers);



$users = new Logs();
$list_users = $users->get_users();
$smarty->assign('users', $list_users);

$count_users = count($list_users);
$users_list = '';
for ( $i=0;$i<$count_users;$i++ ) {
	$users_list .= '"'.$list_users[$i]['usuario'].'",';
}

$users_list = trim($users_list, ',');

$smarty->assign('users_list',$users_list);

/*
echo '<pre>';
print_r($users_list);
echo '</pre>';
*/
?>