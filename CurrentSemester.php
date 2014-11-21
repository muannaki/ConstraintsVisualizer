<html>
<style type="text/css">	
body {
	background-color: #f5f5dc;
	text-align: center;
	color: #b23524;
	font-family: "Verdana";
	}
input {
	float: right;
	}
button {
	float: left;
	}
	
</style>

<?php

require_once('Connections/con_mcgill.php');
include ("Curriculum.php");
$CurrentCurriculum = new Curriculum();
$EEcourses = 38;
$ECEcourses = 92;
$coursesTaken = array();

?> <h2>Your Current Semester</h2>
   <h3>Please select all courses you are currently taking!</h3>
<?php 

// Loops through the db
// Initialize all status to 0 (not taken)
// pushes checked C_ID into array
for($i = 1; $i <= $ECEcourses; $i++){
	$sql = "Update courses SET STATUS = '0' WHERE C_ID = '".$i."'";
	$temp = mysql_query($sql, $con_mcgill) or die(mysql_error());
	if (isset($_GET[$i]) and $_GET[$i] == 'on') {
			//echo "$i";
			array_push($coursesTaken, $i);
		}
	}

// sets status "TAKEN" to all checked courses
foreach($coursesTaken as $key => $value){
	//echo $value . " --- " ;
	$sql = "UPDATE courses SET STATUS = '1' WHERE C_ID = '".$value."' ";
	$temp = mysql_query($sql, $con_mcgill) or die(mysql_error());
}



//mysql_select_db($database_con_mcgill, $con_mcgill);

//$query_RecordsetTest = "SELECT courses.C_ID, courses.Course_Code, courses.Course_Number, courses.Course_Name FROM courses WHERE LEFT(courses.C_ID, 1) = 2 AND STATUS = 0 AND (PROGRAM = 'ECSE' OR PROGRAM = 'EC' OR PROGRAM = 'EE')";
$query_Recordset100 = "SELECT courses.C_ID, courses.Course_Code, courses.Course_Number, courses.Course_Name FROM courses WHERE COURSE_LEVEL = '100' AND STATUS = 0 AND (PROGRAM = 'ECSE' OR PROGRAM = 'EC' OR PROGRAM = 'EE')";
$query_Recordset200 = "SELECT courses.C_ID, courses.Course_Code, courses.Course_Number, courses.Course_Name FROM courses WHERE COURSE_LEVEL = '200' AND STATUS = 0 AND (PROGRAM = 'ECSE' OR PROGRAM = 'EC' OR PROGRAM = 'EE')";
$query_Recordset300 = "SELECT courses.C_ID, courses.Course_Code, courses.Course_Number, courses.Course_Name FROM courses WHERE COURSE_LEVEL = '300' AND STATUS = 0 AND (PROGRAM = 'ECSE' OR PROGRAM = 'EC' OR PROGRAM = 'EE')";
$query_Recordset400 = "SELECT courses.C_ID, courses.Course_Code, courses.Course_Number, courses.Course_Name FROM courses WHERE COURSE_LEVEL = '400' AND STATUS = 0 AND (PROGRAM = 'ECSE' OR PROGRAM = 'EC' OR PROGRAM = 'EE')";
$query_RecordsetXXX = "SELECT courses.C_ID, courses.Course_Code, courses.Course_Number, courses.Course_Name FROM courses WHERE COURSE_LEVEL = 'xxx' AND STATUS = 0 AND (PROGRAM = 'ECSE' OR PROGRAM = 'EC' OR PROGRAM = 'EE')";	

//$RecordsetTest = mysql_query($query_RecordsetTest, $con_mcgill) or die(mysql_errno());
$Recordset100 = mysql_query($query_Recordset100, $con_mcgill) or die(mysql_errno());
$Recordset200 = mysql_query($query_Recordset200, $con_mcgill) or die(mysql_errno());
$Recordset300 = mysql_query($query_Recordset300, $con_mcgill) or die(mysql_errno());
$Recordset400 = mysql_query($query_Recordset400, $con_mcgill) or die(mysql_errno());
$RecordsetXXX = mysql_query($query_RecordsetXXX, $con_mcgill) or die(mysql_errno());

$CurrentCurriculum -> drawCLTable(2, 50, 1, $Recordset100, $Recordset200);
$CurrentCurriculum -> drawCLTable(2, 30, 3, $Recordset300, $Recordset400);
$CurrentCurriculum -> drawSingleCLTable(20, $RecordsetXXX);
//$CurrentCurriculum -> drawSingleTable(10, 1, $RecordsetTest);
//$CurrentCurriculum -> drawSingleTable(5, 8, $Recordset100);
//$CurrentCurriculum -> drawCourseLevelTable(5, 9, $Recordset100, $Recordset200, $Recordset300, $Recordset400, $Recordset500);
?>
</html>
   