<?php

$questions[] = new Question("1",
		"Shareholdings in public and private companies (including holding companies indicating the name of the company or companies)",
		array('nameofcompany' => "Name of company - (including bolding and subsidiary companies if applicable)"));
$questions[] = new Question("2-i",
		"Family and business trusts and nominee companies:<br /> (i) in which a benificial interest is held, indicating the name of the trust, the nature of its operations and benificial interest.",
		array('name' => "Name of trust/nominee company",
		      'nature' => "Nature of its operation",
		      'beneficial' => "Benefical interest"));
$questions[] = new Question("2-ii",
		"Family and business trusts and nominee companies:<br /> (ii) in which the Member, the Member's spouse, or a child who is wholly or mainly dependent on the Member for support, is a trustee (but not including a trustee of an estate where no beneficial interest is held by the Member, the Member's spouse or dependent children), indicating the name of the trust, the nature of its operation and the beneficiary of the trust.",
		array('name' => "Name of trust/nominee company",
	              'nature' => "Nature of its operation",
		      'beneficial' => "Benefical interest"));
$questions[] = new Question("3",
		"Real estate, including the location (suburb or area only) and the purpose for which it is owned",
		array("location" => "Location",
		      "purpose" => "Purpose for which owned"));
$questions[] = new Question("4",
		"Registered directorships of companies",
		array("name" => "Name of company",
		      "purpose" => "Purpose for which owned"));
$questions[] = new Question("5",
		"Partnerships indicating the nature of the interests and the activities of the partnership",
		array("name" => "Name",
		      "nature" => "Nature of interests",
		      "activities" => "Activities of partnership"));
$questions[] = new Question("6",
		"Liabilities indicating the nature of the liability and the creditor concerned.",
		array("nature" => "Nature of liability",
			"creditor" => "Creditor"));
$questions[] = new Question("7",
		"The nature of any bonds, debentures and like investments.",
		array("type" => "Type of investment",
			"body" => "Body in which investment is held"));
$questions[] = new Question("8",
		"Saving or investment accounts, indicating their natuer and the name of the bank or other institution concerned",
		array("account" => "Name of account",
			"institution" => "Name of bank/institution"));
$questions[] = new Question("9",
		"The nature of any other assets (excluding household and personal effects) each valued at over $7500",
		array("name" => "Name of any other assets"));
$questions[] = new Question("10",
		"The nature of any other substantial sources of income",
		array("nature" => "Nature of income"));
$questions[] = new Question("11",
		"Gifts valued at more than $750 received from official sources or at more than $300 where received from other than official sources provided that a gift received by a membr, the member's spouse or dependent children from family members or personal friends in a purely personal capacity need not be registered unless the member judges that an appearence of conflict of interest may be seen to exist",
		array("details" => "Details"));
$questions[] = new Question("12",
		"Any sponsored travel or hospitality received where the value of the sponsored travel or hospitality exceeds $300",
		array("details" => "Details of travel/hospitality"));
$questions[] = new Question("13",
		"Membership of any organisation where a conflict of interest with a member's public duties could foreseeably arise or be seen to arise",
		array("details" => "Details of travel/hospitality"));
$questions[] = new Question("14",
		"Any other interests where a conflict of interst with a member's public duties could forseeably arise or be seen to arise.",
		array("nature" => "Nature of interest"));


