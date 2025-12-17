<?php
function build_ascii_table(array $data): string {
	if (empty($data)) {
		return '';
	}

	$headers = array_keys($data[0]);

	$widths = [];
	foreach ($headers as $header) {
		$widths[$header] = strlen($header); // start with header length
	}

	foreach ($data as $row) {
		foreach ($headers as $header) {
			$widths[$header] = max($widths[$header], strlen((string)$row[$header]));
		}
	}

	$line = '+';
	foreach ($headers as $header) {
		$line .= str_repeat('-', $widths[$header] + 2) . '+';
	}

	$output = $line . "\n";

	$output .= '|';
	foreach ($headers as $header) {
		$output .= ' ' . str_pad($header, $widths[$header]) . ' |';
	}
	$output .= "\n" . $line . "\n";

	foreach ($data as $row) {
		$output .= '|';
		foreach ($headers as $header) {
			$output .= ' ' . str_pad((string)$row[$header], $widths[$header]) . ' |';
		}
		$output .= "\n";
	}

	$output .= $line;
	return $output;
}