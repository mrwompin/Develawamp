<?php
require "select_states.php";
//use mod\StateDropDown\StateDropDown


class AddressForm
{

	public function __invoke()
	{
		$states = new StateDropDown;
		$selectBox = $states();
		echo <<<EOD
	<div class="AddressForm">
		<h3>Address form</h3>
		<form>
			<label for="address">Address</label>
			<input type="text" id="address" placeholder="123 example st">
			<label for="city">City</label>
			<input type="text" id="city" placeholder="St. Examplesberg">
			<label for="state">State</label>
			
				$selectBox
		
			<label for="zip">Zip</label>
			<input type="text" id="zip" pattern="[0-9]{5}" placeholder="12345">
			<input type="submit" value="Submit">
		</form>
	</div>
EOD;
	}
}
?>
