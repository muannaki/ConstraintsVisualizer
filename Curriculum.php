
<html>
<?php
//include ("MySQL.php");
class Curriculum {
			
	// Draws any size table
	public function drawTable($cols, $rows, $beginSemester, $Recordset1, $Recordset2) {
		//$name = "name";
		$count = 0;
		$check = 2;
		echo "<table width = '75%' border = '5'>";
		
		for($tr = 1; $tr <= $rows; $tr++) {
			$index = 1;
			echo "<tr>";
			
			
			for($td = 1; $td <= $cols; $td++) {
				if($count < 2) {
					echo "<td>"."<center>"."Semester ".$beginSemester."</center>" ?>
					<input type="checkbox" name="<?php echo "Semester".$beginSemester?>" id="<?php echo "Semester".$beginSemester ?>"
					onclick="checkSemester(<?php echo $beginSemester?>,this)"
					/>
					<?php
					"</td>";
					$count++;
					$beginSemester++;
				}
				else if($check % 2 == 0) {
					$check++;
					if($row_Recordset1 = mysql_fetch_assoc($Recordset1)) {
						echo "<td>".$row_Recordset1['Course_Code']." ".$row_Recordset1['Course_Number'].": ".$row_Recordset1['Course_Name'] ?>
					    <input type="checkbox" name="<?php echo $row_Recordset1['C_ID']; ?>" id="<?php echo $row_Recordset1['C_ID']; ?>"/><?php
						"</td>";
					}
					else {
						echo "<td>"." "."</td>";
					}
				}
				else {
					$check++;
					if($row_Recordset2 = mysql_fetch_assoc($Recordset2)) {
						echo "<td>".$row_Recordset2['Course_Code']." ".$row_Recordset2['Course_Number'].": ".$row_Recordset2['Course_Name']?>
						<input type="checkbox" name="<?php echo $row_Recordset2['C_ID']; ?>" id="<?php echo $row_Recordset2['C_ID']; ?>" /><?php 
						"</td>";
					}
					else {
						echo "<td>"." "."</td>";
					}	
				}
			}
			
			echo "</tr>";
		}
		echo "</table>";
	}
	
	public function drawCLTable($cols, $rows, $levelCourse, $Recordset1, $Recordset2) {
		//$name = "name";
		$count = 0;
		$check = 2;
		echo "<table width = '75%' border = '5'>";
	
		for($tr = 1; $tr <= $rows; $tr++) {
			$index = 1;
			echo "<tr>";
				
				
			for($td = 1; $td <= $cols; $td++) {
				if($count < 2) {
						echo "<td>"."<center>".$levelCourse."00 Level Courses"."</center>"."</td>";
						$count++;
						$levelCourse++;
					}
					else if($check % 2 == 0) {
						$check++;
						if($row_Recordset1 = mysql_fetch_assoc($Recordset1)) {
							echo "<td>".$row_Recordset1['Course_Code']." ".$row_Recordset1['Course_Number'].": ".$row_Recordset1['Course_Name'] ?>
						    <input type="checkbox" name="<?php echo $row_Recordset1['C_ID']; ?>" id="<?php echo $row_Recordset1['C_ID']; ?>"/><?php
							"</td>";
						}
						else {
							echo "<td>"." "."</td>";
						}
					}
					else {
						$check++;
						if($row_Recordset2 = mysql_fetch_assoc($Recordset2)) {
							echo "<td>".$row_Recordset2['Course_Code']." ".$row_Recordset2['Course_Number'].": ".$row_Recordset2['Course_Name']?>
							<input type="checkbox" name="<?php echo $row_Recordset2['C_ID']; ?>" id="<?php echo $row_Recordset2['C_ID']; ?>" /><?php 
							"</td>";
						}
						else {
							echo "<td>"." "."</td>";
						}	
					}
				}
				
				echo "</tr>";
			}
			echo "</table>";
		}
	
	
	
	
	
	// Draws a single column table
	public function drawSingleTable($rows, $semester, $Recordset) {
		$check = false;
		echo "<table width = '37%' border = '10'>";
		
		for($tr = 1; $tr <= $rows; $tr++) {
			echo "<tr>";
			if (!$check) {
				echo "<td>"."<center>"."Semester ".$semester."</center>"?>
				<input type="checkbox" name="<?php echo "Semester".$semester ?>" id="<?php echo "Semester".$semester ?>"
				onclick = "checkSemester(<?php echo $semester?>, this)"
				/> 
				<?php
				$check = true;
			}
			else {
				if($row_Recordset = mysql_fetch_assoc($Recordset)) {
					echo "<td>".$row_Recordset['Course_Code']." ".$row_Recordset['Course_Number'].": ".$row_Recordset['Course_Name']?>
					<input type="checkbox" name="<?php echo $row_Recordset['C_ID']; ?>" id="<?php echo $row_Recordset['C_ID']; ?>" /><?php 
					"</td>";
				}
				else {
					echo "<td>"." "."</td>";
				}
			}
			echo "</tr>";
		}
		echo "</table>";
	}
	
	// Draws a single column table
	public function drawSingleCLTable($rows, $Recordset) {
		$check = false;
		echo "<table width = '37%' border = '10'>";
	
		for($tr = 1; $tr <= $rows; $tr++) {
			echo "<tr>";
			if (!$check) {
					echo "<td>"."<center>"."Humanities & Social Science Courses"."</center>"."</td>";
					$check = true;
				}
				else {
					if($row_Recordset = mysql_fetch_assoc($Recordset)) {
						echo "<td>".$row_Recordset['Course_Code']." ".$row_Recordset['Course_Number'].": ".$row_Recordset['Course_Name']?>
						<input type="checkbox" name="<?php echo $row_Recordset['C_ID']; ?>" id="<?php echo $row_Recordset['C_ID']; ?>" /><?php 
						"</td>";
					}
					else {
						echo "<td>"." "."</td>";
					}
				}
				echo "</tr>";
			}
			echo "</table>";
		}
	
	
	
	
	public function drawCourseLevelTable($cols, $rows, $Recordset1, $Recordset2, $Recordset3, $Recordset4, $Recordset5) {
		//$name = "name";
		$count = 0;
		$check = 2;
		$courseLevel = 1;
		echo "<table width = '75%' border = '5'>";
	
		for($tr = 1; $tr <= $rows; $tr++) {
			$index = 1;
			
			echo "<tr>";
				
				
			for($td = 1; $td <= $cols; $td++) {
				if($count < 5) {
					echo "<td>"."<center>".$courseLevel."00 Level Courses"."</center>"."</td>";
					$count++;
					$courseLevel++;
				}
				else if($check == 5) {
					$check++;
					if($row_Recordset1 = mysql_fetch_assoc($Recordset1)) {
						echo "<td>".$row_Recordset1['Course_Code']." ".$row_Recordset1['Course_Number'].": ".$row_Recordset1['Course_Name'] ?>
					    <input type="checkbox" name="<?php echo $row_Recordset1['C_ID']; ?>" id="<?php echo $row_Recordset1['C_ID']; ?>"/><?php
						"</td>";
					}
					else {
						echo "<td>"." "."</td>";
					}
				}
				else if($check == 6) {
					$check++;
					if($row_Recordset2 = mysql_fetch_assoc($Recordset2)) {
						echo "<td>".$row_Recordset2['Course_Code']." ".$row_Recordset2['Course_Number'].": ".$row_Recordset2['Course_Name']?>
						<input type="checkbox" name="<?php echo $row_Recordset2['C_ID']; ?>" id="<?php echo $row_Recordset2['C_ID']; ?>" /><?php 
						"</td>";
					}
					else {
						echo "<td>"." "."</td>";
					}	
				}
				else if($check == 6) {
					$check++;
					if($row_Recordset3 = mysql_fetch_assoc($Recordset3)) {
						echo "<td>".$row_Recordset3['Course_Code']." ".$row_Recordset3['Course_Number'].": ".$row_Recordset3['Course_Name']?>
						<input type="checkbox" name="<?php echo $row_Recordset3['C_ID']; ?>" id="<?php echo $row_Recordset3['C_ID']; ?>" /><?php 
						"</td>";
						}
					else {
						echo "<td>"." "."</td>";
					}	
				}
				else if($check == 7) {
					$check++;
					if($row_Recordset4 = mysql_fetch_assoc($Recordset4)) {
						echo "<td>".$row_Recordset4['Course_Code']." ".$row_Recordset4['Course_Number'].": ".$row_Recordset4['Course_Name']?>
						<input type="checkbox" name="<?php echo $row_Recordset4['C_ID']; ?>" id="<?php echo $row_Recordset4['C_ID']; ?>" /><?php 
						"</td>";
					}
					else {
						echo "<td>"." "."</td>";
					}	
				}
				else {
					$check = 5;
					if($row_Recordset5 = mysql_fetch_assoc($Recordset5)) {
						echo "<td>".$row_Recordset5['Course_Code']." ".$row_Recordset5['Course_Number'].": ".$row_Recordset5['Course_Name']?>
						<input type="checkbox" name="<?php echo $row_Recordset5['C_ID']; ?>" id="<?php echo $row_Recordset5['C_ID']; ?>" /><?php 
						"</td>";
					}
					else {
						echo "<td>"." "."</td>";
					}	
				}	
			}		
		echo "</tr>";
		}
	echo "</table>";
	}

} 
?>
</html>