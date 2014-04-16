<?php
/**
 * ReportGenerator -- import.php
 * User: Simon Beattie
 * Date: 14/04/2014
 * Time: 10:19
 */

$config = require(__DIR__ . '/config.php');

if (isset($argv[1])) // Check that an argument has been given, if it has assume it is a Nessus report!
{
    $xml = $argv[1];
} else {
    die('You must provide report as argument');
}

spl_autoload_register(function ($className) {
    $fileName = __DIR__ . '/' . str_replace('\\', '/', $className) . '.php';

    if (!file_exists($fileName)) {
        return false;
    }

    require($fileName);
});

try { // Build PDO Object
    $pdo = new PDO(
        'mysql:host=' . $config['db']['hostname'] . ';dbname=' . $config['db']['database'],
        $config['db']['username'],
        $config['db']['password']
    );
} catch (PDOException $pdoError) {
    echo $pdoError->getMessage();
    exit;
}

$report = new \Library\ImportReport($pdo, $config); // Build report Object

echo "Creating report" . PHP_EOL;

print_r($report->createReport($xml)); // Output any return from report import.