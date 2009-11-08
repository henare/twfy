<?php
$this_page = "register";

include_once "../../includes/easyparliament/init.php";

if (!$THEUSER->email()) {
	header( 'Location: http://'.DOMAIN.'/user/login/?ret='.urlencode($_SERVER['REQUEST_URI']));
}
	
restore_error_handler();

require 'Date.php';
define('DATE_FMT', "%Y/%m/%d");

?>
