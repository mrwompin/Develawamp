<?php 
/**
	* Creates formatted 'cards' that display information about characters from the Office
	* 
	* This class has includes a multi-dimensional array that stores information
	* about the charcters from The Office in each their own array. The data is 
	* recalled when the the user constructs the class which calls function
	* mkCards() and uses a foreach loop to target each character's array
	* separately and then selects for the specific data desired.
	*
	* @return string $html string of 'cards'
 */
class TheOffice
{
public $html;
private $cast = 
	[
		"a1" => array (
			"fName" => "Michael",
			"lName" => "Scott",
			"profession" => "World's Best Boss",
			"bd" => "8/16/1969",
			"aka" => "Steve Carell"
		),
		"a2" => array(
			"fName" => "Pam",
			"lName" => "Beesly",
			"profession" => "Receptionist",
			"bd" => "3/7/1978",
			"aka" => "Jenna Fischer"
		),
		
		"a3" => array(
			"fName" => "Jim",
			"lName" => "Halpert",
			"profession" => "Salesman",
			"bd" => "10/20/1979",
			"aka" => "John Krasinski"
		),
		
		"a4" => array(
			"fName" => "Dwight",
			"lName" => "Schrute",
			"profession" => "Assistant to the Regional Manager",
			"bd" => "1/20/1972",
			"aka" => "Rainn Wilson"
		),
		
		"a5" => array(
			"fName" => "Meredith",
			"lName" => "Palmer",
			"profession" => "Customer Relations Representative",
			"bd" => "4/19/1954",
			"aka" => "Kate Flannery"
		)
];

public function __construct()
{
	$cast = $this->cast;
	$this->html = $this->mkCards($cast);
}

public function mkCards($cast)
{
	$return = "	<section id='office-cast'>\n";
	foreach ($cast as $member) {
		$return .= <<<EOD
		<article class="office-card" name="{$member['lName']}">
			<h3>Dunder Mifflin</h3>
			<p>First: <span id='fName'>{$member['fName']}</span></p>
			<p>Last: <span id='lName'>{$member['lName']}</span></p>
			<p>Position: <span id='profession'>{$member['profession']}</span></p>
			<p>Birthday: <span id='bd'>{$member['bd']}</span></p>
			<p>Actor: <span id='aka'>{$member['aka']}</span></p>
		</article>\n
EOD;
	}
	$return .= "	</section>\n";
	return $return;
}
}

