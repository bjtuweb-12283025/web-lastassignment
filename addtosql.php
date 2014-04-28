<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<link href="mycss.css" rel="stylesheet" type="text/css">
<link href="bootstrap.css" rel="stylesheet" type="text/css">
<script type="text/javascript" src="bootstrap.js"></script>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>addtosql</title>
</head>
<div class="container maincontent">
  <?php
$con = mysql_connect(SAE_MYSQL_HOST_M.':'.SAE_MYSQL_PORT,SAE_MYSQL_USER,SAE_MYSQL_PASS);
mysql_query("SET NAMES 'UTF8'"); 
		mysql_query("SET CHARACTER SET UTF8"); 
		mysql_query("SET CHARACTER_SET_RESULTS=UTF8'"); 
	if (!$con)
  	{
  	die('Could not connect: ' . mysql_error());
  	}
	mysql_select_db(app_emoods, $con);
	$result = mysql_query("SELECT * FROM userinfo");
 	$register_flag = false;
	while($row = mysql_fetch_array($result))
  	{
		if ($row['UserName'] == $_POST["newname"])
		{
			$register_flag = true;
		}
	}
		if($register_flag == true)
		{
			?><div class="tips" style="margin-top:200px">
    <?php
		$url = "http://emoods.sinaapp.com/index.php";
		echo "<script language='javascript' type='text/javascript'>";
		echo "alert('The username has been used, please try another one!');";
		echo "window.location.href='$url'";
		echo "</script>";
		?>
  </div><?php
			}
		else{
			$sql="INSERT INTO userinfo (UserName, UserPsw)
	VALUES
	('$_POST[newname]','$_POST[newpsw]')";

	if (!mysql_query($sql,$con))
  	{
  	die('Error: ' . mysql_error());
  	}
	?>
  <div class="tips" style="margin-top:200px">
    <?php
	$url = "http://emoods.sinaapp.com/index.php";
		echo "<script language='javascript' type='text/javascript'>";
		echo "alert('Success! Back to log in!');";
		echo "window.location.href='$url'";
		echo "</script>";
		?>
  </div>
  <?php
			
  	}
	


	mysql_close($con)
	?>
</div>
<body>
</body>
</html>