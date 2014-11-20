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

</style>

<h2>Remaining Courses:</h2>


<?php 
require_once('Connections/con_mcgill.php');
include ("Curriculum.php");
$FinalCurriculum = new Curriculum();
$EEcourses = 38;
$ECEcourses = 92;
$coursesTaken = array();



// Loops through the db
// Initialize all status to 0 (not taken)
for($i = 1; $i <= $ECEcourses; $i++){
	$sql = "Update courses SET STATUS = '0' WHERE C_ID = '".$i."'";
	$temp = mysql_query($sql, $con_mcgill) or die(mysql_error());
	if (isset($_GET[$i]) and $_GET[$i] == 'on') {
			//echo "$i";
			array_push($coursesTaken, $i);
		}

	}
//echo "<br/>";
echo "<br/>";

foreach($coursesTaken as $key => $value){
	//echo $value . " --- " ;
	$sql = "UPDATE courses SET STATUS = '1' WHERE C_ID = '".$value."' ";
	$temp = mysql_query($sql, $con_mcgill) or die(mysql_error());
}

$query_FinalRecordSet = "SELECT courses.C_ID, courses.Course_Code, courses.Course_Number, courses.Course_Name FROM courses WHERE STATUS = 0 AND (PROGRAM = 'ECSE' OR PROGRAM = 'EC' OR PROGRAM = 'EE')";
$FinalRecordSet = mysql_query($query_FinalRecordSet, $con_mcgill) or die(mysql_errno());
$rows  = $EEcourses - count($coursesTaken);
$FinalCurriculum -> drawSingleTable($rows + 1, 1, $FinalRecordSet);
echo $rows;




//echo	"The following are the remaining courses"

//	<script> returnCheckedCourses() </script>
	


//<script type="text/javascript">
// stores all checked courses in an array
//function returnCheckedCourses() {
//	var index = 0;
//	var cbs = document.getElementsByTagName('input');
//	for(var i=0; i < cbs.length; i++) {
//		if(cbs[i].type == 'checkbox' & cbs[i].checked != checked) {
//			  array[index] = cbs[i].id;
//			  index++;
//		}
		
//	}
//}
//</script>
?>
<body>
</body>
</html>