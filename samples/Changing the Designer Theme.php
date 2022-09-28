<?php
require_once '../stimulsoft/helper.php';
?>

<!DOCTYPE html>
<html>
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
	<link rel="shortcut icon" href="../favicon.ico" type="image/x-icon">
	<title>Changing the Designer Theme</title>
	<style>html, body { font-family: sans-serif; }</style>

	<script src="../scripts/stimulsoft.reports.js" type="text/javascript"></script>
	<script src="../scripts/stimulsoft.dashboards.js" type="text/javascript"></script>
	<script src="../scripts/stimulsoft.viewer.js" type="text/javascript"></script>
	<script src="../scripts/stimulsoft.designer.js" type="text/javascript"></script>
	
	<!-- Stimulsoft Blockly editor for JS Designer -->
    <script src="../scripts/stimulsoft.blockly.editor.js" type="text/javascript"></script>
	
	<?php
		// Creating the default events handler
		// Documentation: https://www.stimulsoft.com/en/documentation/online/programming-manual/index.html?reports_and_dashboards_for_php_engine_php_handler.htm
		StiHelper::init('default-handler.php', 30);
	?>
	
	<script type="text/javascript">
		// Creating the Designer options
		var options = new Stimulsoft.Designer.StiDesignerOptions();
		options.appearance.fullScreenMode = true;
		// You can choose one of several prepared CSS themes for the Viewer and Designer components.
		// For example, set the White Teal theme
		options.appearance.theme = Stimulsoft.Designer.StiDesignerTheme.Office2022WhiteTeal;
                		
		// Creating the Designer control
		var designer = new Stimulsoft.Designer.StiDesigner(options, "StiDesigner", false);
	
		// Creating and loading the dashboard template
		var dashboard = Stimulsoft.Report.StiReport.createNewDashboard();
		dashboard.loadFile("../reports/Christmas.mrt");
		
		// Assigning the dashboard to the Designer
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