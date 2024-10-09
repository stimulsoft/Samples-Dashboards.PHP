<?php
require_once 'vendor/autoload.php';

use Stimulsoft\Report\StiReport;


// Creating a report object
$report = new StiReport();

// Processing the request and, if successful, immediately printing the result
$report->process();

// Loading a dashboard by URL
$reportJsonString = file_get_contents('reports/Christmas.mrt');

// Converting a dashboard into an object and changing the necessary parameters
$reportJson = json_decode($reportJsonString);
$reportJson->ReportAlias = 'Dashboard Alias from Server-Side';
$reportJson->CalculationMode = 'Interpretation';

// Loading a dashboard from a JSON object
// This method does not load the report object on the server side, it only generates the necessary JavaScript code
// The dashboard will be loaded into a JavaScript object on the client side
$report->load($reportJson);

// Calling the dashboard print
// This method does not print the dashboard to the printer, it only calls the browser print dialog
$report->print();

// Displaying the visual part of the dashboard as a prepared HTML page
$report->printHtml();