<!DOCTYPE html>
<html>
<head>
	<title>Charts from the database</title>
	<link rel="stylesheet" type="text/css" href="../css/bootstrap.css">
</head>
<body>
   <div class="container">
<div class="panel panel-default">
<div class="panel-heading">The Number of complaints per courseunit</div>
  <div class="panel-body" id="chartContainer">FusionCharts XT will load here!</div>
</div>
</div>
<script type="text/javascript" src="../Fusioncharts/js/fusioncharts.js"></script>
<script type="text/javascript" src="../Fusioncharts/js/fusioncharts.charts.js"></script>
<script type="text/javascript" src="../Fusioncharts/js/themes/fusioncharts.theme.fint.js"></script>
<script type="text/javascript" src="jquery/jquery-3.1.1.min.js"></script>
<script type="text/javascript" src="js/bootstrap.min.js"></script>
<?php
require("connection.php");
include("../Fusioncharts/fusioncharts.php");
$result = mysqli_query($link,"SELECT * FROM users");
  if ($result) {
    // The `$arrData` array holds the chart attributes and data
    $arrData = array(
      "chart" => array(
          "caption" => "The Number of complaints per courseunit",
          "paletteColors" => "#0075c2",
          "bgColor" => "#ffffff",
          "borderAlpha"=> "20",
          "canvasBorderAlpha"=> "0",
          "usePlotGradientColor"=> "0",
          "plotBorderAlpha"=> "10",
          "showXAxisLine"=> "1",
          "xAxisLineColor" => "#999999",
          "showValues" => "0",
          "divlineColor" => "#999999",
          "divLineIsDashed" => "1",
          "showAlternateHGridColor" => "0"
        )
    );

    $arrData["data"] = array();

    // Push the data into the array
    while($row = mysqli_fetch_array($result)) {
      array_push($arrData["data"], array(
          "label" => $row["fName"],
          "value" => $row["Age"]
          )
      );
    }

    /*JSON Encode the data to retrieve the string containing the JSON representation of the data in the array. */

    $jsonEncodedData = json_encode($arrData);

    /*Create an object for the column chart using the FusionCharts PHP class constructor. Syntax for the constructor is ` FusionCharts("type of chart", "unique chart id", width of the chart, height of the chart, "div id to render the chart", "data format", "data source")`. Because we are using JSON data to render the chart, the data format will be `json`. The variable `$jsonEncodeData` holds all the JSON data for the chart, and will be passed as the value for the data source parameter of the constructor.*/

    $columnChart = new FusionCharts("column2D", "myFirstChart" , 600, 300, "chartContainer", "json", $jsonEncodedData);

    // Render the chart
    $columnChart->render();

    // Close the database connection
    $link->close();
  }
?>
</body>
</html>