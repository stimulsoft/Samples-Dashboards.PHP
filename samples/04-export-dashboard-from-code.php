<?php
require_once '../stimulsoft/helper.php';
?>

<!DOCTYPE html>
<html>
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
	<link rel="shortcut icon" href="../favicon.ico" type="image/x-icon">
	<title>Export Report from Code</title>
	<style>html, body { font-family: sans-serif; }</style>

	<script src="../scripts/stimulsoft.reports.js" type="text/javascript"></script>
	<script src="../scripts/stimulsoft.dashboards.js" type="text/javascript"></script>
	
	<?php
		// Creating the default events handler
		// Documentation: https://www.stimulsoft.com/en/documentation/online/programming-manual/index.html?reports_and_dashboards_for_php_engine_php_handler.htm
		StiHelper::init('default-handler.php', 30);
	?>
	
	<script type="text/javascript">
		// Creating and loading the dashboard template
		var dashboard = Stimulsoft.Report.StiReport.createNewDashboard();
		dashboard.loadFile("../reports/Christmas.mrt");
		
		// Getting the dashboard file name
		var fileName = Stimulsoft.System.StiString.isNullOrEmpty(dashboard.reportAlias) ? dashboard.reportName : dashboard.reportAlias;
		
		// Exporting dashboard to PDF format and saving to a file
		// Documentation: https://www.stimulsoft.com/en/documentation/online/programming-manual/index.html?reports_and_dashboards_for_php_engine_export_from_code.htm
		function exportToPdf() {
			dashboard.exportDocumentAsync(function (data) {
				// Saving data to a file
				Stimulsoft.System.StiObject.saveAs(data, fileName + ".pdf", "application/pdf");
			}, Stimulsoft.Report.StiExportFormat.Pdf);
		}
		
		// Exporting dashboard to Excel format and saving to a file
		// Documentation: https://www.stimulsoft.com/en/documentation/online/programming-manual/index.html?reports_and_dashboards_for_php_engine_export_from_code.htm
		function exportToExcel() {
			dashboard.exportDocumentAsync(function (data) {
				// Saving data to a file
				Stimulsoft.System.StiObject.saveAs(data, fileName + ".xlsx", "application/vnd.openxmlformats-officedocument.spreadsheetml.sheet");
			}, Stimulsoft.Report.StiExportFormat.Excel2007);
		}
	</script>
</head>
<body>
	<button onclick="exportToPdf();">Export Dashboard to PDF</button>
	<br /><br />
	<button onclick="exportToExcel();">Export Dashboard to Excel</button>
</body>
</html>