<html>
<style type="text/css">	
table.center{
	width:50%;
	margin-left:30%;
	margin-right:30%;
}
table.left{
	width:35%;
	margin-left:30%;
	margin-right:30	%;
}
#thistable {
		font-family: "Verdana";
		
		border: 3px solid #F03B34;
	
	}
	#thistable td {
		
		
		border: 5px;
		padding: 3px 7px 2px 7px;
		
	}
	#thistable tr.alt td {
    
	
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
<?php
require_once('Connections/con_mcgill.php');
include("Curriculum.php");
?>
<h2>The following is a suggested stream!</h2>
<?php
$suggestedCurriculum = new Curriculum();
$currentCourses = array();
$todoCourses = array();
$ECEcourses = 92; 

for($i = 1; $i <= $ECEcourses; $i++) {
	$sql = "UPDATE courses SET STATUS = '0' WHERE C_ID = '".$i."' AND STATUS = '2'";
	$temp = mysql_query($sql, $con_mcgill) or die(mysql_error());
	if(isset($_GET[$i]) and $_GET[$i] == 'on') {
		array_push($currentCourses, $i);
	}
}

// sets status "CURRENTLY TAKING" to checked courses in CurrentSemester
foreach($currentCourses as $key => $value){
	$sql = "UPDATE courses SET STATUS = '2' WHERE C_ID = '".$value."' ";
	$temp = mysql_query($sql, $con_mcgill) or die(mysql_error());
}

// Save currently taking courses
$query_RecordSetCC = "SELECT courses.C_ID, courses.Course_Code, courses.Course_Number, courses.Course_Name FROM courses WHERE STATUS = 2 AND (PROGRAM = 'ECSE' OR PROGRAM = 'EC' OR PROGRAM = 'EE')";
$RecordSetCC = mysql_query($query_RecordSetCC, $con_mcgill) or die(mysql_errno());
$Count_CC = count($currentCourses) + 1;

//Save TODO courses
$query_RecordSetTD = "SELECT courses.C_ID, courses.Course_Code, courses.Course_Number, courses.Course_Name FROM courses WHERE STATUS = 0 AND (PROGRAM = 'ECSE' OR PROGRAM = 'EC' OR PROGRAM = 'EE')";
$RecordSetTD = mysql_query($query_RecordSetTD, $con_mcgill) or die(mysql_errno());

//Create RecordSet for Counting purposes
$query_RecordSetCount = "SELECT courses.C_ID, courses.Course_Code, courses.Course_Number, courses.Course_Name FROM courses WHERE STATUS = 0 AND (PROGRAM = 'ECSE' OR PROGRAM = 'EC' OR PROGRAM = 'EE')";
$RecordSetCount = mysql_query($query_RecordSetCount, $con_mcgill) or die(mysql_errno());

// Draw current semester
$suggestedCurriculum -> drawSemesterTable($Count_CC, $RecordSetCC, "Your Current Semester");

// Find Stream Algorithm
for($i = 1; $i <= $ECEcourses; $i++) {
	if($query_RecordsetTD = mysql_fetch_assoc($RecordSetTD)) {
		array_push($todoCourses, $i);
	}
}

// To be used in algorithm
$query_RecordSetTD = "SELECT courses.C_ID, courses.Course_Code, courses.Course_Number, courses.Course_Name FROM courses WHERE STATUS = 0 AND (PROGRAM = 'ECSE' OR PROGRAM = 'EC' OR PROGRAM = 'EE')";
$RecordSetTD = mysql_query($query_RecordSetTD, $con_mcgill) or die(mysql_errno());

$Count_TD = count($todoCourses);

$numOfSemesters = ($Count_TD/5);
echo $numOfSemesters;

$counter = 0;
for($i = 1; $i <= $numOfSemesters; $i++) {
	while($row_RecordSetCount = mysql_fetch_assoc($RecordSetCount) AND $counter < 6) {
		//$query_RecordSetTD = mysql_fetch_assoc($RecordSetTD);
		$counter++;
	}
	$suggestedCurriculum -> drawSemesterTable($counter + 1, $RecordSetTD, "Next Semester");
	$counter = 0;
}

//$suggestedCurriculum -> drawSingleCLTable($Count_CC, $RecordSetCC, "Your Current Semester");
//$suggestedCurriculum -> drawSingleCLTable($Count_CC, $RecordSetCC, "Your Next Semester");

?>
<button type="button" onclick="history.back()">Back</button>
</body>
</html>

