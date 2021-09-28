<?php
require_once '../stimulsoft/helper.php';
?>

<!DOCTYPE html>
<html>
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
	<link rel="shortcut icon" href="../favicon.ico" type="image/x-icon">
	<title>Register Data from Code</title>
	<style>html, body { font-family: sans-serif; }</style>

	<!-- You can choose one of several prepared CSS themes for the Viewer and Designer components. -->
	<!-- For example, set the White Teal theme -->
	<!-- Documentation: https://www.stimulsoft.com/en/documentation/online/programming-manual/reports_and_dashboards_for_php_web_viewer_using_themes.htm -->
	<link href="../css/stimulsoft.viewer.office2013.whiteteal.css" rel="stylesheet">
	<link href="../css/stimulsoft.designer.office2013.whiteteal.css" rel="stylesheet">
	
	<script src="../scripts/stimulsoft.reports.js" type="text/javascript"></script>
	<script src="../scripts/stimulsoft.dashboards.js" type="text/javascript"></script>
	<script src="../scripts/stimulsoft.viewer.js" type="text/javascript"></script>
	<script src="../scripts/stimulsoft.designer.js" type="text/javascript"></script>
	
	<?php
		// Creating the default events handler
		// Documentation: https://www.stimulsoft.com/en/documentation/online/programming-manual/index.html?reports_and_dashboards_for_php_engine_php_handler.htm
		StiHelper::init('default-handler.php', 30);
	?>
	
	<script type="text/javascript">
		// Creating the Designer options
		var options = new Stimulsoft.Designer.StiDesignerOptions();
		options.appearance.fullScreenMode = true;
		
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