<?php
 require 'header.php';
?>
    <div class="row">
        <div class="col-sm-12">
           <div class="well"><p></p><h2 style="text-align:center;"> 
                    <?PHP
                     if(isset($usertype)){ 
                      echo ucfirst($usertype); 
                      }
                      ?>'s Dashboard</h2>
            </div>
        </div>
        <div class="col-sm-12">
          <div class="well">
            <h4 style="text-align: center;">A histogram showing Complaint's Per course unit taught</h4>
            <p><span id="courseunitchart">Chart will render here</span></p>
            
          </div>
        </div>        
      </div>
      <div class="row">
        <div class="col-sm-6">
          <div class="well">
            <h4 style="text-align: center;">A pie chart showing Complaint's Per Year Of Study that you have taught</h4>
            <p><span id="yearofstudychart">Chart will render here</span></p>
          </div>
        </div>
        <div class="col-sm-6">
          <div class="well">
            <h4 style="text-align: center;">A Pie showing your performance on responding to complaints</h4>
            <p><span id="complaintresponse">Chart will render here</span></p>
          </div>
        </div>
      </div>
      
<?php
require_once("../footer.php");
include_once("../Assets/Fusioncharts/fusioncharts.php");
  $userID=$_SESSION['RCMS_user_id'];
  $lecturerID=getuserInfo('staffID','staff','userID',$userID);
  /*WHERE lecturerID='".$lecturerID."'*/
   $query="SELECT distinct courseunit.courseunitName, count(courseunit.courseunitName) as numbers FROM Complaint JOIN courseunit ON(complaint.course_id=courseunit.id) WHERE lecturerID='".$lecturerID."' group by complaint.course_id";
   $result = mysqli_query($link,$query);
  if ($result) {
    // The `$arrData` array holds the chart attributes and data
    $arrData = array(
      "chart" => array(
          "caption" => "The Number of complaints per courseunit",
          "showPercentValues"=> "1",
          "decimals"=> "1",
          "xAxisName"=>"Course units",
          "yAxisName"=>"No of complaints",
          "useDataPlotColorForLabels"=>"1",
          "showLegend"=> "1",
          "theme"=>"ocean"
        )
    );

    $arrData["data"] = array();

    // Push the data into the array
    while($row = mysqli_fetch_array($result)) {
      array_push($arrData["data"], array(
          "label" => $row[0],
          "value" => $row[1]
          )
      );
    }

    /*JSON Encode the data to retrieve the string containing the JSON representation of the data in the array. */

    $jsonEncodedData = json_encode($arrData);

    $columnChart = new FusionCharts("column3D", "" , 935, 400, "courseunitchart", "json", $jsonEncodedData);

    // Render the chart
    $columnChart->render();
  }



//The second graph
  $userID=$_SESSION['RCMS_user_id'];
  $lecturerID=getuserInfo('staffID','staff','userID',$userID);
  /*WHERE lecturerID='".$lecturerID."'*/
   $query="SELECT distinct courseunit.yearofstudy, count(courseunit.yearofstudy) as Numbers FROM Complaint JOIN courseunit ON(complaint.course_id=courseunit.id) WHERE lecturerID='".$lecturerID."'  group by courseunit.yearofstudy";
   $result = mysqli_query($link,$query);
  if ($result) {
    // The `$arrData` array holds the chart attributes and data
    $arrData = array(
      "chart" => array(
         "caption"=> "Percentage of complaints per year of study",
          "numberPrefix"=> "%",
          "enableSmartLabels"=> "0",
          "showPercentValues"=> "1",
          "showLegend"=> "1",
          "decimals"=> "1",
          "useDataPlotColorForLabels"=>"1",
          "theme"=> "ocean"
        )
    );

    $arrData["data"] = array();

    // Push the data into the array
    while($row = mysqli_fetch_array($result)) {
      array_push($arrData["data"], array(
          "label" => $row[0],
          "value" => $row[1]
          )
      );
    }

    /*JSON Encode the data to retrieve the string containing the JSON representation of the data in the array. */
    $jsonEncodedData = json_encode($arrData);

    $Chart = new FusionCharts("pie3D", "A pie chart showing the Number of complaints per Course unit" , 430, 400, "yearofstudychart", "json", $jsonEncodedData);

    // Render the chart
    $Chart->render();
  }


  //The third graph
  $userID=$_SESSION['RCMS_user_id'];
  $lecturerID=$lecturerfname=getuserInfo('staffID','staff','userID',$userID);
  /*WHERE lecturerID='".$lecturerID."'*/
   
   $query="SELECT distinct status, count(status) as numbers FROM Complaint WHERE lecturerID='".$lecturerID."' group by status";
   $result = mysqli_query($link,$query);
  if ($result) {
    // The `$arrData` array holds the chart attributes and data
    $arrData = array(
      "chart" => array(
         "caption"=> "The state of response on complaints",
          "numberPrefix"=> "%",
          "enableSmartLabels"=> "0",
          "showPercentValues"=> "1",
          "showLegend"=> "1",
          "decimals"=> "1",
          "useDataPlotColorForLabels"=>"1",
          "theme"=> "ocean"
        )
    );

    $arrData["data"] = array();

    // Push the data into the array
    while($row = mysqli_fetch_array($result)) {
      array_push($arrData["data"], array(
          "label" => $row[0],
          "value" => $row[1]
          )
      );
    }

    /*JSON Encode the data to retrieve the string containing the JSON representation of the data in the array. */
    $jsonEncodedData = json_encode($arrData);

    $complaintresponse = new FusionCharts("pie3D", "A pie chart showing the state of response on complaints" , 430, 400, "complaintresponse", "json", $jsonEncodedData);

    // Render the chart
    $complaintresponse->render();
  }
?>