<html>
<style type="text/css">	
table.center{
	width:70%;
	margin-left:15%;
	margin-right:15%;
}
table.left{
	width:35%;
	margin-left:15%;
	margin-right:50%;
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
$query_Recordset6 = "SELECT courses.C_ID, courses.Course_Code, courses.Course_Number, courses.Course_Name FROM courses WHERE C_ID > 26 AND C_ID <= 32";
$query_Recordset7 = "SELECT courses.C_ID, courses.Course_Code, courses.Course_Number, courses.Course_Name FROM courses WHERE C_ID > 32 AND C_ID <= 38";

$Recordset1 = mysql_query($query_Recordset1, $con_mcgill) or die(mysql_errno());
$Recordset2 = mysql_query($query_Recordset2, $con_mcgill) or die(mysql_errno());
$Recordset3 = mysql_query($query_Recordset3, $con_mcgill) or die(mysql_errno());
$Recordset4 = mysql_query($query_Recordset4, $con_mcgill) or die(mysql_errno());
$Recordset5 = mysql_query($query_Recordset5, $con_mcgill) or die(mysql_errno());
$Recordset6 = mysql_query($query_Recordset6, $con_mcgill) or die(mysql_errno());
$Recordset7 = mysql_query($query_Recordset7, $con_mcgill) or die(mysql_errno());

$EECurriculum -> drawTable(2, 7, 1, $Recordset1, $Recordset2); ?>
<p></p>
<?php
$EECurriculum -> drawTable(2, 6, 3, $Recordset3, $Recordset4); ?>
<p></p>
<?php
$EECurriculum -> drawTable(2, 7, 5, $Recordset5, $Recordset6); ?>
<p></p>
<?php
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
				if(cbs[i].type == 'checkbox' & cbs[i].id > 26 & cbs[i].id <= 32) {
					cbs[i].checked = bx.checked;
				}
				break;
			case 7: 
				if(cbs[i].type == 'checkbox' & (cbs[i].id > 32 & cbs[i].id <= 38)) {
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
<button type="button" onclick="goBack()">Back</button>
<input type="submit" value="Submit"></input>

	
</form>
</body>
</html>	