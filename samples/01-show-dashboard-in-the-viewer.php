<?php
require_once '../stimulsoft/helper.php';
?>

<!DOCTYPE html>
<html>
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
	<link rel="shortcut icon" href="../favicon.ico" type="image/x-icon">
	<title>Show dashboard in the Viewer</title>
	<style>html, body { font-family: sans-serif; }</style>

	<!-- Office2013 White-Blue style -->
	<link href="../css/stimulsoft.viewer.office2013.whiteblue.css" rel="stylesheet">
	
	<!-- Stimulsoft Dashboards.PHP scripts -->
	<script src="../scripts/stimulsoft.reports.js" type="text/javascript"></script>
	<script src="../scripts/stimulsoft.dashboards.js" type="text/javascript"></script>
	<script src="../scripts/stimulsoft.viewer.js" type="text/javascript"></script>
	
	<?php
		// Creating the default events handler
		// Documentation: https://www.stimulsoft.com/en/documentation/online/programming-manual/index.html?reports_and_dashboards_for_php_engine_php_handler.htm
		StiHelper::init('default-handler.php', 30);
	?>
	
	<script type="text/javascript">
		// Creating the Viewer options
		// Documentation: https://www.stimulsoft.com/en/documentation/online/programming-manual/index.html?reports_and_dashboards_for_php_settings.htm
		var options = new Stimulsoft.Viewer.StiViewerOptions();
		options.appearance.fullScreenMode = true;
		
		// Creating the Viewer control
		// Documentation: https://www.stimulsoft.com/en/documentation/online/programming-manual/index.html?reports_and_dashboards_for_php_deployment.htm
		var viewer = new Stimulsoft.Viewer.StiViewer(options, "StiViewer", false);
		
		// Creating, loading, and then assigning the dashboard template to the Viewer
		// Documentation: https://www.stimulsoft.com/en/documentation/online/programming-manual/index.html?reports_and_dashboards_for_php_web_viewer_showing_reports_and_dashboards.htm
		var dashboard = Stimulsoft.Report.StiReport.createNewDashboard();
		dashboard.loadFile("../reports/Christmas.mrt");
		viewer.report = dashboard;
		
		function onLoad() {
			// Rendering the Viewer control in the specified position
			viewer.renderHtml("viewerContent");
		}
	</script>
</head>
<body onload="onLoad();">
	<div id="viewerContent"></div>
</body>
</html>