<?php //namespace mod\StateDropDown

/**
	 * Dropdown module - states
	 * 
	 * Returns the contents of the $stateAbbr array
	 * as an html select element using the public function
	 * getHtml which loop through the array and constructs an
	 * option element for each key=>value pair.
 */
class StateDropDown
{
	
	private $html;
	private $stateAbbr = 
	[
		"AL"=>"Alabama",
		"AZ"=>"Arizona",
		"AR"=>"Arkansas",
		"CA"=>"California",
		"CO"=>"Colorado",
		"CT"=>"Connecticut",
		"DC"=>"D.C.",
		"DE"=>"Delaware",
		"FL"=>"Florida",
		"GA"=>"Georgia",
		"HI"=>"Hawaii",
		"ID"=>"Idaho",
		"IL"=>"Illinois",
		"IN"=>"Indianna",
		"IA"=>"Iowa",
		"KS"=>"Kansas",
		"KY"=>"Kentucky",
		"LA"=>"Louisianna",
		"ME"=>"Maine",
		"MD"=>"Maryland",
		"MA"=>"Massachusettes",
		"MI"=>"Michigan",
		"MN"=>"Minnesota",
		"MO"=>"Missouri",
		"MT"=>"Montana",
		"NE"=>"Nevada",
		"NH"=>"New Hampshire",
		"NJ"=>"New Jersey",
		"NM"=>"New Mexico",
		"NY"=>"New York",
		"NC"=>"North Carolina",
		"ND"=>"North Dakota",
		"OH"=>"Ohio",
		"OK"=>"Oklahoma",
		"OR"=>"Oregon",
		"PA"=>"Pennsylvania",
		"RI"=>"Rhode Island",
		"SC"=>"South Carolina",
		"SD"=>"South Dakota",
		"TN"=>"Tennesee",
		"TX"=>"Texas",
		"UT"=>"Utah",
		"VT"=>"Vermont",
		"VA"=>"Virgina",
		"WA"=>"Washington",
		"WV"=>"West Virginia",
		"WI"=>"Wisconsin",
		"WY"=>"Wyoming"
	];

	public function __invoke()
	{
		 $this->getHtml();
		 return $this->html;
	}

	private function getHtml() //CONSTRUCTS HTML SELECT ELEMENT AND POPULATES OPTIONS ELEMENTS 
	{
		
		$this->html .= "	<select id='state'>";
		foreach($this->stateAbbr as $abbr=>$state) {
			$this->html .= '		<option value="' . $abbr . '">'. $state . "</option>\n";
		}
		$this->html .= "	</select>";
	
	}
}


