
<html>
<body>

<ul>

<?php
$people = array();

$d1 = opendir('interests');
while (($outerdir = readdir($d1)) !== false) {
	$d2 = opendir("interests/$outerdir");

	while (($innerdir = readdir($d2)) !== false) {
		if (file_exists("interests/$outerdir/$innerdir/register.xml")) {
			$people[] = "$outerdir/$innerdir";
		}
	}
}

sort($people);

foreach($people as $fullname) {
?>
	<li><a href="top.php?who=<?php echo $fullname ?>"><?php echo $fullname ?></a></li>
<?php } ?>
</ul>

</body>
</html>
