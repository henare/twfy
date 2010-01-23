<?php

$this_page = "transcribe";

include_once "../../../includes/easyparliament/init.php";
include_once INCLUDESPATH."easyparliament/member.php";

$PAGE->page_start();

$PAGE->stripe_start();
$PAGE->block_start(array(
	'id'=> 'transcriber', 
	'title'=>'Transcriber the register for:'));

?>
<ul>

<?php
$people = array();

if (file_exists('interests')) {
	// Search the interests directory for a person. The format looks like 
	// ./interests/(members|senators)/(?name)/(?files)
	$d1 = opendir('interests');

	// Loop over the members/senators/etc directories
	while (($outerdir = readdir($d1)) !== false) {

		$d2 = "interests/$outerdir";

		// Make sure it's a directory, IE not the lock file.
		if (! is_dir($d2))
			continue;

		// Loop over person names
		$d2 = opendir($d2);
		while (($innerdir = readdir($d2)) !== false) {
			if (file_exists("interests/$outerdir/$innerdir/register.xml")) {
				$people[] = "$outerdir/$innerdir";
			}
		}
	}
} else {
	echo 'Error: Unable to find the members interests repository.';
}

sort($people);

foreach($people as $fullname) {

	$parts = explode('/', $fullname);
	$realname =  str_replace('_', ' ', $parts[1]);

/*      // Show a table which gives more information about the member of parliment
	$person = new MEMBER(array('name'=> $realname));
	if (!$person->valid())
		continue;
*/

?>
	<li><a href="top.php?who=<?php echo $fullname ?>#frames"><?php echo $realname ?></a></li>
<?php } ?>
<?php
$PAGE->block_end();

$includes = array(
	array (
		'type' => 'include',
		'content' => 'whatisthissite'
	),
);
$PAGE->stripe_end($includes);

$PAGE->page_end();
?>
