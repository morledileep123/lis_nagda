<!DOCTYPE html>

    <html xmlns="http://www.w3.org/1999/xhtml">

    <head>

        <meta charset="utf-8">
        <link rel="stylesheet" href="http://cdn.syncfusion.com/18.3.0.47/js/web/flat-azure/ej.web.all.min.css" /><br /><br />
        <title> </title>

    </head>

    <body>

			<div id="fileExplorer"></div>
	
<!--External script references-->

    <script src="https://code.jquery.com/jquery-1.10.2.min.js"></script>

    <script src="http://cdn.syncfusion.com/js/assets/external/jsrender.min.js"></script>

    <!--Internal script references-->

    <script src="http://cdn.syncfusion.com/18.3.0.47/js/web/ej.web.all.min.js"></script>
<script >
	$(function () {

            var fileSystemPath = "http://js.syncfusion.com/demos/ejServices/Content/FileBrowser/";

            var ajaxActionHandler = "http://js.syncfusion.com/demos/ejServices/api/FileExplorer/FileOperations";

            $("#fileExplorer").ejFileExplorer({

                path: fileSystemPath,

                ajaxAction: ajaxActionHandler
                
            });

        });
	
</script>
  </body>

    </html>