<xml>
	<register>
		<type><?php echo $this->type; ?></type>
		<surname><?php echo $this->surname; ?></surname>
		<othernames><?php echo $this->othernames; ?></othernames>
		<divison><?php echo $this->divison; ?></divison>
		<state><?php echo $this->state; ?></state>
<?php
foreach($questions as $question) {
	if (count($this->questions[$question->name]) > 0)
		$question->toXML($this->questions);
}
?>
	</register>
</xml>
