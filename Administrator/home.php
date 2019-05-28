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
    <div class="row animated fadeInLeft">
        <div class="col-sm-12">
          <div class="well">
            <h4 style="text-align: center;">A histogram showing Complaint's Per Department</h4>
            <p><span id="department">FusionCharts will render here</span></p>
          </div>
        </div>
        
      </div>
      <div class="row animated fadeInLeft">
        <div class="col-sm-6">
          <div class="well">
            <h4 style="text-align: center;">A pie chart showing Complaint's per Year of study in the college</h4>
            <p><span id="yearofstudychart">FusionCharts will render here</span></p>
          </div>
        </div>
        <div class="col-sm-6">
          <div class="well">
            <h4 style="text-align: center;">A pie chart showing the system administrator performance</h4>
            <p><span id="responserate">FusionCharts will render here</span></p>
          </div>
        </div>
      </div>

<?php
require_once("../footer.php");
include_once("../Assets/Fusioncharts/fusioncharts.php");
  $userID=$_SESSION['RCMS_user_id'];
  $hodID=getuserInfo('staffID','staff','userID',$userID);
  
$strQueryCategories = "SELECT Department.dept_name as Dept_Name from staff join Department on(staff.dept_id=Department.dept_id) where staffType='HOD'";
        
          $resultCategories = mysqli_query($link,$strQueryCategories);

		 
		  $strQueryData = "SELECT complaint.status, staff.fName, count(complaint.status) as Totals from complaint complaint, staff staff where complaint.hodID=staff.staffid group by complaint.status, complaint.hodid order by status desc";
						
	      $resultData = mysqli_query($link,$strQueryData);

         
         if ($resultData) {
            
            /* `$arrData` is the associative array that is initialized to store the chart attributes. */
            $arrData = array(
                  "caption" => "Complaints per Department",
                  "paletteColors" => "#00ff00,#C9302C,#EC971F",
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
                    $xmlData .= "<category label=\"".$row["Dept_Name"]."\" />";
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

            $columnChart = new FusionCharts("mscolumn3d", "myFirstChart" , 930, 400, "department", "xml", "$xmlData");

            // Render the chart
            $columnChart->render();

            // Close the database connection$dbhandle->close();
            
         }



// //The second graph
   $query="SELECT distinct courseunit.yearofstudy, count(courseunit.yearofstudy) as Numbers FROM Complaint JOIN courseunit ON(complaint.course_id=courseunit.id) group by courseunit.yearofstudy";
   $result = mysqli_query($link,$query);
  if ($result) {
    // The `$arrData` array holds the chart attributes and data
    $arrData = array(
      "chart" => array(
         "caption"=> "Number of complaints per year of study",
          "numberPrefix"=> "%",
          "enableSmartLabels"=> "0",
          "showPercentValues"=> "1",
          "showLegend"=> "1",
          "decimals"=> "1",
          "useDataPlotColorForLabels"=>"1",
          "theme"=> "ocean",
          "paletteColors" => "#00ff00,#C9302C,#EC971F"
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

    $Chart = new FusionCharts("pie3D", "A pie chart showing the Number of complaints per Course unit" , 430, 380, "yearofstudychart", "json", $jsonEncodedData);

    // Render the chart
    $Chart->render();
  }

  //The third graph
   $query="SELECT distinct complaint.confirmation, count(complaint.confirmation) as Numbers FROM Complaint JOIN courseunit ON(complaint.course_id=courseunit.id) group by complaint.confirmation";
   $result = mysqli_query($link,$query);
  if ($result) {
    // The `$arrData` array holds the chart attributes and data
    $arrData = array(
      "chart" => array(
         "caption"=> "Approval response perfomance",
          "numberPrefix"=> "%",
          "enableSmartLabels"=> "0",
          "showPercentValues"=> "1",
          "showLegend"=> "1",
          "decimals"=> "1",
          "useDataPlotColorForLabels"=>"1",
          "theme"=> "fint",
          "paletteColors" => "#C9302C,#00ff00"
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

    $pieChart = new FusionCharts("pie3D", "A pie chart showing the perfomance of the system Admin" , 430, 380, "responserate", "json", $jsonEncodedData);

    // Render the chart
    $pieChart->render();
  }
?>