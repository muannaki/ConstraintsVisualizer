<html>
<style type="text/css">	

tr.eachrow td {
	
	border: 1px solid black;
	
}
td.namecell {
	width: 18em;
}

#thistable {
		font-family: "Verdana";
		 border: 3px solid #F03B34;
		
	
	}
	#thistable td {
		
		text-align:center; 
    vertical-align:middle;
		
		
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
	
	.hor{
float:center;
width:3000px;
height:300px;
overflow: auto; white-space: nowrap; 
}
	
</style>

<body>
<?php
require_once('Connections/con_mcgill.php');
include("Curriculum.php");
?>
<h2>The following is a suggested stream based on the 7-Semester EE Program</h2>
<?php

mysql_select_db($database_con_mcgill, $con_mcgill);
$suggestedCurriculum = new Curriculum();
$currentCourses = array();
$todoCourses = array();
$ECEcourses = 92; 
$RecordSetP1_Array = array();
$RecordSetP2_Array = array();
$RecordSetP3_Array = array();
$RecordSetP4_Array = array();
$RecordSetP5_Array = array();
$RecordSetP6_Array = array();
$RecordSetP7_Array = array();
$RecordSetP9_Array = array();

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
$query_RecordSetCC = "SELECT * FROM courses WHERE STATUS = 2 AND (PROGRAM = 'ECSE' OR PROGRAM = 'EC' OR PROGRAM = 'EE')";
$RecordSetCC = mysql_query($query_RecordSetCC, $con_mcgill) or die(mysql_errno());
$Count_CC = count($currentCourses) + 1;

//Save TODO courses
$query_RecordSetTD = "SELECT courses.C_ID, courses.Course_Code, courses.Course_Number, courses.Course_Name FROM courses WHERE STATUS = 0 AND (PROGRAM = 'ECSE' OR PROGRAM = 'EC' OR PROGRAM = 'EE')";
$RecordSetTD = mysql_query($query_RecordSetTD, $con_mcgill) or die(mysql_errno());

//Create RecordSet for Counting purposes
$query_RecordSetCount = "SELECT courses.C_ID, courses.Course_Code, courses.Course_Number, courses.Course_Name FROM courses WHERE STATUS = 0 AND (PROGRAM = 'ECSE' OR PROGRAM = 'EC' OR PROGRAM = 'EE')";
$RecordSetCount = mysql_query($query_RecordSetCount, $con_mcgill) or die(mysql_errno());

// Draw current semester
//$suggestedCurriculum -> drawSemesterTable($Count_CC, $RecordSetCC, "Your Current Semester");


$query_RecordSetP1 = "SELECT * FROM courses WHERE STATUS = 0 AND METRIC = 1 AND (PROGRAM = 'ECSE' OR PROGRAM = 'EC' OR PROGRAM = 'EE')";
$RecordSetP1 = mysql_query($query_RecordSetP1, $con_mcgill) or die(mysql_errno());
$query_RecordSetC1 = "SELECT courses.C_ID FROM courses WHERE STATUS = 0 AND METRIC = 1 AND (PROGRAM = 'ECSE' OR PROGRAM = 'EC' OR PROGRAM = 'EE')";
$RecordSetC1 = mysql_query($query_RecordSetP1, $con_mcgill) or die(mysql_errno());

$query_RecordSetP2 = "SELECT * FROM courses WHERE STATUS = 0 AND METRIC = 2 AND (PROGRAM = 'ECSE' OR PROGRAM = 'EC' OR PROGRAM = 'EE')";
$RecordSetP2 = mysql_query($query_RecordSetP2, $con_mcgill) or die(mysql_errno());
$query_RecordSetC2 = "SELECT courses.C_ID FROM courses WHERE STATUS = 0 AND METRIC = 2 AND (PROGRAM = 'ECSE' OR PROGRAM = 'EC' OR PROGRAM = 'EE')";
$RecordSetC2 = mysql_query($query_RecordSetP2, $con_mcgill) or die(mysql_errno());

$query_RecordSetP3 = "SELECT * FROM courses WHERE STATUS = 0 AND METRIC = 3 AND (PROGRAM = 'ECSE' OR PROGRAM = 'EC' OR PROGRAM = 'EE')";
$RecordSetP3 = mysql_query($query_RecordSetP3, $con_mcgill) or die(mysql_errno());
$query_RecordSetC3 = "SELECT courses.C_ID FROM courses WHERE STATUS = 0 AND METRIC = 3 AND (PROGRAM = 'ECSE' OR PROGRAM = 'EC' OR PROGRAM = 'EE')";
$RecordSetC3 = mysql_query($query_RecordSetP3, $con_mcgill) or die(mysql_errno());

$query_RecordSetP4 = "SELECT * FROM courses WHERE STATUS = 0 AND METRIC = 4 AND (PROGRAM = 'ECSE' OR PROGRAM = 'EC' OR PROGRAM = 'EE')"; 
$RecordSetP4 = mysql_query($query_RecordSetP4, $con_mcgill) or die(mysql_errno());
$query_RecordSetC4 = "SELECT courses.C_ID FROM courses WHERE STATUS = 0 AND METRIC = 4 AND (PROGRAM = 'ECSE' OR PROGRAM = 'EC' OR PROGRAM = 'EE')"; 
$RecordSetC4 = mysql_query($query_RecordSetP4, $con_mcgill) or die(mysql_errno());

$query_RecordSetP5 = "SELECT * FROM courses WHERE STATUS = 0 AND METRIC = 5 AND (PROGRAM = 'ECSE' OR PROGRAM = 'EC' OR PROGRAM = 'EE')";
$RecordSetP5 = mysql_query($query_RecordSetP5, $con_mcgill) or die(mysql_errno());
$query_RecordSetC5 = "SELECT courses.C_ID FROM courses WHERE STATUS = 0 AND METRIC = 5 AND (PROGRAM = 'ECSE' OR PROGRAM = 'EC' OR PROGRAM = 'EE')";
$RecordSetC5 = mysql_query($query_RecordSetP5, $con_mcgill) or die(mysql_errno());

$query_RecordSetP6 = "SELECT * FROM courses WHERE STATUS = 0 AND METRIC = 6 AND (PROGRAM = 'ECSE' OR PROGRAM = 'EC' OR PROGRAM = 'EE')";
$RecordSetP6 = mysql_query($query_RecordSetP6, $con_mcgill) or die(mysql_errno());
$query_RecordSetC6 = "SELECT courses.C_ID FROM courses WHERE STATUS = 0 AND METRIC = 6 AND (PROGRAM = 'ECSE' OR PROGRAM = 'EC' OR PROGRAM = 'EE')";
$RecordSetC6 = mysql_query($query_RecordSetP6, $con_mcgill) or die(mysql_errno());

$query_RecordSetP7 = "SELECT * FROM courses WHERE STATUS = 0 AND METRIC = 7 AND (PROGRAM = 'ECSE' OR PROGRAM = 'EC' OR PROGRAM = 'EE')";
$RecordSetP7 = mysql_query($query_RecordSetP7, $con_mcgill) or die(mysql_errno());
$query_RecordSetC7 = "SELECT courses.C_ID FROM courses WHERE STATUS = 0 AND METRIC = 7 AND (PROGRAM = 'ECSE' OR PROGRAM = 'EC' OR PROGRAM = 'EE')";
$RecordSetC7 = mysql_query($query_RecordSetP7, $con_mcgill) or die(mysql_errno());

$query_RecordSetP9 = "SELECT * FROM courses WHERE STATUS = 0 AND METRIC = 9 AND (PROGRAM = 'ECSE' OR PROGRAM = 'EC' OR PROGRAM = 'EE')";
$RecordSetP9 = mysql_query($query_RecordSetP9, $con_mcgill) or die(mysql_errno());
$query_RecordSetC9 = "SELECT courses.C_ID FROM courses WHERE STATUS = 0 AND METRIC = 9 AND (PROGRAM = 'ECSE' OR PROGRAM = 'EC' OR PROGRAM = 'EE')";
$RecordSetC9 = mysql_query($query_RecordSetP9, $con_mcgill) or die(mysql_errno());

for($i = 1; $i <= $ECEcourses; $i++) {
	if($query_RecordSetC1 = mysql_fetch_assoc($RecordSetC1)) {
		array_push($RecordSetP1_Array, $i);
		}
	
	if($query_RecordSetC2 = mysql_fetch_assoc($RecordSetC2)) {
		array_push($RecordSetP2_Array, $i);
		}
	
	if($query_RecordSetC3 = mysql_fetch_assoc($RecordSetC3)) {
		array_push($RecordSetP3_Array, $i);
		}
		
	if($query_RecordSetC4 = mysql_fetch_assoc($RecordSetC4)) {
		array_push($RecordSetP4_Array, $i);
		}

	if($query_RecordSetC5 = mysql_fetch_assoc($RecordSetC5)) {
		array_push($RecordSetP5_Array, $i);
		}

	if($query_RecordSetC6 = mysql_fetch_assoc($RecordSetC6)){
		array_push($RecordSetP6_Array, $i);
	}

	if($query_RecordSetC7 = mysql_fetch_assoc($RecordSetC7)){
		array_push($RecordSetP7_Array, $i);
	}

	if($query_RecordSetC9 = mysql_fetch_assoc($RecordSetC9)){
		array_push($RecordSetP9_Array, $i);
	}

}

$Count_P1 = count($RecordSetP1_Array);
$Count_P2 = count($RecordSetP2_Array);
$Count_P3 = count($RecordSetP3_Array);
$Count_P4 = count($RecordSetP4_Array);
$Count_P5 = count($RecordSetP5_Array);
$Count_P6 = count($RecordSetP6_Array);
$Count_P7 = count($RecordSetP7_Array);
$Count_P9 = count($RecordSetP9_Array);



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
// echo $numOfSemesters;

//$counter = 0;
//for($i = 1; $i <= $numOfSemesters; $i++) {
//	while($row_RecordSetCount = mysql_fetch_assoc($RecordSetCount) AND $counter < 6) {
//		$counter++;
//	}
//$suggestedCurriculum -> drawSemesterTable($RecordSetP1, $RecordSetP2, $RecordSetP3, $RecordSetP4, $RecordSetP5, $RecordSetP6, $RecordSetP9, $Cout_P1, $Cout_P2, $Cout_P3, $Cout_P4, $Cout_P5, $Cout_P6, $Cout_P9);
//	$counter = 0;
//}

//$suggestedCurriculum -> drawSingleCLTable($Count_CC, $RecordSetCC, "Your Current Semester");
//$suggestedCurriculum -> drawSingleCLTable($Count_CC, $RecordSetCC, "Your Next Semester");


if ($Count_P1 != 0) {
	$Count = 1;
}
else if ($Count_P2 != 0) {
	$Count = 2;
}
else if ($Count_P3 != 0) {
	$Count = 3;
}
else if ($Count_P4 != 0) {
	$Count = 4;
}
else if ($Count_P5 != 0) {
	$Count = 5;
}
else if($Count_P6 != 0) {
	$Count = 6;
}
else if($Count_P7 != 0) {
	$Count = 7;
}
else {
	$Count = 0;
}

if($Count_CC > 1) {

 	//Current Semester
  	$counter = 1;
   	?>
   	<!--<div class="hor">-->
   	<table border = "1" style="display: inline-block;"><colgroup>
	<!--<col span="1" style="width: 2%;">
	<col span="1" style="width: 2%;">
	<col span="1" style="width: 2%;">
	<col span="1" style="width: 2%;">-->
	<col span="1" style="width: 92%;">
	<col span="1" style="width: 8%;">
	</colgroup>
		<tr>
			<td colspan = "2">
				<center>Your Current Semester</center>
			</td>
		</tr>

	<?php
	while($row_RecordSetCC = mysql_fetch_array($RecordSetCC)) {
		?>
		<tr>
		<!--<td border = "0" bgcolor="<?php echo $row_RecordSetCC['PREQ_HEX_COLOR_1']?>"></td>
		<td border = "0" bgcolor="<?php echo $row_RecordSetCC['PREQ_HEX_COLOR_2']?>"></td>
		<td border = "0" bgcolor="<?php echo $row_RecordSetCC['PREQ_HEX_COLOR_3']?>"></td>
		<td border = "0" bgcolor="<?php echo $row_RecordSetCC['PREQ_HEX_COLOR_4']?>"></td>-->	
     	<?php echo "<td class = 'namecell'>".$row_RecordSetCC['Course_Code']." ".$row_RecordSetCC['Course_Number']."<br>".$row_RecordSetCC['Course_Name']."</td>"?>
		<td border = "0" bgcolor="<?php echo $row_RecordSetCC['HEX_COLOR']?>"></td>
        </tr><?php
        $counter++;
  	}
  	?></table><?php
}
  





switch($Count) {
	case '1': 
	//Semester One
	$counter = 1;
	$maxSize = 5;
	?>
	<div class="hor">
	<table id = "thistable" style="display: inline-block;">
	<colgroup>
	<!--<col span="1" style="width: 2%;">
	<col span="1" style="width: 2%;">
	<col span="1" style="width: 2%;">
	<col span="1" style="width: 2%;">-->
	<col span="1" style="width: 92%;">
	<col span="1" style="width: 8%;">
	</colgroup><?php
	while($counter <= $maxSize AND $row_RecordSetP1 = mysql_fetch_array($RecordSetP1)) {
		?><tr class = 'eachrow'>
		<!--<td border = "0" bgcolor="<?php echo $row_RecordSetP1['PREQ_HEX_COLOR_1']?>"></td>
		<td border = "0" bgcolor="<?php echo $row_RecordSetP1['PREQ_HEX_COLOR_2']?>"></td>
		<td border = "0" bgcolor="<?php echo $row_RecordSetP1['PREQ_HEX_COLOR_3']?>"></td>
		<td border = "0" bgcolor="<?php echo $row_RecordSetP1['PREQ_HEX_COLOR_4']?>"></td>-->
        <?php echo "<td class = 'namecell'>".$row_RecordSetP1['Course_Code']." ".$row_RecordSetP1['Course_Number']."<br>".$row_RecordSetP1['Course_Name']."</td>"?>
		<td border = "0" bgcolor="<?php echo $row_RecordSetP1['HEX_COLOR']?>"></td>
        </tr><?php
        $counter++;
    }
       
  	if($counter <= $maxSize AND !($row_RecordSetP1 = mysql_fetch_array($RecordSetP1))) {
   		while($counter <= $maxSize AND $row_RecordSetP9 = mysql_fetch_array($RecordSetP9)) {
       		?><tr class = 'eachrow'>
			<!--<td border = "0" bgcolor="<?php echo $row_RecordSetP9['PREQ_HEX_COLOR_1']?>"></td>
			<td border = "0" bgcolor="<?php echo $row_RecordSetP9['PREQ_HEX_COLOR_2']?>"></td>
			<td border = "0" bgcolor="<?php echo $row_RecordSetP9['PREQ_HEX_COLOR_3']?>"></td>
			<td border = "0" bgcolor="<?php echo $row_RecordSetP9['PREQ_HEX_COLOR_4']?>"></td>-->
        	<?php echo "<td class = 'namecell'>".$row_RecordSetP9['Course_Code']." ".$row_RecordSetP9['Course_Number']."<br>".$row_RecordSetP9['Course_Name']."</td>"?>	
			<td border = "0" bgcolor="<?php echo $row_RecordSetP9['HEX_COLOR']?>"></td>
        	</tr><?php
        	$counter++;    }
    	}
   	else if($counter > $maxSize AND ($row_RecordSetP1 = mysql_fetch_array($RecordSetP1))) {
   		$counter = 1;
   		?></table>
   		<!--<table id = "thistable" style="display: inline-block;"><colgroup>
		<col span="1" style="width: 2%;">
		<col span="1" style="width: 2%;">
		<col span="1" style="width: 2%;">
		<col span="1" style="width: 2%;">-->
		<col span="1" style="width: 92%;">
		<col span="1" style="width: 8%;">
		</colgroup><?php
		?><tr class = 'eachrow'>
		<!--<td border = "0" bgcolor="<?php echo $row_RecordSetP1['PREQ_HEX_COLOR_1']?>"></td>
		<td border = "0" bgcolor="<?php echo $row_RecordSetP1['PREQ_HEX_COLOR_2']?>"></td>
		<td border = "0" bgcolor="<?php echo $row_RecordSetP1['PREQ_HEX_COLOR_3']?>"></td>
		<td border = "0" bgcolor="<?php echo $row_RecordSetP1['PREQ_HEX_COLOR_4']?>"></td>-->
      	<?php echo "<td class = 'namecell'>".$row_RecordSetP1['Course_Code']." ".$row_RecordSetP1['Course_Number']."<br> ".$row_RecordSetP1['Course_Name']."</td>"?>
		<td border = "0" bgcolor="<?php echo $row_RecordSetP1['HEX_COLOR']?>"></td>
    	</tr><?php
		while($counter <= $maxSize AND $row_RecordSetP1 = mysql_fetch_array($RecordSetP1)) {
			?><tr class = 'eachrow'>
			<!--<td border = "0" bgcolor="<?php echo $row_RecordSetP1['PREQ_HEX_COLOR_1']?>"></td>
			<td border = "0" bgcolor="<?php echo $row_RecordSetP1['PREQ_HEX_COLOR_2']?>"></td>
			<td border = "0" bgcolor="<?php echo $row_RecordSetP1['PREQ_HEX_COLOR_3']?>"></td>
			<td border = "0" bgcolor="<?php echo $row_RecordSetP1['PREQ_HEX_COLOR_4']?>"></td>-->
        	<?php echo "<td class = 'namecell'>".$row_RecordSetP1['Course_Code']." ".$row_RecordSetP1['Course_Number']."<br> ".$row_RecordSetP1['Course_Name']."</td>"?>
			<td border = "0" bgcolor="<?php echo $row_RecordSetP1['HEX_COLOR']?>"></td>
           	</tr><?php
           	$counter++;
            }
        if($counter <= $maxSize AND !($row_RecordSetP1 = mysql_fetch_array($RecordSetP1))) {
        	while($counter <= $maxSize AND $row_RecordSetP9 = mysql_fetch_array($RecordSetP9)) {
				?><tr class = 'eachrow'>
				<!--<td border = "0" bgcolor="<?php echo $row_RecordSetP9['PREQ_HEX_COLOR_1']?>"></td>
				<td border = "0" bgcolor="<?php echo $row_RecordSetP9['PREQ_HEX_COLOR_2']?>"></td>
				<td border = "0" bgcolor="<?php echo $row_RecordSetP9['PREQ_HEX_COLOR_3']?>"></td>
				<td border = "0" bgcolor="<?php echo $row_RecordSetP9['PREQ_HEX_COLOR_4']?>"></td>-->
            	<?php echo "<td class = 'namecell'>".$row_RecordSetP9['Course_Code']." ".$row_RecordSetP9['Course_Number']."<br>".$row_RecordSetP9['Course_Name']."</td>"?>
				<td border = "0" bgcolor="<?php echo $row_RecordSetP9['HEX_COLOR']?>"></td>
               	</tr><?php
               	$counter++;
            }
        }
    }      	
    //Semester Two
  	$counter = 1;
  	$maxSize = 6;
   	?></table>
   	<table id = "thistable" style="display: inline-block;"><colgroup>
	<col span="1" style="width: 2%;">
	<col span="1" style="width: 2%;">
	<col span="1" style="width: 2%;">
	<col span="1" style="width: 2%;">
	<col span="1" style="width: 84%;">
	<col span="1" style="width: 8%;">
	</colgroup><?php
	while($counter <= $maxSize AND $row_RecordSetP2 = mysql_fetch_array($RecordSetP2)) {
		?><tr class = 'eachrow'>
		<td border = "0" bgcolor="<?php echo $row_RecordSetP2['PREQ_HEX_COLOR_1']?>"></td>
		<td border = "0" bgcolor="<?php echo $row_RecordSetP2['PREQ_HEX_COLOR_2']?>"></td>
		<td border = "0" bgcolor="<?php echo $row_RecordSetP2['PREQ_HEX_COLOR_3']?>"></td>
		<td border = "0" bgcolor="<?php echo $row_RecordSetP2['PREQ_HEX_COLOR_4']?>"></td>
     	<?php echo "<td class = 'namecell'>".$row_RecordSetP2['Course_Code']." ".$row_RecordSetP2['Course_Number']."<br> ".$row_RecordSetP2['Course_Name']."</td>"?>
		<td border = "0" bgcolor="<?php echo $row_RecordSetP2['HEX_COLOR']?>"></td>
        </tr><?php
        $counter++;
  	}

  	if($counter <= $maxSize AND !($row_RecordSetP2 = mysql_fetch_array($RecordSetP2))) {
    	while($counter <= $maxSize AND $row_RecordSetP9 = mysql_fetch_array($RecordSetP9)) {
        	?><tr class = 'eachrow'>
			<td border = "0" bgcolor="<?php echo $row_RecordSetP9['PREQ_HEX_COLOR_1']?>"></td>
			<td border = "0" bgcolor="<?php echo $row_RecordSetP9['PREQ_HEX_COLOR_2']?>"></td>
			<td border = "0" bgcolor="<?php echo $row_RecordSetP9['PREQ_HEX_COLOR_3']?>"></td>
			<td border = "0" bgcolor="<?php echo $row_RecordSetP9['PREQ_HEX_COLOR_4']?>"></td>
     	   	<?php echo "<td class = 'namecell'>".$row_RecordSetP9['Course_Code']." ".$row_RecordSetP9['Course_Number']."<br> ".$row_RecordSetP9['Course_Name']."</td>"?>	
			<td border = "0" bgcolor="<?php echo $row_RecordSetP9['HEX_COLOR']?>"></td>
        	</tr><?php
        	$counter++;
        }
  	}

  	else if($counter > $maxSize AND ($row_RecordSetP2 = mysql_fetch_array($RecordSetP2))) {
  		$counter = 1;
   		?></table>
   		<table id = "thistable" style="display: inline-block;"><colgroup>
		<col span="1" style="width: 2%;">
		<col span="1" style="width: 2%;">
		<col span="1" style="width: 2%;">
		<col span="1" style="width: 2%;">
		<col span="1" style="width: 84%;">
		<col span="1" style="width: 8%;">
		</colgroup><?php
		?><tr class = 'eachrow'>
		<td border = "0" bgcolor="<?php echo $row_RecordSetP2['PREQ_HEX_COLOR_1']?>"></td>
		<td border = "0" bgcolor="<?php echo $row_RecordSetP2['PREQ_HEX_COLOR_2']?>"></td>
		<td border = "0" bgcolor="<?php echo $row_RecordSetP2['PREQ_HEX_COLOR_3']?>"></td>
		<td border = "0" bgcolor="<?php echo $row_RecordSetP2['PREQ_HEX_COLOR_4']?>"></td>
     	<?php echo "<td class = 'namecell'>".$row_RecordSetP2['Course_Code']." ".$row_RecordSetP2['Course_Number']."<br> ".$row_RecordSetP2['Course_Name']."</td>"?>
		<td border = "0" bgcolor="<?php echo $row_RecordSetP2['HEX_COLOR']?>"></td>
        </tr><?php
		while($counter <= $maxSize AND $row_RecordSetP2 = mysql_fetch_array($RecordSetP2)) {
			?><tr class = 'eachrow'>
			<td border = "0" bgcolor="<?php echo $row_RecordSetP2['PREQ_HEX_COLOR_1']?>"></td>
			<td border = "0" bgcolor="<?php echo $row_RecordSetP2['PREQ_HEX_COLOR_2']?>"></td>
			<td border = "0" bgcolor="<?php echo $row_RecordSetP2['PREQ_HEX_COLOR_3']?>"></td>
			<td border = "0" bgcolor="<?php echo $row_RecordSetP2['PREQ_HEX_COLOR_4']?>"></td>
     		<?php echo "<td class = 'namecell'>".$row_RecordSetP2['Course_Code']." ".$row_RecordSetP2['Course_Number']."<br>".$row_RecordSetP2['Course_Name']."</td>"?>
			<td border = "0" bgcolor="<?php echo $row_RecordSetP2['HEX_COLOR']?>"></td>
        	</tr><?php
        	$counter++;
        }
        if($counter <= $maxSize AND !($row_RecordSetP2 = mysql_fetch_array($RecordSetP2))) {
   			while($counter <= $maxSize AND $row_RecordSetP9 = mysql_fetch_array($RecordSetP9)) {
				?><tr class = 'eachrow'>
				<td border = "0" bgcolor="<?php echo $row_RecordSetP9['PREQ_HEX_COLOR_1']?>"></td>
				<td border = "0" bgcolor="<?php echo $row_RecordSetP9['PREQ_HEX_COLOR_2']?>"></td>
				<td border = "0" bgcolor="<?php echo $row_RecordSetP9['PREQ_HEX_COLOR_3']?>"></td>
				<td border = "0" bgcolor="<?php echo $row_RecordSetP9['PREQ_HEX_COLOR_4']?>"></td>
     			<?php echo "<td class = 'namecell'>".$row_RecordSetP9['Course_Code']." ".$row_RecordSetP9['Course_Number']."<br>".$row_RecordSetP9['Course_Name']."</td>"?>
				<td border = "0" bgcolor="<?php echo $row_RecordSetP9['HEX_COLOR']?>"></td>
        		</tr><?php
        		$counter++;
        	}
   		}
   	}
   	//Semester Three
   	$maxSize = 5;
   	$counter = 1;
   	?></table>
   	<table id = "thistable" style="display: inline-block;"><colgroup>
	<col span="1" style="width: 2%;">
	<col span="1" style="width: 2%;">
	<col span="1" style="width: 2%;">
	<col span="1" style="width: 2%;">
	<col span="1" style="width: 84%;">
	<col span="1" style="width: 8%;">
	</colgroup><?php
	while($counter <= $maxSize AND $row_RecordSetP3 = mysql_fetch_array($RecordSetP3)) {
		?><tr class = 'eachrow'>
		<td border = "0" bgcolor="<?php echo $row_RecordSetP3['PREQ_HEX_COLOR_1']?>"></td>
		<td border = "0" bgcolor="<?php echo $row_RecordSetP3['PREQ_HEX_COLOR_2']?>"></td>
		<td border = "0" bgcolor="<?php echo $row_RecordSetP3['PREQ_HEX_COLOR_3']?>"></td>
		<td border = "0" bgcolor="<?php echo $row_RecordSetP3['PREQ_HEX_COLOR_4']?>"></td>
     	<?php echo "<td class = 'namecell'>".$row_RecordSetP3['Course_Code']." ".$row_RecordSetP3['Course_Number']."<br>".$row_RecordSetP3['Course_Name']."</td>"?>
		<td border = "0" bgcolor="<?php echo $row_RecordSetP3['HEX_COLOR']?>"></td>
        </tr><?php
        $counter++;
  	}

  	if($counter <= $maxSize AND !($row_RecordSetP3 = mysql_fetch_array($RecordSetP3))) {
    	while($counter <= $maxSize AND $row_RecordSetP9 = mysql_fetch_array($RecordSetP9)) {
        	?><tr class = 'eachrow'>
			<td border = "0" bgcolor="<?php echo $row_RecordSetP9['PREQ_HEX_COLOR_1']?>"></td>
			<td border = "0" bgcolor="<?php echo $row_RecordSetP9['PREQ_HEX_COLOR_2']?>"></td>
			<td border = "0" bgcolor="<?php echo $row_RecordSetP9['PREQ_HEX_COLOR_3']?>"></td>
			<td border = "0" bgcolor="<?php echo $row_RecordSetP9['PREQ_HEX_COLOR_4']?>"></td>
     	   	<?php echo "<td class = 'namecell'>".$row_RecordSetP9['Course_Code']." ".$row_RecordSetP9['Course_Number']."<br>".$row_RecordSetP9['Course_Name']."</td>"?>	
			<td border = "0" bgcolor="<?php echo $row_RecordSetP9['HEX_COLOR']?>"></td>
        	</tr><?php
        	$counter++;
        }
  	}

  	else if($counter > $maxSize AND ($row_RecordSetP3 = mysql_fetch_array($RecordSetP3))) {
  		$counter = 1;
   		?></table>
   		<table id = "thistable" style="display: inline-block;"><colgroup>
		<col span="1" style="width: 2%;">
		<col span="1" style="width: 2%;">
		<col span="1" style="width: 2%;">
		<col span="1" style="width: 2%;">
		<col span="1" style="width: 84%;">
		<col span="1" style="width: 8%;">
		</colgroup><?php
		?><tr class = 'eachrow'>
		<td border = "0" bgcolor="<?php echo $row_RecordSetP3['PREQ_HEX_COLOR_1']?>"></td>
		<td border = "0" bgcolor="<?php echo $row_RecordSetP3['PREQ_HEX_COLOR_2']?>"></td>
		<td border = "0" bgcolor="<?php echo $row_RecordSetP3['PREQ_HEX_COLOR_3']?>"></td>
		<td border = "0" bgcolor="<?php echo $row_RecordSetP3['PREQ_HEX_COLOR_4']?>"></td>
     	<?php echo "<td class = 'namecell'>".$row_RecordSetP3['Course_Code']." ".$row_RecordSetP3['Course_Number']."<br>".$row_RecordSetP3['Course_Name']."</td>"?>
		<td border = "0" bgcolor="<?php echo $row_RecordSetP3['HEX_COLOR']?>"></td>
        </tr><?php
		while($counter <= $maxSize AND $row_RecordSetP3 = mysql_fetch_array($RecordSetP3)) {
			?><tr class = 'eachrow'>
			<td border = "0" bgcolor="<?php echo $row_RecordSetP3['PREQ_HEX_COLOR_1']?>"></td>
			<td border = "0" bgcolor="<?php echo $row_RecordSetP3['PREQ_HEX_COLOR_2']?>"></td>
			<td border = "0" bgcolor="<?php echo $row_RecordSetP3['PREQ_HEX_COLOR_3']?>"></td>
			<td border = "0" bgcolor="<?php echo $row_RecordSetP3['PREQ_HEX_COLOR_4']?>"></td>
     		<?php echo "<td class = 'namecell'>".$row_RecordSetP3['Course_Code']." ".$row_RecordSetP3['Course_Number']."<br>".$row_RecordSetP3['Course_Name']."</td>"?>
			<td border = "0" bgcolor="<?php echo $row_RecordSetP3['HEX_COLOR']?>"></td>
        	</tr><?php
        	$counter++;
        }
        if($counter <= $maxSize AND !($row_RecordSetP3 = mysql_fetch_array($RecordSetP3))) {
   			while($counter <= $maxSize AND $row_RecordSetP9 = mysql_fetch_array($RecordSetP9)) {
				?><tr class = 'eachrow'>
				<td border = "0" bgcolor="<?php echo $row_RecordSetP9['PREQ_HEX_COLOR_1']?>"></td>
				<td border = "0" bgcolor="<?php echo $row_RecordSetP9['PREQ_HEX_COLOR_2']?>"></td>
				<td border = "0" bgcolor="<?php echo $row_RecordSetP9['PREQ_HEX_COLOR_3']?>"></td>
				<td border = "0" bgcolor="<?php echo $row_RecordSetP9['PREQ_HEX_COLOR_4']?>"></td>
     			<?php echo "<td class = 'namecell'>".$row_RecordSetP9['Course_Code']." ".$row_RecordSetP9['Course_Number']."<br>".$row_RecordSetP9['Course_Name']."</td>"?>
				<td border = "0" bgcolor="<?php echo $row_RecordSetP9['HEX_COLOR']?>"></td>
        		</tr><?php
        		$counter++;
        	}
   		}
   	}
   	//Semester Four
   	$maxSize = 5;
   	$counter = 1;
   	?></table>
   	<table id = "thistable" style="display: inline-block;"><colgroup>
	<col span="1" style="width: 2%;">
	<col span="1" style="width: 2%;">
	<col span="1" style="width: 2%;">
	<col span="1" style="width: 2%;">
	<col span="1" style="width: 84%;">
	<col span="1" style="width: 8%;">
	</colgroup><?php
	while($counter <= $maxSize AND $row_RecordSetP4 = mysql_fetch_array($RecordSetP4)) {
		?><tr class = 'eachrow'>
		<td border = "0" bgcolor="<?php echo $row_RecordSetP4['PREQ_HEX_COLOR_1']?>"></td>
		<td border = "0" bgcolor="<?php echo $row_RecordSetP4['PREQ_HEX_COLOR_2']?>"></td>
		<td border = "0" bgcolor="<?php echo $row_RecordSetP4['PREQ_HEX_COLOR_3']?>"></td>
		<td border = "0" bgcolor="<?php echo $row_RecordSetP4['PREQ_HEX_COLOR_4']?>"></td>
     	<?php echo "<td class = 'namecell'>".$row_RecordSetP4['Course_Code']." ".$row_RecordSetP4['Course_Number']."<br>".$row_RecordSetP4['Course_Name']."</td>"?>
		<td border = "0" bgcolor="<?php echo $row_RecordSetP4['HEX_COLOR']?>"></td>
        </tr><?php
        $counter++;
  	}

  	if($counter <= $maxSize AND !($row_RecordSetP4 = mysql_fetch_array($RecordSetP4))) {
    	while($counter <= $maxSize AND $row_RecordSetP9 = mysql_fetch_array($RecordSetP9)) {
        	?><tr class = 'eachrow'>
			<td border = "0" bgcolor="<?php echo $row_RecordSetP9['PREQ_HEX_COLOR_1']?>"></td>
			<td border = "0" bgcolor="<?php echo $row_RecordSetP9['PREQ_HEX_COLOR_2']?>"></td>
			<td border = "0" bgcolor="<?php echo $row_RecordSetP9['PREQ_HEX_COLOR_3']?>"></td>
			<td border = "0" bgcolor="<?php echo $row_RecordSetP9['PREQ_HEX_COLOR_4']?>"></td>
     	   	<?php echo "<td class = 'namecell'>".$row_RecordSetP9['Course_Code']." ".$row_RecordSetP9['Course_Number']."<br>".$row_RecordSetP9['Course_Name']."</td>"?>	
			<td border = "0" bgcolor="<?php echo $row_RecordSetP9['HEX_COLOR']?>"></td>
        	</tr><?php
        	$counter++;
        }
  	}

  	else if($counter > $maxSize AND ($row_RecordSetP4 = mysql_fetch_array($RecordSetP4))) {
  		$counter = 1;
   		?></table>
   		<table id = "thistable" style="display: inline-block;"><colgroup>
		<col span="1" style="width: 2%;">
		<col span="1" style="width: 2%;">
		<col span="1" style="width: 2%;">
		<col span="1" style="width: 2%;">
		<col span="1" style="width: 84%;">
		<col span="1" style="width: 8%;">
		</colgroup><?php
		?><tr class = 'eachrow'>
		<td border = "0" bgcolor="<?php echo $row_RecordSetP4['PREQ_HEX_COLOR_1']?>"></td>
		<td border = "0" bgcolor="<?php echo $row_RecordSetP4['PREQ_HEX_COLOR_2']?>"></td>
		<td border = "0" bgcolor="<?php echo $row_RecordSetP4['PREQ_HEX_COLOR_3']?>"></td>
		<td border = "0" bgcolor="<?php echo $row_RecordSetP4['PREQ_HEX_COLOR_4']?>"></td>
     	<?php echo "<td class = 'namecell'>".$row_RecordSetP4['Course_Code']." ".$row_RecordSetP4['Course_Number']."<br>".$row_RecordSetP4['Course_Name']."</td>"?>
		<td border = "0" bgcolor="<?php echo $row_RecordSetP4['HEX_COLOR']?>"></td>
        </tr><?php
		while($counter <= $maxSize AND $row_RecordSetP4 = mysql_fetch_array($RecordSetP4)) {
			?><tr class = 'eachrow'>
			<td border = "0" bgcolor="<?php echo $row_RecordSetP4['PREQ_HEX_COLOR_1']?>"></td>
			<td border = "0" bgcolor="<?php echo $row_RecordSetP4['PREQ_HEX_COLOR_2']?>"></td>
			<td border = "0" bgcolor="<?php echo $row_RecordSetP4['PREQ_HEX_COLOR_3']?>"></td>
			<td border = "0" bgcolor="<?php echo $row_RecordSetP4['PREQ_HEX_COLOR_4']?>"></td>
     		<?php echo "<td class = 'namecell'>".$row_RecordSetP4['Course_Code']." ".$row_RecordSetP4['Course_Number']."<br>".$row_RecordSetP4['Course_Name']."</td>"?>
			<td border = "0" bgcolor="<?php echo $row_RecordSetP4['HEX_COLOR']?>"></td>
        	</tr><?php
        	$counter++;
        }
        if($counter <= $maxSize AND !($row_RecordSetP4 = mysql_fetch_array($RecordSetP4))) {
   			while($counter <= $maxSize AND $row_RecordSetP9 = mysql_fetch_array($RecordSetP9)) {
				?><tr class = 'eachrow'>
				<td border = "0" bgcolor="<?php echo $row_RecordSetP9['PREQ_HEX_COLOR_1']?>"></td>
				<td border = "0" bgcolor="<?php echo $row_RecordSetP9['PREQ_HEX_COLOR_2']?>"></td>
				<td border = "0" bgcolor="<?php echo $row_RecordSetP9['PREQ_HEX_COLOR_3']?>"></td>
				<td border = "0" bgcolor="<?php echo $row_RecordSetP9['PREQ_HEX_COLOR_4']?>"></td>
     			<?php echo "<td class = 'namecell'>".$row_RecordSetP9['Course_Code']." ".$row_RecordSetP9['Course_Number']."<br>".$row_RecordSetP9['Course_Name']."</td>"?>
				<td border = "0" bgcolor="<?php echo $row_RecordSetP9['HEX_COLOR']?>"></td>
        		</tr><?php
        		$counter++;
        	}
   		}
   	}

   	//Semester Five
   	$maxSize = 5;
   	$counter = 1;
   	?></table>
   	<table id = "thistable" style="display: inline-block;"><colgroup>
	<col span="1" style="width: 2%;">
	<col span="1" style="width: 2%;">
	<col span="1" style="width: 2%;">
	<col span="1" style="width: 2%;">
	<col span="1" style="width: 84%;">
	<col span="1" style="width: 8%;">
	</colgroup><?php
	while($counter <= $maxSize AND $row_RecordSetP5 = mysql_fetch_array($RecordSetP5)) {
		?><tr class = 'eachrow'>
		<td border = "0" bgcolor="<?php echo $row_RecordSetP5['PREQ_HEX_COLOR_1']?>"></td>
		<td border = "0" bgcolor="<?php echo $row_RecordSetP5['PREQ_HEX_COLOR_2']?>"></td>
		<td border = "0" bgcolor="<?php echo $row_RecordSetP5['PREQ_HEX_COLOR_3']?>"></td>
		<td border = "0" bgcolor="<?php echo $row_RecordSetP5['PREQ_HEX_COLOR_4']?>"></td>
     	<?php echo "<td class = 'namecell'>".$row_RecordSetP5['Course_Code']." ".$row_RecordSetP5['Course_Number']."<br>".$row_RecordSetP5['Course_Name']."</td>"?>
		<td border = "0" bgcolor="<?php echo $row_RecordSetP5['HEX_COLOR']?>"></td>
        </tr><?php
        $counter++;
  	}

  	if($counter <= $maxSize AND !($row_RecordSetP5 = mysql_fetch_array($RecordSetP5))) {
    	while($counter <= $maxSize AND $row_RecordSetP9 = mysql_fetch_array($RecordSetP9)) {
        	?><tr class = 'eachrow'>
			<td border = "0" bgcolor="<?php echo $row_RecordSetP9['PREQ_HEX_COLOR_1']?>"></td>
			<td border = "0" bgcolor="<?php echo $row_RecordSetP9['PREQ_HEX_COLOR_2']?>"></td>
			<td border = "0" bgcolor="<?php echo $row_RecordSetP9['PREQ_HEX_COLOR_3']?>"></td>
			<td border = "0" bgcolor="<?php echo $row_RecordSetP9['PREQ_HEX_COLOR_4']?>"></td>
     	   	<?php echo "<td class = 'namecell'>".$row_RecordSetP9['Course_Code']." ".$row_RecordSetP9['Course_Number']."<br>".$row_RecordSetP9['Course_Name']."</td>"?>	
			<td border = "0" bgcolor="<?php echo $row_RecordSetP9['HEX_COLOR']?>"></td>
        	</tr><?php
        	$counter++;
        }
  	}

  	else if($counter > $maxSize AND ($row_RecordSetP5 = mysql_fetch_array($RecordSetP5))) {
  		$counter = 1;
   		?></table>
   		<table id = "thistable" style="display: inline-block;"><colgroup>
		<col span="1" style="width: 2%;">
		<col span="1" style="width: 2%;">
		<col span="1" style="width: 2%;">
		<col span="1" style="width: 2%;">
		<col span="1" style="width: 84%;">
		<col span="1" style="width: 8%;">
		</colgroup><?php
		?><tr class = 'eachrow'>
		<td border = "0" bgcolor="<?php echo $row_RecordSetP5['PREQ_HEX_COLOR_1']?>"></td>
		<td border = "0" bgcolor="<?php echo $row_RecordSetP5['PREQ_HEX_COLOR_2']?>"></td>
		<td border = "0" bgcolor="<?php echo $row_RecordSetP5['PREQ_HEX_COLOR_3']?>"></td>
		<td border = "0" bgcolor="<?php echo $row_RecordSetP5['PREQ_HEX_COLOR_4']?>"></td>
     	<?php echo "<td class = 'namecell'>".$row_RecordSetP5['Course_Code']." ".$row_RecordSetP5['Course_Number']."<br>".$row_RecordSetP5['Course_Name']."</td>"?>
		<td border = "0" bgcolor="<?php echo $row_RecordSetP5['HEX_COLOR']?>"></td>
        </tr><?php
		while($counter <= $maxSize AND $row_RecordSetP5 = mysql_fetch_array($RecordSetP5)) {
			?><tr class = 'eachrow'>
			<td border = "0" bgcolor="<?php echo $row_RecordSetP5['PREQ_HEX_COLOR_1']?>"></td>
			<td border = "0" bgcolor="<?php echo $row_RecordSetP5['PREQ_HEX_COLOR_2']?>"></td>
			<td border = "0" bgcolor="<?php echo $row_RecordSetP5['PREQ_HEX_COLOR_3']?>"></td>
			<td border = "0" bgcolor="<?php echo $row_RecordSetP5['PREQ_HEX_COLOR_4']?>"></td>
     		<?php echo "<td class = 'namecell'>".$row_RecordSetP5['Course_Code']." ".$row_RecordSetP5['Course_Number']."<br>".$row_RecordSetP5['Course_Name']."</td>"?>
			<td border = "0" bgcolor="<?php echo $row_RecordSetP5['HEX_COLOR']?>"></td>
        	</tr><?php
        	$counter++;
        }
        if($counter <= $maxSize AND !($row_RecordSetP5 = mysql_fetch_array($RecordSetP5))) {
   			while($counter <= $maxSize AND $row_RecordSetP9 = mysql_fetch_array($RecordSetP9)) {
				?><tr class = 'eachrow'>
				<td border = "0" bgcolor="<?php echo $row_RecordSetP9['PREQ_HEX_COLOR_1']?>"></td>
				<td border = "0" bgcolor="<?php echo $row_RecordSetP9['PREQ_HEX_COLOR_2']?>"></td>
				<td border = "0" bgcolor="<?php echo $row_RecordSetP9['PREQ_HEX_COLOR_3']?>"></td>
				<td border = "0" bgcolor="<?php echo $row_RecordSetP9['PREQ_HEX_COLOR_4']?>"></td>
     			<?php echo "<td class = 'namecell'>".$row_RecordSetP9['Course_Code']." ".$row_RecordSetP9['Course_Number']."<br>".$row_RecordSetP9['Course_Name']."</td>"?>
				<td border = "0" bgcolor="<?php echo $row_RecordSetP9['HEX_COLOR']?>"></td>
        		</tr><?php
        		$counter++;
        	}
   		}
   	}
   	//Semester Six
   	$maxSize = 6;
   	$counter = 1;
   	?></table>
   	<table id = "thistable" style="display: inline-block;"><colgroup>
	<col span="1" style="width: 2%;">
	<col span="1" style="width: 2%;">
	<col span="1" style="width: 2%;">
	<col span="1" style="width: 2%;">
	<col span="1" style="width: 84%;">
	<col span="1" style="width: 8%;">
	</colgroup><?php
	while($counter <= $maxSize AND $row_RecordSetP6 = mysql_fetch_array($RecordSetP6)) {
		?><tr class = 'eachrow'>
		<td border = "0" bgcolor="<?php echo $row_RecordSetP6['PREQ_HEX_COLOR_1']?>"></td>
		<td border = "0" bgcolor="<?php echo $row_RecordSetP6['PREQ_HEX_COLOR_2']?>"></td>
		<td border = "0" bgcolor="<?php echo $row_RecordSetP6['PREQ_HEX_COLOR_3']?>"></td>
		<td border = "0" bgcolor="<?php echo $row_RecordSetP6['PREQ_HEX_COLOR_4']?>"></td>
     	<?php echo "<td class = 'namecell'>".$row_RecordSetP6['Course_Code']." ".$row_RecordSetP6['Course_Number']."<br>".$row_RecordSetP6['Course_Name']."</td>"?>
		<td border = "0" bgcolor="<?php echo $row_RecordSetP6['HEX_COLOR']?>"></td>
        </tr><?php
        $counter++;
  	}

  	if($counter <= $maxSize AND !($row_RecordSetP6 = mysql_fetch_array($RecordSetP6))) {
    	while($counter <= $maxSize AND $row_RecordSetP9 = mysql_fetch_array($RecordSetP9)) {
        	?><tr class = 'eachrow'>
			<td border = "0" bgcolor="<?php echo $row_RecordSetP9['PREQ_HEX_COLOR_1']?>"></td>
			<td border = "0" bgcolor="<?php echo $row_RecordSetP9['PREQ_HEX_COLOR_2']?>"></td>
			<td border = "0" bgcolor="<?php echo $row_RecordSetP9['PREQ_HEX_COLOR_3']?>"></td>
			<td border = "0" bgcolor="<?php echo $row_RecordSetP9['PREQ_HEX_COLOR_4']?>"></td>
     	   	<?php echo "<td class = 'namecell'>".$row_RecordSetP9['Course_Code']." ".$row_RecordSetP9['Course_Number']."<br>".$row_RecordSetP9['Course_Name']."</td>"?>	
			<td border = "0" bgcolor="<?php echo $row_RecordSetP9['HEX_COLOR']?>"></td>
        	</tr><?php
        	$counter++;
        }
  	}

  	else if($counter > $maxSize AND ($row_RecordSetP6 = mysql_fetch_array($RecordSetP6))) {
  		$counter = 1;
   		?></table>
   		<table id = "thistable" style="display: inline-block;"><colgroup>
		<col span="1" style="width: 2%;">
		<col span="1" style="width: 2%;">
		<col span="1" style="width: 2%;">
		<col span="1" style="width: 2%;">
		<col span="1" style="width: 84%;">
		<col span="1" style="width: 8%;">
		</colgroup><?php
		?><tr class = 'eachrow'>
		<td border = "0" bgcolor="<?php echo $row_RecordSetP6['PREQ_HEX_COLOR_1']?>"></td>
		<td border = "0" bgcolor="<?php echo $row_RecordSetP6['PREQ_HEX_COLOR_2']?>"></td>
		<td border = "0" bgcolor="<?php echo $row_RecordSetP6['PREQ_HEX_COLOR_3']?>"></td>
		<td border = "0" bgcolor="<?php echo $row_RecordSetP6['PREQ_HEX_COLOR_4']?>"></td>
     	<?php echo "<td class = 'namecell'>".$row_RecordSetP6['Course_Code']." ".$row_RecordSetP6['Course_Number']."<br>".$row_RecordSetP6['Course_Name']."</td>"?>
		<td border = "0" bgcolor="<?php echo $row_RecordSetP6['HEX_COLOR']?>"></td>
        </tr><?php
		while($counter <= $maxSize AND $row_RecordSetP6 = mysql_fetch_array($RecordSetP6)) {
			?><tr class = 'eachrow'>
			<td border = "0" bgcolor="<?php echo $row_RecordSetP6['PREQ_HEX_COLOR_1']?>"></td>
			<td border = "0" bgcolor="<?php echo $row_RecordSetP6['PREQ_HEX_COLOR_2']?>"></td>
			<td border = "0" bgcolor="<?php echo $row_RecordSetP6['PREQ_HEX_COLOR_3']?>"></td>
			<td border = "0" bgcolor="<?php echo $row_RecordSetP6['PREQ_HEX_COLOR_4']?>"></td>
     		<?php echo "<td class = 'namecell'>".$row_RecordSetP6['Course_Code']." ".$row_RecordSetP6['Course_Number']."<br>".$row_RecordSetP6['Course_Name']."</td>"?>
			<td border = "0" bgcolor="<?php echo $row_RecordSetP6['HEX_COLOR']?>"></td>
        	</tr><?php
        	$counter++;
        }
        if($counter <= $maxSize AND !($row_RecordSetP6 = mysql_fetch_array($RecordSetP6))) {
   			while($counter <= $maxSize AND $row_RecordSetP9 = mysql_fetch_array($RecordSetP9)) {
				?><tr class = 'eachrow'>
				<td border = "0" bgcolor="<?php echo $row_RecordSetP9['PREQ_HEX_COLOR_1']?>"></td>
				<td border = "0" bgcolor="<?php echo $row_RecordSetP9['PREQ_HEX_COLOR_2']?>"></td>
				<td border = "0" bgcolor="<?php echo $row_RecordSetP9['PREQ_HEX_COLOR_3']?>"></td>
				<td border = "0" bgcolor="<?php echo $row_RecordSetP9['PREQ_HEX_COLOR_4']?>"></td>
     			<?php echo "<td class = 'namecell'>".$row_RecordSetP9['Course_Code']." ".$row_RecordSetP9['Course_Number']."<br>".$row_RecordSetP9['Course_Name']."</td>"?>
				<td border = "0" bgcolor="<?php echo $row_RecordSetP9['HEX_COLOR']?>"></td>
        		</tr><?php
        		$counter++;
        	}
   		}
   	}
   	//Semester Seven
   	$maxSize = 6;
   	$counter = 1;
   	?></table>
   	<table id = "thistable" style="display: inline-block;"><colgroup>
	<col span="1" style="width: 2%;">
	<col span="1" style="width: 2%;">
	<col span="1" style="width: 2%;">
	<col span="1" style="width: 2%;">
	<col span="1" style="width: 84%;">
	<col span="1" style="width: 8%;">
	</colgroup><?php
	while($counter <= $maxSize AND $row_RecordSetP7 = mysql_fetch_array($RecordSetP7)) {
		?><tr class = 'eachrow'>
		<td border = "0" bgcolor="<?php echo $row_RecordSetP7['PREQ_HEX_COLOR_1']?>"></td>
		<td border = "0" bgcolor="<?php echo $row_RecordSetP7['PREQ_HEX_COLOR_2']?>"></td>
		<td border = "0" bgcolor="<?php echo $row_RecordSetP7['PREQ_HEX_COLOR_3']?>"></td>
		<td border = "0" bgcolor="<?php echo $row_RecordSetP7['PREQ_HEX_COLOR_4']?>"></td>
     	<?php echo "<td class = 'namecell'>".$row_RecordSetP7['Course_Code']." ".$row_RecordSetP7['Course_Number']."<br>".$row_RecordSetP7['Course_Name']."</td>"?>
		<td border = "0" bgcolor="<?php echo $row_RecordSetP7['HEX_COLOR']?>"></td>
        </tr><?php
        $counter++;
  	}

  	if(!($counter <= $maxSize AND $row_RecordSetP7 = mysql_fetch_array($RecordSetP7))) {
    	while(($counter <= $maxSize) AND ($row_RecordSetP9 = mysql_fetch_array($RecordSetP9))) {
        	?><tr class = 'eachrow'>
			<td border = "0" bgcolor="<?php echo $row_RecordSetP9['PREQ_HEX_COLOR_1']?>"></td>
			<td border = "0" bgcolor="<?php echo $row_RecordSetP9['PREQ_HEX_COLOR_2']?>"></td>
			<td border = "0" bgcolor="<?php echo $row_RecordSetP9['PREQ_HEX_COLOR_3']?>"></td>
			<td border = "0" bgcolor="<?php echo $row_RecordSetP9['PREQ_HEX_COLOR_4']?>"></td>
     	   	<?php echo "<td class = 'namecell'>".$row_RecordSetP9['Course_Code']." ".$row_RecordSetP9['Course_Number']."<br>".$row_RecordSetP9['Course_Name']."</td>"?>	
			<td border = "0" bgcolor="<?php echo $row_RecordSetP9['HEX_COLOR']?>"></td>
        	</tr><?php
        	$counter++;
        }
  	}

  	else if($counter > $maxSize AND ($row_RecordSetP7 = mysql_fetch_array($RecordSetP7))) {
  		$counter = 1;
   		?></table>
   		<table id = "thistable" style="display: inline-block;"><colgroup>
		<col span="1" style="width: 2%;">
		<col span="1" style="width: 2%;">
		<col span="1" style="width: 2%;">
		<col span="1" style="width: 2%;">
		<col span="1" style="width: 84%;">
		<col span="1" style="width: 8%;">
		</colgroup><?php
		?><tr class = 'eachrow'>
		<td border = "0" bgcolor="<?php echo $row_RecordSetP7['PREQ_HEX_COLOR_1']?>"></td>
		<td border = "0" bgcolor="<?php echo $row_RecordSetP7['PREQ_HEX_COLOR_2']?>"></td>
		<td border = "0" bgcolor="<?php echo $row_RecordSetP7['PREQ_HEX_COLOR_3']?>"></td>
		<td border = "0" bgcolor="<?php echo $row_RecordSetP7['PREQ_HEX_COLOR_4']?>"></td>
     	<?php echo "<td class = 'namecell'>".$row_RecordSetP7['Course_Code']." ".$row_RecordSetP7['Course_Number']."<br>".$row_RecordSetP7['Course_Name']."</td>"?>
		<td border = "0" bgcolor="<?php echo $row_RecordSetP7['HEX_COLOR']?>"></td>
        </tr><?php
		while($counter <= $maxSize AND $row_RecordSetP7 = mysql_fetch_array($RecordSetP7)) {
			?><tr class = 'eachrow'>
			<td border = "0" bgcolor="<?php echo $row_RecordSetP7['PREQ_HEX_COLOR_1']?>"></td>
			<td border = "0" bgcolor="<?php echo $row_RecordSetP7['PREQ_HEX_COLOR_2']?>"></td>
			<td border = "0" bgcolor="<?php echo $row_RecordSetP7['PREQ_HEX_COLOR_3']?>"></td>
			<td border = "0" bgcolor="<?php echo $row_RecordSetP7['PREQ_HEX_COLOR_4']?>"></td>
     		<?php echo "<td class = 'namecell'>".$row_RecordSetP7['Course_Code']." ".$row_RecordSetP7['Course_Number']."<br>".$row_RecordSetP7['Course_Name']."</td>"?>
			<td border = "0" bgcolor="<?php echo $row_RecordSetP7['HEX_COLOR']?>"></td>
        	</tr><?php
        	$counter++;
        }
        if(!($row_RecordSetP7 = mysql_fetch_array($RecordSetP7)) AND $counter <= $maxSize) {
   			while($counter <= $maxSize AND $row_RecordSetP9 = mysql_fetch_array($RecordSetP9)) {
				?><tr class = 'eachrow'>
				<td border = "0" bgcolor="<?php echo $row_RecordSetP9['PREQ_HEX_COLOR_1']?>"></td>
				<td border = "0" bgcolor="<?php echo $row_RecordSetP9['PREQ_HEX_COLOR_2']?>"></td>
				<td border = "0" bgcolor="<?php echo $row_RecordSetP9['PREQ_HEX_COLOR_3']?>"></td>
				<td border = "0" bgcolor="<?php echo $row_RecordSetP9['PREQ_HEX_COLOR_4']?>"></td>
     			<?php echo "<td class = 'namecell'>".$row_RecordSetP9['Course_Code']." ".$row_RecordSetP9['Course_Number']."<br>".$row_RecordSetP9['Course_Name']."</td>"?>
				<td border = "0" bgcolor="<?php echo $row_RecordSetP9['HEX_COLOR']?>"></td>
        		</tr><?php
        		$counter++;
        	}
   		}
   	}
   	break;
   	case 2:
   	//Semester Two
		$counter = 1;
		$maxSize = 6;
		?></table>
		<div class="hor">
		<table id = "thistable" style="display: inline-block;"><colgroup>
		<col span="1" style="width: 2%;">
		<col span="1" style="width: 2%;">
		<col span="1" style="width: 2%;">
		<col span="1" style="width: 2%;">
		<col span="1" style="width: 84%;">
		<col span="1" style="width: 8%;">
		</colgroup><?php
		while($counter <= $maxSize AND $row_RecordSetP2 = mysql_fetch_array($RecordSetP2)) {
		?><tr class = 'eachrow'>
		<td border = "0" bgcolor="<?php echo $row_RecordSetP2['PREQ_HEX_COLOR_1']?>"></td>
		<td border = "0" bgcolor="<?php echo $row_RecordSetP2['PREQ_HEX_COLOR_2']?>"></td>
		<td border = "0" bgcolor="<?php echo $row_RecordSetP2['PREQ_HEX_COLOR_3']?>"></td>
		<td border = "0" bgcolor="<?php echo $row_RecordSetP2['PREQ_HEX_COLOR_4']?>"></td>
			<?php echo "<td class = 'namecell'>".$row_RecordSetP2['Course_Code']." ".$row_RecordSetP2['Course_Number']."<br>".$row_RecordSetP2['Course_Name']."</td>"?>
		<td border = "0" bgcolor="<?php echo $row_RecordSetP2['HEX_COLOR']?>"></td>
		</tr><?php
		$counter++;
		}	

		if($counter <= $maxSize AND !($row_RecordSetP2 = mysql_fetch_array($RecordSetP2))) {
			while($counter <= $maxSize AND $row_RecordSetP9 = mysql_fetch_array($RecordSetP9)) {
				?><tr class = 'eachrow'>
				<td border = "0" bgcolor="<?php echo $row_RecordSetP9['PREQ_HEX_COLOR_1']?>"></td>
				<td border = "0" bgcolor="<?php echo $row_RecordSetP9['PREQ_HEX_COLOR_2']?>"></td>
				<td border = "0" bgcolor="<?php echo $row_RecordSetP9['PREQ_HEX_COLOR_3']?>"></td>
				<td border = "0" bgcolor="<?php echo $row_RecordSetP9['PREQ_HEX_COLOR_4']?>"></td>
		   		<?php echo "<td class = 'namecell'>".$row_RecordSetP9['Course_Code']." ".$row_RecordSetP9['Course_Number']."<br>".$row_RecordSetP9['Course_Name']."</td>"?>	
				<td border = "0" bgcolor="<?php echo $row_RecordSetP9['HEX_COLOR']?>"></td>
				</tr><?php
				$counter++;
			}
		}

		else if($counter > $maxSize AND ($row_RecordSetP2 = mysql_fetch_array($RecordSetP2))) {
			$counter = 1;
			?></table>
			<table id = "thistable" style="display: inline-block;"><colgroup>
			<col span="1" style="width: 2%;">
			<col span="1" style="width: 2%;">
			<col span="1" style="width: 2%;">
			<col span="1" style="width: 2%;">
			<col span="1" style="width: 84%;">
			<col span="1" style="width: 8%;">	
			</colgroup><?php
			?><tr class = 'eachrow'>
			<td border = "0" bgcolor="<?php echo $row_RecordSetP2['PREQ_HEX_COLOR_1']?>"></td>
			<td border = "0" bgcolor="<?php echo $row_RecordSetP2['PREQ_HEX_COLOR_2']?>"></td>
			<td border = "0" bgcolor="<?php echo $row_RecordSetP2['PREQ_HEX_COLOR_3']?>"></td>
			<td border = "0" bgcolor="<?php echo $row_RecordSetP2['PREQ_HEX_COLOR_4']?>"></td>
			<?php echo "<td class = 'namecell'>".$row_RecordSetP2['Course_Code']." ".$row_RecordSetP2['Course_Number']."<br>".$row_RecordSetP2['Course_Name']."</td>"?>
			<td border = "0" bgcolor="<?php echo $row_RecordSetP2['HEX_COLOR']?>"></td>
			</tr><?php
			while($counter <= $maxSize AND $row_RecordSetP2 = mysql_fetch_array($RecordSetP2)) {
				?><tr class = 'eachrow'>
				<td border = "0" bgcolor="<?php echo $row_RecordSetP2['PREQ_HEX_COLOR_1']?>"></td>
			<td border = "0" bgcolor="<?php echo $row_RecordSetP2['PREQ_HEX_COLOR_2']?>"></td>
			<td border = "0" bgcolor="<?php echo $row_RecordSetP2['PREQ_HEX_COLOR_3']?>"></td>
			<td border = "0" bgcolor="<?php echo $row_RecordSetP2['PREQ_HEX_COLOR_4']?>"></td>
				<?php echo "<td class = 'namecell'>".$row_RecordSetP2['Course_Code']." ".$row_RecordSetP2['Course_Number']."<br>".$row_RecordSetP2['Course_Name']."</td>"?>
			<td border = "0" bgcolor="<?php echo $row_RecordSetP2['HEX_COLOR']?>"></td>
			</tr><?php
			$counter++;
		}
		if($counter <= $maxSize AND !($row_RecordSetP2 = mysql_fetch_array($RecordSetP2))) {
				while($counter <= $maxSize AND $row_RecordSetP9 = mysql_fetch_array($RecordSetP9)) {
				?><tr class = 'eachrow'>
				<td border = "0" bgcolor="<?php echo $row_RecordSetP9['PREQ_HEX_COLOR_1']?>"></td>
				<td border = "0" bgcolor="<?php echo $row_RecordSetP9['PREQ_HEX_COLOR_2']?>"></td>
				<td border = "0" bgcolor="<?php echo $row_RecordSetP9['PREQ_HEX_COLOR_3']?>"></td>
				<td border = "0" bgcolor="<?php echo $row_RecordSetP9['PREQ_HEX_COLOR_4']?>"></td>
					<?php echo "<td class = 'namecell'>".$row_RecordSetP9['Course_Code']." ".$row_RecordSetP9['Course_Number']."<br>".$row_RecordSetP9['Course_Name']."</td>"?>
				<td border = "0" bgcolor="<?php echo $row_RecordSetP9['HEX_COLOR']?>"></td>
				</tr><?php
				$counter++;
			}
			}
		}
		//Semester Three
		$maxSize = 5;
		$counter = 1;
		?></table>
		<table id = "thistable" style="display: inline-block;"><colgroup>
		<col span="1" style="width: 2%;">
		<col span="1" style="width: 2%;">
		<col span="1" style="width: 2%;">
		<col span="1" style="width: 2%;">
		<col span="1" style="width: 84%;">
		<col span="1" style="width: 8%;">
		</colgroup><?php
		while($counter <= $maxSize AND $row_RecordSetP3 = mysql_fetch_array($RecordSetP3)) {
		?><tr class = 'eachrow'>
		<td border = "0" bgcolor="<?php echo $row_RecordSetP3['PREQ_HEX_COLOR_1']?>"></td>
		<td border = "0" bgcolor="<?php echo $row_RecordSetP3['PREQ_HEX_COLOR_2']?>"></td>
		<td border = "0" bgcolor="<?php echo $row_RecordSetP3['PREQ_HEX_COLOR_3']?>"></td>
		<td border = "0" bgcolor="<?php echo $row_RecordSetP3['PREQ_HEX_COLOR_4']?>"></td>
			<?php echo "<td class = 'namecell'>".$row_RecordSetP3['Course_Code']." ".$row_RecordSetP3['Course_Number']."<br>".$row_RecordSetP3['Course_Name']."</td>"?>
		<td border = "0" bgcolor="<?php echo $row_RecordSetP3['HEX_COLOR']?>"></td>
		</tr><?php
		$counter++;
		}

		if($counter <= $maxSize AND !($row_RecordSetP3 = mysql_fetch_array($RecordSetP3))) {
		while($counter <= $maxSize AND $row_RecordSetP9 = mysql_fetch_array($RecordSetP9)) {
			?><tr class = 'eachrow'>
			<td border = "0" bgcolor="<?php echo $row_RecordSetP9['PREQ_HEX_COLOR_1']?>"></td>
			<td border = "0" bgcolor="<?php echo $row_RecordSetP9['PREQ_HEX_COLOR_2']?>"></td>
			<td border = "0" bgcolor="<?php echo $row_RecordSetP9['PREQ_HEX_COLOR_3']?>"></td>
			<td border = "0" bgcolor="<?php echo $row_RecordSetP9['PREQ_HEX_COLOR_4']?>"></td>
		   		<?php echo "<td class = 'namecell'>".$row_RecordSetP9['Course_Code']." ".$row_RecordSetP9['Course_Number']."<br>".$row_RecordSetP9['Course_Name']."</td>"?>	
			<td border = "0" bgcolor="<?php echo $row_RecordSetP9['HEX_COLOR']?>"></td>
			</tr><?php
			$counter++;
		}
		}

		else if($counter > $maxSize AND ($row_RecordSetP3 = mysql_fetch_array($RecordSetP3))) {
			$counter = 1;
			?></table>
			<table id = "thistable" style="display: inline-block;"><colgroup>
		<col span="1" style="width: 2%;">
		<col span="1" style="width: 2%;">
		<col span="1" style="width: 2%;">
		<col span="1" style="width: 2%;">
		<col span="1" style="width: 84%;">
		<col span="1" style="width: 8%;">
		</colgroup><?php
		?><tr class = 'eachrow'>
		<td border = "0" bgcolor="<?php echo $row_RecordSetP3['PREQ_HEX_COLOR_1']?>"></td>
		<td border = "0" bgcolor="<?php echo $row_RecordSetP3['PREQ_HEX_COLOR_2']?>"></td>
		<td border = "0" bgcolor="<?php echo $row_RecordSetP3['PREQ_HEX_COLOR_3']?>"></td>
		<td border = "0" bgcolor="<?php echo $row_RecordSetP3['PREQ_HEX_COLOR_4']?>"></td>
			<?php echo "<td class = 'namecell'>".$row_RecordSetP3['Course_Code']." ".$row_RecordSetP3['Course_Number']."<br>".$row_RecordSetP3['Course_Name']."</td>"?>
		<td border = "0" bgcolor="<?php echo $row_RecordSetP3['HEX_COLOR']?>"></td>
		</tr><?php
		while($counter <= $maxSize AND $row_RecordSetP3 = mysql_fetch_array($RecordSetP3)) {
			?><tr class = 'eachrow'>
			<td border = "0" bgcolor="<?php echo $row_RecordSetP3['PREQ_HEX_COLOR_1']?>"></td>
			<td border = "0" bgcolor="<?php echo $row_RecordSetP3['PREQ_HEX_COLOR_2']?>"></td>
			<td border = "0" bgcolor="<?php echo $row_RecordSetP3['PREQ_HEX_COLOR_3']?>"></td>
			<td border = "0" bgcolor="<?php echo $row_RecordSetP3['PREQ_HEX_COLOR_4']?>"></td>
				<?php echo "<td class = 'namecell'>".$row_RecordSetP3['Course_Code']." ".$row_RecordSetP3['Course_Number']."<br>".$row_RecordSetP3['Course_Name']."</td>"?>
			<td border = "0" bgcolor="<?php echo $row_RecordSetP3['HEX_COLOR']?>"></td>
			</tr><?php
			$counter++;
		}	
		if($counter <= $maxSize AND !($row_RecordSetP3 = mysql_fetch_array($RecordSetP3))) {
				while($counter <= $maxSize AND $row_RecordSetP9 = mysql_fetch_array($RecordSetP9)) {
				?><tr class = 'eachrow'>
				<td border = "0" bgcolor="<?php echo $row_RecordSetP9['PREQ_HEX_COLOR_1']?>"></td>
				<td border = "0" bgcolor="<?php echo $row_RecordSetP9['PREQ_HEX_COLOR_2']?>"></td>
				<td border = "0" bgcolor="<?php echo $row_RecordSetP9['PREQ_HEX_COLOR_3']?>"></td>
				<td border = "0" bgcolor="<?php echo $row_RecordSetP9['PREQ_HEX_COLOR_4']?>"></td>
					<?php echo "<td class = 'namecell'>".$row_RecordSetP9['Course_Code']." ".$row_RecordSetP9['Course_Number']."<br>".$row_RecordSetP9['Course_Name']."</td>"?>
				<td border = "0" bgcolor="<?php echo $row_RecordSetP9['HEX_COLOR']?>"></td>
				</tr><?php
				$counter++;
			}	
			}
		}
		//Semester Four
		$maxSize = 5;
		$counter = 1;
		?></table>
		<table id = "thistable" style="display: inline-block;"><colgroup>
		<col span="1" style="width: 2%;">
		<col span="1" style="width: 2%;">
		<col span="1" style="width: 2%;">
		<col span="1" style="width: 2%;">
		<col span="1" style="width: 84%;">
		<col span="1" style="width: 8%;">
		</colgroup><?php
		while($counter <= $maxSize AND $row_RecordSetP4 = mysql_fetch_array($RecordSetP4)) {
		?><tr class = 'eachrow'>
		<td border = "0" bgcolor="<?php echo $row_RecordSetP4['PREQ_HEX_COLOR_1']?>"></td>
		<td border = "0" bgcolor="<?php echo $row_RecordSetP4['PREQ_HEX_COLOR_2']?>"></td>
		<td border = "0" bgcolor="<?php echo $row_RecordSetP4['PREQ_HEX_COLOR_3']?>"></td>
		<td border = "0" bgcolor="<?php echo $row_RecordSetP4['PREQ_HEX_COLOR_4']?>"></td>
			<?php echo "<td class = 'namecell'>".$row_RecordSetP4['Course_Code']." ".$row_RecordSetP4['Course_Number']."<br>".$row_RecordSetP4['Course_Name']."</td>"?>
		<td border = "0" bgcolor="<?php echo $row_RecordSetP4['HEX_COLOR']?>"></td>
		</tr><?php
		$counter++;
		}

		if($counter <= $maxSize AND !($row_RecordSetP4 = mysql_fetch_array($RecordSetP4))) {
		while($counter <= $maxSize AND $row_RecordSetP9 = mysql_fetch_array($RecordSetP9)) {
			?><tr class = 'eachrow'>
			<td border = "0" bgcolor="<?php echo $row_RecordSetP9['PREQ_HEX_COLOR_1']?>"></td>
			<td border = "0" bgcolor="<?php echo $row_RecordSetP9['PREQ_HEX_COLOR_2']?>"></td>
			<td border = "0" bgcolor="<?php echo $row_RecordSetP9['PREQ_HEX_COLOR_3']?>"></td>
			<td border = "0" bgcolor="<?php echo $row_RecordSetP9['PREQ_HEX_COLOR_4']?>"></td>
		   		<?php echo "<td class = 'namecell'>".$row_RecordSetP9['Course_Code']." ".$row_RecordSetP9['Course_Number']."<br>".$row_RecordSetP9['Course_Name']."</td>"?>	
			<td border = "0" bgcolor="<?php echo $row_RecordSetP9['HEX_COLOR']?>"></td>
			</tr><?php
			$counter++;
		}
		}

		else if($counter > $maxSize AND ($row_RecordSetP4 = mysql_fetch_array($RecordSetP4))) {
			$counter = 1;
			?></table>
			<table id = "thistable" style="display: inline-block;"><colgroup>
		<col span="1" style="width: 2%;">
		<col span="1" style="width: 2%;">
		<col span="1" style="width: 2%;">
		<col span="1" style="width: 2%;">
		<col span="1" style="width: 84%;">
		<col span="1" style="width: 8%;">
		</colgroup><?php
		?><tr class = 'eachrow'>
		<td border = "0" bgcolor="<?php echo $row_RecordSetP4['PREQ_HEX_COLOR_1']?>"></td>
		<td border = "0" bgcolor="<?php echo $row_RecordSetP4['PREQ_HEX_COLOR_2']?>"></td>
		<td border = "0" bgcolor="<?php echo $row_RecordSetP4['PREQ_HEX_COLOR_3']?>"></td>
		<td border = "0" bgcolor="<?php echo $row_RecordSetP4['PREQ_HEX_COLOR_4']?>"></td>
			<?php echo "<td class = 'namecell'>".$row_RecordSetP4['Course_Code']." ".$row_RecordSetP4['Course_Number']."<br>".$row_RecordSetP4['Course_Name']."</td>"?>
		<td border = "0" bgcolor="<?php echo $row_RecordSetP4['HEX_COLOR']?>"></td>
		</tr><?php
		while($counter <= $maxSize AND $row_RecordSetP4 = mysql_fetch_array($RecordSetP4)) {
			?><tr class = 'eachrow'>
			<td border = "0" bgcolor="<?php echo $row_RecordSetP4['PREQ_HEX_COLOR_1']?>"></td>
			<td border = "0" bgcolor="<?php echo $row_RecordSetP4['PREQ_HEX_COLOR_2']?>"></td>
			<td border = "0" bgcolor="<?php echo $row_RecordSetP4['PREQ_HEX_COLOR_3']?>"></td>
			<td border = "0" bgcolor="<?php echo $row_RecordSetP4['PREQ_HEX_COLOR_4']?>"></td>
				<?php echo "<td class = 'namecell'>".$row_RecordSetP4['Course_Code']." ".$row_RecordSetP4['Course_Number']."<br>".$row_RecordSetP4['Course_Name']."</td>"?>
			<td border = "0" bgcolor="<?php echo $row_RecordSetP4['HEX_COLOR']?>"></td>
			</tr><?php
			$counter++;
		}
		if($counter <= $maxSize AND !($row_RecordSetP4 = mysql_fetch_array($RecordSetP4))) {
				while($counter <= $maxSize AND $row_RecordSetP9 = mysql_fetch_array($RecordSetP9)) {
				?><tr class = 'eachrow'>
				<td border = "0" bgcolor="<?php echo $row_RecordSetP9['PREQ_HEX_COLOR_1']?>"></td>
				<td border = "0" bgcolor="<?php echo $row_RecordSetP9['PREQ_HEX_COLOR_2']?>"></td>
				<td border = "0" bgcolor="<?php echo $row_RecordSetP9['PREQ_HEX_COLOR_3']?>"></td>
				<td border = "0" bgcolor="<?php echo $row_RecordSetP9['PREQ_HEX_COLOR_4']?>"></td>
					<?php echo "<td class = 'namecell'>".$row_RecordSetP9['Course_Code']." ".$row_RecordSetP9['Course_Number']."<br>".$row_RecordSetP9['Course_Name']."</td>"?>
				<td border = "0" bgcolor="<?php echo $row_RecordSetP9['HEX_COLOR']?>"></td>
				</tr><?php
				$counter++;
			}
			}
		}

		//Semester Five
		$maxSize = 5;
		$counter = 1;
		?></table>
		<table id = "thistable" style="display: inline-block;"><colgroup>
		<col span="1" style="width: 2%;">
		<col span="1" style="width: 2%;">
		<col span="1" style="width: 2%;">
		<col span="1" style="width: 2%;">
		<col span="1" style="width: 84%;">
		<col span="1" style="width: 8%;">
		</colgroup><?php
		while($counter <= $maxSize AND $row_RecordSetP5 = mysql_fetch_array($RecordSetP5)) {
		?><tr class = 'eachrow'>
		<td border = "0" bgcolor="<?php echo $row_RecordSetP5['PREQ_HEX_COLOR_1']?>"></td>
		<td border = "0" bgcolor="<?php echo $row_RecordSetP5['PREQ_HEX_COLOR_2']?>"></td>
		<td border = "0" bgcolor="<?php echo $row_RecordSetP5['PREQ_HEX_COLOR_3']?>"></td>
		<td border = "0" bgcolor="<?php echo $row_RecordSetP5['PREQ_HEX_COLOR_4']?>"></td>
			<?php echo "<td class = 'namecell'>".$row_RecordSetP5['Course_Code']." ".$row_RecordSetP5['Course_Number']."<br>".$row_RecordSetP5['Course_Name']."</td>"?>
		<td border = "0" bgcolor="<?php echo $row_RecordSetP5['HEX_COLOR']?>"></td>
		</tr><?php
		$counter++;
		}	

		if($counter <= $maxSize AND !($row_RecordSetP5 = mysql_fetch_array($RecordSetP5))) {
		while($counter <= $maxSize AND $row_RecordSetP9 = mysql_fetch_array($RecordSetP9)) {
			?><tr class = 'eachrow'>
			<td border = "0" bgcolor="<?php echo $row_RecordSetP9['PREQ_HEX_COLOR_1']?>"></td>
			<td border = "0" bgcolor="<?php echo $row_RecordSetP9['PREQ_HEX_COLOR_2']?>"></td>
			<td border = "0" bgcolor="<?php echo $row_RecordSetP9['PREQ_HEX_COLOR_3']?>"></td>
			<td border = "0" bgcolor="<?php echo $row_RecordSetP9['PREQ_HEX_COLOR_4']?>"></td>
		   		<?php echo "<td class = 'namecell'>".$row_RecordSetP9['Course_Code']." ".$row_RecordSetP9['Course_Number']."<br>".$row_RecordSetP9['Course_Name']."</td>"?>	
			<td border = "0" bgcolor="<?php echo $row_RecordSetP9['HEX_COLOR']?>"></td>
			</tr><?php
			$counter++;
		}
		}

		else if($counter > $maxSize AND ($row_RecordSetP5 = mysql_fetch_array($RecordSetP5))) {
			$counter = 1;
			?></table>
			<table id = "thistable" style="display: inline-block;"><colgroup>
		<col span="1" style="width: 2%;">
		<col span="1" style="width: 2%;">
		<col span="1" style="width: 2%;">
		<col span="1" style="width: 2%;">
		<col span="1" style="width: 84%;">
		<col span="1" style="width: 8%;">
		</colgroup><?php
		?><tr class = 'eachrow'>
		<td border = "0" bgcolor="<?php echo $row_RecordSetP5['PREQ_HEX_COLOR_1']?>"></td>
		<td border = "0" bgcolor="<?php echo $row_RecordSetP5['PREQ_HEX_COLOR_2']?>"></td>
		<td border = "0" bgcolor="<?php echo $row_RecordSetP5['PREQ_HEX_COLOR_3']?>"></td>
		<td border = "0" bgcolor="<?php echo $row_RecordSetP5['PREQ_HEX_COLOR_4']?>"></td>
			<?php echo "<td class = 'namecell'>".$row_RecordSetP5['Course_Code']." ".$row_RecordSetP5['Course_Number']."<br>".$row_RecordSetP5['Course_Name']."</td>"?>
		<td border = "0" bgcolor="<?php echo $row_RecordSetP5['HEX_COLOR']?>"></td>
		</tr><?php
		while($counter <= $maxSize AND $row_RecordSetP5 = mysql_fetch_array($RecordSetP5)) {
			?><tr class = 'eachrow'>
			<td border = "0" bgcolor="<?php echo $row_RecordSetP5['PREQ_HEX_COLOR_1']?>"></td>
			<td border = "0" bgcolor="<?php echo $row_RecordSetP5['PREQ_HEX_COLOR_2']?>"></td>
			<td border = "0" bgcolor="<?php echo $row_RecordSetP5['PREQ_HEX_COLOR_3']?>"></td>
			<td border = "0" bgcolor="<?php echo $row_RecordSetP5['PREQ_HEX_COLOR_4']?>"></td>
				<?php echo "<td class = 'namecell'>".$row_RecordSetP5['Course_Code']." ".$row_RecordSetP5['Course_Number']."<br>".$row_RecordSetP5['Course_Name']."</td>"?>
			<td border = "0" bgcolor="<?php echo $row_RecordSetP5['HEX_COLOR']?>"></td>
			</tr><?php
			$counter++;
		}	
		if($counter <= $maxSize AND !($row_RecordSetP5 = mysql_fetch_array($RecordSetP5))) {
				while($counter <= $maxSize AND $row_RecordSetP9 = mysql_fetch_array($RecordSetP9)) {
				?><tr class = 'eachrow'>
				<td border = "0" bgcolor="<?php echo $row_RecordSetP9['PREQ_HEX_COLOR_1']?>"></td>
				<td border = "0" bgcolor="<?php echo $row_RecordSetP9['PREQ_HEX_COLOR_2']?>"></td>
				<td border = "0" bgcolor="<?php echo $row_RecordSetP9['PREQ_HEX_COLOR_3']?>"></td>
				<td border = "0" bgcolor="<?php echo $row_RecordSetP9['PREQ_HEX_COLOR_4']?>"></td>
					<?php echo "<td class = 'namecell'>".$row_RecordSetP9['Course_Code']." ".$row_RecordSetP9['Course_Number']."<br>".$row_RecordSetP9['Course_Name']."</td>"?>
				<td border = "0" bgcolor="<?php echo $row_RecordSetP9['HEX_COLOR']?>"></td>
				</tr><?php
				$counter++;
			}
			}
		}
		//Semester Six
		$maxSize = 6;
		$counter = 1;
		?></table>
			<table id = "thistable" style="display: inline-block;"><colgroup>
		<col span="1" style="width: 2%;">
		<col span="1" style="width: 2%;">
		<col span="1" style="width: 2%;">
		<col span="1" style="width: 2%;">
		<col span="1" style="width: 84%;">
		<col span="1" style="width: 8%;">
		</colgroup><?php
		while($counter <= $maxSize AND $row_RecordSetP6 = mysql_fetch_array($RecordSetP6)) {
		?><tr class = 'eachrow'>
		<td border = "0" bgcolor="<?php echo $row_RecordSetP6['PREQ_HEX_COLOR_1']?>"></td>
		<td border = "0" bgcolor="<?php echo $row_RecordSetP6['PREQ_HEX_COLOR_2']?>"></td>
		<td border = "0" bgcolor="<?php echo $row_RecordSetP6['PREQ_HEX_COLOR_3']?>"></td>
		<td border = "0" bgcolor="<?php echo $row_RecordSetP6['PREQ_HEX_COLOR_4']?>"></td>
			<?php echo "<td class = 'namecell'>".$row_RecordSetP6['Course_Code']." ".$row_RecordSetP6['Course_Number']."<br>".$row_RecordSetP6['Course_Name']."</td>"?>
		<td border = "0" bgcolor="<?php echo $row_RecordSetP6['HEX_COLOR']?>"></td>
		</tr><?php
		$counter++;
		}	

		if($counter <= $maxSize AND !($row_RecordSetP6 = mysql_fetch_array($RecordSetP6))) {
		while($counter <= $maxSize AND $row_RecordSetP9 = mysql_fetch_array($RecordSetP9)) {
			?><tr class = 'eachrow'>
			<td border = "0" bgcolor="<?php echo $row_RecordSetP9['PREQ_HEX_COLOR_1']?>"></td>
			<td border = "0" bgcolor="<?php echo $row_RecordSetP9['PREQ_HEX_COLOR_2']?>"></td>
			<td border = "0" bgcolor="<?php echo $row_RecordSetP9['PREQ_HEX_COLOR_3']?>"></td>
			<td border = "0" bgcolor="<?php echo $row_RecordSetP9['PREQ_HEX_COLOR_4']?>"></td>
		   		<?php echo "<td class = 'namecell'>".$row_RecordSetP9['Course_Code']." ".$row_RecordSetP9['Course_Number']."<br>".$row_RecordSetP9['Course_Name']."</td>"?>	
			<td border = "0" bgcolor="<?php echo $row_RecordSetP9['HEX_COLOR']?>"></td>
			</tr><?php
			$counter++;
		}
		}

		else if($counter > $maxSize AND ($row_RecordSetP6 = mysql_fetch_array($RecordSetP6))) {
			$counter = 1;
			?></table>
			<table id = "thistable" style="display: inline-block;"><colgroup>
		<col span="1" style="width: 2%;">
		<col span="1" style="width: 2%;">
		<col span="1" style="width: 2%;">
		<col span="1" style="width: 2%;">
		<col span="1" style="width: 84%;">
		<col span="1" style="width: 8%;">
		</colgroup><?php
		?><tr class = 'eachrow'>
		<td border = "0" bgcolor="<?php echo $row_RecordSetP6['PREQ_HEX_COLOR_1']?>"></td>
		<td border = "0" bgcolor="<?php echo $row_RecordSetP6['PREQ_HEX_COLOR_2']?>"></td>
		<td border = "0" bgcolor="<?php echo $row_RecordSetP6['PREQ_HEX_COLOR_3']?>"></td>
		<td border = "0" bgcolor="<?php echo $row_RecordSetP6['PREQ_HEX_COLOR_4']?>"></td>
			<?php echo "<td class = 'namecell'>".$row_RecordSetP6['Course_Code']." ".$row_RecordSetP6['Course_Number']."<br>".$row_RecordSetP6['Course_Name']."</td>"?>
		<td border = "0" bgcolor="<?php echo $row_RecordSetP6['HEX_COLOR']?>"></td>
		</tr><?php
		while($counter <= $maxSize AND $row_RecordSetP6 = mysql_fetch_array($RecordSetP6)) {
			?><tr class = 'eachrow'>
			<td border = "0" bgcolor="<?php echo $row_RecordSetP6['PREQ_HEX_COLOR_1']?>"></td>
			<td border = "0" bgcolor="<?php echo $row_RecordSetP6['PREQ_HEX_COLOR_2']?>"></td>
			<td border = "0" bgcolor="<?php echo $row_RecordSetP6['PREQ_HEX_COLOR_3']?>"></td>
			<td border = "0" bgcolor="<?php echo $row_RecordSetP6['PREQ_HEX_COLOR_4']?>"></td>
				<?php echo "<td class = 'namecell'>".$row_RecordSetP6['Course_Code']." ".$row_RecordSetP6['Course_Number']."<br>".$row_RecordSetP6['Course_Name']."</td>"?>
			<td border = "0" bgcolor="<?php echo $row_RecordSetP6['HEX_COLOR']?>"></td>
			</tr><?php
			$counter++;
		}	
		if($counter <= $maxSize AND !($row_RecordSetP6 = mysql_fetch_array($RecordSetP6))) {
				while($counter <= $maxSize AND $row_RecordSetP9 = mysql_fetch_array($RecordSetP9)) {
				?><tr class = 'eachrow'>
				<td border = "0" bgcolor="<?php echo $row_RecordSetP9['PREQ_HEX_COLOR_1']?>"></td>
				<td border = "0" bgcolor="<?php echo $row_RecordSetP9['PREQ_HEX_COLOR_2']?>"></td>
				<td border = "0" bgcolor="<?php echo $row_RecordSetP9['PREQ_HEX_COLOR_3']?>"></td>
				<td border = "0" bgcolor="<?php echo $row_RecordSetP9['PREQ_HEX_COLOR_4']?>"></td>
					<?php echo "<td class = 'namecell'>".$row_RecordSetP9['Course_Code']." ".$row_RecordSetP9['Course_Number']."<br>".$row_RecordSetP9['Course_Name']."</td>"?>
				<td border = "0" bgcolor="<?php echo $row_RecordSetP9['HEX_COLOR']?>"></td>
				</tr><?php
				$counter++;
			}
			}	
		}
		//Semester Seven
		$maxSize = 6;
		$counter = 1;
		?></table>
		<table id = "thistable" style="display: inline-block;"><colgroup>
		<col span="1" style="width: 2%;">
		<col span="1" style="width: 2%;">
		<col span="1" style="width: 2%;">
		<col span="1" style="width: 2%;">
		<col span="1" style="width: 84%;">
		<col span="1" style="width: 8%;">
		</colgroup><?php
		while($counter <= $maxSize AND $row_RecordSetP7 = mysql_fetch_array($RecordSetP7)) {
		?><tr class = 'eachrow'>
		<td border = "0" bgcolor="<?php echo $row_RecordSetP7['PREQ_HEX_COLOR_1']?>"></td>
		<td border = "0" bgcolor="<?php echo $row_RecordSetP7['PREQ_HEX_COLOR_2']?>"></td>
		<td border = "0" bgcolor="<?php echo $row_RecordSetP7['PREQ_HEX_COLOR_3']?>"></td>
		<td border = "0" bgcolor="<?php echo $row_RecordSetP7['PREQ_HEX_COLOR_4']?>"></td>
		  	<?php echo "<td class = 'namecell'>".$row_RecordSetP7['Course_Code']." ".$row_RecordSetP7['Course_Number']."<br>".$row_RecordSetP7['Course_Name']."</td>"?>
		<td border = "0" bgcolor="<?php echo $row_RecordSetP7['HEX_COLOR']?>"></td>
		</tr><?php
		$counter++;
		}

		if(!($counter <= $maxSize AND $row_RecordSetP7 = mysql_fetch_array($RecordSetP7))) {
		while(($counter <= $maxSize) AND ($row_RecordSetP9 = mysql_fetch_array($RecordSetP9))) {
			?><tr class = 'eachrow'>
			<td border = "0" bgcolor="<?php echo $row_RecordSetP9['PREQ_HEX_COLOR_1']?>"></td>
			<td border = "0" bgcolor="<?php echo $row_RecordSetP9['PREQ_HEX_COLOR_2']?>"></td>
			<td border = "0" bgcolor="<?php echo $row_RecordSetP9['PREQ_HEX_COLOR_3']?>"></td>
			<td border = "0" bgcolor="<?php echo $row_RecordSetP9['PREQ_HEX_COLOR_4']?>"></td>
			   	<?php echo "<td class = 'namecell'>".$row_RecordSetP9['Course_Code']." ".$row_RecordSetP9['Course_Number']."<br>".$row_RecordSetP9['Course_Name']."</td>"?>	
			<td border = "0" bgcolor="<?php echo $row_RecordSetP9['HEX_COLOR']?>"></td>
			 	</tr><?php
			 	$counter++;
		 	}
		}

		else if($counter > $maxSize AND ($row_RecordSetP7 = mysql_fetch_array($RecordSetP7))) {
			$counter = 1;
			?></table>
			<table id = "thistable" style="display: inline-block;"><colgroup>
		<col span="1" style="width: 2%;">
		<col span="1" style="width: 2%;">
		<col span="1" style="width: 2%;">
		<col span="1" style="width: 2%;">
		<col span="1" style="width: 84%;">
		<col span="1" style="width: 8%;">
		</colgroup><?php
		?><tr class = 'eachrow'>
		<td border = "0" bgcolor="<?php echo $row_RecordSetP7['PREQ_HEX_COLOR_1']?>"></td>
		<td border = "0" bgcolor="<?php echo $row_RecordSetP7['PREQ_HEX_COLOR_2']?>"></td>
		<td border = "0" bgcolor="<?php echo $row_RecordSetP7['PREQ_HEX_COLOR_3']?>"></td>
		<td border = "0" bgcolor="<?php echo $row_RecordSetP7['PREQ_HEX_COLOR_4']?>"></td>
			<?php echo "<td class = 'namecell'>".$row_RecordSetP7['Course_Code']." ".$row_RecordSetP7['Course_Number']."<br>".$row_RecordSetP7['Course_Name']."</td>"?>
		<td border = "0" bgcolor="<?php echo $row_RecordSetP7['HEX_COLOR']?>"></td>
		</tr><?php
		while($counter <= $maxSize AND $row_RecordSetP7 = mysql_fetch_array($RecordSetP7)) {
			?><tr class = 'eachrow'>
			<td border = "0" bgcolor="<?php echo $row_RecordSetP7['PREQ_HEX_COLOR_1']?>"></td>
			<td border = "0" bgcolor="<?php echo $row_RecordSetP7['PREQ_HEX_COLOR_2']?>"></td>
			<td border = "0" bgcolor="<?php echo $row_RecordSetP7['PREQ_HEX_COLOR_3']?>"></td>
			<td border = "0" bgcolor="<?php echo $row_RecordSetP7['PREQ_HEX_COLOR_4']?>"></td>
				<?php echo "<td class = 'namecell'>".$row_RecordSetP7['Course_Code']." ".$row_RecordSetP7['Course_Number']."<br>".$row_RecordSetP7['Course_Name']."</td>"?>
			<td border = "0" bgcolor="<?php echo $row_RecordSetP7['HEX_COLOR']?>"></td>
			</tr><?php
			$counter++;
		}
		if(!($row_RecordSetP7 = mysql_fetch_array($RecordSetP7)) AND $counter <= $maxSize) {
				while($counter <= $maxSize AND $row_RecordSetP9 = mysql_fetch_array($RecordSetP9)) {
				?><tr class = 'eachrow'>
				<td border = "0" bgcolor="<?php echo $row_RecordSetP9['PREQ_HEX_COLOR_1']?>"></td>
				<td border = "0" bgcolor="<?php echo $row_RecordSetP9['PREQ_HEX_COLOR_2']?>"></td>
				<td border = "0" bgcolor="<?php echo $row_RecordSetP9['PREQ_HEX_COLOR_3']?>"></td>
				<td border = "0" bgcolor="<?php echo $row_RecordSetP9['PREQ_HEX_COLOR_4']?>"></td>
					<?php echo "<td class = 'namecell'>".$row_RecordSetP9['Course_Code']." ".$row_RecordSetP9['Course_Number']."<br>".$row_RecordSetP9['Course_Name']."</td>"?>
				<td border = "0" bgcolor="<?php echo $row_RecordSetP9['HEX_COLOR']?>"></td>
				</tr><?php
				$counter++;
				}	
			}
		}
		break;
		case 3:

			//Semester Three
           			$maxSize = 5;
           			$counter = 1;
           			?></table>
           			<div class="hor">
           			<table id = "thistable" style="display: inline-block;"><colgroup>
					<col span="1" style="width: 2%;">
					<col span="1" style="width: 2%;">
					<col span="1" style="width: 2%;">
					<col span="1" style="width: 2%;">
					<col span="1" style="width: 84%;">
					<col span="1" style="width: 8%;">
					</colgroup><?php
					while($counter <= $maxSize AND $row_RecordSetP3 = mysql_fetch_array($RecordSetP3)) {
						?><tr class = 'eachrow'>
						<td border = "0" bgcolor="<?php echo $row_RecordSetP3['PREQ_HEX_COLOR_1']?>"></td>
						<td border = "0" bgcolor="<?php echo $row_RecordSetP3['PREQ_HEX_COLOR_2']?>"></td>
						<td border = "0" bgcolor="<?php echo $row_RecordSetP3['PREQ_HEX_COLOR_3']?>"></td>
						<td border = "0" bgcolor="<?php echo $row_RecordSetP3['PREQ_HEX_COLOR_4']?>"></td>
             			<?php echo "<td class = 'namecell'>".$row_RecordSetP3['Course_Code']." ".$row_RecordSetP3['Course_Number']."<br>".$row_RecordSetP3['Course_Name']."</td>"?>
						<td border = "0" bgcolor="<?php echo $row_RecordSetP3['HEX_COLOR']?>"></td>
                		</tr><?php
                		$counter++;
          			}

          			if($counter <= $maxSize AND !($row_RecordSetP3 = mysql_fetch_array($RecordSetP3))) {
            			while($counter <= $maxSize AND $row_RecordSetP9 = mysql_fetch_array($RecordSetP9)) {
                			?><tr class = 'eachrow'>
							<td border = "0" bgcolor="<?php echo $row_RecordSetP9['PREQ_HEX_COLOR_1']?>"></td>
							<td border = "0" bgcolor="<?php echo $row_RecordSetP9['PREQ_HEX_COLOR_2']?>"></td>
							<td border = "0" bgcolor="<?php echo $row_RecordSetP9['PREQ_HEX_COLOR_3']?>"></td>
							<td border = "0" bgcolor="<?php echo $row_RecordSetP9['PREQ_HEX_COLOR_4']?>"></td>
             	   			<?php echo "<td class = 'namecell'>".$row_RecordSetP9['Course_Code']." ".$row_RecordSetP9['Course_Number']."<br>".$row_RecordSetP9['Course_Name']."</td>"?>	
							<td border = "0" bgcolor="<?php echo $row_RecordSetP9['HEX_COLOR']?>"></td>
                			</tr><?php
                			$counter++;
                		}
          			}

          			else if($counter > $maxSize AND ($row_RecordSetP3 = mysql_fetch_array($RecordSetP3))) {
          				$counter = 1;
           				?></table>
           				<table id = "thistable" style="display: inline-block;"><colgroup>
						<col span="1" style="width: 2%;">
						<col span="1" style="width: 2%;">
						<col span="1" style="width: 2%;">
						<col span="1" style="width: 2%;">
						<col span="1" style="width: 84%;">
						<col span="1" style="width: 8%;">
						</colgroup><?php
						?><tr class = 'eachrow'>
						<td border = "0" bgcolor="<?php echo $row_RecordSetP3['PREQ_HEX_COLOR_1']?>"></td>
						<td border = "0" bgcolor="<?php echo $row_RecordSetP3['PREQ_HEX_COLOR_2']?>"></td>
						<td border = "0" bgcolor="<?php echo $row_RecordSetP3['PREQ_HEX_COLOR_3']?>"></td>
						<td border = "0" bgcolor="<?php echo $row_RecordSetP3['PREQ_HEX_COLOR_4']?>"></td>
             			<?php echo "<td class = 'namecell'>".$row_RecordSetP3['Course_Code']." ".$row_RecordSetP3['Course_Number']."<br>".$row_RecordSetP3['Course_Name']."</td>"?>
						<td border = "0" bgcolor="<?php echo $row_RecordSetP3['HEX_COLOR']?>"></td>
                		</tr><?php
						while($counter <= $maxSize AND $row_RecordSetP3 = mysql_fetch_array($RecordSetP3)) {
							?><tr class = 'eachrow'>
							<td border = "0" bgcolor="<?php echo $row_RecordSetP3['PREQ_HEX_COLOR_1']?>"></td>
							<td border = "0" bgcolor="<?php echo $row_RecordSetP3['PREQ_HEX_COLOR_2']?>"></td>
							<td border = "0" bgcolor="<?php echo $row_RecordSetP3['PREQ_HEX_COLOR_3']?>"></td>
							<td border = "0" bgcolor="<?php echo $row_RecordSetP3['PREQ_HEX_COLOR_4']?>"></td>
             				<?php echo "<td class = 'namecell'>".$row_RecordSetP3['Course_Code']." ".$row_RecordSetP3['Course_Number']."<br>".$row_RecordSetP3['Course_Name']."</td>"?>
							<td border = "0" bgcolor="<?php echo $row_RecordSetP3['HEX_COLOR']?>"></td>
                			</tr><?php
                			$counter++;
                		}	
                		if($counter <= $maxSize AND !($row_RecordSetP3 = mysql_fetch_array($RecordSetP3))) {
           					while($counter <= $maxSize AND $row_RecordSetP9 = mysql_fetch_array($RecordSetP9)) {
								?><tr class = 'eachrow'>
								<td border = "0" bgcolor="<?php echo $row_RecordSetP9['PREQ_HEX_COLOR_1']?>"></td>
								<td border = "0" bgcolor="<?php echo $row_RecordSetP9['PREQ_HEX_COLOR_2']?>"></td>
								<td border = "0" bgcolor="<?php echo $row_RecordSetP9['PREQ_HEX_COLOR_3']?>"></td>
								<td border = "0" bgcolor="<?php echo $row_RecordSetP9['PREQ_HEX_COLOR_4']?>"></td>
             					<?php echo "<td class = 'namecell'>".$row_RecordSetP9['Course_Code']." ".$row_RecordSetP9['Course_Number']."<br>".$row_RecordSetP9['Course_Name']."</td>"?>
								<td border = "0" bgcolor="<?php echo $row_RecordSetP9['HEX_COLOR']?>"></td>
                				</tr><?php
                				$counter++;
                			}			
           				}
           			}
           			//Semester Four
           			$maxSize = 5;
           			$counter = 1;
           			?></table>
           			<table id = "thistable" style="display: inline-block;"><colgroup>
					<col span="1" style="width: 2%;">
					<col span="1" style="width: 2%;">
					<col span="1" style="width: 2%;">
					<col span="1" style="width: 2%;">
					<col span="1" style="width: 84%;">
					<col span="1" style="width: 8%;">
					</colgroup><?php
					while($counter <= $maxSize AND $row_RecordSetP4 = mysql_fetch_array($RecordSetP4)) {
						?><tr class = 'eachrow'>
						<td border = "0" bgcolor="<?php echo $row_RecordSetP4['PREQ_HEX_COLOR_1']?>"></td>
						<td border = "0" bgcolor="<?php echo $row_RecordSetP4['PREQ_HEX_COLOR_2']?>"></td>
						<td border = "0" bgcolor="<?php echo $row_RecordSetP4['PREQ_HEX_COLOR_3']?>"></td>
						<td border = "0" bgcolor="<?php echo $row_RecordSetP4['PREQ_HEX_COLOR_4']?>"></td>
             			<?php echo "<td class = 'namecell'>".$row_RecordSetP4['Course_Code']." ".$row_RecordSetP4['Course_Number']."<br>".$row_RecordSetP4['Course_Name']."</td>"?>
						<td border = "0" bgcolor="<?php echo $row_RecordSetP4['HEX_COLOR']?>"></td>
                		</tr><?php
                		$counter++;
          			}

          			if($counter <= $maxSize AND !($row_RecordSetP4 = mysql_fetch_array($RecordSetP4))) {
            			while($counter <= $maxSize AND $row_RecordSetP9 = mysql_fetch_array($RecordSetP9)) {
                			?><tr class = 'eachrow'>
							<td border = "0" bgcolor="<?php echo $row_RecordSetP9['PREQ_HEX_COLOR_1']?>"></td>
							<td border = "0" bgcolor="<?php echo $row_RecordSetP9['PREQ_HEX_COLOR_2']?>"></td>
							<td border = "0" bgcolor="<?php echo $row_RecordSetP9['PREQ_HEX_COLOR_3']?>"></td>
							<td border = "0" bgcolor="<?php echo $row_RecordSetP9['PREQ_HEX_COLOR_4']?>"></td>
             	   			<?php echo "<td class = 'namecell'>".$row_RecordSetP9['Course_Code']." ".$row_RecordSetP9['Course_Number']."<br>".$row_RecordSetP9['Course_Name']."</td>"?>	
							<td border = "0" bgcolor="<?php echo $row_RecordSetP9['HEX_COLOR']?>"></td>
                			</tr><?php
                			$counter++;
                		}	
          			}

          			else if($counter > $maxSize AND ($row_RecordSetP4 = mysql_fetch_array($RecordSetP4))) {
          				$counter = 1;
           				?></table>
           				<table id = "thistable" style="display: inline-block;"><colgroup>
						<col span="1" style="width: 2%;">
						<col span="1" style="width: 2%;">
						<col span="1" style="width: 2%;">
						<col span="1" style="width: 2%;">
						<col span="1" style="width: 84%;">
						<col span="1" style="width: 8%;">
						</colgroup><?php
						?><tr class = 'eachrow'>
						<td border = "0" bgcolor="<?php echo $row_RecordSetP4['PREQ_HEX_COLOR_1']?>"></td>
						<td border = "0" bgcolor="<?php echo $row_RecordSetP4['PREQ_HEX_COLOR_2']?>"></td>
						<td border = "0" bgcolor="<?php echo $row_RecordSetP4['PREQ_HEX_COLOR_3']?>"></td>
						<td border = "0" bgcolor="<?php echo $row_RecordSetP4['PREQ_HEX_COLOR_4']?>"></td>
             			<?php echo "<td class = 'namecell'>".$row_RecordSetP4['Course_Code']." ".$row_RecordSetP4['Course_Number']."<br>".$row_RecordSetP4['Course_Name']."</td>"?>
						<td border = "0" bgcolor="<?php echo $row_RecordSetP4['HEX_COLOR']?>"></td>
                		</tr><?php
						while($counter <= $maxSize AND $row_RecordSetP4 = mysql_fetch_array($RecordSetP4)) {
							?><tr class = 'eachrow'>
							<td border = "0" bgcolor="<?php echo $row_RecordSetP4['PREQ_HEX_COLOR_1']?>"></td>
							<td border = "0" bgcolor="<?php echo $row_RecordSetP4['PREQ_HEX_COLOR_2']?>"></td>
							<td border = "0" bgcolor="<?php echo $row_RecordSetP4['PREQ_HEX_COLOR_3']?>"></td>
							<td border = "0" bgcolor="<?php echo $row_RecordSetP4['PREQ_HEX_COLOR_4']?>"></td>
             				<?php echo "<td class = 'namecell'>".$row_RecordSetP4['Course_Code']." ".$row_RecordSetP4['Course_Number']."<br>".$row_RecordSetP4['Course_Name']."</td>"?>
							<td border = "0" bgcolor="<?php echo $row_RecordSetP4['HEX_COLOR']?>"></td>
                			</tr><?php
                			$counter++;
                		}
                		if($counter <= $maxSize AND !($row_RecordSetP4 = mysql_fetch_array($RecordSetP4))) {
           					while($counter <= $maxSize AND $row_RecordSetP9 = mysql_fetch_array($RecordSetP9)) {
								?><tr class = 'eachrow'>
								<td border = "0" bgcolor="<?php echo $row_RecordSetP9['PREQ_HEX_COLOR_1']?>"></td>
								<td border = "0" bgcolor="<?php echo $row_RecordSetP9['PREQ_HEX_COLOR_2']?>"></td>
								<td border = "0" bgcolor="<?php echo $row_RecordSetP9['PREQ_HEX_COLOR_3']?>"></td>
								<td border = "0" bgcolor="<?php echo $row_RecordSetP9['PREQ_HEX_COLOR_4']?>"></td>
             					<?php echo "<td class = 'namecell'>".$row_RecordSetP9['Course_Code']." ".$row_RecordSetP9['Course_Number']."<br>".$row_RecordSetP9['Course_Name']."</td>"?>
								<td border = "0" bgcolor="<?php echo $row_RecordSetP9['HEX_COLOR']?>"></td>
                				</tr><?php
                				$counter++;
                			}
           				}	
           			}

           			//Semester Five
           			$maxSize = 5;
           			$counter = 1;
           			?></table>
           			<table id = "thistable" style="display: inline-block;"><colgroup>
					<col span="1" style="width: 2%;">
					<col span="1" style="width: 2%;">
					<col span="1" style="width: 2%;">
					<col span="1" style="width: 2%;">
					<col span="1" style="width: 84%;">
					<col span="1" style="width: 8%;">
					</colgroup><?php
					while($counter <= $maxSize AND $row_RecordSetP5 = mysql_fetch_array($RecordSetP5)) {
						?><tr class = 'eachrow'>
						<td border = "0" bgcolor="<?php echo $row_RecordSetP5['PREQ_HEX_COLOR_1']?>"></td>
						<td border = "0" bgcolor="<?php echo $row_RecordSetP5['PREQ_HEX_COLOR_2']?>"></td>
						<td border = "0" bgcolor="<?php echo $row_RecordSetP5['PREQ_HEX_COLOR_3']?>"></td>
						<td border = "0" bgcolor="<?php echo $row_RecordSetP5['PREQ_HEX_COLOR_4']?>"></td>
            	 		<?php echo "<td class = 'namecell'>".$row_RecordSetP5['Course_Code']." ".$row_RecordSetP5['Course_Number']."<br>".$row_RecordSetP5['Course_Name']."</td>"?>
						<td border = "0" bgcolor="<?php echo $row_RecordSetP5['HEX_COLOR']?>"></td>
            	    	</tr><?php
            	    	$counter++;
          			}	

          			if($counter <= $maxSize AND !($row_RecordSetP5 = mysql_fetch_array($RecordSetP5))) {
            			while($counter <= $maxSize AND $row_RecordSetP9 = mysql_fetch_array($RecordSetP9)) {
            	    		?><tr class = 'eachrow'>
							<td border = "0" bgcolor="<?php echo $row_RecordSetP9['PREQ_HEX_COLOR_1']?>"></td>
							<td border = "0" bgcolor="<?php echo $row_RecordSetP9['PREQ_HEX_COLOR_2']?>"></td>
							<td border = "0" bgcolor="<?php echo $row_RecordSetP9['PREQ_HEX_COLOR_3']?>"></td>
							<td border = "0" bgcolor="<?php echo $row_RecordSetP9['PREQ_HEX_COLOR_4']?>"></td>
            	 	   		<?php echo "<td class = 'namecell'>".$row_RecordSetP9['Course_Code']." ".$row_RecordSetP9['Course_Number']."<br>".$row_RecordSetP9['Course_Name']."</td>"?>	
							<td border = "0" bgcolor="<?php echo $row_RecordSetP9['HEX_COLOR']?>"></td>
            	    		</tr><?php
            	    		$counter++;
            	    	}
          			}

          			else if($counter > $maxSize AND ($row_RecordSetP5 = mysql_fetch_array($RecordSetP5))) {
          				$counter = 1;
           				?></table>
           				<table id = "thistable" style="display: inline-block;"><colgroup>
						<col span="1" style="width: 2%;">
						<col span="1" style="width: 2%;">
						<col span="1" style="width: 2%;">
						<col span="1" style="width: 2%;">
						<col span="1" style="width: 84%;">
						<col span="1" style="width: 8%;">
						</colgroup><?php
						?><tr class = 'eachrow'>
						<td border = "0" bgcolor="<?php echo $row_RecordSetP5['PREQ_HEX_COLOR_1']?>"></td>
						<td border = "0" bgcolor="<?php echo $row_RecordSetP5['PREQ_HEX_COLOR_2']?>"></td>
						<td border = "0" bgcolor="<?php echo $row_RecordSetP5['PREQ_HEX_COLOR_3']?>"></td>
						<td border = "0" bgcolor="<?php echo $row_RecordSetP5['PREQ_HEX_COLOR_4']?>"></td>
             			<?php echo "<td class = 'namecell'>".$row_RecordSetP5['Course_Code']." ".$row_RecordSetP5['Course_Number']."<br>".$row_RecordSetP5['Course_Name']."</td>"?>
						<td border = "0" bgcolor="<?php echo $row_RecordSetP5['HEX_COLOR']?>"></td>
                		</tr><?php
						while($counter <= $maxSize AND $row_RecordSetP5 = mysql_fetch_array($RecordSetP5)) {
							?><tr class = 'eachrow'>
							<td border = "0" bgcolor="<?php echo $row_RecordSetP5['PREQ_HEX_COLOR_1']?>"></td>
							<td border = "0" bgcolor="<?php echo $row_RecordSetP5['PREQ_HEX_COLOR_2']?>"></td>
							<td border = "0" bgcolor="<?php echo $row_RecordSetP5['PREQ_HEX_COLOR_3']?>"></td>
							<td border = "0" bgcolor="<?php echo $row_RecordSetP5['PREQ_HEX_COLOR_4']?>"></td>
             				<?php echo "<td class = 'namecell'>".$row_RecordSetP5['Course_Code']." ".$row_RecordSetP5['Course_Number']."<br>".$row_RecordSetP5['Course_Name']."</td>"?>
							<td border = "0" bgcolor="<?php echo $row_RecordSetP5['HEX_COLOR']?>"></td>
                			</tr><?php
                			$counter++;
                		}	
                		if($counter <= $maxSize AND !($row_RecordSetP5 = mysql_fetch_array($RecordSetP5))) {
           					while($counter <= $maxSize AND $row_RecordSetP9 = mysql_fetch_array($RecordSetP9)) {
								?><tr class = 'eachrow'>
								<td border = "0" bgcolor="<?php echo $row_RecordSetP9['PREQ_HEX_COLOR_1']?>"></td>
								<td border = "0" bgcolor="<?php echo $row_RecordSetP9['PREQ_HEX_COLOR_2']?>"></td>
								<td border = "0" bgcolor="<?php echo $row_RecordSetP9['PREQ_HEX_COLOR_3']?>"></td>
								<td border = "0" bgcolor="<?php echo $row_RecordSetP9['PREQ_HEX_COLOR_4']?>"></td>
             					<?php echo "<td class = 'namecell'>".$row_RecordSetP9['Course_Code']." ".$row_RecordSetP9['Course_Number']."<br>".$row_RecordSetP9['Course_Name']."</td>"?>
								<td border = "0" bgcolor="<?php echo $row_RecordSetP9['HEX_COLOR']?>"></td>
                				</tr><?php
                				$counter++;
                			}
           				}
           			}	
           			//Semester Six
           			$maxSize = 6;
           			$counter = 1;
           			?></table>
         	  		<table id = "thistable" style="display: inline-block;"><colgroup>
					<col span="1" style="width: 2%;">
					<col span="1" style="width: 2%;">
					<col span="1" style="width: 2%;">
					<col span="1" style="width: 2%;">
					<col span="1" style="width: 84%;">
					<col span="1" style="width: 8%;">
					</colgroup><?php
					while($counter <= $maxSize AND $row_RecordSetP6 = mysql_fetch_array($RecordSetP6)) {
						?><tr class = 'eachrow'>
						<td border = "0" bgcolor="<?php echo $row_RecordSetP6['PREQ_HEX_COLOR_1']?>"></td>
						<td border = "0" bgcolor="<?php echo $row_RecordSetP6['PREQ_HEX_COLOR_2']?>"></td>
						<td border = "0" bgcolor="<?php echo $row_RecordSetP6['PREQ_HEX_COLOR_3']?>"></td>
						<td border = "0" bgcolor="<?php echo $row_RecordSetP6['PREQ_HEX_COLOR_4']?>"></td>
            	 		<?php echo "<td class = 'namecell'>".$row_RecordSetP6['Course_Code']." ".$row_RecordSetP6['Course_Number']."<br>".$row_RecordSetP6['Course_Name']."</td>"?>
						<td border = "0" bgcolor="<?php echo $row_RecordSetP6['HEX_COLOR']?>"></td>
               		 	</tr><?php
                		$counter++;
          			}	

          			if($counter <= $maxSize AND !($row_RecordSetP6 = mysql_fetch_array($RecordSetP6))) {
            			while($counter <= $maxSize AND $row_RecordSetP9 = mysql_fetch_array($RecordSetP9)) {
                			?><tr class = 'eachrow'>
							<td border = "0" bgcolor="<?php echo $row_RecordSetP9['PREQ_HEX_COLOR_1']?>"></td>
							<td border = "0" bgcolor="<?php echo $row_RecordSetP9['PREQ_HEX_COLOR_2']?>"></td>
							<td border = "0" bgcolor="<?php echo $row_RecordSetP9['PREQ_HEX_COLOR_3']?>"></td>
							<td border = "0" bgcolor="<?php echo $row_RecordSetP9['PREQ_HEX_COLOR_4']?>"></td>
             	   			<?php echo "<td class = 'namecell'>".$row_RecordSetP9['Course_Code']." ".$row_RecordSetP9['Course_Number']."<br>".$row_RecordSetP9['Course_Name']."</td>"?>	
							<td border = "0" bgcolor="<?php echo $row_RecordSetP9['HEX_COLOR']?>"></td>
                			</tr><?php
                			$counter++;
                		}
          			}

          			else if($counter > $maxSize AND ($row_RecordSetP6 = mysql_fetch_array($RecordSetP6))) {
          				$counter = 1;
           				?></table>
           				<table id = "thistable" style="display: inline-block;"><colgroup>
						<col span="1" style="width: 2%;">
						<col span="1" style="width: 2%;">
						<col span="1" style="width: 2%;">
						<col span="1" style="width: 2%;">
						<col span="1" style="width: 84%;">
						<col span="1" style="width: 8%;">
						</colgroup><?php
						?><tr class = 'eachrow'>
						<td border = "0" bgcolor="<?php echo $row_RecordSetP6['PREQ_HEX_COLOR_1']?>"></td>
						<td border = "0" bgcolor="<?php echo $row_RecordSetP6['PREQ_HEX_COLOR_2']?>"></td>
						<td border = "0" bgcolor="<?php echo $row_RecordSetP6['PREQ_HEX_COLOR_3']?>"></td>
						<td border = "0" bgcolor="<?php echo $row_RecordSetP6['PREQ_HEX_COLOR_4']?>"></td>
            	 		<?php echo "<td class = 'namecell'>".$row_RecordSetP6['Course_Code']." ".$row_RecordSetP6['Course_Number']."<br>".$row_RecordSetP6['Course_Name']."</td>"?>
						<td border = "0" bgcolor="<?php echo $row_RecordSetP6['HEX_COLOR']?>"></td>
            	   	 	</tr><?php
						while($counter <= $maxSize AND $row_RecordSetP6 = mysql_fetch_array($RecordSetP6)) {
							?><tr class = 'eachrow'>
							<td border = "0" bgcolor="<?php echo $row_RecordSetP6['PREQ_HEX_COLOR_1']?>"></td>
							<td border = "0" bgcolor="<?php echo $row_RecordSetP6['PREQ_HEX_COLOR_2']?>"></td>
							<td border = "0" bgcolor="<?php echo $row_RecordSetP6['PREQ_HEX_COLOR_3']?>"></td>
							<td border = "0" bgcolor="<?php echo $row_RecordSetP6['PREQ_HEX_COLOR_4']?>"></td>
             				<?php echo "<td class = 'namecell'>".$row_RecordSetP6['Course_Code']." ".$row_RecordSetP6['Course_Number']."<br>".$row_RecordSetP6['Course_Name']."</td>"?>
							<td border = "0" bgcolor="<?php echo $row_RecordSetP6['HEX_COLOR']?>"></td>
                			</tr><?php
                			$counter++;
                		}		
                		if($counter <= $maxSize AND !($row_RecordSetP6 = mysql_fetch_array($RecordSetP6))) {
           					while($counter <= $maxSize AND $row_RecordSetP9 = mysql_fetch_array($RecordSetP9)) {
								?><tr class = 'eachrow'>
								<td border = "0" bgcolor="<?php echo $row_RecordSetP9['PREQ_HEX_COLOR_1']?>"></td>
								<td border = "0" bgcolor="<?php echo $row_RecordSetP9['PREQ_HEX_COLOR_2']?>"></td>
								<td border = "0" bgcolor="<?php echo $row_RecordSetP9['PREQ_HEX_COLOR_3']?>"></td>
								<td border = "0" bgcolor="<?php echo $row_RecordSetP9['PREQ_HEX_COLOR_4']?>"></td>
             					<?php echo "<td class = 'namecell'>".$row_RecordSetP9['Course_Code']." ".$row_RecordSetP9['Course_Number']."<br>".$row_RecordSetP9['Course_Name']."</td>"?>
								<td border = "0" bgcolor="<?php echo $row_RecordSetP9['HEX_COLOR']?>"></td>
                				</tr><?php
                				$counter++;
                			}
           				}	
           			}
           			//Semester Seven
           			$maxSize = 6;
           			$counter = 1;
           			?></table>
           			<table id = "thistable" style="display: inline-block;"><colgroup>
					<col span="1" style="width: 2%;">
					<col span="1" style="width: 2%;">
					<col span="1" style="width: 2%;">
					<col span="1" style="width: 2%;">
					<col span="1" style="width: 84%;">
					<col span="1" style="width: 8%;">
					</colgroup><?php
					while($counter <= $maxSize AND $row_RecordSetP7 = mysql_fetch_array($RecordSetP7)) {
						?><tr class = 'eachrow'>
						<td border = "0" bgcolor="<?php echo $row_RecordSetP7['PREQ_HEX_COLOR_1']?>"></td>
						<td border = "0" bgcolor="<?php echo $row_RecordSetP7['PREQ_HEX_COLOR_2']?>"></td>
						<td border = "0" bgcolor="<?php echo $row_RecordSetP7['PREQ_HEX_COLOR_3']?>"></td>
						<td border = "0" bgcolor="<?php echo $row_RecordSetP7['PREQ_HEX_COLOR_4']?>"></td>
        	   	  		<?php echo "<td class = 'namecell'>".$row_RecordSetP7['Course_Code']." ".$row_RecordSetP7['Course_Number']."<br>".$row_RecordSetP7['Course_Name']."</td>"?>
						<td border = "0" bgcolor="<?php echo $row_RecordSetP7['HEX_COLOR']?>"></td>
        	        	</tr><?php
        	       		 $counter++;
          			}

          			if(!($counter <= $maxSize AND $row_RecordSetP7 = mysql_fetch_array($RecordSetP7))) {
            			while(($counter <= $maxSize) AND ($row_RecordSetP9 = mysql_fetch_array($RecordSetP9))) {
            	    		?><tr class = 'eachrow'>
							<td border = "0" bgcolor="<?php echo $row_RecordSetP9['PREQ_HEX_COLOR_1']?>"></td>
							<td border = "0" bgcolor="<?php echo $row_RecordSetP9['PREQ_HEX_COLOR_2']?>"></td>
							<td border = "0" bgcolor="<?php echo $row_RecordSetP9['PREQ_HEX_COLOR_3']?>"></td>
							<td border = "0" bgcolor="<?php echo $row_RecordSetP9['PREQ_HEX_COLOR_4']?>"></td>
             		   		<?php echo "<td class = 'namecell'>".$row_RecordSetP9['Course_Code']." ".$row_RecordSetP9['Course_Number']."<br>".$row_RecordSetP9['Course_Name']."</td>"?>	
							<td border = "0" bgcolor="<?php echo $row_RecordSetP9['HEX_COLOR']?>"></td>
               		 		</tr><?php
               		 		$counter++;
               	 		}
	          		}

          			else if($counter > $maxSize AND ($row_RecordSetP7 = mysql_fetch_array($RecordSetP7))) {
          				$counter = 1;
           				?></table>
           				<table id = "thistable" style="display: inline-block;"><colgroup>
							<col span="1" style="width: 2%;">
						<col span="1" style="width: 2%;">
						<col span="1" style="width: 2%;">
						<col span="1" style="width: 2%;">
						<col span="1" style="width: 84%;">
						<col span="1" style="width: 8%;">
						</colgroup><?php
						?><tr class = 'eachrow'>
						<td border = "0" bgcolor="<?php echo $row_RecordSetP7['PREQ_HEX_COLOR_1']?>"></td>
						<td border = "0" bgcolor="<?php echo $row_RecordSetP7['PREQ_HEX_COLOR_2']?>"></td>
						<td border = "0" bgcolor="<?php echo $row_RecordSetP7['PREQ_HEX_COLOR_3']?>"></td>
						<td border = "0" bgcolor="<?php echo $row_RecordSetP7['PREQ_HEX_COLOR_4']?>"></td>
             			<?php echo "<td class = 'namecell'>".$row_RecordSetP7['Course_Code']." ".$row_RecordSetP7['Course_Number']."<br>".$row_RecordSetP7['Course_Name']."</td>"?>
						<td border = "0" bgcolor="<?php echo $row_RecordSetP7['HEX_COLOR']?>"></td>
                		</tr><?php
						while($counter <= $maxSize AND $row_RecordSetP7 = mysql_fetch_array($RecordSetP7)) {
							?><tr class = 'eachrow'>
							<td border = "0" bgcolor="<?php echo $row_RecordSetP7['PREQ_HEX_COLOR_1']?>"></td>
							<td border = "0" bgcolor="<?php echo $row_RecordSetP7['PREQ_HEX_COLOR_2']?>"></td>
							<td border = "0" bgcolor="<?php echo $row_RecordSetP7['PREQ_HEX_COLOR_3']?>"></td>
							<td border = "0" bgcolor="<?php echo $row_RecordSetP7['PREQ_HEX_COLOR_4']?>"></td>
             				<?php echo "<td class = 'namecell'>".$row_RecordSetP7['Course_Code']." ".$row_RecordSetP7['Course_Number']."<br>".$row_RecordSetP7['Course_Name']."</td>"?>
							<td border = "0" bgcolor="<?php echo $row_RecordSetP7['HEX_COLOR']?>"></td>
                			</tr><?php
                			$counter++;
                		}
                		if(!($row_RecordSetP7 = mysql_fetch_array($RecordSetP7)) AND $counter <= $maxSize) {
           					while($counter <= $maxSize AND $row_RecordSetP9 = mysql_fetch_array($RecordSetP9)) {
								?><tr class = 'eachrow'>
								<td border = "0" bgcolor="<?php echo $row_RecordSetP9['PREQ_HEX_COLOR_1']?>"></td>
								<td border = "0" bgcolor="<?php echo $row_RecordSetP9['PREQ_HEX_COLOR_2']?>"></td>
								<td border = "0" bgcolor="<?php echo $row_RecordSetP9['PREQ_HEX_COLOR_3']?>"></td>
								<td border = "0" bgcolor="<?php echo $row_RecordSetP9['PREQ_HEX_COLOR_4']?>"></td>
             					<?php echo "<td class = 'namecell'>".$row_RecordSetP9['Course_Code']." ".$row_RecordSetP9['Course_Number']."<br>".$row_RecordSetP9['Course_Name']."</td>"?>
								<td border = "0" bgcolor="<?php echo $row_RecordSetP9['HEX_COLOR']?>"></td>
                				</tr><?php
                				$counter++;
                			}	
           				}	
           			}
           			break;
           			case 4:
           			//Semester Four
           			$maxSize = 5;
           			$counter = 1;
           			?></table>
           			<div class="hor">
           			<table id = "thistable" style="display: inline-block;"><colgroup>
					<col span="1" style="width: 2%;">
					<col span="1" style="width: 2%;">
					<col span="1" style="width: 2%;">
					<col span="1" style="width: 2%;">
					<col span="1" style="width: 84%;">
					<col span="1" style="width: 8%;">
					</colgroup><?php
					while($counter <= $maxSize AND $row_RecordSetP4 = mysql_fetch_array($RecordSetP4)) {
						?><tr class = 'eachrow'>
						<td border = "0" bgcolor="<?php echo $row_RecordSetP4['PREQ_HEX_COLOR_1']?>"></td>
						<td border = "0" bgcolor="<?php echo $row_RecordSetP4['PREQ_HEX_COLOR_2']?>"></td>
						<td border = "0" bgcolor="<?php echo $row_RecordSetP4['PREQ_HEX_COLOR_3']?>"></td>
						<td border = "0" bgcolor="<?php echo $row_RecordSetP4['PREQ_HEX_COLOR_4']?>"></td>
             			<?php echo "<td class = 'namecell'>".$row_RecordSetP4['Course_Code']." ".$row_RecordSetP4['Course_Number']."<br>".$row_RecordSetP4['Course_Name']."</td>"?>
						<td border = "0" bgcolor="<?php echo $row_RecordSetP4['HEX_COLOR']?>"></td>
                		</tr><?php
                		$counter++;
          			}
          				if($counter <= $maxSize AND !($row_RecordSetP4 = mysql_fetch_array($RecordSetP4))) {
           					while($counter <= $maxSize AND $row_RecordSetP9 = mysql_fetch_array($RecordSetP9)) {
               					?><tr class = 'eachrow'>
								<td border = "0" bgcolor="<?php echo $row_RecordSetP9['PREQ_HEX_COLOR_1']?>"></td>
								<td border = "0" bgcolor="<?php echo $row_RecordSetP9['PREQ_HEX_COLOR_2']?>"></td>
								<td border = "0" bgcolor="<?php echo $row_RecordSetP9['PREQ_HEX_COLOR_3']?>"></td>
								<td border = "0" bgcolor="<?php echo $row_RecordSetP9['PREQ_HEX_COLOR_4']?>"></td>
           		   				<?php echo "<td class = 'namecell'>".$row_RecordSetP9['Course_Code']." ".$row_RecordSetP9['Course_Number']."<br>".$row_RecordSetP9['Course_Name']."</td>"?>	
								<td border = "0" bgcolor="<?php echo $row_RecordSetP9['HEX_COLOR']?>"></td>
               					</tr><?php
               					$counter++;
                			}
          				}

          				else if($counter > $maxSize AND ($row_RecordSetP4 = mysql_fetch_array($RecordSetP4))) {
          				$counter = 1;
           				?></table>
           				<table id = "thistable" style="display: inline-block;"><colgroup>
						<col span="1" style="width: 2%;">
						<col span="1" style="width: 2%;">
						<col span="1" style="width: 2%;">
						<col span="1" style="width: 2%;">
						<col span="1" style="width: 84%;">
						<col span="1" style="width: 8%;">
						</colgroup><?php
						?><tr class = 'eachrow'>
						<td border = "0" bgcolor="<?php echo $row_RecordSetP4['PREQ_HEX_COLOR_1']?>"></td>
						<td border = "0" bgcolor="<?php echo $row_RecordSetP4['PREQ_HEX_COLOR_2']?>"></td>
						<td border = "0" bgcolor="<?php echo $row_RecordSetP4['PREQ_HEX_COLOR_3']?>"></td>
						<td border = "0" bgcolor="<?php echo $row_RecordSetP4['PREQ_HEX_COLOR_4']?>"></td>
             			<?php echo "<td class = 'namecell'>".$row_RecordSetP4['Course_Code']." ".$row_RecordSetP4['Course_Number']."<br>".$row_RecordSetP4['Course_Name']."</td>"?>
						<td border = "0" bgcolor="<?php echo $row_RecordSetP4['HEX_COLOR']?>"></td>
                		</tr><?php
						while($counter <= $maxSize AND $row_RecordSetP4 = mysql_fetch_array($RecordSetP4)) {
							?><tr class = 'eachrow'>
							<td border = "0" bgcolor="<?php echo $row_RecordSetP4['PREQ_HEX_COLOR_1']?>"></td>
							<td border = "0" bgcolor="<?php echo $row_RecordSetP4['PREQ_HEX_COLOR_2']?>"></td>
							<td border = "0" bgcolor="<?php echo $row_RecordSetP4['PREQ_HEX_COLOR_3']?>"></td>
							<td border = "0" bgcolor="<?php echo $row_RecordSetP4['PREQ_HEX_COLOR_4']?>"></td>
             				<?php echo "<td class = 'namecell'>".$row_RecordSetP4['Course_Code']." ".$row_RecordSetP4['Course_Number']."<br>".$row_RecordSetP4['Course_Name']."</td>"?>
							<td border = "0" bgcolor="<?php echo $row_RecordSetP4['HEX_COLOR']?>"></td>
                			</tr><?php
                			$counter++;
                		}
                		if($counter <= $maxSize AND !($row_RecordSetP4 = mysql_fetch_array($RecordSetP4))) {
           					while($counter <= $maxSize AND $row_RecordSetP9 = mysql_fetch_array($RecordSetP9)) {
								?><tr class = 'eachrow'>
								<td border = "0" bgcolor="<?php echo $row_RecordSetP9['PREQ_HEX_COLOR_1']?>"></td>
								<td border = "0" bgcolor="<?php echo $row_RecordSetP9['PREQ_HEX_COLOR_2']?>"></td>
								<td border = "0" bgcolor="<?php echo $row_RecordSetP9['PREQ_HEX_COLOR_3']?>"></td>
								<td border = "0" bgcolor="<?php echo $row_RecordSetP9['PREQ_HEX_COLOR_4']?>"></td>
             					<?php echo "<td class = 'namecell'>".$row_RecordSetP9['Course_Code']." ".$row_RecordSetP9['Course_Number']."<br>".$row_RecordSetP9['Course_Name']."</td>"?>
								<td border = "0" bgcolor="<?php echo $row_RecordSetP9['HEX_COLOR']?>"></td>
                				</tr><?php
                				$counter++;
                			}
           				}
           			}

           			//Semester Five
           			$maxSize = 5;
           			$counter = 1;
           			?></table>
           			<table id = "thistable" style="display: inline-block;"><colgroup>
					<col span="1" style="width: 2%;">
					<col span="1" style="width: 2%;">
					<col span="1" style="width: 2%;">
					<col span="1" style="width: 2%;">
					<col span="1" style="width: 84%;">
					<col span="1" style="width: 8%;">
					</colgroup><?php
					while($counter <= $maxSize AND $row_RecordSetP5 = mysql_fetch_array($RecordSetP5)) {
						?><tr class = 'eachrow'>
						<td border = "0" bgcolor="<?php echo $row_RecordSetP5['PREQ_HEX_COLOR_1']?>"></td>
						<td border = "0" bgcolor="<?php echo $row_RecordSetP5['PREQ_HEX_COLOR_2']?>"></td>
						<td border = "0" bgcolor="<?php echo $row_RecordSetP5['PREQ_HEX_COLOR_3']?>"></td>
						<td border = "0" bgcolor="<?php echo $row_RecordSetP5['PREQ_HEX_COLOR_4']?>"></td>
             			<?php echo "<td class = 'namecell'>".$row_RecordSetP5['Course_Code']." ".$row_RecordSetP5['Course_Number']."<br>".$row_RecordSetP5['Course_Name']."</td>"?>
						<td border = "0" bgcolor="<?php echo $row_RecordSetP5['HEX_COLOR']?>"></td>
                		</tr><?php
                		$counter++;
          			}	

          			if($counter <= $maxSize AND !($row_RecordSetP5 = mysql_fetch_array($RecordSetP5))) {
            			while($counter <= $maxSize AND $row_RecordSetP9 = mysql_fetch_array($RecordSetP9)) {
                			?><tr class = 'eachrow'>
							<td border = "0" bgcolor="<?php echo $row_RecordSetP9['PREQ_HEX_COLOR_1']?>"></td>
							<td border = "0" bgcolor="<?php echo $row_RecordSetP9['PREQ_HEX_COLOR_2']?>"></td>
							<td border = "0" bgcolor="<?php echo $row_RecordSetP9['PREQ_HEX_COLOR_3']?>"></td>
							<td border = "0" bgcolor="<?php echo $row_RecordSetP9['PREQ_HEX_COLOR_4']?>"></td>
             	   			<?php echo "<td class = 'namecell'>".$row_RecordSetP9['Course_Code']." ".$row_RecordSetP9['Course_Number']."<br>".$row_RecordSetP9['Course_Name']."</td>"?>	
							<td border = "0" bgcolor="<?php echo $row_RecordSetP9['HEX_COLOR']?>"></td>
                			</tr><?php
                			$counter++;
                		}
          			}

          			else if($counter > $maxSize AND ($row_RecordSetP5 = mysql_fetch_array($RecordSetP5))) {
          				$counter = 1;
           				?></table>
           				<table id = "thistable" style="display: inline-block;"><colgroup>
						<col span="1" style="width: 2%;">
						<col span="1" style="width: 2%;">
						<col span="1" style="width: 2%;">
						<col span="1" style="width: 2%;">
						<col span="1" style="width: 84%;">
						<col span="1" style="width: 8%;">
						</colgroup><?php
						?><tr class = 'eachrow'>
						<td border = "0" bgcolor="<?php echo $row_RecordSetP5['PREQ_HEX_COLOR_1']?>"></td>
						<td border = "0" bgcolor="<?php echo $row_RecordSetP5['PREQ_HEX_COLOR_2']?>"></td>
						<td border = "0" bgcolor="<?php echo $row_RecordSetP5['PREQ_HEX_COLOR_3']?>"></td>
						<td border = "0" bgcolor="<?php echo $row_RecordSetP5['PREQ_HEX_COLOR_4']?>"></td>
             			<?php echo "<td class = 'namecell'>".$row_RecordSetP5['Course_Code']." ".$row_RecordSetP5['Course_Number']."<br>".$row_RecordSetP5['Course_Name']."</td>"?>
						<td border = "0" bgcolor="<?php echo $row_RecordSetP5['HEX_COLOR']?>"></td>
                		</tr><?php
						while($counter <= $maxSize AND $row_RecordSetP5 = mysql_fetch_array($RecordSetP5)) {
							?><tr class = 'eachrow'>
							<td border = "0" bgcolor="<?php echo $row_RecordSetP5['PREQ_HEX_COLOR_1']?>"></td>
							<td border = "0" bgcolor="<?php echo $row_RecordSetP5['PREQ_HEX_COLOR_2']?>"></td>
							<td border = "0" bgcolor="<?php echo $row_RecordSetP5['PREQ_HEX_COLOR_3']?>"></td>
							<td border = "0" bgcolor="<?php echo $row_RecordSetP5['PREQ_HEX_COLOR_4']?>"></td>
             				<?php echo "<td class = 'namecell'>".$row_RecordSetP5['Course_Code']." ".$row_RecordSetP5['Course_Number']."<br>".$row_RecordSetP5['Course_Name']."</td>"?>
							<td border = "0" bgcolor="<?php echo $row_RecordSetP5['HEX_COLOR']?>"></td>
                			</tr><?php
                			$counter++;
                		}		
                		if($counter <= $maxSize AND !($row_RecordSetP5 = mysql_fetch_array($RecordSetP5))) {
           					while($counter <= $maxSize AND $row_RecordSetP9 = mysql_fetch_array($RecordSetP9)) {
								?><tr class = 'eachrow'>
								<td border = "0" bgcolor="<?php echo $row_RecordSetP9['PREQ_HEX_COLOR_1']?>"></td>
								<td border = "0" bgcolor="<?php echo $row_RecordSetP9['PREQ_HEX_COLOR_2']?>"></td>
								<td border = "0" bgcolor="<?php echo $row_RecordSetP9['PREQ_HEX_COLOR_3']?>"></td>
								<td border = "0" bgcolor="<?php echo $row_RecordSetP9['PREQ_HEX_COLOR_4']?>"></td>
             					<?php echo "<td class = 'namecell'>".$row_RecordSetP9['Course_Code']." ".$row_RecordSetP9['Course_Number']."<br>".$row_RecordSetP9['Course_Name']."</td>"?>
								<td border = "0" bgcolor="<?php echo $row_RecordSetP9['HEX_COLOR']?>"></td>
                				</tr><?php
                				$counter++;
                			}
           				}
           			}	
           			//Semester Six
           			$maxSize = 6;
           			$counter = 1;
           			?></table>
         	  		<table id = "thistable" style="display: inline-block;"><colgroup>
					<col span="1" style="width: 2%;">
					<col span="1" style="width: 2%;">
					<col span="1" style="width: 2%;">
					<col span="1" style="width: 2%;">
					<col span="1" style="width: 84%;">
					<col span="1" style="width: 8%;">
					</colgroup><?php
					while($counter <= $maxSize AND $row_RecordSetP6 = mysql_fetch_array($RecordSetP6)) {
						?><tr class = 'eachrow'>
						<td border = "0" bgcolor="<?php echo $row_RecordSetP6['PREQ_HEX_COLOR_1']?>"></td>
						<td border = "0" bgcolor="<?php echo $row_RecordSetP6['PREQ_HEX_COLOR_2']?>"></td>
						<td border = "0" bgcolor="<?php echo $row_RecordSetP6['PREQ_HEX_COLOR_3']?>"></td>
						<td border = "0" bgcolor="<?php echo $row_RecordSetP6['PREQ_HEX_COLOR_4']?>"></td>
             			<?php echo "<td class = 'namecell'>".$row_RecordSetP6['Course_Code']." ".$row_RecordSetP6['Course_Number']."<br>".$row_RecordSetP6['Course_Name']."</td>"?>
						<td border = "0" bgcolor="<?php echo $row_RecordSetP6['HEX_COLOR']?>"></td>
                		</tr><?php
                		$counter++;
          			}	

          			if($counter <= $maxSize AND !($row_RecordSetP6 = mysql_fetch_array($RecordSetP6))) {
            			while($counter <= $maxSize AND $row_RecordSetP9 = mysql_fetch_array($RecordSetP9)) {
                			?><tr class = 'eachrow'>
							<td border = "0" bgcolor="<?php echo $row_RecordSetP9['PREQ_HEX_COLOR_1']?>"></td>
							<td border = "0" bgcolor="<?php echo $row_RecordSetP9['PREQ_HEX_COLOR_2']?>"></td>
							<td border = "0" bgcolor="<?php echo $row_RecordSetP9['PREQ_HEX_COLOR_3']?>"></td>
							<td border = "0" bgcolor="<?php echo $row_RecordSetP9['PREQ_HEX_COLOR_4']?>"></td>
             	   			<?php echo "<td class = 'namecell'>".$row_RecordSetP9['Course_Code']." ".$row_RecordSetP9['Course_Number']."<br>".$row_RecordSetP9['Course_Name']."</td>"?>	
							<td border = "0" bgcolor="<?php echo $row_RecordSetP9['HEX_COLOR']?>"></td>
                			</tr><?php
                			$counter++;
                		}
          			}	

          			else if($counter > $maxSize AND ($row_RecordSetP6 = mysql_fetch_array($RecordSetP6))) {
          				$counter = 1;
           				?></table>
           				<table id = "thistable" style="display: inline-block;"><colgroup>
						<col span="1" style="width: 2%;">
						<col span="1" style="width: 2%;">
						<col span="1" style="width: 2%;">
						<col span="1" style="width: 2%;">
						<col span="1" style="width: 84%;">
						<col span="1" style="width: 8%;">
						</colgroup><?php
						?><tr class = 'eachrow'>
						<td border = "0" bgcolor="<?php echo $row_RecordSetP6['PREQ_HEX_COLOR_1']?>"></td>
						<td border = "0" bgcolor="<?php echo $row_RecordSetP6['PREQ_HEX_COLOR_2']?>"></td>
						<td border = "0" bgcolor="<?php echo $row_RecordSetP6['PREQ_HEX_COLOR_3']?>"></td>
						<td border = "0" bgcolor="<?php echo $row_RecordSetP6['PREQ_HEX_COLOR_4']?>"></td>
    	         		<?php echo "<td class = 'namecell'>".$row_RecordSetP6['Course_Code']." ".$row_RecordSetP6['Course_Number']."<br>".$row_RecordSetP6['Course_Name']."</td>"?>
						<td border = "0" bgcolor="<?php echo $row_RecordSetP6['HEX_COLOR']?>"></td>
    	            	</tr><?php
						while($counter <= $maxSize AND $row_RecordSetP6 = mysql_fetch_array($RecordSetP6)) {
							?><tr class = 'eachrow'>
							<td border = "0" bgcolor="<?php echo $row_RecordSetP6['PREQ_HEX_COLOR_1']?>"></td>
							<td border = "0" bgcolor="<?php echo $row_RecordSetP6['PREQ_HEX_COLOR_2']?>"></td>
							<td border = "0" bgcolor="<?php echo $row_RecordSetP6['PREQ_HEX_COLOR_3']?>"></td>
							<td border = "0" bgcolor="<?php echo $row_RecordSetP6['PREQ_HEX_COLOR_4']?>"></td>
	             			<?php echo "<td class = 'namecell'>".$row_RecordSetP6['Course_Code']." ".$row_RecordSetP6['Course_Number']."<br>".$row_RecordSetP6['Course_Name']."</td>"?>
							<td border = "0" bgcolor="<?php echo $row_RecordSetP6['HEX_COLOR']?>"></td>
        	        		</tr><?php
            	    		$counter++;
                		}	
                		if($counter <= $maxSize AND !($row_RecordSetP6 = mysql_fetch_array($RecordSetP6))) {
           					while($counter <= $maxSize AND $row_RecordSetP9 = mysql_fetch_array($RecordSetP9)) {
								?><tr class = 'eachrow'>
								<td border = "0" bgcolor="<?php echo $row_RecordSetP9['PREQ_HEX_COLOR_1']?>"></td>
								<td border = "0" bgcolor="<?php echo $row_RecordSetP9['PREQ_HEX_COLOR_2']?>"></td>
								<td border = "0" bgcolor="<?php echo $row_RecordSetP9['PREQ_HEX_COLOR_3']?>"></td>
								<td border = "0" bgcolor="<?php echo $row_RecordSetP9['PREQ_HEX_COLOR_4']?>"></td>
             					<?php echo "<td class = 'namecell'>".$row_RecordSetP9['Course_Code']." ".$row_RecordSetP9['Course_Number']."<br>".$row_RecordSetP9['Course_Name']."</td>"?>
								<td border = "0" bgcolor="<?php echo $row_RecordSetP9['HEX_COLOR']?>"></td>
                				</tr><?php
                				$counter++;
                			}
           				}	
           			}
           			//Semester Seven
           			$maxSize = 6;
           			$counter = 1;
           			?></table>
           			<table id = "thistable" style="display: inline-block;"><colgroup>
					<col span="1" style="width: 2%;">
					<col span="1" style="width: 2%;">
					<col span="1" style="width: 2%;">
					<col span="1" style="width: 2%;">
					<col span="1" style="width: 84%;">
					<col span="1" style="width: 8%;">
					</colgroup><?php
					while($counter <= $maxSize AND $row_RecordSetP7 = mysql_fetch_array($RecordSetP7)) {
						?><tr class = 'eachrow'>
						<td border = "0" bgcolor="<?php echo $row_RecordSetP7['PREQ_HEX_COLOR_1']?>"></td>
						<td border = "0" bgcolor="<?php echo $row_RecordSetP7['PREQ_HEX_COLOR_2']?>"></td>
						<td border = "0" bgcolor="<?php echo $row_RecordSetP7['PREQ_HEX_COLOR_3']?>"></td>
						<td border = "0" bgcolor="<?php echo $row_RecordSetP7['PREQ_HEX_COLOR_4']?>"></td>
        	   	  		<?php echo "<td class = 'namecell'>".$row_RecordSetP7['Course_Code']." ".$row_RecordSetP7['Course_Number']."<br>".$row_RecordSetP7['Course_Name']."</td>"?>
						<td border = "0" bgcolor="<?php echo $row_RecordSetP7['HEX_COLOR']?>"></td>
        	        	</tr><?php
        	        	$counter++;
          			}	

          			if(!($counter <= $maxSize AND $row_RecordSetP7 = mysql_fetch_array($RecordSetP7))) {
            			while(($counter <= $maxSize) AND ($row_RecordSetP9 = mysql_fetch_array($RecordSetP9))) {
            		    	?><tr class = 'eachrow'>
							<td border = "0" bgcolor="<?php echo $row_RecordSetP9['PREQ_HEX_COLOR_1']?>"></td>
							<td border = "0" bgcolor="<?php echo $row_RecordSetP9['PREQ_HEX_COLOR_2']?>"></td>
							<td border = "0" bgcolor="<?php echo $row_RecordSetP9['PREQ_HEX_COLOR_3']?>"></td>
							<td border = "0" bgcolor="<?php echo $row_RecordSetP9['PREQ_HEX_COLOR_4']?>"></td>
             			   	<?php echo "<td class = 'namecell'>".$row_RecordSetP9['Course_Code']." ".$row_RecordSetP9['Course_Number']."<br>".$row_RecordSetP9['Course_Name']."</td>"?>	
							<td border = "0" bgcolor="<?php echo $row_RecordSetP9['HEX_COLOR']?>"></td>
               			 	</tr><?php
               			 	$counter++;
               		 	}
	          		}

          			else if($counter > $maxSize AND ($row_RecordSetP7 = mysql_fetch_array($RecordSetP7))) {
          				$counter = 1;
           				?></table>
           				<table id = "thistable" style="display: inline-block;"><colgroup>
						<col span="1" style="width: 2%;">
						<col span="1" style="width: 2%;">
						<col span="1" style="width: 2%;">
						<col span="1" style="width: 2%;">
						<col span="1" style="width: 84%;">
						<col span="1" style="width: 8%;">
						</colgroup><?php
						?><tr class = 'eachrow'>
						<td border = "0" bgcolor="<?php echo $row_RecordSetP7['PREQ_HEX_COLOR_1']?>"></td>
						<td border = "0" bgcolor="<?php echo $row_RecordSetP7['PREQ_HEX_COLOR_2']?>"></td>
						<td border = "0" bgcolor="<?php echo $row_RecordSetP7['PREQ_HEX_COLOR_3']?>"></td>
						<td border = "0" bgcolor="<?php echo $row_RecordSetP7['PREQ_HEX_COLOR_4']?>"></td>
           		  		<?php echo "<td class = 'namecell'>".$row_RecordSetP7['Course_Code']." ".$row_RecordSetP7['Course_Number']."<br>".$row_RecordSetP7['Course_Name']."</td>"?>
						<td border = "0" bgcolor="<?php echo $row_RecordSetP7['HEX_COLOR']?>"></td>
    	            	</tr><?php
						while($counter <= $maxSize AND $row_RecordSetP7 = mysql_fetch_array($RecordSetP7)) {
							?><tr class = 'eachrow'>
							<td border = "0" bgcolor="<?php echo $row_RecordSetP7['PREQ_HEX_COLOR_1']?>"></td>
							<td border = "0" bgcolor="<?php echo $row_RecordSetP7['PREQ_HEX_COLOR_2']?>"></td>
							<td border = "0" bgcolor="<?php echo $row_RecordSetP7['PREQ_HEX_COLOR_3']?>"></td>
							<td border = "0" bgcolor="<?php echo $row_RecordSetP7['PREQ_HEX_COLOR_4']?>"></td>
             				<?php echo "<td class = 'namecell'>".$row_RecordSetP7['Course_Code']." ".$row_RecordSetP7['Course_Number']."<br>".$row_RecordSetP7['Course_Name']."</td>"?>
							<td border = "0" bgcolor="<?php echo $row_RecordSetP7['HEX_COLOR']?>"></td>
            	    		</tr><?php
                			$counter++;
                		}
                		if(!($row_RecordSetP7 = mysql_fetch_array($RecordSetP7)) AND $counter <= $maxSize) {
           					while($counter <= $maxSize AND $row_RecordSetP9 = mysql_fetch_array($RecordSetP9)) {
								?><tr class = 'eachrow'>
								<td border = "0" bgcolor="<?php echo $row_RecordSetP9['PREQ_HEX_COLOR_1']?>"></td>
								<td border = "0" bgcolor="<?php echo $row_RecordSetP9['PREQ_HEX_COLOR_2']?>"></td>
								<td border = "0" bgcolor="<?php echo $row_RecordSetP9['PREQ_HEX_COLOR_3']?>"></td>
								<td border = "0" bgcolor="<?php echo $row_RecordSetP9['PREQ_HEX_COLOR_4']?>"></td>
             					<?php echo "<td class = 'namecell'>".$row_RecordSetP9['Course_Code']." ".$row_RecordSetP9['Course_Number']."<br>".$row_RecordSetP9['Course_Name']."</td>"?>
								<td border = "0" bgcolor="<?php echo $row_RecordSetP9['HEX_COLOR']?>"></td>
                				</tr><?php
                				$counter++;
              		  		}	
           				}
           			}
           			break;
           			case 5:
           			//Semester Five
           				$maxSize = 5;
           				$counter = 1;
           				?></table>
           				<div class="hor">
           				<table id = "thistable" style="display: inline-block;"><colgroup>
						<col span="1" style="width: 2%;">
						<col span="1" style="width: 2%;">
						<col span="1" style="width: 2%;">
						<col span="1" style="width: 2%;">
						<col span="1" style="width: 84%;">
						<col span="1" style="width: 8%;">
						</colgroup><?php
						while($counter <= $maxSize AND $row_RecordSetP5 = mysql_fetch_array($RecordSetP5)) {
							?><tr class = 'eachrow'>
							<td border = "0" bgcolor="<?php echo $row_RecordSetP5['PREQ_HEX_COLOR_1']?>"></td>
							<td border = "0" bgcolor="<?php echo $row_RecordSetP5['PREQ_HEX_COLOR_2']?>"></td>
							<td border = "0" bgcolor="<?php echo $row_RecordSetP5['PREQ_HEX_COLOR_3']?>"></td>
							<td border = "0" bgcolor="<?php echo $row_RecordSetP5['PREQ_HEX_COLOR_4']?>"></td>
             				<?php echo "<td class = 'namecell'>".$row_RecordSetP5['Course_Code']." ".$row_RecordSetP5['Course_Number']."<br>".$row_RecordSetP5['Course_Name']."</td>"?>
							<td border = "0" bgcolor="<?php echo $row_RecordSetP5['HEX_COLOR']?>"></td>
                			</tr><?php
                			$counter++;
          				}	

          				if($counter <= $maxSize AND !($row_RecordSetP5 = mysql_fetch_array($RecordSetP5))) {
            				while($counter <= $maxSize AND $row_RecordSetP9 = mysql_fetch_array($RecordSetP9)) {
                				?><tr class = 'eachrow'>
								<td border = "0" bgcolor="<?php echo $row_RecordSetP9['PREQ_HEX_COLOR_1']?>"></td>
								<td border = "0" bgcolor="<?php echo $row_RecordSetP9['PREQ_HEX_COLOR_2']?>"></td>
								<td border = "0" bgcolor="<?php echo $row_RecordSetP9['PREQ_HEX_COLOR_3']?>"></td>
								<td border = "0" bgcolor="<?php echo $row_RecordSetP9['PREQ_HEX_COLOR_4']?>"></td>
             	   				<?php echo "<td class = 'namecell'>".$row_RecordSetP9['Course_Code']." ".$row_RecordSetP9['Course_Number']."<br>".$row_RecordSetP9['Course_Name']."</td>"?>	
								<td border = "0" bgcolor="<?php echo $row_RecordSetP9['HEX_COLOR']?>"></td>
                				</tr><?php
                				$counter++;
                			}
          				}

          				else if($counter > $maxSize AND ($row_RecordSetP5 = mysql_fetch_array($RecordSetP5))) {
          					$counter = 1;
           					?></table>
           					<table id = "thistable" style="display: inline-block;"><colgroup>
							<col span="1" style="width: 2%;">
							<col span="1" style="width: 2%;">
							<col span="1" style="width: 2%;">
							<col span="1" style="width: 2%;">
							<col span="1" style="width: 84%;">
							<col span="1" style="width: 8%;">
							</colgroup><?php
							?><tr class = 'eachrow'>
							<td border = "0" bgcolor="<?php echo $row_RecordSetP5['PREQ_HEX_COLOR_1']?>"></td>
							<td border = "0" bgcolor="<?php echo $row_RecordSetP5['PREQ_HEX_COLOR_2']?>"></td>
							<td border = "0" bgcolor="<?php echo $row_RecordSetP5['PREQ_HEX_COLOR_3']?>"></td>
							<td border = "0" bgcolor="<?php echo $row_RecordSetP5['PREQ_HEX_COLOR_4']?>"></td>
             				<?php echo "<td class = 'namecell'>".$row_RecordSetP5['Course_Code']." ".$row_RecordSetP5['Course_Number']."<br>".$row_RecordSetP5['Course_Name']."</td>"?>
							<td border = "0" bgcolor="<?php echo $row_RecordSetP5['HEX_COLOR']?>"></td>
                			</tr><?php
							while($counter <= $maxSize AND $row_RecordSetP5 = mysql_fetch_array($RecordSetP5)) {
								?><tr class = 'eachrow'>
								<td border = "0" bgcolor="<?php echo $row_RecordSetP5['PREQ_HEX_COLOR_1']?>"></td>
								<td border = "0" bgcolor="<?php echo $row_RecordSetP5['PREQ_HEX_COLOR_2']?>"></td>
								<td border = "0" bgcolor="<?php echo $row_RecordSetP5['PREQ_HEX_COLOR_3']?>"></td>
								<td border = "0" bgcolor="<?php echo $row_RecordSetP5['PREQ_HEX_COLOR_4']?>"></td>
             					<?php echo "<td class = 'namecell'>".$row_RecordSetP5['Course_Code']." ".$row_RecordSetP5['Course_Number']."<br>".$row_RecordSetP5['Course_Name']."</td>"?>
								<td border = "0" bgcolor="<?php echo $row_RecordSetP5['HEX_COLOR']?>"></td>
                				</tr><?php
                				$counter++;
                			}		
                			if($counter <= $maxSize AND !($row_RecordSetP5 = mysql_fetch_array($RecordSetP5))) {
           						while($counter <= $maxSize AND $row_RecordSetP9 = mysql_fetch_array($RecordSetP9)) {
									?><tr class = 'eachrow'>
									<td border = "0" bgcolor="<?php echo $row_RecordSetP9['PREQ_HEX_COLOR_1']?>"></td>
									<td border = "0" bgcolor="<?php echo $row_RecordSetP9['PREQ_HEX_COLOR_2']?>"></td>
									<td border = "0" bgcolor="<?php echo $row_RecordSetP9['PREQ_HEX_COLOR_3']?>"></td>
									<td border = "0" bgcolor="<?php echo $row_RecordSetP9['PREQ_HEX_COLOR_4']?>"></td>
             						<?php echo "<td class = 'namecell'>".$row_RecordSetP9['Course_Code']." ".$row_RecordSetP9['Course_Number']."<br>".$row_RecordSetP9['Course_Name']."</td>"?>
									<td border = "0" bgcolor="<?php echo $row_RecordSetP9['HEX_COLOR']?>"></td>
                					</tr><?php
                					$counter++;
                				}
           					}
           				}	
           				//Semester Six
           				$maxSize = 6;
           				$counter = 1;
           				?></table>
         	  			<table id = "thistable" style="display: inline-block;"><colgroup>
						<col span="1" style="width: 2%;">
						<col span="1" style="width: 2%;">
						<col span="1" style="width: 2%;">
						<col span="1" style="width: 2%;">
						<col span="1" style="width: 84%;">
						<col span="1" style="width: 8%;">
						</colgroup><?php
						while($counter <= $maxSize AND $row_RecordSetP6 = mysql_fetch_array($RecordSetP6)) {
							?><tr class = 'eachrow'>
							<td border = "0" bgcolor="<?php echo $row_RecordSetP6['PREQ_HEX_COLOR_1']?>"></td>
							<td border = "0" bgcolor="<?php echo $row_RecordSetP6['PREQ_HEX_COLOR_2']?>"></td>
							<td border = "0" bgcolor="<?php echo $row_RecordSetP6['PREQ_HEX_COLOR_3']?>"></td>
							<td border = "0" bgcolor="<?php echo $row_RecordSetP6['PREQ_HEX_COLOR_4']?>"></td>
             				<?php echo "<td class = 'namecell'>".$row_RecordSetP6['Course_Code']." ".$row_RecordSetP6['Course_Number']."<br>".$row_RecordSetP6['Course_Name']."</td>"?>
							<td border = "0" bgcolor="<?php echo $row_RecordSetP6['HEX_COLOR']?>"></td>
                			</tr><?php
                			$counter++;
          				}	

          				if($counter <= $maxSize AND !($row_RecordSetP6 = mysql_fetch_array($RecordSetP6))) {
            				while($counter <= $maxSize AND $row_RecordSetP9 = mysql_fetch_array($RecordSetP9)) {
                				?><tr class = 'eachrow'>
								<td border = "0" bgcolor="<?php echo $row_RecordSetP9['PREQ_HEX_COLOR_1']?>"></td>
								<td border = "0" bgcolor="<?php echo $row_RecordSetP9['PREQ_HEX_COLOR_2']?>"></td>
								<td border = "0" bgcolor="<?php echo $row_RecordSetP9['PREQ_HEX_COLOR_3']?>"></td>
								<td border = "0" bgcolor="<?php echo $row_RecordSetP9['PREQ_HEX_COLOR_4']?>"></td>
             		   			<?php echo "<td class = 'namecell'>".$row_RecordSetP9['Course_Code']." ".$row_RecordSetP9['Course_Number']."<br>".$row_RecordSetP9['Course_Name']."</td>"?>	
								<td border = "0" bgcolor="<?php echo $row_RecordSetP9['HEX_COLOR']?>"></td>
                				</tr><?php
                				$counter++;
                			}
          				}		

          				else if($counter > $maxSize AND ($row_RecordSetP6 = mysql_fetch_array($RecordSetP6))) {
          					$counter = 1;
           					?></table>
           					<table id = "thistable" style="display: inline-block;"><colgroup>
							<col span="1" style="width: 2%;">
							<col span="1" style="width: 2%;">
							<col span="1" style="width: 2%;">
							<col span="1" style="width: 2%;">
							<col span="1" style="width: 84%;">
							<col span="1" style="width: 8%;">
							</colgroup><?php
							?><tr class = 'eachrow'>
							<td border = "0" bgcolor="<?php echo $row_RecordSetP6['PREQ_HEX_COLOR_1']?>"></td>
							<td border = "0" bgcolor="<?php echo $row_RecordSetP6['PREQ_HEX_COLOR_2']?>"></td>
							<td border = "0" bgcolor="<?php echo $row_RecordSetP6['PREQ_HEX_COLOR_3']?>"></td>
							<td border = "0" bgcolor="<?php echo $row_RecordSetP6['PREQ_HEX_COLOR_4']?>"></td>
    	        	 		<?php echo "<td class = 'namecell'>".$row_RecordSetP6['Course_Code']." ".$row_RecordSetP6['Course_Number']."<br>".$row_RecordSetP6['Course_Name']."</td>"?>
							<td border = "0" bgcolor="<?php echo $row_RecordSetP6['HEX_COLOR']?>"></td>
    	    	       	 	</tr><?php
							while($counter <= $maxSize AND $row_RecordSetP6 = mysql_fetch_array($RecordSetP6)) {
								?><tr class = 'eachrow'>
								<td border = "0" bgcolor="<?php echo $row_RecordSetP6['PREQ_HEX_COLOR_1']?>"></td>
								<td border = "0" bgcolor="<?php echo $row_RecordSetP6['PREQ_HEX_COLOR_2']?>"></td>
								<td border = "0" bgcolor="<?php echo $row_RecordSetP6['PREQ_HEX_COLOR_3']?>"></td>
								<td border = "0" bgcolor="<?php echo $row_RecordSetP6['PREQ_HEX_COLOR_4']?>"></td>
	        	     			<?php echo "<td class = 'namecell'>".$row_RecordSetP6['Course_Code']." ".$row_RecordSetP6['Course_Number']."<br>".$row_RecordSetP6['Course_Name']."</td>"?>
								<td border = "0" bgcolor="<?php echo $row_RecordSetP6['HEX_COLOR']?>"></td>
        		        		</tr><?php
            		    		$counter++;
            	    		}	
            	    		if($counter <= $maxSize AND !($row_RecordSetP6 = mysql_fetch_array($RecordSetP6))) {
           						while($counter <= $maxSize AND $row_RecordSetP9 = mysql_fetch_array($RecordSetP9)) {
									?><tr class = 'eachrow'>
									<td border = "0" bgcolor="<?php echo $row_RecordSetP9['PREQ_HEX_COLOR_1']?>"></td>
									<td border = "0" bgcolor="<?php echo $row_RecordSetP9['PREQ_HEX_COLOR_2']?>"></td>
									<td border = "0" bgcolor="<?php echo $row_RecordSetP9['PREQ_HEX_COLOR_3']?>"></td>
									<td border = "0" bgcolor="<?php echo $row_RecordSetP9['PREQ_HEX_COLOR_4']?>"></td>
            	 					<?php echo "<td class = 'namecell'>".$row_RecordSetP9['Course_Code']." ".$row_RecordSetP9['Course_Number']."<br>".$row_RecordSetP9['Course_Name']."</td>"?>
									<td border = "0" bgcolor="<?php echo $row_RecordSetP9['HEX_COLOR']?>"></td>
            	    				</tr><?php
            	    				$counter++;
            	    			}
           					}	
           				}
           				//Semester Seven
           				$maxSize = 6;
           				$counter = 1;
           				?></table>
           				<table id = "thistable" style="display: inline-block;"><colgroup>
						<col span="1" style="width: 2%;">
						<col span="1" style="width: 2%;">
						<col span="1" style="width: 2%;">
						<col span="1" style="width: 2%;">
						<col span="1" style="width: 84%;">
						<col span="1" style="width: 8%;">
						</colgroup><?php
						while($counter <= $maxSize AND $row_RecordSetP7 = mysql_fetch_array($RecordSetP7)) {
							?><tr class = 'eachrow'>
							<td border = "0" bgcolor="<?php echo $row_RecordSetP7['PREQ_HEX_COLOR_1']?>"></td>
							<td border = "0" bgcolor="<?php echo $row_RecordSetP7['PREQ_HEX_COLOR_2']?>"></td>
							<td border = "0" bgcolor="<?php echo $row_RecordSetP7['PREQ_HEX_COLOR_3']?>"></td>
							<td border = "0" bgcolor="<?php echo $row_RecordSetP7['PREQ_HEX_COLOR_4']?>"></td>
        		   	  		<?php echo "<td class = 'namecell'>".$row_RecordSetP7['Course_Code']." ".$row_RecordSetP7['Course_Number']."<br>".$row_RecordSetP7['Course_Name']."</td>"?>
							<td border = "0" bgcolor="<?php echo $row_RecordSetP7['HEX_COLOR']?>"></td>
    	    	        	</tr><?php
    	    	        	$counter++;
    	      			}	

          				if(!($counter <= $maxSize AND $row_RecordSetP7 = mysql_fetch_array($RecordSetP7))) {
            				while(($counter <= $maxSize) AND ($row_RecordSetP9 = mysql_fetch_array($RecordSetP9))) {
            			    	?><tr class = 'eachrow'>
								<td border = "0" bgcolor="<?php echo $row_RecordSetP9['PREQ_HEX_COLOR_1']?>"></td>
								<td border = "0" bgcolor="<?php echo $row_RecordSetP9['PREQ_HEX_COLOR_2']?>"></td>
								<td border = "0" bgcolor="<?php echo $row_RecordSetP9['PREQ_HEX_COLOR_3']?>"></td>
								<td border = "0" bgcolor="<?php echo $row_RecordSetP9['PREQ_HEX_COLOR_4']?>"></td>
             				   	<?php echo "<td class = 'namecell'>".$row_RecordSetP9['Course_Code']." ".$row_RecordSetP9['Course_Number']."<br>".$row_RecordSetP9['Course_Name']."</td>"?>	
								<td border = "0" bgcolor="<?php echo $row_RecordSetP9['HEX_COLOR']?>"></td>
               				 	</tr><?php
               				 	$counter++;
               			 	}
	          			}

          				else if($counter > $maxSize AND ($row_RecordSetP7 = mysql_fetch_array($RecordSetP7))) {
          					$counter = 1;
           					?></table>
           					<table id = "thistable" style="display: inline-block;"><colgroup>
							<col span="1" style="width: 2%;">
							<col span="1" style="width: 2%;">
							<col span="1" style="width: 2%;">
							<col span="1" style="width: 2%;">
							<col span="1" style="width: 84%;">
							<col span="1" style="width: 8%;">
							</colgroup><?php
							?><tr class = 'eachrow'>
							<td border = "0" bgcolor="<?php echo $row_RecordSetP7['PREQ_HEX_COLOR_1']?>"></td>
							<td border = "0" bgcolor="<?php echo $row_RecordSetP7['PREQ_HEX_COLOR_2']?>"></td>
							<td border = "0" bgcolor="<?php echo $row_RecordSetP7['PREQ_HEX_COLOR_3']?>"></td>
							<td border = "0" bgcolor="<?php echo $row_RecordSetP7['PREQ_HEX_COLOR_4']?>"></td>
           		  			<?php echo "<td class = 'namecell'>".$row_RecordSetP7['Course_Code']." ".$row_RecordSetP7['Course_Number']."<br>".$row_RecordSetP7['Course_Name']."</td>"?>
							<td border = "0" bgcolor="<?php echo $row_RecordSetP7['HEX_COLOR']?>"></td>
    	           		 	</tr><?php
							while($counter <= $maxSize AND $row_RecordSetP7 = mysql_fetch_array($RecordSetP7)) {
								?><tr class = 'eachrow'>
								<td border = "0" bgcolor="<?php echo $row_RecordSetP7['PREQ_HEX_COLOR_1']?>"></td>
								<td border = "0" bgcolor="<?php echo $row_RecordSetP7['PREQ_HEX_COLOR_2']?>"></td>
								<td border = "0" bgcolor="<?php echo $row_RecordSetP7['PREQ_HEX_COLOR_3']?>"></td>
								<td border = "0" bgcolor="<?php echo $row_RecordSetP7['PREQ_HEX_COLOR_4']?>"></td>
             					<?php echo "<td class = 'namecell'>".$row_RecordSetP7['Course_Code']." ".$row_RecordSetP7['Course_Number']."<br>".$row_RecordSetP7['Course_Name']."</td>"?>
								<td border = "0" bgcolor="<?php echo $row_RecordSetP7['HEX_COLOR']?>"></td>
            	    			</tr><?php
                				$counter++;
                			}
                			if(!($row_RecordSetP7 = mysql_fetch_array($RecordSetP7)) AND $counter <= $maxSize) {
           						while($counter <= $maxSize AND $row_RecordSetP9 = mysql_fetch_array($RecordSetP9)) {
									?><tr class = 'eachrow'>
									<td border = "0" bgcolor="<?php echo $row_RecordSetP9['PREQ_HEX_COLOR_1']?>"></td>
									<td border = "0" bgcolor="<?php echo $row_RecordSetP9['PREQ_HEX_COLOR_2']?>"></td>
									<td border = "0" bgcolor="<?php echo $row_RecordSetP9['PREQ_HEX_COLOR_3']?>"></td>
									<td border = "0" bgcolor="<?php echo $row_RecordSetP9['PREQ_HEX_COLOR_4']?>"></td>
             						<?php echo "<td class = 'namecell'>".$row_RecordSetP9['Course_Code']." ".$row_RecordSetP9['Course_Number']."<br>".$row_RecordSetP9['Course_Name']."</td>"?>
									<td border = "0" bgcolor="<?php echo $row_RecordSetP9['HEX_COLOR']?>"></td>
                					</tr><?php
                					$counter++;
              		  			}	
           					}
           				}
           				break;
           				case 6:
           				//Semester Six
           					$maxSize = 6;
           					$counter = 1;
           					?></table>
           					<div class="hor">
         	  				<table id = "thistable" style="display: inline-block;"><colgroup>
							<col span="1" style="width: 2%;">
							<col span="1" style="width: 2%;">
							<col span="1" style="width: 2%;">
							<col span="1" style="width: 2%;">
							<col span="1" style="width: 84%;">
							<col span="1" style="width: 8%;">
							</colgroup><?php
							while($counter <= $maxSize AND $row_RecordSetP6 = mysql_fetch_array($RecordSetP6)) {
								?><tr class = 'eachrow'>
								<td border = "0" bgcolor="<?php echo $row_RecordSetP6['PREQ_HEX_COLOR_1']?>"></td>
								<td border = "0" bgcolor="<?php echo $row_RecordSetP6['PREQ_HEX_COLOR_2']?>"></td>
								<td border = "0" bgcolor="<?php echo $row_RecordSetP6['PREQ_HEX_COLOR_3']?>"></td>
								<td border = "0" bgcolor="<?php echo $row_RecordSetP6['PREQ_HEX_COLOR_4']?>"></td>
             					<?php echo "<td class = 'namecell'>".$row_RecordSetP6['Course_Code']." ".$row_RecordSetP6['Course_Number']."<br>".$row_RecordSetP6['Course_Name']."</td>"?>
								<td border = "0" bgcolor="<?php echo $row_RecordSetP6['HEX_COLOR']?>"></td>
                				</tr><?php
                				$counter++;
          					}	

          					if($counter <= $maxSize AND !($row_RecordSetP6 = mysql_fetch_array($RecordSetP6))) {
            					while($counter <= $maxSize AND $row_RecordSetP9 = mysql_fetch_array($RecordSetP9)) {
                					?><tr class = 'eachrow'>
									<td border = "0" bgcolor="<?php echo $row_RecordSetP9['PREQ_HEX_COLOR_1']?>"></td>
									<td border = "0" bgcolor="<?php echo $row_RecordSetP9['PREQ_HEX_COLOR_2']?>"></td>
									<td border = "0" bgcolor="<?php echo $row_RecordSetP9['PREQ_HEX_COLOR_3']?>"></td>
									<td border = "0" bgcolor="<?php echo $row_RecordSetP9['PREQ_HEX_COLOR_4']?>"></td>
             		   				<?php echo "<td class = 'namecell'>".$row_RecordSetP9['Course_Code']." ".$row_RecordSetP9['Course_Number']."<br>".$row_RecordSetP9['Course_Name']."</td>"?>	
									<td border = "0" bgcolor="<?php echo $row_RecordSetP9['HEX_COLOR']?>"></td>
                					</tr><?php
                					$counter++;
                				}
          					}		

          					else if($counter > $maxSize AND ($row_RecordSetP6 = mysql_fetch_array($RecordSetP6))) {
          						$counter = 1;
           						?></table>
           						<table id = "thistable" style="display: inline-block;"><colgroup>
								<col span="1" style="width: 2%;">
								<col span="1" style="width: 2%;">
								<col span="1" style="width: 2%;">
								<col span="1" style="width: 2%;">
								<col span="1" style="width: 84%;">
								<col span="1" style="width: 8%;">
								</colgroup><?php
								?><tr class = 'eachrow'>
								<td border = "0" bgcolor="<?php echo $row_RecordSetP6['PREQ_HEX_COLOR_1']?>"></td>
								<td border = "0" bgcolor="<?php echo $row_RecordSetP6['PREQ_HEX_COLOR_2']?>"></td>
								<td border = "0" bgcolor="<?php echo $row_RecordSetP6['PREQ_HEX_COLOR_3']?>"></td>
								<td border = "0" bgcolor="<?php echo $row_RecordSetP6['PREQ_HEX_COLOR_4']?>"></td>
    	        	 			<?php echo "<td class = 'namecell'>".$row_RecordSetP6['Course_Code']." ".$row_RecordSetP6['Course_Number']."<br>".$row_RecordSetP6['Course_Name']."</td>"?>
								<td border = "0" bgcolor="<?php echo $row_RecordSetP6['HEX_COLOR']?>"></td>
    	    	       		 	</tr><?php
								while($counter <= $maxSize AND $row_RecordSetP6 = mysql_fetch_array($RecordSetP6)) {
									?><tr class = 'eachrow'>
									<td border = "0" bgcolor="<?php echo $row_RecordSetP6['PREQ_HEX_COLOR_1']?>"></td>
									<td border = "0" bgcolor="<?php echo $row_RecordSetP6['PREQ_HEX_COLOR_2']?>"></td>
									<td border = "0" bgcolor="<?php echo $row_RecordSetP6['PREQ_HEX_COLOR_3']?>"></td>
									<td border = "0" bgcolor="<?php echo $row_RecordSetP6['PREQ_HEX_COLOR_4']?>"></td>
	        	    	 			<?php echo "<td class = 'namecell'>".$row_RecordSetP6['Course_Code']." ".$row_RecordSetP6['Course_Number']."<br>".$row_RecordSetP6['Course_Name']."</td>"?>
									<td border = "0" bgcolor="<?php echo $row_RecordSetP6['HEX_COLOR']?>"></td>
        		    	    		</tr><?php
            			    		$counter++;
            	    			}	
            	    			if($counter <= $maxSize AND !($row_RecordSetP6 = mysql_fetch_array($RecordSetP6))) {
           							while($counter <= $maxSize AND $row_RecordSetP9 = mysql_fetch_array($RecordSetP9)) {
										?><tr class = 'eachrow'>
										<td border = "0" bgcolor="<?php echo $row_RecordSetP9['PREQ_HEX_COLOR_1']?>"></td>
										<td border = "0" bgcolor="<?php echo $row_RecordSetP9['PREQ_HEX_COLOR_2']?>"></td>
										<td border = "0" bgcolor="<?php echo $row_RecordSetP9['PREQ_HEX_COLOR_3']?>"></td>
										<td border = "0" bgcolor="<?php echo $row_RecordSetP9['PREQ_HEX_COLOR_4']?>"></td>
            	 						<?php echo "<td class = 'namecell'>".$row_RecordSetP9['Course_Code']." ".$row_RecordSetP9['Course_Number']."<br>".$row_RecordSetP9['Course_Name']."</td>"?>
										<td border = "0" bgcolor="<?php echo $row_RecordSetP9['HEX_COLOR']?>"></td>
            	    					</tr><?php
            	    					$counter++;
            	    				}
           						}	
           					}
           					//Semester Seven
           					$maxSize = 6;
           					$counter = 1;
           					?></table>
           					<table id = "thistable" style="display: inline-block;"><colgroup>
							<col span="1" style="width: 2%;">
							<col span="1" style="width: 2%;">
							<col span="1" style="width: 2%;">
							<col span="1" style="width: 2%;">
							<col span="1" style="width: 84%;">
							<col span="1" style="width: 8%;">
							</colgroup><?php
							while($counter <= $maxSize AND $row_RecordSetP7 = mysql_fetch_array($RecordSetP7)) {
								?><tr class = 'eachrow'>
								<td border = "0" bgcolor="<?php echo $row_RecordSetP7['PREQ_HEX_COLOR_1']?>"></td>
								<td border = "0" bgcolor="<?php echo $row_RecordSetP7['PREQ_HEX_COLOR_2']?>"></td>
								<td border = "0" bgcolor="<?php echo $row_RecordSetP7['PREQ_HEX_COLOR_3']?>"></td>
								<td border = "0" bgcolor="<?php echo $row_RecordSetP7['PREQ_HEX_COLOR_4']?>"></td>
        		   	  			<?php echo "<td class = 'namecell'>".$row_RecordSetP7['Course_Code']." ".$row_RecordSetP7['Course_Number']."<br>".$row_RecordSetP7['Course_Name']."</td>"?>
								<td border = "0" bgcolor="<?php echo $row_RecordSetP7['HEX_COLOR']?>"></td>
    	    	       	 		</tr><?php
    	    	       		 	$counter++;
    	      				}	

          					if(!($counter <= $maxSize AND $row_RecordSetP7 = mysql_fetch_array($RecordSetP7))) {
            					while(($counter <= $maxSize) AND ($row_RecordSetP9 = mysql_fetch_array($RecordSetP9))) {
            				    	?><tr class = 'eachrow'>
									<td border = "0" bgcolor="<?php echo $row_RecordSetP9['PREQ_HEX_COLOR_1']?>"></td>
									<td border = "0" bgcolor="<?php echo $row_RecordSetP9['PREQ_HEX_COLOR_2']?>"></td>
									<td border = "0" bgcolor="<?php echo $row_RecordSetP9['PREQ_HEX_COLOR_3']?>"></td>
									<td border = "0" bgcolor="<?php echo $row_RecordSetP9['PREQ_HEX_COLOR_4']?>"></td>
             					   	<?php echo "<td class = 'namecell'>".$row_RecordSetP9['Course_Code']." ".$row_RecordSetP9['Course_Number']."<br>".$row_RecordSetP9['Course_Name']."</td>"?>	
									<td border = "0" bgcolor="<?php echo $row_RecordSetP9['HEX_COLOR']?>"></td>
               					 	</tr><?php
               					 	$counter++;
               			 		}
	          				}	

          					else if($counter > $maxSize AND ($row_RecordSetP7 = mysql_fetch_array($RecordSetP7))) {
          						$counter = 1;
           						?></table>
           						<table id = "thistable" style="display: inline-block;"><colgroup>
								<col span="1" style="width: 2%;">
								<col span="1" style="width: 2%;">
								<col span="1" style="width: 2%;">
								<col span="1" style="width: 2%;">
								<col span="1" style="width: 84%;">
								<col span="1" style="width: 8%;">
								</colgroup><?php
								?><tr class = 'eachrow'>
								<td border = "0" bgcolor="<?php echo $row_RecordSetP7['PREQ_HEX_COLOR_1']?>"></td>
								<td border = "0" bgcolor="<?php echo $row_RecordSetP7['PREQ_HEX_COLOR_2']?>"></td>
								<td border = "0" bgcolor="<?php echo $row_RecordSetP7['PREQ_HEX_COLOR_3']?>"></td>
								<td border = "0" bgcolor="<?php echo $row_RecordSetP7['PREQ_HEX_COLOR_4']?>"></td>
           		  				<?php echo "<td class = 'namecell'>".$row_RecordSetP7['Course_Code']." ".$row_RecordSetP7['Course_Number']."<br>".$row_RecordSetP7['Course_Name']."</td>"?>
								<td border = "0" bgcolor="<?php echo $row_RecordSetP7['HEX_COLOR']?>"></td>
    	           			 	</tr><?php
								while($counter <= $maxSize AND $row_RecordSetP7 = mysql_fetch_array($RecordSetP7)) {
									?><tr class = 'eachrow'>
									<td border = "0" bgcolor="<?php echo $row_RecordSetP7['PREQ_HEX_COLOR_1']?>"></td>
									<td border = "0" bgcolor="<?php echo $row_RecordSetP7['PREQ_HEX_COLOR_2']?>"></td>
									<td border = "0" bgcolor="<?php echo $row_RecordSetP7['PREQ_HEX_COLOR_3']?>"></td>
									<td border = "0" bgcolor="<?php echo $row_RecordSetP7['PREQ_HEX_COLOR_4']?>"></td>
             						<?php echo "<td class = 'namecell'>".$row_RecordSetP7['Course_Code']." ".$row_RecordSetP7['Course_Number']."<br>".$row_RecordSetP7['Course_Name']."</td>"?>
									<td border = "0" bgcolor="<?php echo $row_RecordSetP7['HEX_COLOR']?>"></td>
            	    				</tr><?php
                					$counter++;
                				}
                				if(!($row_RecordSetP7 = mysql_fetch_array($RecordSetP7)) AND $counter <= $maxSize) {
           							while($counter <= $maxSize AND $row_RecordSetP9 = mysql_fetch_array($RecordSetP9)) {
										?><tr class = 'eachrow'>
										<td border = "0" bgcolor="<?php echo $row_RecordSetP9['PREQ_HEX_COLOR_1']?>"></td>
										<td border = "0" bgcolor="<?php echo $row_RecordSetP9['PREQ_HEX_COLOR_2']?>"></td>
										<td border = "0" bgcolor="<?php echo $row_RecordSetP9['PREQ_HEX_COLOR_3']?>"></td>
										<td border = "0" bgcolor="<?php echo $row_RecordSetP9['PREQ_HEX_COLOR_4']?>"></td>
             							<?php echo "<td class = 'namecell'>".$row_RecordSetP9['Course_Code']." ".$row_RecordSetP9['Course_Number']."<br>".$row_RecordSetP9['Course_Name']."</td>"?>
										<td border = "0" bgcolor="<?php echo $row_RecordSetP9['HEX_COLOR']?>"></td>
                						</tr><?php
                						$counter++;
              		  				}	
           						}
           					}
           					break;
           					case 7:
           					//Semester Seven
       								$maxSize = 6;
       								$counter = 1;
       								?></table>
       								<div class="hor">
       								<table id = "thistable" style="display: inline-block;"><colgroup>
									<col span="1" style="width: 2%;">
									<col span="1" style="width: 2%;">
									<col span="1" style="width: 2%;">
									<col span="1" style="width: 2%;">
									<col span="1" style="width: 84%;">
									<col span="1" style="width: 8%;">
									</colgroup><?php
									while($counter <= $maxSize AND $row_RecordSetP7 = mysql_fetch_array($RecordSetP7)) {
										?><tr class = 'eachrow'>
										<td border = "0" bgcolor="<?php echo $row_RecordSetP7['PREQ_HEX_COLOR_1']?>"></td>
										<td border = "0" bgcolor="<?php echo $row_RecordSetP7['PREQ_HEX_COLOR_2']?>"></td>
										<td border = "0" bgcolor="<?php echo $row_RecordSetP7['PREQ_HEX_COLOR_3']?>"></td>
										<td border = "0" bgcolor="<?php echo $row_RecordSetP7['PREQ_HEX_COLOR_4']?>"></td>
        	   		  					<?php echo "<td class = 'namecell'>".$row_RecordSetP7['Course_Code']." ".$row_RecordSetP7['Course_Number']."<br>".$row_RecordSetP7['Course_Name']."</td>"?>
										<td border = "0" bgcolor="<?php echo $row_RecordSetP7['HEX_COLOR']?>"></td>
    	           		 				</tr><?php
    	           					 	$counter++;
    	     						}		
          							if(!($counter <= $maxSize AND $row_RecordSetP7 = mysql_fetch_array($RecordSetP7))) {
            							while(($counter <= $maxSize) AND ($row_RecordSetP9 = mysql_fetch_array($RecordSetP9))) {
            					    		?><tr class = 'eachrow'>
											<td border = "0" bgcolor="<?php echo $row_RecordSetP9['PREQ_HEX_COLOR_1']?>"></td>
											<td border = "0" bgcolor="<?php echo $row_RecordSetP9['PREQ_HEX_COLOR_2']?>"></td>
											<td border = "0" bgcolor="<?php echo $row_RecordSetP9['PREQ_HEX_COLOR_3']?>"></td>
											<td border = "0" bgcolor="<?php echo $row_RecordSetP9['PREQ_HEX_COLOR_4']?>"></td>
             							   	<?php echo "<td class = 'namecell'>".$row_RecordSetP9['Course_Code']." ".$row_RecordSetP9['Course_Number']."<br>".$row_RecordSetP9['Course_Name']."</td>"?>	
											<td border = "0" bgcolor="<?php echo $row_RecordSetP9['HEX_COLOR']?>"></td>
               							 	</tr><?php
               							 	$counter++;
               		 					}
	          						}		
          							else if($counter > $maxSize AND ($row_RecordSetP7 = mysql_fetch_array($RecordSetP7))) {
          								$counter = 1;
           								?></table>
           								<table id = "thistable" style="display: inline-block;"><colgroup>
										<col span="1" style="width: 2%;">
										<col span="1" style="width: 2%;">
										<col span="1" style="width: 2%;">
										<col span="1" style="width: 2%;">
										<col span="1" style="width: 84%;">
										<col span="1" style="width: 8%;">
										</colgroup><?php
										?><tr class = 'eachrow'>
										<td border = "0" bgcolor="<?php echo $row_RecordSetP7['PREQ_HEX_COLOR_1']?>"></td>
										<td border = "0" bgcolor="<?php echo $row_RecordSetP7['PREQ_HEX_COLOR_2']?>"></td>
										<td border = "0" bgcolor="<?php echo $row_RecordSetP7['PREQ_HEX_COLOR_3']?>"></td>
										<td border = "0" bgcolor="<?php echo $row_RecordSetP7['PREQ_HEX_COLOR_4']?>"></td>
           		  						<?php echo "<td class = 'namecell'>".$row_RecordSetP7['Course_Code']." ".$row_RecordSetP7['Course_Number']."<br>".$row_RecordSetP7['Course_Name']."</td>"?>
										<td border = "0" bgcolor="<?php echo $row_RecordSetP7['HEX_COLOR']?>"></td>
    	           				 		</tr><?php
										while($counter <= $maxSize AND $row_RecordSetP7 = mysql_fetch_array($RecordSetP7)) {
											?><tr class = 'eachrow'>
											<td border = "0" bgcolor="<?php echo $row_RecordSetP7['PREQ_HEX_COLOR_1']?>"></td>
											<td border = "0" bgcolor="<?php echo $row_RecordSetP7['PREQ_HEX_COLOR_2']?>"></td>
											<td border = "0" bgcolor="<?php echo $row_RecordSetP7['PREQ_HEX_COLOR_3']?>"></td>
											<td border = "0" bgcolor="<?php echo $row_RecordSetP7['PREQ_HEX_COLOR_4']?>"></td>
             								<?php echo "<td class = 'namecell'>".$row_RecordSetP7['Course_Code']." ".$row_RecordSetP7['Course_Number']."<br>".$row_RecordSetP7['Course_Name']."</td>"?>
											<td border = "0" bgcolor="<?php echo $row_RecordSetP7['HEX_COLOR']?>"></td>
            	    						</tr><?php
                							$counter++;
                						}
                						if(!($row_RecordSetP7 = mysql_fetch_array($RecordSetP7)) AND $counter <= $maxSize) {
           									while($counter <= $maxSize AND $row_RecordSetP9 = mysql_fetch_array($RecordSetP9)) {
												?><tr class = 'eachrow'>
												<td border = "0" bgcolor="<?php echo $row_RecordSetP9['PREQ_HEX_COLOR_1']?>"></td>
												<td border = "0" bgcolor="<?php echo $row_RecordSetP9['PREQ_HEX_COLOR_2']?>"></td>
												<td border = "0" bgcolor="<?php echo $row_RecordSetP9['PREQ_HEX_COLOR_3']?>"></td>
												<td border = "0" bgcolor="<?php echo $row_RecordSetP9['PREQ_HEX_COLOR_4']?>"></td>
        	     								<?php echo "<td class = 'namecell'>".$row_RecordSetP9['Course_Code']." ".$row_RecordSetP9['Course_Number']."<br>".$row_RecordSetP9['Course_Name']."</td>"?>
												<td border = "0" bgcolor="<?php echo $row_RecordSetP9['HEX_COLOR']?>"></td>
                								</tr><?php
                								$counter++;
              								}	
           								}
           							}

           							break;
           							default:
           							echo "Congrats, You Sir are done!";
}



?>
</div>
<button type="button" onclick="history.back()">Back</button>
</body>
</html>