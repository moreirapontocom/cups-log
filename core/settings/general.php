<?php
error_reporting(E_ALL);
ini_set('display_errors', -1);

// Defines
if ( $_SERVER['HTTP_HOST'] == 'localhostaaaa' ) {
	$include = $_SESSION['DOCUMENT_ROOT'] = 'D:\\Wamp\\www\\cupslog';
	$general_settings_file = $include.'\\core\\settings\\general.php';
} else {
	$include = $_SESSION['DOCUMENT_ROOT'] = '/var/www/cupslog';
	$general_settings_file = $include.'/core/settings/general.php';
}

if ( !defined('DOCUMENT_ROOT') || !defined('GENERAL_SETTINGS_FILE') ) {
	define('DOCUMENT_ROOT', $include);
	define('GENERAL_SETTINGS_FILE', $general_settings_file);
} 

// DB
include_once(DOCUMENT_ROOT.'/core/library/adodb/adodb.inc.php');

$db = ADONewConnection("mysql");
$db->debug = false;
$ADODB_CACHE_DIR = $_SERVER['DOCUMENT_ROOT'].'/cache';
$db->cacheSecs = 3600 * 24; // cache 24 hours

if ( $_SERVER['HTTP_HOST'] == 'localhost' ) {
	$db->Connect("localhost","root","","cupslog");
	$link = 'http://'.$_SERVER['HTTP_HOST'].'/';
} else {
	$db->Connect("localhost","root","","cupslog");
	$link = 'http://'.$_SERVER['HTTP_HOST'].'/cupslog/';
}

$db->Execute("set names 'utf8'");



$linkcache		= $link.'cache/';
$linkcontent	= $link.'content/';
$linkclasses	= $link.'core/classes/';
$linklibrary	= $link.'core/library/';
$linksettings	= $link.'core/settings/';
$linkcss		= $link.'css/';
$linkimg		= $link.'img/';
$linkjs			= $link.'js/';
$linkscripts	= $link.'scripts/';
$linkattachments= $link.'attachments/';

// SMARTY
include_once(DOCUMENT_ROOT.'/core/library/smarty/Smarty.class.php');
$smarty = new Smarty();

$smarty->template_dir	= DOCUMENT_ROOT.'/templates/';
$smarty->compile_dir	= DOCUMENT_ROOT.'/cache/';
$smarty->config_dir		= DOCUMENT_ROOT.'/core/settings/';
$smarty->cache_dir		= DOCUMENT_ROOT.'/cache/';


// REWRITE and SMARTY ABSOLUTE URLs
(isset($_GET['page']))			? $page			= $_GET['page']			: $page			= 'home';
(isset($_GET['subpage']))		? $subpage		= $_GET['subpage']		: $subpage		= '';
(isset($_GET['subsubpage']))	? $subsubpage	= $_GET['subsubpage']	: $subsubpage	= '';

$smarty->assign('page',$page);
$smarty->assign('subpage',$subpage);
$smarty->assign('subsubpage',$subsubpage);

$smarty->assign('link',			$link);
$smarty->assign('linkcache',	$link.'cache/');
$smarty->assign('linkcontent',	$link.'content/');
$smarty->assign('linkclasses',	$link.'core/classes/');
$smarty->assign('linklibrary',	$link.'core/library/');
$smarty->assign('linksettings',	$link.'core/settings/');
$smarty->assign('linkcss',		$link.'css/');
$smarty->assign('linkimg',		$link.'img/');
$smarty->assign('linkjs',		$link.'js/');
$smarty->assign('linkscripts',	$link.'scripts/');
$smarty->assign('linkattachments',	$link.'attachments/');
?>