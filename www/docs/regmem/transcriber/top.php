<?php include_once 'common.php'; ?>
<?php $PAGE->page_start(); ?>

<style type="text/css">
	body, html, div#container, div#content {
		height: 100%;
	}

	iframe {
		height: 100%;
		width: 49.5%;
		padding: 0;
		margin: 0;
		border: 1px solid black;
	}
</style>

<a name="frames">
<iframe id="images" src="images.php?who=<?php echo $_GET['who'] ?>">
</iframe>

<iframe id="transcription" src="register.php?who=<?php echo $_GET['who'] ?>">
</iframe>

<?php $PAGE->page_end(); ?>
