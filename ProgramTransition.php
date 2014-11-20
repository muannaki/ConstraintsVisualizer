<?php

if ($_POST['eceProgram'] == "ee") {
	@header('location:EECurriculum.php');	
}
elseif ($_POST['eceProgram'] == "ce") {
	@header('location:ComputerEngineeringCurriculum.php');
}
else {
	@header('location:SoftwareEngineeringCurriculum.php');
}
?>