<?php
require_once '../stimulsoft/helper.php';
?>

<!DOCTYPE html>
<html>
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
	<link rel="shortcut icon" href="../favicon.ico" type="image/x-icon">
	<title>Registering a Data from Code</title>
	<style>html, body { font-family: sans-serif; }</style>

	<script src="../scripts/stimulsoft.reports.js" type="text/javascript"></script>
	<script src="../scripts/stimulsoft.dashboards.js" type="text/javascript"></script>
	<script src="../scripts/stimulsoft.viewer.js" type="text/javascript"></script>
	
	<?php
		// Creating the default events handler
		// Documentation: https://www.stimulsoft.com/en/documentation/online/programming-manual/index.html?reports_and_dashboards_for_php_engine_php_handler.htm
		StiHelper::init('default-handler.php', 30);
	?>
	
	<script type="text/javascript">
		var options = new Stimulsoft.Viewer.StiViewerOptions();
		options.appearance.fullScreenMode = true;
		options.appearance.scrollbarsMode = true;
		options.toolbar.displayMode = Stimulsoft.Viewer.StiToolbarDisplayMode.Separated;
		options.height = "600px"; // Height for non-fullscreen mode
		
		var viewer = new Stimulsoft.Viewer.StiViewer(options, "StiViewer", false);
	
		// Creating and loading the dashboard template
		var dashboard = Stimulsoft.Report.StiReport.createNewDashboard();
		dashboard.loadFile("../reports/ProductStats.mrt");
		
		// Creating new DataSet object
		var dataSet = new Stimulsoft.System.Data.DataSet("Demo");
		
		// Loading XSD shema file from specified URL to the DataSet object
		dataSet.readXmlSchemaFile("../data/Demo.xsd");
		
		// Loading XML data file from specified URL to the DataSet object
		dataSet.readXmlFile("../data/Demo.xml");
		
		// Loading JSON data file (instead of XML data file) from specified URL to the DataSet object
		//dataSet.readJsonFile("../data/Demo.json");
		
		// Removing all connections from the dashboard template
		dashboard.dictionary.databases.clear();
		
		// Registering DataSet object
		dashboard.regData("Demo", "Demo", dataSet);
		
		// You can learn more about file data sources in the documentation:
		// https://www.stimulsoft.com/en/documentation/online/programming-manual/index.html?reports_and_dashboards_for_php_engine_connecting_data_files.htm
		
		// Assigning the dashboard to the Viewer
		viewer.report = dashboard;
		
		function onLoad() {
			viewer.renderHtml("viewerContent");
		}
	</script>
</head>
<body onload="onLoad();">
	<div id="viewerContent"></div>
</body>
</html>