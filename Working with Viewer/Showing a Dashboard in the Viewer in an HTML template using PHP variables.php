<?php
require_once '../vendor/autoload.php';

use Stimulsoft\Report\StiReport;
use Stimulsoft\Viewer\StiViewer;


// Creating a viewer object and set the necessary javascript options
$viewer = new StiViewer();
$viewer->javascript->relativePath = '../';
$viewer->options->height = '800px';

// Processing the request and, if successful, immediately printing the result
$viewer->process();

// Creating a report object
$report = new StiReport();

// Loading a dashboard by URL
// This method does not load the report object on the server side, it only generates the necessary JavaScript code
// The dashboard will be loaded into a JavaScript object on the client side
$report->loadFile('../reports/Christmas.mrt');

// Assigning a report object to the viewer
$viewer->report = $report;

// Getting the necessary JavaScript code and visual HTML part of the viewer
$js = $viewer->javascript->getHtml();
$html = $viewer->getHtml();
?>

<!DOCTYPE html>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
    <link rel="shortcut icon" href="../favicon.ico" type="image/x-icon">
    <title>Showing a Dashboard in the Viewer in an HTML template using PHP variables</title>
    <style>
        html, body {
            font-family: sans-serif;
        }
    </style>

    <?php
    // Printing the necessary JavaScript code of the viewer
    echo $js;
    ?>
</head>
<body>
<h2>Showing a Dashboard in the Viewer in an HTML template using PHP variables</h2>
<hr>
<?php
// Printing the visual HTML part of the viewer
echo $html;
?>
</body>
</html>