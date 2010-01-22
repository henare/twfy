<?php

$this_page = "home";

include_once "../includes/easyparliament/init.php";
include_once "../includes/easyparliament/member.php";

$PAGE->page_start();

$PAGE->stripe_start();

///////////////////////////////////////////////////////////////////////////
//  SEARCH AND RECENT HANSARD

$HANSARDURL = new URL('hansard');
$MPURL = new URL('yourmp');
$PAGE->block_start(array ('id'=>'intro', 'title'=>'At OpenAustralia.org Labs you can:'));
?>

<div>
<h2>
	<a href="/regmem/transcriber">Register of Member's Interests Transcriber</a>
</h2>
<img src="/images/register-rounded.png">

<p>
In the Register of Interests, Representatives and Senators declare information
of financial interests, stocks and shares held, gifts received over a certain
value, and memberships of Clubs and Associations.  
</p><p>
While we now have the register online, the current format isn't searchable or
comparable. This lab provides a tool to transcribe the results from the hand
written forms into a searchable digital format. 
<a href="/regmem/transcriber"><b>Why not help out with the transcription, it's
really easy!</b></a>
</p>
</div>


<?php
$PAGE->block_end();

$PAGE->stripe_end(array());
$PAGE->page_end();

?>
