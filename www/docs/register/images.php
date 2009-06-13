<html>
<body>
<?php

$d = opendir('interests/'.$_GET['who']);

$images = array();
while (($filename = readdir($d)) !== false) { 
	if (substr(strrchr($filename, '.'), 1) != "jpg")
		continue;
	$images[] = $filename;
}

sort($images);

foreach($images as $image) {
?>
<img src="interests/<?php echo $_GET['who']."/".$image ?>" /><br />
<?php } ?>
</body>
<html>
