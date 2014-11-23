<html>
<style>

</style>

<?php
require_once('Connections/con_mcgill.php');
include("Curriculum.php");
echo "Suggested Stream";
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
$Count_CC = count($currentCourses);

//Save TODO courses
$query_RecordsetTD = "SELECT courses.C_ID, courses.Course_Code, courses.Course_Number, courses.Course_Name FROM courses WHERE STATUS = 0 AND (PROGRAM = 'ECSE' OR PROGRAM = 'EC' OR PROGRAM = 'EE')";
$RecordSetTD = mysql_query($query_RecordSetTD, $con_mcgill) or die(mysql_errno());

// Find Stream Algorithm
for($i = 1; $i <= $ECEcourses; $i++) {
	if($query_RecordsetTD = mysql_fetch_asoc($RecordSetTD)) {
		array_push($todoCourses, $i);
	}
}

$Count_TD = count($todoCourses);

 








//$suggestedCurriculum -> drawSingleCLTable($Count_CC, $RecordSetCC, "Your Current Semester");


?>
</html>

