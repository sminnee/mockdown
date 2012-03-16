<?php

require_once(dirname(dirname(__FILE__)) . '/Mockdown.php');

class MockdownTest extends PHPUnit_Framework_TestCase {
	function testRadioButtons() {
		$m = new Mockdown;
		
		$rendered = $m->render("Select something else:\n\n" .
			"( ) One\n" .
			"(o) Two\n" .
			"( ) Three");
		$this->assertEquals("<pre class=\"mockdown\">Select something else:\n\n" .
			"<input type=\"radio\" value=\"foo\" > One\n" .
			"<input type=\"radio\" value=\"foo\" checked=\"checked\"> Two\n" .
			"<input type=\"radio\" value=\"foo\" > Three</pre>", $rendered);
	}
}