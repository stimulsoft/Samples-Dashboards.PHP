<?php
require_once 'vendor/autoload.php';

use Stimulsoft\Export\Enums\StiExportFormat;
use Stimulsoft\Report\Enums\StiEngineType;
use Stimulsoft\Report\StiReport;


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

// Calling the document export method. Export is performed using Node.js engine
// This method will return the byte data of the exported document, or save it to a file
$result = $report->exportDocument(StiExportFormat::Html);
// $result = $report->exportDocument(StiExportFormat::Pdf, null, false, 'reports/Christmas.pdf');

if ($result !== false) {
    $bytes = strlen($result);
    $message = "The exported document takes $bytes bytes.";
}
else {
    // If there is a export error, you can display the error text
    $message = $report->nodejs->error;
}
?>

<!DOCTYPE html>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
    <link rel="shortcut icon" href="favicon.ico" type="image/x-icon">
    <title>Exporting a Dashboard from Code on the Server-Side</title>
    <style>
        html, body {
            font-family: sans-serif;
        }
    </style>
</head>
<body>
<h2>Exporting a Dashboard from Code on the Server-Side</h2>
<hr>
<?php
// Displaying the result message
echo $message;
?>
<br><br>
<?php
// Displaying the result of the HTML export
if ($result !== false) echo $result;
?>
</html>