<html>
<style type="text/css">	
table.center{
	width:70%;
	margin-left:15%;
	margin-right:15%;
}
table.left{
	width:35%;
	margin-left:32.5%;
	margin-right:32.5%;
}
#course_level {
		font-family: "Verdana";
		
		border: 3px solid #F03B34;
	
	}
#course_level td {
		
		border: 5px;
		padding: 3px 7px 2px 7px;
		
	}
#course_level tr.alt td {
      
	}
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

<body>
<form id="formEE" name="formEE" method="GET" action="SuggestedStream.php">
<input type="hidden" name="MCGILLID" value="<?php echo $_GET['MCGILLID'];?>">

<?php

require_once('Connections/con_mcgill.php');
include ("Curriculum.php");
$CurrentCurriculum = new Curriculum();
$EEcourses = 38;
$ECEcourses = 92;
$coursesTaken = array();
$CourseLevel_100 = array();
$CourseLevel_200 = array();
$CourseLevel_300 = array();
$CourseLevel_400 = array();
$CourseLevel_XXX = array();



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


mysql_select_db($database_con_mcgill, $con_mcgill);
$query_Recordset100 = "SELECT courses.C_ID, courses.Course_Code, courses.Course_Number, courses.Course_Name FROM courses WHERE COURSE_LEVEL = '100' AND STATUS = 0 AND (PROGRAM = 'ECSE' OR PROGRAM = 'EC' OR PROGRAM = 'EE')";
$query_Recordset200 = "SELECT courses.C_ID, courses.Course_Code, courses.Course_Number, courses.Course_Name FROM courses WHERE COURSE_LEVEL = '200' AND STATUS = 0 AND (PROGRAM = 'ECSE' OR PROGRAM = 'EC' OR PROGRAM = 'EE')";
$query_Recordset300 = "SELECT courses.C_ID, courses.Course_Code, courses.Course_Number, courses.Course_Name FROM courses WHERE COURSE_LEVEL = '300' AND STATUS = 0 AND (PROGRAM = 'ECSE' OR PROGRAM = 'EC' OR PROGRAM = 'EE')";
$query_Recordset400 = "SELECT courses.C_ID, courses.Course_Code, courses.Course_Number, courses.Course_Name FROM courses WHERE COURSE_LEVEL = '400' AND STATUS = 0 AND (PROGRAM = 'ECSE' OR PROGRAM = 'EC' OR PROGRAM = 'EE')";
$query_RecordsetXXX = "SELECT courses.C_ID, courses.Course_Code, courses.Course_Number, courses.Course_Name FROM courses WHERE COURSE_LEVEL = 'xxx' AND STATUS = 0 AND (PROGRAM = 'ECSE' OR PROGRAM = 'EC' OR PROGRAM = 'EE')";	

$Recordset100 = mysql_query($query_Recordset100, $con_mcgill) or die(mysql_errno());
$Recordset200 = mysql_query($query_Recordset200, $con_mcgill) or die(mysql_errno());
$Recordset300 = mysql_query($query_Recordset300, $con_mcgill) or die(mysql_errno());
$Recordset400 = mysql_query($query_Recordset400, $con_mcgill) or die(mysql_errno());
$RecordsetXXX = mysql_query($query_RecordsetXXX, $con_mcgill) or die(mysql_errno());


//Create array to calculate size of Recordsets
for($i = 1; $i <= $ECEcourses; $i++) {
	if($query_Recordset100 = mysql_fetch_assoc($Recordset100)) {
		array_push($CourseLevel_100, $i);
		}
	
	if($query_Recordset200 = mysql_fetch_assoc($Recordset200)) {
		array_push($CourseLevel_200, $i);
		}
	
	if($query_Recordset300 = mysql_fetch_assoc($Recordset300)) {
		array_push($CourseLevel_300, $i);
		}
		
	if($query_Recordset400 = mysql_fetch_assoc($Recordset400)) {
		array_push($CourseLevel_400, $i);
		}

	if($query_RecordsetXXX = mysql_fetch_assoc($RecordsetXXX)) {
		array_push($CourseLevel_XXX, $i);
		}
}

//Find size of Recordsets and compare
if(count($CourseLevel_100) < count($CourseLevel_200)) {
	$Count_1 = count($CourseLevel_200) + 1;
	}
else if(count($CourseLevel_100) == 0 AND count($CourseLevel_200) == 0) {
	$Count_1 = 2;
}
else {
	$Count_1 = count($CourseLevel_200) + 1;
}

if(count($CourseLevel_300) < count($CourseLevel_400)) {
	$Count_2 = count($CourseLevel_400) + 1;
}
else if(count($CourseLevel_300) == 0 AND count($CourseLevel_400) == 0) {
	$Count_2 = 2;
}
else {
	$Count_2 = count($CourseLevel_300) + 1;
}

if(count($CourseLevel_XXX) == 0) {
	$Count_3 = 2;
}
else {
	$Count_3 = count($CourseLevel_XXX) + 1;
}

//Set all recordset again to fetch (initially used to calculate2 size)
$query_Recordset100 = "SELECT courses.C_ID, courses.Course_Code, courses.Course_Number, courses.Course_Name FROM courses WHERE COURSE_LEVEL = '100' AND STATUS = 0 AND (PROGRAM = 'ECSE' OR PROGRAM = 'EC' OR PROGRAM = 'EE')";
$query_Recordset200 = "SELECT courses.C_ID, courses.Course_Code, courses.Course_Number, courses.Course_Name FROM courses WHERE COURSE_LEVEL = '200' AND STATUS = 0 AND (PROGRAM = 'ECSE' OR PROGRAM = 'EC' OR PROGRAM = 'EE')";
$query_Recordset300 = "SELECT courses.C_ID, courses.Course_Code, courses.Course_Number, courses.Course_Name FROM courses WHERE COURSE_LEVEL = '300' AND STATUS = 0 AND (PROGRAM = 'ECSE' OR PROGRAM = 'EC' OR PROGRAM = 'EE')";
$query_Recordset400 = "SELECT courses.C_ID, courses.Course_Code, courses.Course_Number, courses.Course_Name FROM courses WHERE COURSE_LEVEL = '400' AND STATUS = 0 AND (PROGRAM = 'ECSE' OR PROGRAM = 'EC' OR PROGRAM = 'EE')";
$query_RecordsetXXX = "SELECT courses.C_ID, courses.Course_Code, courses.Course_Number, courses.Course_Name FROM courses WHERE COURSE_LEVEL = 'xxx' AND STATUS = 0 AND (PROGRAM = 'ECSE' OR PROGRAM = 'EC' OR PROGRAM = 'EE')";

$Recordset100 = mysql_query($query_Recordset100, $con_mcgill) or die(mysql_errno());
$Recordset200 = mysql_query($query_Recordset200, $con_mcgill) or die(mysql_errno());
$Recordset300 = mysql_query($query_Recordset300, $con_mcgill) or die(mysql_errno());
$Recordset400 = mysql_query($query_Recordset400, $con_mcgill) or die(mysql_errno());
$RecordsetXXX = mysql_query($query_RecordsetXXX, $con_mcgill) or die(mysql_errno());



$CurrentCurriculum -> drawCLTable(2, $Count_1, 1, $Recordset100, $Recordset200); ?>
<p></p>
<?php
$CurrentCurriculum -> drawCLTable(2, $Count_2, 3, $Recordset300, $Recordset400); ?>
<p></p>
<?php
$CurrentCurriculum -> drawSingleCLTable($Count_3, $RecordsetXXX, "Complementary Courses"); ?>
<p></p>

<button type="button" onclick="history.back();">Back</button>
<input type="submit" value="Submit">

</form>
</body>
</html>