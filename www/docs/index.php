<?php

$this_page = "home";

include_once "../includes/easyparliament/init.php";
include_once "../includes/easyparliament/member.php";

$PAGE->page_start();

$PAGE->stripe_start();
$message = $PAGE->recess_message();
if ($message != '') {
	print '<p id="warning">' . $message . '</p>';
}

///////////////////////////////////////////////////////////////////////////
//  SEARCH AND RECENT HANSARD

$HANSARDURL = new URL('hansard');
$MPURL = new URL('yourmp');
$PAGE->block_start(array ('id'=>'intro', 'title'=>'At OpenAustralia.org Labs you can:'));
?>
						<ol>
						</ol>
<?php
$PAGE->block_end();

$PAGE->stripe_end(array());
$PAGE->page_end();

?>
