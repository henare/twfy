<html>
<style>
	iframe {
		height: 100%;
		width: 49.5%;
		padding: 0;
		margin: 0;
		border: 1px solid black;
	}
</style>
<body>

<form>
<div id="header">
	<h2>Register of interests for <?php echo $_GET['who'] ?></h2>
</div>

<iframe id="images" src="images.php?who=<?php echo $_GET['who'] ?>">
</iframe>

<iframe id="transcription" src="register.php?who=<?php echo $_GET['who'] ?>">
</iframe>

</body>
</html>
