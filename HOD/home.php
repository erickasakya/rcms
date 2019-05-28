<?php
 require 'header.php';
?>
<div class="row ">
       <div class="col-sm-12">
           <div class="well"><p></p><h2 style="text-align:center;">
                    <?PHP
                     if(isset($usertype)){ 
                      echo ucfirst($usertype); 
                      }
                      ?>'s Dashboard</h2>
            </div>
        </div>
  </div>
      <div class="row">
        <div class="col-sm-12">
          <div class="well">
            <h3 style="text-align: center;">A histogram showing Complaints status Per Lecturer in<br>your Department</h3>
            <p><span id="courseunitchart">Chart will render here</span></p>
          </div>
        </div>
        
      </div>
      <div class="row">
        <div class="col-sm-6">
          <div class="well">
            <h3 style="text-align: center;">A pie chart showing Complaints made per Year of Study in <br>your Department</h3>
            <p><span id="yearofstudychart">Chart will render here</span></p>
          </div>
        </div>
        <div class="col-sm-6">
          <div class="well">
            <h3 style="text-align: center;">A pie chart showing the state of response on complaints by Lecturers in your Department</h3>
            <p><span id="complaintresponse">Chart will render here</span></p>
          </div>
        </div>
      </div>

<?php
require_once("../footer.php");
include_once("../Assets/Fusioncharts/fusioncharts.php");
  $userID=$_SESSION['RCMS_user_id'];
  $dept_ID=getuserInfo('dept_ID','staff','userID',$userID);

   $strQueryCategories = "SELECT distinct staff.lname as  Name from staff 
   INNER JOIN complaint on(staff.staffID=complaint.lecturerID) where  complaint.status!='forwarded' AND staff.dept_ID='".$dept_ID."'";
        
          $resultCategories = mysqli_query($link,$strQueryCategories);

     
      $strQueryData = "SELECT staff.lname as Name, complaint.status AS status,count(complaint.status) as Totals from staff
      INNER JOIN complaint  ON(staff.staffid=complaint.lecturerID) where  complaint.status!='forwarded' AND staff.dept_ID='".$dept_ID."' group by complaint.status, complaint.lecturerID";
            
        $resultData = mysqli_query($link,$strQueryData);

         
         if ($resultData) {
            
            /* `$arrData` is the associative array that is initialized to store the chart attributes. */
            $arrData = array(
                  "caption" => "Complaints status per Lecturer",
                  "paletteColors" => "#F4CA49,#C9302C,#91B918",
                  // "bgColor" => "#Df0D00D",
                  "borderAlpha" => "20",
                  "canvasBorderAlpha" => "0",
                  "usePlotGradientColor" => "0",
                  "plotBorderAlpha" => "10",
                  "showXAxisLine" => "1",
                  "xAxisLineColor" => "#Df0D00D",
                  "showValues" => "1",
                 
                  "showAlternateHGridColor" => "0"
               );

            $xmlData = "<chart";

            // Iterate over each chart attribute and convert it into an attribute string
            foreach ($arrData as $key => $value) {
                $xmlData .= " $key= \"$value\" "; 
            }
            
            $xmlData .= ">";

      
      if($resultCategories)
      {
        $xmlData.= "<categories>";
                while($row = mysqli_fetch_array($resultCategories))
        {
                    $xmlData .= "<category label=\"".$row["Name"]."\" />";
                }
                    $xmlData .= "</categories>";
      }
          
          
      if ($resultData){
        
        $controlBreakValue =""; 
           while($row = mysqli_fetch_array($resultData)) {

                  if( $controlBreakValue != $row["status"] ){

                        if($controlBreakValue !=""){

                           $xmlData .= "</dataset>";   
                          }//End of the second if

                    $controlBreakValue =  $row["status"];
                    $xmlData .= "<dataset seriesName=\" $controlBreakValue \">";  
                    $controlBreakValue =="";
                              
                  }//End of the first if

              $xmlData .= "<set value=\"" . $row["Totals"] . "\" />"; 
                                       
            }//End of the loop
          
        $xmlData .= "</dataset>";
            
}
                
           

            $xmlData .= "</chart>";

            $columnChart = new FusionCharts("mscolumn3d", "Complaints status per Lecturer" , 930, 370, "courseunitchart", "xml", "$xmlData");

            // Render the chart
            $columnChart->render();
  }



//The second graph
  $userID=$_SESSION['RCMS_user_id'];
  $hodID=getuserInfo('staffID','staff','userID',$userID);
  /**/
   $query="SELECT distinct courseunit.yearofstudy, count(courseunit.yearofstudy) as Numbers FROM Complaint INNER JOIN courseunit ON(complaint.course_id=courseunit.id) WHERE hodID='".$hodID."' group by courseunit.yearofstudy";
   $result = mysqli_query($link,$query);
  if ($result) {
    // The `$arrData` array holds the chart attributes and data
    $arrData = array(
      "chart" => array(
         "caption"=> "Number of complaints made per year of study",
          "numVDivLines"=> "5",
          "enableSmartLabels"=> "0",
          "xAxisName"=> "Year of Study",
          "yAxisName"=> "No of Complaints",
          "anchorRadius"=>"5",
          "showLegend"=> "1",
          "showValues"=> "0",
          "useDataPlotColorForLabels"=>"1",
          "theme"=> "fint",
          "numVDivLines"=> "7",
          "vDivLineColor"=> "#99ccff",
          "vDivLineThickness"=> "4",
          "vDivLineAlpha"=> "50",
          "vDivLineDashed"=> "0",
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

    $Chart = new FusionCharts("line", "A pie chart showing the Number of complaints per year of study" , 430, 400, "yearofstudychart", "json", $jsonEncodedData);

    // Render the chart
    $Chart->render();
  }


  //The third graph
  $userID=$_SESSION['RCMS_user_id'];
  $hodID=getuserInfo('staffID','staff','userID',$userID);
   
   $query="SELECT distinct status, count(status) as numbers FROM Complaint WHERE hodID='".$hodID."' group by status";
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