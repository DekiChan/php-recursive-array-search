<?php

$t_array = [
	'key1' => [
		'skey1' => 'val1',
		'skey2' => 'val2',
		'skey3' => [
			'sskey1' => 'val5',
			'sskey2' => 'val6',
			'sskey3' => [
				'ssskey1' => 'val7',
				'ssskey2' => 'val8'
			]
		]
	],
	'key2' => 'val4'
];

echo getValueOf($t_array, 'key2') . '<br />';
echo getValueOf($t_array, 'skey2') . '<br />';
echo getValueOf($t_array, 'sskey2') . '<br />';
echo getValueOf($t_array, 'ssskey2') . '<br />';


function getValueOf ($arr, $key) {
	$val = findValue($arr, $key);

	if ($val) return $val;

	$val = null;

	// not in first level, check others
	foreach ($arr as $a_key => $a_value) {
		if (is_array($a_value)) {
			$val = getValueOf($a_value, $key);
			if ($val) return $val;
		}
	}

	// if key is present anywhere in array, this point will never be reached
	return false;
}


function findValue ($element, $key) {
	$keys = array_keys($element);
	$found = array_search($key, $keys);

	if ($found) {
		return $element[$key];
	}

	return false;
}

?>
