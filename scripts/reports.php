<?php if ( !isset($_SESSION) ) session_start();

if ( isset($_POST['printer']) && !empty($_POST['printer']) )
	$printer = $_POST['printer'];
else $printer = '*';

if ( isset($_POST['user']) && !empty($_POST['user']) )
	$user = $_POST['user'];
else $user = '*';

if ( isset($_POST['date_from']) && !empty($_POST['date_from']) )
	$date_from = $_POST['date_from'];
else $date_from = '01/01/2000';

if ( isset($_POST['date_to']) && !empty($_POST['date_to']) )
	$date_to = $_POST['date_to'];
else $date_to = date("d/m/Y");

$date_from_day = substr($date_from, 0, 2);
$date_from_month = substr($date_from, 3, 2);
$date_from_year = substr($date_from, 6, 4);
$date_from = $date_from_year.'-'.$date_from_month.'-'.$date_from_day.' 23:59:59';

$date_to_day = substr($date_to, 0, 2);
$date_to_month = substr($date_to, 3, 2);
$date_to_year = substr($date_to, 6, 4);
$date_to = $date_to_year.'-'.$date_to_month.'-'.$date_to_day.' 23:59:59';

if ( !empty($printer) && !empty($user) && !empty($date_from) && !empty($date_to) ) {

	include_once('../core/settings/general.php');
	include_once(DOCUMENT_ROOT.'/core/classes/logs.php');

	$report = new Logs();
	$report->printer = $printer;
	$report->user = $user;
	$report->date_from = $date_from;
	$report->date_to = $date_to;
	$result = $report->report();

	$_SESSION['results'] = $result;
	header('Location:'.$_SERVER['HTTP_REFERER']);

} else
	header('Location:'.$_SERVER['HTTP_REFERER']);
?>