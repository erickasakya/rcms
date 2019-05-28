</div>
<!--footer section start-->
	<footer>
	   <p>Copyright &copy; 2016-2018 CoCIS Makerere University</p>
	</footer>
<!--footer section end-->
</div>
</div>
<!--//content-inner-->
<script type="text/javascript" src="../Assets/js/jquery.dataTables.min.js"></script>
<script type="text/javascript" src="../Assets/js/dataTables.bootstrap.min.js"></script>
<script type="text/javascript" src="../Assets/js/bootstrap.min.js"></script>
<script type="text/javascript" src="../Assets/js/moment.min.js"></script>
<script type="text/javascript" src="../Assets/js/daterangepicker.js"></script>
<script type="text/javascript" src="../Assets/js/intlTelInput.js"></script>
<script type="text/javascript" src="../Assets/Fusioncharts/js/fusioncharts.js"></script>
<script type="text/javascript" src="../Assets/Fusioncharts/js/fusioncharts.charts.js"></script>
<script type="text/javascript" src="../Assets/Fusioncharts/js/themes/fusioncharts.theme.fint.js"></script>

<script type="text/javascript" src="../Assets/jquery/dataTables.buttons.min.js"></script>
<script type="text/javascript" src="../Assets/jquery/buttons.flash.min.js"></script>
<script type="text/javascript" src="../Assets/jquery/jszip.min.js"></script>
<script type="text/javascript" src="../Assets/jquery/pdfmake.min.js"></script>
<script type="text/javascript" src="../Assets/jquery/vfs_fonts.js"></script>
<script type="text/javascript" src="../Assets/jquery/buttons.html5.min.js"></script>
<script type="text/javascript" src="../Assets/jquery/buttons.print.min.js"></script>


 <!-- Modal -->
<div class="modal fade" id="secretcode" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title" text-success id="modalLabel" style="text-align: center;">ENTER SECRET CODE</h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
        <div class="modal-body" id="modalbody">
         <form>
            <div class="alert alert-danger" id="codefeedback"></div>
            <input type="hidden" id="loginActive" name="loginActive" value="1">
              <div class="form-group">
                <label for="code">Secret Code</label>
                <input type="password" class="form-control" name="code" id="code" placeholder="secret code" autofocus>
              </div>
            </form>
        </div>
        <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-success" id="submitcode">Send</button>
                   
        </div>
      </div>
    </div>
  </div>
<script type="text/javascript">
$("#codefeedback").hide();

$("#others").click(function() {
  var $toggle=$(this);
  if ($toggle.prop('checked')===true) {
    $("#enter").html('<input type="text" autofocus class="form-control" placeholder="other complaint" name="complaintType" id="hiddenothers" required><div class="help-block with-errors"></div>');
  }  
});

$(".hideit").click(function() {
  var $toggle=$(this);
  if ($toggle.prop('checked')===true) {
    $("#enter").html('');
  }
});
//The delete function in the HOD section     
function confirmdelete(id){
       $("#delmodal").modal({show:"true", backdrop:""});
       $("#deleteMe").click(function(){

           $.post("deleteTeaching.php",{teachingID:id},
            function(data){
               if(data =="deleted"){
                window.location.href="Teachings.php";
              }else {
                alert(data);
              }
            });
      });
        return false;
    }


   $("#submitcode").click(function(){
      $.ajax({
        type: "POST",
        url:  "http://localhost:8080/rcms/securitycode.php?action=submitcode",
        data: "code=" + $("#code").val(),
        success: function (result) {
          if (result=="h1") {
            window.location = $('.confirm').attr('href');
           }else{
            $("#codefeedback").html(result).show();
           }
        }
      });
   });
//code for updating the notification tab
$("#change").click(function(){
  var type=$('#change').attr('type');
      $.ajax({
        type: "POST",
        url:  "http://localhost:8080/rcms/notifications.php?action="+type,
        success: function (result) {
          if (result==1) {
            $("#num").html();
           }else{
            
           }
        }
      });
   });

//code for updating the Comment tab
$("#comment").click(function(){
  var type=$('#comment').attr('type');
      $.ajax({
        type: "POST",
        url:  "http://localhost:8080/rcms/student/updatecomment.php?action="+type,
        success: function (result) {
          if (result==1) {
            $("#num").html();
           }else{
            
           }
        }
      });
   });

$(document).ready(function() {

//with excel option
    $('#table').DataTable( {
        aLengthMenu: [[5, 10, 50,100, -1], [5, 10, 50,100, "All"]],
        pageLength: 10,
        dom: 'Bfrtip',
        buttons: [
            'print', 'pdf', 'excel'
        ]
    } );

//without excel option
    $('#table2').DataTable( {
        aLengthMenu: [[5, 10, 50,100, -1], [5, 10, 50,100, "All"]],
        pageLength: 10,
        dom: 'Bfrtip',
        buttons: [
            'print', 'pdf'
        ]
    } );

//validation for forms
$().submit(function (e) {
        e.preventDefault();
        $(this).validator('validate');
        var err0r=$(this).find('.has-error');
        if (err0r.length >0) {
            return false;
        }
    });

} );

//The phone number and country plugin
$(function () {
      $("#studenttel,#tel").intlTelInput({
            autoHideDialCode: true,
            autoPlaceholder: true,
            separateDialCode: true,
            nationalMode: true,
            preventInvalidNumbers: true,
            geoIpLookup: function (callback) {
                $.get("http://ipinfo.io", function () {}, "jsonp").always(function (resp) {
                    var countryCode = (resp && resp.country) ? resp.country : "";
                    callback(countryCode);
                });
            },
            initialCountry: "auto",
        });

        // get the country data from the plugin
        var countryData = $.fn.intlTelInput.getCountryData(),
          telInput = $("#studenttel,#tel"),
          addressDropdown = $("#studentlistcountry,#listcountry");
        // init plugin
        telInput.intlTelInput({
         utilsScript: "https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/8.4.6/js/utils.js" // just for formatting/placeholders etc
        });

        // populate the country dropdown
        $.each(countryData, function(i, country) {
          addressDropdown.append($("<option></option>").attr("value", country.iso2).text(country.name));
        });

        // update the hidden input on submit
        $("#registerstudent,#registerstaff").submit(countryData,function(i, country) {
          $("#studentcountry,#country").val(telInput.intlTelInput("getSelectedCountryData").name);
          $("#studenttelfull,#telfull").val('+' + telInput.intlTelInput("getSelectedCountryData").dialCode + $("#studenttel,#tel").val());      
        });

      });

//intializing datepicker function
$(function() {
    $('input[name="DOB"]').daterangepicker({
        singleDatePicker: true,
        showDropdowns: true,
        locale: {
            format: 'YYYY-MM-DD'
        },
        startDate: '1994-11-03',
        maxDate: '1999-12-31',
        minDate: '1922-01-01',
    });
});

//retrieving courseunit for assigning teaching
function changeFunc() {
    var semester = document.getElementById("semester");
    var yearofstudy = document.getElementById("yearofstudy");
    var semesterValue = semester.options[semester.selectedIndex].value;
    var yearofstudyValue = yearofstudy.options[yearofstudy.selectedIndex].value;

    if (yearofstudyValue !="select the year of study" && semesterValue != "Please select the semester" ) {
      
      $.ajax({
            type: "POST",
            url:  "HODactions.php?action=getcourseunit",
            data: "semester="+$('#semester').find(":selected").text()+"&yearofstudy="+$('#yearofstudy').find(":selected").text(),
            success: function (result) {
              if (result !="") {
                $("select[name^='courseunit']").empty();
                $("select[name^='courseunit']").append(result); 
               }else{
                $("select[name^='courseunit']").empty();
                $("select[name^='courseunit']").append("<option>Please choose the semester and year of study</option>"); 
               }
            }
          });
    }
  
  }


//Retrieving courseunits for complaining
 function complainCourseunit(){
    var yearOfSitting = document.getElementById("yearOfSitting");
    var yearOfSittingValue = yearOfSitting.options[yearOfSitting.selectedIndex].value;
    var semester = document.getElementById("semester");
    var semesterValue = semester.options[semester.selectedIndex].value;
    if (yearOfSittingValue !="Choose academic year of sitting" && semesterValue !="Choose Semester of sitting") {
      
      $.ajax({
            type: "POST",
            url:  "studentfunctions.php?action=getoffering",
            data: "yearOfSitting="+$('#yearOfSitting').find(":selected").text()+"&studentNo="+$('#studentNo').val()+"&semester="+$('#semester').find(":selected").text(),
            success: function (result) {
              if (result !="") {
                $("select[name='courseunit']").empty(); 
                $("select[name='courseunit']").append("<option>please choose the courseunit</option>");
                $("select[name='courseunit']").append(result); 
               }else{
                $("select[name='courseunit']").empty();
                $("select[name='courseunit']").append("<option>Please choose correct year of sitting</option>"); 
               }
            }
          });
    }

  }

//Retrieving courseunits for complaining
 function complainLecturer(){
    var courseunit = document.getElementById("courseunit");
    var courseunitValue = courseunit.options[courseunit.selectedIndex].value;
    if (courseunitValue !="please choose courseunit") {
      
      $.ajax({
            type: "POST",
            url:  "studentfunctions.php?action=getLecturer",
            data: "yearOfSitting="+$('#yearOfSitting').find(":selected").text()+"&studentNo="+$('#studentNo').val()+"&course_id="+$('#courseunit').find(":selected").val(),
            success: function (result) {
              if (result !="") {
                $("select[name='lecturerID']").empty(); 
                $("select[name='lecturerID']").append("<option>please choose the lecturer</option>");
                $("select[name='lecturerID']").append(result); 
               }else{
                $("select[name='lecturerID']").empty();
                $("select[name='lecturerID']").append("<option>Please choose correct courseunit</option>"); 
               }
            }
          });
    }

  }



//Retrieving courseunit for student registration
function courseunitOffering() {
    var semester = document.getElementById('semester');
    var yearofstudy = document.getElementById('yearofstudy');
    var academicyear = document.getElementById('academicyear');
    var program = document.getElementById("program");

    var semesterValue = semester.options[semester.selectedIndex].value;
    var yearofstudyValue = yearofstudy.options[yearofstudy.selectedIndex].value;
    var academicyearValue = academicyear.options[academicyear.selectedIndex].value;
    var programValue = program.options[program.selectedIndex].value;


    if (semesterValue !="Please select semester" && yearofstudyValue !="select the year of study" && academicyearValue !="Choose academic year" && programValue !="Choose program") {
      
      $.ajax({
            type: "POST",
            url:  "studentfunctions.php?action=registercourseunit",
            data: "semester="+$('#semester').find(":selected").text()+"&yearofstudy="+$('#yearofstudy').find(":selected").text()+"&academicyear="+$('#academicyear').find(":selected").val()+"&program="+$('#program').find(":selected").text()+"&dept_ID="+$('#dept_ID').val(),
            success: function (result) {
              if (result !="") {
                $("select[name^='courseunit']").empty(); 
                $("select[name^='courseunit']").append("<option>Please choose the courseunit</option>");
                $("select[name^='courseunit']").append(result); 
               }else{
                $("select[name^='courseunit']").empty();
                $("select[name^='courseunit']").append("<option>Please make sure the 4 fields are correct</option>"); 
               }
            }
          });
    }
}

   </script>
</body>
</html>