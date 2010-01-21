		<question name="<?php echo $this->name ?>">
<?php 
foreach($this->persons as $person => $person_desc) {
	$question_responses = @$responses[$this->name][$person];
	if (count($question_responses) == 0)
		continue;
?>
			<<?php echo $person; ?>>
<?php	for($i = 0; $i < count($question_responses); $i++) { 
		$row = @$question_responses[$i]; ?>
				<row>
<?php		foreach($this->fields as $field_name => $field_desc) { 
			if (strlen(trim(@$row[$field_name])) == 0)
				continue;
?>
					<<?php echo $field_name ?>><?php echo htmlentities(@$row[$field_name]) ?></<?php echo $field_name ?>>
<?php 		} ?>
				</row>
<?php 	} ?>
			</<?php echo $person; ?>>
<?php } ?>
		</question>
