<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<link href="mycss.css" rel="stylesheet" type="text/css">
<link href="bootstrap.css" rel="stylesheet" type="text/css">
<script type="text/javascript" src="bootstrap.js"></script>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>addmtosql</title>
</head>
<body>
<div class="container logininfo">
<?php
$now = date("Y/m/d H:i:s",time());
$mymood = $_POST["mymood"];
$mymood = str_replace("'","''","$mymood");
$myname = $_COOKIE["mycookie_name"];
$myexp = $_POST["exp"]; 
$string = implode(",",$myexp);

$con = mysql_connect(SAE_MYSQL_HOST_M.':'.SAE_MYSQL_PORT,SAE_MYSQL_USER,SAE_MYSQL_PASS);
mysql_query("SET NAMES 'UTF8'"); 
		mysql_query("SET CHARACTER SET UTF8"); 
		mysql_query("SET CHARACTER_SET_RESULTS=UTF8'"); 
	if (!$con)
  	{
  	die('Could not connect: ' . mysql_error());
  	}
	mysql_select_db(SAE_MYSQL_DB, $con);

	$sql="INSERT INTO moods (moods, date, username, exp)
	VALUES
	('$mymood','$now', '$myname','$string')";

	if (!mysql_query($sql,$con))
  	{
  	die('Error: ' . mysql_error());
  	}

?>
<div class="alert-success" style="margin-top:200px"><?php
	$url = "http://emoods.sinaapp.com/moodspool.php";
		echo "<script language='javascript' type='text/javascript'>";
		echo "alert('Success!!');";
		echo "window.location.href='$url'";
		echo "</script>";
		?></div>
</div>
<?php
	mysql_close($con)
	?>
</body>
</html>