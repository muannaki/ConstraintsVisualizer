<html>
<style>

</style>

<?php
require_once('Connections/con_mcgill.php');
echo "Suggested Stream";
?>
<h2>The following is a suggested stream!</h2>
<?php
$currentCourses = array();
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
	//echo $value . " --- " ;
	$sql = "UPDATE courses SET STATUS = '2' WHERE C_ID = '".$value."' ";
	$temp = mysql_query($sql, $con_mcgill) or die(mysql_error());
}





?>
</html>
