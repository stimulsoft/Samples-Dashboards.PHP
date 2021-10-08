<?php
require_once '../stimulsoft/helper.php';
?>

<!DOCTYPE html>
<html>
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
	<link rel="shortcut icon" href="../favicon.ico" type="image/x-icon">
	<title>Save dashboard on the server-side</title>
	<style>html, body { font-family: sans-serif; }</style>

	<link href="../css/stimulsoft.viewer.office2013.whiteblue.css" rel="stylesheet">
	<link href="../css/stimulsoft.designer.office2013.whiteblue.css" rel="stylesheet">
	<script src="../scripts/stimulsoft.reports.js" type="text/javascript"></script>
	<script src="../scripts/stimulsoft.dashboards.js" type="text/javascript"></script>
	<script src="../scripts/stimulsoft.viewer.js" type="text/javascript"></script>
	<script src="../scripts/stimulsoft.designer.js" type="text/javascript"></script>
	
	<!-- Stimulsoft Blockly editor for JS Designer -->
    <script src="../scripts/stimulsoft.blockly.js" type="text/javascript"></script>
	
	<?php
		// Creating the events handler for this example
		// Documentation: https://www.stimulsoft.com/en/documentation/online/programming-manual/index.html?reports_and_dashboards_for_php_engine_php_handler.htm
		StiHelper::init('03-save-dashboard-on-the-server-side-handler.php', 30);
	?>
	
	<script type="text/javascript">
		var options = new Stimulsoft.Designer.StiDesignerOptions();
		options.appearance.fullScreenMode = true;
		
		var designer = new Stimulsoft.Designer.StiDesigner(options, "StiDesigner", false);
		
		// Saving a dashboard template on the server-side.
		// Documentation: https://www.stimulsoft.com/en/documentation/online/programming-manual/index.html?reports_and_dashboards_for_php_web_designer_saving_report.htm
		designer.onSaveReport = function (args, callback) {
			// Report object on the client-side
			var report = args.report;
			// Report file name from the designer save dialog
			var fileName = args.fileName;
			// Original report name from properties
			var reportName = args.report.reportName;
			
			// Calling the server-side handler
			Stimulsoft.Helper.process(args, callback);
		}
		
		var dashboard = Stimulsoft.Report.StiReport.createNewDashboard();
		dashboard.loadFile("../reports/Christmas.mrt");
		designer.report = dashboard;
		
		function onLoad() {
			designer.renderHtml("designerContent");
		}
	</script>
</head>
<body onload="onLoad();">
	<div id="designerContent"></div>
</body>
</html>