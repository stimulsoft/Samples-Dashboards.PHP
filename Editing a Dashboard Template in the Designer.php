<?php
require_once 'vendor/autoload.php';

use Stimulsoft\Designer\StiDesigner;
use Stimulsoft\Report\StiReport;


// Creating a designer object
$designer = new StiDesigner();

// Processing the request and, if successful, immediately printing the result
$designer->process();

// Creating a report object
$report = new StiReport();

// Loading a dashboard by URL
// This method does not load the report object on the server side, it only generates the necessary JavaScript code
// The dashboard will be loaded into a JavaScript object on the client side
$report->loadFile('reports/Christmas.mrt');

// Assigning a report object to the designer
$designer->report = $report;

// Displaying the visual part of the designer as a prepared HTML page
$designer->printHtml();