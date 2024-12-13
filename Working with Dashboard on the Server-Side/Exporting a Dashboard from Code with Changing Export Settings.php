<?php
require_once '../vendor/autoload.php';

use Stimulsoft\Export\Enums\StiExportFormat;
use Stimulsoft\Export\StiPdfExportSettings;
use Stimulsoft\Report\Enums\StiEngineType;
use Stimulsoft\Report\StiReport;


// Changing the working directory one level up, this is necessary because the examples are in a subdirectory
chdir('../');

// Creating a report object
$report = new StiReport();

// Setting the server-side rendering mode
$report->engine = StiEngineType::ServerNodeJS;

// Processing the request and, if successful, immediately printing the result
$report->process();

// Loading a dashboard by URL
// This method loads a report file and stores it as a compressed string in an object
// The dashboard will be loaded from this string into a JavaScript object when using Node.js
$report->loadFile('reports/Christmas.mrt');


// Creating a settings object and changing the necessary ones
$settings = new StiPdfExportSettings();
$settings->creatorString = 'My Company Name';
$settings->keywordsString = 'SimpleList PHP Dashboard Export';
$settings->embeddedFonts = false;

// Calling the document export method with settings. Export is performed using Node.js engine
// This method will save the exported dashboard as a file
$filePath = 'reports/Christmas.pdf';
$result = $report->exportDocument(StiExportFormat::Pdf, $settings, false, $filePath);

// Creating a message about the export result
$message = $result ? 'Exporting the dashboard to PDF was successful, the file is saved in "' . $filePath . '".' : $report->nodejs->error;
?>

<!DOCTYPE html>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
    <link rel="shortcut icon" href="../favicon.ico" type="image/x-icon">
    <title>Exporting a Dashboard from Code with Changing Export Settings</title>
    <style>
        html, body {
            font-family: sans-serif;
        }
    </style>
</head>
<body>
<h2>Exporting a Dashboard from Code with Changing Export Settings</h2>
<hr>
<?php
// Displaying the result message
echo $message;
?>
</html>