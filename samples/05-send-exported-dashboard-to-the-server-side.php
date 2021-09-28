<?php
require_once '../stimulsoft/helper.php';
?>

<!DOCTYPE html>
<html>
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
	<link rel="shortcut icon" href="../favicon.ico" type="image/x-icon">
	<title>Send Exported Dashboard to the Server Side</title>
	<style>html, body { font-family: sans-serif; }</style>

	<link href="../css/stimulsoft.viewer.office2013.whiteblue.css" rel="stylesheet">
	<script src="../scripts/stimulsoft.reports.js" type="text/javascript"></script>
	<script src="../scripts/stimulsoft.dashboards.js" type="text/javascript"></script>
	<script src="../scripts/stimulsoft.viewer.js" type="text/javascript"></script>
	
	<?php
		// Creating the events handler for this example
		// Documentation: https://www.stimulsoft.com/en/documentation/online/programming-manual/index.html?reports_and_dashboards_for_php_engine_php_handler.htm
		StiHelper::init('05-send-exported-dashboard-to-the-server-side-handler.php', 30);
	?>
	
	<script type="text/javascript">
		var options = new Stimulsoft.Viewer.StiViewerOptions();
		options.appearance.fullScreenMode = true;
		
		var viewer = new Stimulsoft.Viewer.StiViewer(options, "StiViewer", false);
		
		// Sending the exported dashboard to the server-side.
		// Documentation: https://www.stimulsoft.com/en/documentation/online/programming-manual/index.html?reports_and_dashboards_for_php_web_viewer_export.htm
		viewer.onEndExportReport = function (args) {
			// Current export format
			var format = args.format;
			// File name of the exported dashboard
			var fileName = args.fileName;
			// Exported binary data
			var data = args.data;

			// Prevent built-in handler, which saves the exported dashboard as a file
			args.preventDefault = true;
			
			// Calling the server-side handler
			Stimulsoft.Helper.process(args);
		}
		
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