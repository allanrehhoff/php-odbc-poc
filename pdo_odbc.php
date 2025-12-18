<?php
require 'include/functions.php';

$filepath = realpath(__DIR__ . '/resources/file_example_XLS_10.xls');

// DSN-less connection string for the ACE Excel driver
$dsn = "odbc:Driver={Microsoft Excel Driver (*.xls, *.xlsx, *.xlsm, *.xlsb)};Dbq=$filepath;Readonly=0;";

try {
    $pdo = new PDO($dsn, '', '', [
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
    ]);
} catch (PDOException $e) {
    die($e->getMessage());
}

$sql = "
    SELECT
        `First Name`,
        `Last Name`,
        `Gender`,
        `Country`,
        `Age`,
        `Date`
    FROM [Sheet1$]
";

$stmt = $pdo->query($sql);

$rows = [];
foreach ($stmt as $row) {
    if (empty(array_filter($row))) continue;
    $rows[] = $row;
}

print build_ascii_table($rows) . "\n";
