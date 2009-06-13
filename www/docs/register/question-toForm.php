<br>
<br>
<table>
	<tr>
		<td><h2><?php echo $this->name ?></h2></td>
		<td><?php echo $this->description ?></h2></td>
	</tr>
<?php foreach($this->persons as $person => $person_desc) { ?>
	<tr>
		<td colspan="2">
			<table>
				<tr>
					<td><h3><?php echo $person_desc; ?></h3></td>
<?php	foreach($this->fields as $field_name => $field_desc) { ?>
					<td><h4><?php echo $field_desc ?></h4></td>
<?php	} ?>
				</tr><tr>

<?php
	$question_responses = $responses[$this->name][$person];
	for($i = 0; $i <= count($question_responses); $i++) { 
		$row = @$question_responses[$i];
?>
				</tr><tr>
					<td><?php echo $i+1 ?>.</td>
<?php		foreach($this->fields as $field_name => $field_desc) { ?>
					<td><input type="text" name="questions[<?php echo $this->name; ?>][<?php echo $person; ?>][<?php echo $i ?>][<?php echo $field_name;?>]"
<?php 				if (end($this->fields) == $field_desc and $i == count($question_responses)) { ?>
						onKeyPress="return addRowOnEnter(event, this.parentNode.parentNode)"
<?php 				} else { ?>
						onKeyPress="return noSubmit(event)"
<?php				} ?>
						value="<?php echo htmlentities($row[$field_name]); ?>">
					</td>
<?php			} ?>
<?php 		} ?>
				</tr>
			</table>
		</td>
	</tr>
<?php } ?>
</table>
