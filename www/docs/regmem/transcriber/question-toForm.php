<br>
<br>
<table>
	<tr>
		<td><h2><?php echo $this->name ?></h2></td>
		<td><?php echo $this->description ?></h2></td>
	</tr>
<?php 
$fields = count($this->fields);

foreach($this->persons as $person => $person_desc) { ?>
	<tr>
		<td colspan="2">
			<table>
<?php 	if ($fields == 1) { ?>
				<tr class="skip">
					<td colspan=<?php echo $fields; ?>><h3><?php echo $person_desc; ?></h3></td>
<?php		foreach($this->fields as $field_name => $field_desc) { ?>
					<td><h4><?php echo $field_desc ?></h4></td>
<?php		} ?>
<?php 	} else { 
?>
				<tr class="skip">
					<td></td>
					<td colspan=<?php echo $fields; ?>><h3><?php echo $person_desc; ?></h3></td>
				</tr>
				<tr class="skip">	
					<td></td>
<?php		foreach($this->fields as $field_name => $field_desc) { ?>
					<td><h4><?php echo $field_desc ?></h4></td>
<?php		}
	}
?>
					<td></td>
				</tr>
				<tr class="skip">

<?php
	$question_responses = @$responses[$this->name][$person];
	for($i = 0; $i <= count($question_responses); $i++) { 
		$row = @$question_responses[$i];
?>
				</tr><tr>
					<td class="number<?php echo ($fields > 1 ? '-single' : '-multi'); ?>"><?php echo $i+1 ?>.</td>
<?php		foreach($this->fields as $field_name => $field_desc) { ?>
					<td><input type="text" name="questions[<?php echo $this->name; ?>][<?php echo $person; ?>][<?php echo $i ?>][<?php echo $field_name;?>]"
<?php 				if (end($this->fields) == $field_desc and $i == count($question_responses)) { ?>
						onKeyPress="return addRowOnEnter(event, this, <?php echo $i ?>)"
<?php 				} else { ?>
						onKeyPress="return addRowOnEnter(event, this, <?php echo $i ?>)"
<?php				} ?>
						value="<?php echo htmlentities(@$row[$field_name]); ?>">
					</td>
<?php			} ?>
					<td class="add">
						<img src="add.png" onMouseDown="addRow(this, <?php echo $i ?>);">
					</td>
<?php 		} ?>
				</tr>
			</table>
		</td>
	</tr>
<?php } ?>
</table>
