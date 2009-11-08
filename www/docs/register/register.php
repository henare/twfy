<?php

include_once 'common.php';

class Question {
	var $persons = array("self" => "Self", "spouse" => "Spouse", "children" => "Dependent Children");
	var $name;
	var $description;
	var $fields;

	function Question($name, $description, $fields) {
		$this->name = $name;
		$this->description = $description;
		$this->fields = $fields;
	}

	//
	// Convert the question values into an XML.
	//
	function toXML($responses) {
		include "question-toXML.php";
	}

	//
	// Convert the question values into a HTML form.
	//
	function toForm($responses) {
		include "question-toForm.php";
	}

	//
	// Remove any empty values from the responses.
	//
	function cleanup(&$responses) {
		foreach($this->persons as $person => $person_desc) {
			$question_responses = $responses[$this->name][$person];
			$question_responses_new = array();

			while(count($question_responses) > 0) {
				$row = array_shift($question_responses);

				foreach($this->fields as $field_name => $field_desc) {
					if (strlen(trim($row[$field_name])) == 0)
						unset($row[$field_name]);
				}
				
				if (count($row) > 0)
					$question_responses_new[] = $row;
			}

			if (count($question_responses_new) > 0)
				$responses[$this->name][$person] = $question_responses_new;
			else
				unset($responses[$this->name][$person]);
		}

		if (count($responses[$this->name]) == 0)
			unset($responses[$this->name]);
	} 


	//
	// Remove any empty values from the responses.
	//
	function from_xml(&$xml, &$output) {
		$name = $this->name;

		$xml_question = $xml->xpath("//question[@name='$name']");
		if (count($xml_question) != 1)
			return;

		$output[$name] = array();
		foreach($this->persons as $person => $person_desc) {
			if (!isset($xml_question[0]->$person))
				continue;

			$output[$name][$person] = array();
			foreach($xml_question[0]->$person->row as $row) {
				$row_output = array();
				foreach($this->fields as $field_name => $field_desc)
					$row_output[$field_name] = (String)$row->$field_name;

				$output[$name][$person][] = $row_output;
			}
		}
	} 

}

/* The questions are imported from another file. */
$questions = array();
include "questions.php";

$states = array("NSW", "QLD", "VIC", "WA", "SA", "TAS", "NT", "ACT");

class Register {
	var $stamped_date;
	var $type;
	var $surname;
	var $othernames;
	var $divison;
	var $state;
	var $signed;
	var $signed_date;	

	static function from_post($topopulate) {
		global $states, $questions;
		$r = new Register();

		$r->stamped_date = $topopulate['stamped_date'];

		if (@$topopulate['type'] == "new" or @$topopulate['type'] == "continue") 
			$r->type = $topopulate['type'];

		$r->surname = $topopulate['surname'];
		$r->othernames = $topopulate['othernames'];
		$r->divison = $topopulate['divison'];

		if (in_array($topopulate['state'], $states))
			$r->state = $topopulate['state'];

		foreach($questions as $question)
			$question->cleanup($topopulate['questions']);

		$r->questions = $topopulate['questions'];

		if (@$topopulate['signed'] == "yes" or @$topopulate['signed'] == "no")
			$r->signed = $topopulate['signed'];

		$r->signed_date = $topopulate['signed_date'];

		return $r;
	}

	static function from_xml(&$xml) {
		global $states, $questions;
		$r = new Register();

		$r->stamped_date = $xml->stamped_date;

		if ($xml->type == "new" or $xml->type == "continue") 
			$r->type = (String)$xml->type;
		
		$r->surname = (String)$xml->surname;
		$r->othernames = (String)$xml->othernames;
		$r->divison = (String)$xml->divison;

		if (in_array($xml->state, $states))
			$r->state = (String)$xml->state;
	
		$r->questions = array();
		foreach($questions as $question)
			$question->from_xml($xml, $r->questions);

		if ($xml->signed == "yes" or $xml->signed == "no")
			$r->signed = $xml->signed;

		$r->signed_date = $xml->signed_date;
		return $r;
	}

	function toForm() {
		global $questions;
		include "register-toForm.php";
	}

	function toXML() {
		global $questions;
		ob_start();
		include "register-toXML.php";
		$result = ob_get_contents();
		ob_end_clean();
		return $result;
	}
}

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
 	<title>Register of Interests Transcriber</title>
	<meta http-equiv="content-type" content="text/html; charset=UTF-8" />
	<style>
table {
	width: 100%;
}

input {
	width: 98%;
}

td {
	border: 1px solid blue;
	text-align: center;
}

textarea {
	width: 100%;
	height: 500px;
}

	</style>
	<script type="text/javascript">

function rows(row) {
	return row.getElementsByTagName('tr');
}

function cells(row) {
	return row.getElementsByTagName('td');
}

function inputs(row) {
	return row.getElementsByTagName('input');
}

function addRowOnEnter(event, row) {
	if (event && event.keyCode == 13) {
		var table = row.parentNode;

		var tablerows = rows(table);
		var lastnode = tablerows[tablerows.length-1];

		var newnode = lastnode.cloneNode(true);
	
		// Get the index of the old value	
		var i = parseInt(cells(lastnode)[0].textContent)+1;

		cells(newnode)[0].innerHTML = i+".";

		var input = inputs(lastnode);
		input[input.length-1].onkeyup = null;

		lastnode.parentNode.appendChild(newnode);

		var newinputs = inputs(rows(table)[tablerows.length-1]);
		newinputs[0].focus();
		for(var j = 0; j < newinputs.length; j++) {
			newinputs[j].value = "";
			newinputs[j].name = newinputs[j].name.replace('['+(i-2)+']','['+(i-1)+']');
			newinputs[j].innerHtml = "";
		}
		return false;
	}
	return true;
}

function noSubmit(event) {
	return (event && event.keyCode != 13);
}

	</script>
</head>
<body>

<?php
	// FIXME: Security bug - should check filename matches a given pattern
	$who = "interests/".$_GET['who']."/register.xml";
	if (!file_exists($who)) {
		die("Don't know about that person! $who");
	}

	try {
		if (isset($_POST['save'])) {
			// Process the data from the form.
			$register = Register::from_post($_POST);
			
			// Grab a lock
			$lock = fopen("interests/lock", 'w+');
			while (!flock($lock, LOCK_EX))
				sleep(0.1);

			// Write out the file
			$f = fopen($who, "w"); 
			fwrite($f, $register->toXML());
			fclose($f);

			if ($THEUSER->emailpublic()) {
				$author = $THEUSER->firstname()." ".$THEUSER->lastname()." <".$THEUSER->email().">";
			} else {
				$username = preg_split('/[@]/', $THEUSER->email());
				$author = $THEUSER->firstname()." ".$THEUSER->lastname()." <".$username[0]."@hidden>";
			}

			$file = substr($who, strlen("interests/"));
		
			// Change the directory
			chdir("interests");
	
			// Do the git commit

			$safe_file = escapeshellarg($file);
			$safe_message = escapeshellarg("Update $who");
			$safe_author = escapeshellarg($author);

			$gitvalue = false;
			$gitoutput = array();
			$handle = exec("git commit $file -m $safe_message --author $safe_author", &$gitoutput, &$gitvalue);

			switch($gitvalue) {
			case 0:
				echo "<div>Changes saved.</div>\n";
				break;

			case 1:
				echo "<div>No changes made.</div>\n";
				break;
			default:
				;
			}

			// Release the lock
			fclose($lock);

		} else {
			$xml = @simplexml_load_file($who);
			if (isset($xml->register))
				$register = Register::from_xml($xml->register);
			else
				$register = new Register();
		}
	} catch (Exception $e) {
		$register = new Register();
	}
	$register->toForm(); ?>

</body>
</html>
