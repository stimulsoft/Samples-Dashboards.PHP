<?php
require_once 'vendor/autoload.php';
?>
<!DOCTYPE html>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
    <link rel="shortcut icon" href="favicon.ico" type="image/x-icon">
    <title>Loading Scripts in Part to Minify Project</title>
    <style>
        html, body {
            font-family: sans-serif;
        }
    </style>
    
    <?php
    /** https://www.stimulsoft.com/en/documentation/online/programming-manual/index.html?reports_and_dashboards_for_php_engine_optimazing_scripts_loading.htm */
    $js = new \Stimulsoft\StiJavaScript(\Stimulsoft\StiComponentType::Designer);

    $js->options->reports = false;
    $js->options->blocklyEditor = false;
    $js->options->reportsChart = true;
    $js->options->reportsExport = true;
    $js->options->reportsImportXlsx = false;
    $js->options->reportsMaps = false;

    $js->usePacked = true;
    $js->renderHtml();
    ?>

    <script type="text/javascript">
        <?php
        $handler = new \Stimulsoft\StiHandler();
        //$handler->license->setKey('6vJhGtLLLz2GNviWmUTrhSqnO...');
        //$handler->license->setFile('license.key');
        $handler->renderHtml();

        /** https://www.stimulsoft.com/en/documentation/online/programming-manual/index.html?reports_and_dashboards_for_php_web_designer_settings.htm */
        $options = new \Stimulsoft\Designer\StiDesignerOptions();
        $options->appearance->fullScreenMode = true;

        /** https://www.stimulsoft.com/en/documentation/online/programming-manual/index.html?reports_and_dashboards_for_php_web_designer_deployment.htm */
        $designer = new \Stimulsoft\Designer\StiDesigner($options);

        /** https://www.stimulsoft.com/en/documentation/online/programming-manual/index.html?reports_and_dashboards_for_php_web_designer_creating_editing_report.htm */
        $report = new \Stimulsoft\Report\StiReport();
        $report->loadFile('reports/Christmas.mrt');
        $designer->report = $report;
        ?>

        function onLoad() {
            <?php
            $designer->renderHtml('designerContent');
            ?>
        }
    </script>
</head>
<body onload="onLoad();">
<div id="designerContent"></div>
</body>
</html>