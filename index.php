<?php
define('ROOT', dirname(__FILE__));
require_once ROOT.'/vendor/autoload.php';

use Classes\CsvParser;

$csv_file = "test.csv";

$parser = new CsvParser;
$parser = $parser->open($csv_file)->parse();

echo "<pre>";
print_r($parser);