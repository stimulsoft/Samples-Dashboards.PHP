<?php
require_once 'vendor/autoload.php';

use Stimulsoft\Export\Enums\StiExportFormat;
use Stimulsoft\Report\Enums\StiEngineType;
use Stimulsoft\Report\StiReport;


// Creating a report object
$report = new StiReport();

// Setting the server-side rendering mode
$report->engine = StiEngineType::ServerNodeJS;

// Defining dashboard events before processing
// It is allowed to assign a PHP function, or the name of a JavaScript function, or a JavaScript function as a string
// Also it is possible to add several functions of different types using the append() method
$report->onBeforeRender = '
    // This event will be triggered from Node.js before the dashboard is built
    
    // Creating new DataSet object
    let dataSet = new Stimulsoft.System.Data.DataSet("Demo");

    // Loading XSD schema file from specified URL to the DataSet object
    dataSet.readXmlSchemaFile("data/Demo.xsd");

    // Loading XML data file from specified URL to the DataSet object
    dataSet.readXmlFile("data/Demo.xml");

    // Loading JSON data file (instead of XML data file) from specified URL to the DataSet object
    //dataSet.readJsonFile("data/Demo.json");

    // Removing all connections from the dashboard template
    args.report.dictionary.databases.clear();

    // Registering DataSet object
    args.report.regData("Demo", "Demo", dataSet);
';

// Processing the request and, if successful, immediately printing the result
$report->process();

// Loading a dashboard by URL
// This method loads a report file and stores it as a compressed string in an object
// The dashboard will be loaded from this string into a JavaScript object when using Node.js
$report->loadFile('reports/ProductStats.mrt', true);

// Calling the document export method. Export is performed using Node.js engine
// This method will return the byte data of the exported document, or save it to a file
$result = $report->exportDocument(StiExportFormat::Html);
// $result = $report->exportDocument(StiExportFormat::Pdf, null, false, 'reports/ProductStats.pdf');

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
    <title>Registering a Data from Code when Exporting a Dashboard on the Server-Side</title>
    <style>
        html, body {
            font-family: sans-serif;
        }
    </style>
</head>
<body>
<h2>Registering a Data from Code when Exporting a Dashboard on the Server-Side</h2>
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
</body>
</html>
