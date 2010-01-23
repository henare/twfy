<form method="post" action="?who=<?php echo $_GET['who'] ?>">

<h2>Register of Members' Interests</h2>
<h3>Statement of Registrable Interests</h3>

<input type="submit" name="save" value="save">  

<p>
	<input type="radio" name="type" <?php if($this->type == "continue") echo "checked";?> value="continue">At dissolution (continuing members)<br />
  	<input type="radio" name="type" <?php if($this->type == "new") echo "checked";?> value="new">At date of election (newly elected members)
</p>


<p>Notes ...</p>

<table>
	<tr>
		<td>Stamped Date</td>
		<td><input type="text" name="stamped_date" value="<?php echo $this->stamped_date; ?>"
			onKeyPress="return noSubmit(event)"></td>
	</tr><tr>
		<td>Surname:</td>
		<td><input type="text" name="surname" value="<?php echo $this->surname ?>"
			onKeyPress="return noSubmit(event)"></td>
	</tr><tr>
		<td>Other names:</td>
		<td><input type="text" name="othernames" value="<?php echo $this->othernames ?>"
			onKeyPress="return noSubmit(event)"></td>
	</tr><tr>
		<td>Electoral divison:</td>
		<td><input type="text" name="divison" value="<?php echo $this->divison ?>"
			onKeyPress="return noSubmit(event)"></td>
	</tr><tr>
		<td>State:</td>
		<td>
			<select name="state">
				<option<?php if($this->state == "NSW") echo " selected";?>>NSW</option>
				<option<?php if($this->state == "QLD") echo " selected";?>>QLD</option>
				<option<?php if($this->state == "VIC") echo " selected";?>>VIC</option>
				<option<?php if($this->state == "WA") echo " selected";?>>WA</option>
				<option<?php if($this->state == "SA") echo " selected";?>>SA</option>
				<option<?php if($this->state == "TAS") echo " selected";?>>TAS</option>
				<option<?php if($this->state == "NT") echo " selected";?>>NT</option>
				<option<?php if($this->state == "ACT") echo " selected";?>>ACT</option>
			</select>
		</td>
	</tr>
</table>

<?php
foreach($questions as $question) {
	$question->toForm(@$this->questions);
}
?>

<table>
	<tr>
		<td>Signed:</td>
		<td>
			<input type="radio" name="signed" <?php if($this->type == "continue") echo "checked";?> value="yes">Yes<br />
			<input type="radio" name="signed" <?php if($this->type == "new") echo "checked";?> value="no">No
		</td>
	</tr><tr>
		<td>Signed Date</td>
		<td><input type="text" name="signed_date" value="<?php echo $this->signed_date; ?>"
			onKeyPress="return noSubmit(event)"></td>
	</tr>
</table>

<input type="submit" name="save" value="save">  

</form>
