<?php

function verifyAlphaNum ($testString) {
	return preg_match("/^([[:alnum:]]|-|\.| |')+$/", $testString);
}

function verifyEmail ($testString) {
	return filter_var($testString, FILTER_VALIDATE_EMAIL);
}

function verifyNumeric ($testString) {
	return is_numeric ($testString);
}

function verifyPhone ($testString) {
	// Check for usa phone number http://www.php.net/manual/en/function.preg-match.php
	$regex = '/^(?:1(?:[. -])?)?(?:\((?=\d{3}\)))?([2-9]\d{2})(?:(?<=\(\d{3})\))? ?(?:(?<=\d{3})[.-])?([2-9]\d{2})[. -]?(\d{4})(?: (?i:ext)\.? ?(\d{1,5}))?$/';
	return preg_match($regex, $testString);
}

?>
