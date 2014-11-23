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

<body>
<form id="formEE" name="formEE" method="GET" action="CurrentSemester.php">

<input type="hidden" name="MCGILLID" value="<?php echo $_GET['MCGILLID'];?>">


<?php
require_once('Connections/con_mcgill.php');
include ("Curriculum.php");

$EECurriculum = new Curriculum();

//$EEMySQL = new MySQL();
?> <h2>Electrical Engineering Curriculum</h2>
   <h3>Please check all completed courses!</h3>
<?php

mysql_select_db($database_con_mcgill, $con_mcgill);
$query_Recordset1 = "SELECT courses.C_ID, courses.Course_Code, courses.Course_Number, courses.Course_Name FROM courses WHERE C_ID <= 5";
$query_Recordset2 = "SELECT courses.C_ID, courses.Course_Code, courses.Course_Number, courses.Course_Name FROM courses WHERE C_ID >  5 AND C_ID <= 11";
$query_Recordset3 = "SELECT courses.C_ID, courses.Course_Code, courses.Course_Number, courses.Course_Name FROM courses WHERE C_ID > 11 AND C_ID <= 16";
$query_Recordset4 = "SELECT courses.C_ID, courses.Course_Code, courses.Course_Number, courses.Course_Name FROM courses WHERE C_ID > 16 AND C_ID <= 21";
$query_Recordset5 = "SELECT courses.C_ID, courses.Course_Code, courses.Course_Number, courses.Course_Name FROM courses WHERE C_ID > 21 AND C_ID <= 26";
$query_Recordset6 = "SELECT courses.C_ID, courses.Course_Code, courses.Course_Number, courses.Course_Name FROM courses WHERE C_ID IN (27, 28, 29, 31, 35, 36) ORDER BY FIELD (C_ID, 27, 28, 29, 35, 36, 31)";
$query_Recordset7 = "SELECT courses.C_ID, courses.Course_Code, courses.Course_Number, courses.Course_Name FROM courses WHERE C_ID IN (30, 32, 37, 38, 33, 34) ORDER BY FIELD (C_ID, 30, 37, 38, 34, 32, 33)";

$Recordset1 = mysql_query($query_Recordset1, $con_mcgill) or die(mysql_errno());
$Recordset2 = mysql_query($query_Recordset2, $con_mcgill) or die(mysql_errno());
$Recordset3 = mysql_query($query_Recordset3, $con_mcgill) or die(mysql_errno());
$Recordset4 = mysql_query($query_Recordset4, $con_mcgill) or die(mysql_errno());
$Recordset5 = mysql_query($query_Recordset5, $con_mcgill) or die(mysql_errno());
$Recordset6 = mysql_query($query_Recordset6, $con_mcgill) or die(mysql_errno());
$Recordset7 = mysql_query($query_Recordset7, $con_mcgill) or die(mysql_errno());

$EECurriculum -> drawTable(2, 7, 1, $Recordset1, $Recordset2);
$EECurriculum -> drawTable(2, 6, 3, $Recordset3, $Recordset4);
$EECurriculum -> drawTable(2, 7, 5, $Recordset5, $Recordset6);
$EECurriculum -> drawSingleTable(7,7, $Recordset7);

?>



<script type="text/javascript">
// Automatically checks all courses of a specifc semester
function checkSemester(semester, bx) {
	  var cbs = document.getElementsByTagName('input');
	  for(var i=0; i < cbs.length; i++) {
		switch(semester) {
			case 1:
				if(cbs[i].type == 'checkbox' & cbs[i].id <= 5) {
	    			cbs[i].checked = bx.checked;
				}
				break;
			case 2:
				if(cbs[i].type == 'checkbox' & cbs[i].id > 5 & cbs[i].id <= 11) {
					cbs[i].checked = bx.checked;
				}
				break;
			case 3: 
				if(cbs[i].type == 'checkbox' & cbs[i].id > 11 & cbs[i].id <= 16) {
					cbs[i].checked = bx.checked;
				}
				break;
			case 4:
				if(cbs[i].type == 'checkbox' & cbs[i].id > 16 & cbs[i].id <= 21) {
					cbs[i].checked = bx.checked;
				}
				break;
			case 5:
				if(cbs[i].type == 'checkbox' & cbs[i].id > 21 & cbs[i].id <= 26) {
					cbs[i].checked = bx.checked;
				}
				break;
			case 6:
				if(cbs[i].type == 'checkbox' & (cbs[i].id == 27 | cbs[i].id == 28 | cbs[i].id == 29 | cbs[i].id == 31 | cbs[i].id == 35 | cbs[i].id == 36)) {
					cbs[i].checked = bx.checked;
				}
				break;
			case 7: 
				if(cbs[i].type == 'checkbox' & (cbs[i].id == 30 | cbs[i].id == 32 | cbs[i].id == 37 | cbs[i].id == 38 | cbs[i].id == 33 | cbs[i].id == 34)) {
					cbs[i].checked = bx.checked;
				}
				break; 
	   		}
	 	}
	}
</script>

<script>
function goBack() {
	window.history.back()
	}
</script>
<button onclick="goBack()">Back</button>
<input type="submit" value="Submit">


</form>
</body>
</html>	