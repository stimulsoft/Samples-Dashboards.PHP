<?php
require_once '../stimulsoft/helper.php';
?>

<!DOCTYPE html>
<html>
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
	<link rel="shortcut icon" href="../favicon.ico" type="image/x-icon">
	<title>Loading Scripts in Part to Minify Project</title>
	<style>html, body { font-family: sans-serif; }</style>

	<!-- Office2013 White-Blue style -->
	<link href="../css/stimulsoft.viewer.office2013.whiteblue.css" rel="stylesheet">
	
	<!-- The main script containing the Engine for working with reports and data -->
	<!-- Documentation: https://www.stimulsoft.com/en/documentation/online/programming-manual/index.html?reports_and_dashboards_for_php_engine_optimazing_scripts_loading.htm -->
	<script src="../scripts/stimulsoft.reports.engine.js" type="text/javascript"></script>
	
	<!-- The script for working with charts -->
	<script src="../scripts/stimulsoft.reports.chart.js" type="text/javascript"></script>
	
	<!-- The script contains methods for exporting dashboards -->
	<!--<script src="../scripts/stimulsoft.reports.export.js" type="text/javascript"></script>-->
	
	<!-- The script for working with maps -->
	<!--<script src="../scripts/stimulsoft.reports.maps.js" type="text/javascript"></script>-->
	
	<!-- The script for working with Excel data files -->
	<script src="../scripts/stimulsoft.reports.import.xlsx.js" type="text/javascript"></script>
	
	<!-- The script for working with dashboards -->
	<script src="../scripts/stimulsoft.dashboards.js" type="text/javascript"></script>
	
	<!-- The script contains the Viewer control -->
	<script src="../scripts/stimulsoft.viewer.js" type="text/javascript"></script>
	
	<!-- The script contains visual editor Blockly -->
	<script src="../scripts/stimulsoft.blockly.editor.js" type="text/javascript"></script>
	
	<?php
		StiHelper::init('default-handler.php', 30);
	?>
	
	<script type="text/javascript">
		var options = new Stimulsoft.Viewer.StiViewerOptions();
		options.appearance.fullScreenMode = true;
		
		var viewer = new Stimulsoft.Viewer.StiViewer(options, "StiViewer", false);
	
		var dashboard = Stimulsoft.Report.StiReport.createNewDashboard();
		dashboard.loadFile("../reports/Christmas.mrt");
		
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