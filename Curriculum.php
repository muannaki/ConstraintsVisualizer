
<html>
<?php
class Curriculum {
			
	// Draws any size table
	public function drawTable($cols, $rows, $beginSemester, $Recordset1, $Recordset2) {
		$count = 0;
		$check = 2;
		echo "<table id = 'thistable' width = '70%' class = 'center'>";
		
		for($tr = 1; $tr <= $rows; $tr++) {
			$index = 1;
			if ($tr % 2 == 0) {
			echo "<tr>";
			}
			else {
				echo "<tr class= 'alt'>";
			}
			
			
			for($td = 1; $td <= $cols; $td++) {
				if($count < 2) {
					echo "<td width ='45%' bgcolor = '#F6332C' >"."<center>"."Semester ".$beginSemester."</center>" ?>
					<input type="checkbox" name="<?php echo "<font color ='white'>Semester</font>".$beginSemester?>" id="<?php echo "Semester".$beginSemester ?>"
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
		$count = 0;
		$check = 2;
		echo "<table id = 'course_level' width = '70%' class = center >";
	
		for($tr = 1; $tr <= $rows; $tr++) {
			$index = 1;
			if ($tr % 2 == 0) {
				echo "<tr>";
			}
			else {
				echo "<tr class= 'alt'>";
			}
							
			for($td = 1; $td <= $cols; $td++) {
				if($count < 2) {
					echo "<td width ='45%' bgcolor = '#F6332C'>"."<center>".$levelCourse."00 Level Courses"."</center>"."</td>";
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

					else if($check == 3) {
						echo "<td>"."<center>"."Required Courses Completed!"."</center>"."</td>";
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

					else if($check == 4) {
						echo "<td>"."<center>"."Required Courses Completed!"."</center>"."</td>";
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
		echo "<table id = 'thistable' class = 'left'>";
		
		for($tr = 1; $tr <= $rows; $tr++) {
			echo "<tr>";
			if (!$check) {
				echo "<td bgcolor = '#F6332C'>"."<center>"."Semester ".$semester."</center>"?>
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
			}
			echo "</tr>";
		}
		echo "</table>";
	}
	
	// Draws a single column table
	public function drawSingleCLTable($rows, $Recordset) {
		$check = false;
		echo "<table id = course_level class = 'left'>";
		for($tr = 0; $tr <= $rows; $tr++) {
			echo "<tr>";
			if (!$check) {
				echo "<td bgcolor = '#F6332C'>"."<center>"."Humanities & Social Science Courses"."</center>"."</td>";
				$check = true;
			}
			else {
				if($row_Recordset = mysql_fetch_assoc($Recordset)) {
					echo "<td>".$row_Recordset['Course_Code']." ".$row_Recordset['Course_Number'].": ".$row_Recordset['Course_Name']?>
					<input type="checkbox" name="<?php echo $row_Recordset['C_ID']; ?>" id="<?php echo $row_Recordset['C_ID']; ?>" /><?php 
					"</td>";
				}
				else {
				echo "<td>"."<center>"."Required Courses Completed!"."</center>"."</td>";
				}
			}
			echo "</tr>";
		}
		echo "</table>";
	}
} 
?>
</html>