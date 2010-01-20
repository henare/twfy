<xml>
	<register>
		<stamped_date><?php echo @$this->stamped_date; ?></stamped_date>
		<type><?php echo @$this->type; ?></type>
		<surname><?php echo @$this->surname; ?></surname>
		<othernames><?php echo @$this->othernames; ?></othernames>
		<divison><?php echo @$this->divison; ?></divison>
		<state><?php echo @$this->state; ?></state>
<?php
foreach($questions as $question) {
	if (count(@$this->questions[$question->name]) > 0)
		$question->toXML(@$this->questions);
}
?>
		<signed><?php echo @$this->signed; ?></signed>
		<signed_date><?php echo @$this->signed_date; ?></signed_date>
	</register>
</xml>
