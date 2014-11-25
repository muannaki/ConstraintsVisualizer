
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
	public function drawSingleCLTable($rows, $Recordset, $string) {
		$check = false;
		echo "<table id = course_level class = 'left'>";
		
		for($tr = 1; $tr <= $rows; $tr++) {
			echo "<tr>";
			if (!$check) {
				echo "<td bgcolor = '#F6332C'>"."<center>".$string."</center>"."</td>";
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


	public function drawSemesterTable($RecordSetP1, $RecordSetP2, $RecordSetP3, $RecordSetP4, $RecordSetP5, $RecordSetP6, $RecordSetP9, $Count_P1, $Count_P2, $Count_P3, $Count_P4, $Count_P5, $Count_P6, $Count_P9) {	
		$counter = 0;
		if($Count_P1 == 0) {

			if($Count_P2 == 0) {

				if($Count_P3 == 0) {

					if($Count_P4 == 0) {

						if($Count_P5 == 0) {

							if($Count_P6 == 0) {

								if($Count_P9 == 0) {

								}
							}
						}
					}
				}
			}
		} else {

			?><table border = "1" style="display: inline-block;">
			<colgroup>
			<col span="1" style="width: 2%;">
			<col span="1" style="width: 2%;">
			<col span="1" style="width: 2%;">
			<col span="1" style="width: 2%;">
			<col span="1" style="width: 84%;">
			<col span="1" style="width: 8%;">
			</colgroup><?php
			while($row_RecordSetP1 = mysql_fetch_assoc($RecordSetP1) AND $counter < 6) {
			
				switch($row_RecordSetP1['NUM_OF_REQ_CLASSES']) {
					case '4':
						?><tr>
						<td border = "0" bgcolor="<?php echo $row_RecordSetP1['PREQ_HEX_COLOR_1']?>"></td>
						<td border = "0" bgcolor="<?php echo $row_RecordSetP1['PREQ_HEX_COLOR_2']?>"></td>
						<td border = "0" bgcolor="<?php echo $row_RecordSetP1['PREQ_HEX_COLOR_3']?>"></td>
						<td border = "0" bgcolor="<?php echo $row_RecordSetP1['PREQ_HEX_COLOR_4']?>"></td>
             	   		<td><?php echo $row['Course_Name']?></td>
						<td border = "0" bgcolor="<?php echo $row_RecordSetP1['HEX_COLOR']?>"></td>
                		</tr><?php
                		break;
                	case '3':
						?><tr>
						<td border = "0" bgcolor="<?php echo $row_RecordSetP1['PREQ_HEX_COLOR_1']?>"></td>
						<td border = "0" bgcolor="<?php echo $row_RecordSetP1['PREQ_HEX_COLOR_2']?>"></td>
						<td border = "0" bgcolor="<?php echo $row_RecordSetP1['PREQ_HEX_COLOR_3']?>"></td>
						<td border = "0" bgcolor="<?php echo $row_RecordSetP1['PREQ_HEX_COLOR_4']?>"></td>
             	   		<td><?php echo $row['Course_Name']?></td>
						<td border = "0" bgcolor="<?php echo $row_RecordSetP1['HEX_COLOR']?>"></td>
                		</tr><?php
                		break;
                	case '2':
						?><tr>
						<td border = "0" bgcolor="<?php echo $row_RecordSetP1['PREQ_HEX_COLOR_1']?>"></td>
						<td border = "0" bgcolor="<?php echo $row_RecordSetP1['PREQ_HEX_COLOR_2']?>"></td>
						<td border = "0" bgcolor="<?php echo $row_RecordSetP1['PREQ_HEX_COLOR_3']?>"></td>
						<td border = "0" bgcolor="<?php echo $row_RecordSetP1['PREQ_HEX_COLOR_4']?>"></td>
             	   		<td><?php echo $row['Course_Name']?></td>
						<td border = "0" bgcolor="<?php echo $row_RecordSetP1['HEX_COLOR']?>"></td>
                		</tr><?php
                		break;
                	case '1':
						?><tr>
						<td border = "0" bgcolor="<?php echo $row_RecordSetP1['PREQ_HEX_COLOR_1']?>"></td>
						<td border = "0" bgcolor="<?php echo $row_RecordSetP1['PREQ_HEX_COLOR_2']?>"></td>
						<td border = "0" bgcolor="<?php echo $row_RecordSetP1['PREQ_HEX_COLOR_3']?>"></td>
						<td border = "0" bgcolor="<?php echo $row_RecordSetP1['PREQ_HEX_COLOR_4']?>"></td>
             	   		<td><?php echo $row['Course_Name']?></td>
						<td border = "0" bgcolor="<?php echo $row_RecordSetP1['HEX_COLOR']?>"></td>
                		</tr><?php
                		break;
                	case '0':
						?><tr>
						<td border = "0" bgcolor="<?php echo $row_RecordSetP1['PREQ_HEX_COLOR_1']?>"></td>
						<td border = "0" bgcolor="<?php echo $row_RecordSetP1['PREQ_HEX_COLOR_2']?>"></td>
						<td border = "0" bgcolor="<?php echo $row_RecordSetP1['PREQ_HEX_COLOR_3']?>"></td>
						<td border = "0" bgcolor="<?php echo $row_RecordSetP1['PREQ_HEX_COLOR_4']?>"></td>
             	   		<?php echo "<td>".$row['Course_Name']."</td>"?>
						<td border = "0" bgcolor="<?php echo $row_RecordSetP1['HEX_COLOR']?>"></td>
                		</tr><?php
                		break;
                }
			}

		}

	}


	

















/*
		$check = false;
		echo "<table id = course_level class = 'left'>";
		
		for($tr = 1; $tr <= $rows; $tr++) {
			echo "<tr>";	
			if (!$check) {
				echo "<td bgcolor = '#F6332C'>"."<center>".$string."</center>"."</td>";
				$check = true;
			}
			else {
				if($row_Recordset = mysql_fetch_assoc($Recordset)) {
					echo "<td>".$row_Recordset['Course_Code']." ".$row_Recordset['Course_Number'].": ".$row_Recordset['Course_Name']?><?php 
					"</td>";
				}
				else {
					echo "<td>"."</td>";
				}
			}
			echo "</tr>";
		}
		echo "</table>";
	}

	*/
} 
?>
</html>