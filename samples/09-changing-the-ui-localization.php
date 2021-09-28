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

	<link href="../css/stimulsoft.viewer.office2013.whiteblue.css" rel="stylesheet">
	<link href="../css/stimulsoft.designer.office2013.whiteblue.css" rel="stylesheet">
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
		// Adding a file to the collection of localizations and the designer menu
		// Documentation: https://www.stimulsoft.com/en/documentation/online/programming-manual/index.html?reports_js_engine_localization.htm
		Stimulsoft.Base.Localization.StiLocalization.addLocalizationFile("../localization/fr.xml", true);
		
		// Adding a file to the collection of localizations and the designer menu, but don't load it automatically
		Stimulsoft.Base.Localization.StiLocalization.addLocalizationFile("../localization/it.xml", false, "Italian");
		
		// Adding a file to the collection of localizations and the designer menu, and setting it by default
		Stimulsoft.Base.Localization.StiLocalization.setLocalizationFile("../localization/de.xml");
		
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