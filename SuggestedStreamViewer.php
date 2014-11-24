<html>
<style>
body {
	background-color: #f5f5dc;
	text-align: center;
	color: #b23524;
	font-family: "Verdana";
	}
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

    <body>
        <?php
		$counter = 0;
            $results = mysql_query("SELECT * FROM courses where STATUS = 0 and C_ID<=38");
			?>
		<table border = "1" style="display: inline-block;">
			<colgroup>
			<col span="1" style="width: 2%;">
			<col span="1" style="width: 2%;">
			<col span="1" style="width: 2%;">
			<col span="1" style="width: 2%;">
			<col span="1" style="width: 84%;">
			<col span="1" style="width: 8%;">
			</colgroup>
			<?php
            while($row = mysql_fetch_array($results)) {
            ?>
	
                <tr>
				<td border = "0" bgcolor="<?php echo $row['COLOUR']?>"></td>
				<td border = "0"bgcolor="#FF0000"></td>
				<td border = "0"bgcolor="#00FF00"></td>
				<td border = "0"bgcolor="#FFFFFF>"></td>
                    <td ><?php echo $row['Course_Name']?></td>
					<td border = "0" bgcolor="<?php echo $row['COLOUR']?>"></td>
                </tr>
				
				

            <?php
			$counter++;
			if($counter == 5){
			?>
			</table>
			<table border = "1" style="display: inline-block;"><colgroup>
			<col span="1" style="width: 2%;">
			<col span="1" style="width: 2%;">
			<col span="1" style="width: 2%;">
			<col span="1" style="width: 2%;">
			<col span="1" style="width: 84%;">
			<col span="1" style="width: 8%;">
			 </colgroup>
			<?php
			$counter =0;
            ?>
            </table>
			
    </body>
</html>