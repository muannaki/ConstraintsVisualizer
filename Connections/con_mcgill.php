<?php
# FileName="Connection_php_mysql.htm"
# Type="MYSQL"
# HTTP="true"
$hostname_con_mcgill = "localhost";
$database_con_mcgill = "website_constraints";
$username_con_mcgill = "root";
$password_con_mcgill = "";
$con_mcgill = mysql_pconnect($hostname_con_mcgill, $username_con_mcgill, $password_con_mcgill) or trigger_error(mysql_error(),E_USER_ERROR); 
?>