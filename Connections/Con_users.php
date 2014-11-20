<?php
# FileName="Connection_php_mysql.htm"
# Type="MYSQL"
# HTTP="true"
$hostname_Con_users = "localhost";
$database_Con_users = "userregtutorial";
$username_Con_users = "root";
$password_Con_users = "";
$Con_users = mysql_pconnect($hostname_Con_users, $username_Con_users, $password_Con_users) or trigger_error(mysql_error(),E_USER_ERROR); 
?>