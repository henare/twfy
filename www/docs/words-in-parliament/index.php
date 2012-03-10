<?php

$this_page = "words-in-parliament";

include_once "../../includes/easyparliament/init.php";

$PAGE->page_start();

?>
<style type="text/css">
	html, body, div#content, div#container {
		height: 95%;
	}
	iframe {
		height: 100%;
		width: 100%;
		padding: 0;
		margin: 0;
		border: 1px solid black;
		/* Make the border included in size. */
		-moz-box-sizing: border-box;
		-webkit-box-sizing: border-box;
		-ms-box-sizing: border-box;
		box-sizing: border-box;
	}
</style>

<a name="frames">
<iframe id="words-in-parliament" src="http://words-in-parliament.heroku.com/">
</iframe>

<?php $PAGE->page_end(); ?>
