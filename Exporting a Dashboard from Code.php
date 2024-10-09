<?php
require_once 'vendor/autoload.php';

use Stimulsoft\Enums\StiHtmlMode;
use Stimulsoft\Export\Enums\StiExportFormat;
use Stimulsoft\Report\StiReport;


// Creating a report object
$report = new StiReport();

// Processing the request and, if successful, immediately printing the result
$report->process();

// Loading a dashboard by URL
// This method does not load the report object on the server side, it only generates the necessary JavaScript code
// The dashboard will be loaded into a JavaScript object on the client side
$report->loadFile('reports/Christmas.mrt');
?>

<!DOCTYPE html>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
    <link rel="shortcut icon" href="favicon.ico" type="image/x-icon">
    <title>Exporting a Report from Code</title>
    <style>
        html, body {
            font-family: sans-serif;
        }
    </style>

    <?php
    // Rendering the necessary JavaScript code of the dashboard engine
    $report->javascript->renderHtml();
    ?>

    <script type="text/javascript">

        function exportToPdf() {
            <?php
            // Calling the dashboard export to the PDF format
            // This method does not export the dashboard on the server side, it only generates the necessary JavaScript code
            // The dashboard will be exported using a JavaScript engine on the client side
            $report->exportDocument(StiExportFormat::Pdf);

            // Rendering only the JavaScript code of the dashboard engine
            echo $report->getHtml(StiHtmlMode::Scripts);
            ?>
        }

        function exportToExcel() {
            <?php
            // Calling the dashboard export to the Excel format
            // This method does not export the dashboard on the server side, it only generates the necessary JavaScript code
            // The dashboard will be exported using a JavaScript engine on the client side
            $report->exportDocument(StiExportFormat::Excel);

            // Rendering only the JavaScript code of the dashboard engine
            echo $report->getHtml(StiHtmlMode::Scripts);
            ?>
        }

        function exportToHtml() {
            <?php
            // Calling the dashboard export to the HTML format
            // This method does not export the dashboard on the server side, it only generates the necessary JavaScript code
            // The dashboard will be exported using a JavaScript engine on the client side
            $report->exportDocument(StiExportFormat::Html);

            // Rendering only the JavaScript code of the dashboard engine
            echo $report->getHtml(StiHtmlMode::Scripts);
            ?>
        }
    </script>
</head>
<body>
<h2>Exporting a Dashboard from Code</h2>
<hr>
<button onclick="exportToPdf();">Export Dashboard to PDF</button>
<br><br>
<button onclick="exportToExcel();">Export Dashboard to Excel</button>
<br><br>
<button onclick="exportToHtml();">Export Dashboard to HTML</button>
</body>
</html>