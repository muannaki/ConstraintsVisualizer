<head>
<title>Constraints Visualizer For Course Selection</title>
<style type="text/css">	
body {
	background-color: #f5f5dc;
	text-align: center;
	color: #b23524;
	font-family: "Verdana";
	}

</style>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
</head>
<body>

<form id="form1" name="form1" method="post" action="ProgramTransition.php">
<h1>Constraints Visualizer For Course Selection</h1>
  <p>
  <label><br/><br/><br/><br/>Enter McGill ID:</label>
  <input type="text" name="MCGILLID" id="MCGILLID" />
  </p>
  <p>
    <label for="Program"></label>
    <select name="eceProgram" id="Program">
    <option value="ee">Electrical Engineering</option>
    <option value="ce">Computer Engineering</option>
	<option value="se">Software Engineering</option>
    </select>
  </p>

<input type="submit" value="Submit" />
</form>
</body>
</html>