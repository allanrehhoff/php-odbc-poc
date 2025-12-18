<?php
require 'include/functions.php';

$filepath = realpath(__DIR__ . '/resources/file_example_XLS_10.xls');

// DSN-less connection string for the ACE Excel driver
$dsn = "Driver={Microsoft Excel Driver (*.xls, *.xlsx, *.xlsm, *.xlsb)};Dbq=$filepath;Readonly=0;";

$conn = odbc_connect($dsn, '', '') or die;

$sql = "SELECT
			`First Name`,
			`Last Name`,
			`Gender`,
			`Country`,
			`Age`,
			`Date`
		FROM [Sheet1$]";

$result = odbc_exec($conn, $sql) or die;

$rows = [];
while ($row = odbc_fetch_array($result)) {
	if(empty(array_filter($row))) continue; // Skips empty rows
	$rows[] = $row;
}

print build_ascii_table($rows) . "\n";
