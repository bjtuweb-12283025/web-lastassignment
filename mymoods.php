<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<link href="mycss.css" rel="stylesheet" type="text/css">
<link href="bootstrap.css" rel="stylesheet" type="text/css">
<script type="text/javascript" src="bootstrap.js"></script>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta http-equiv="refresh" content="300" />
<title>EverydayMoods - My Moods</title>
    <script type="text/javascript">

　　//传入 event 对象
        function ShowPrompt(objEvent) {
            var divObj = document.getElementById("promptDiv");
            divObj.style.visibility = "visible";

　　　//使用这一行代码，提示层将出现在鼠标附近(如要使用，记得注释 divOjb.style.left = 60+5;  这一句)

            divObj.style.right = objEvent.clientX + 5;   //clientX 为鼠标在窗体中的 x 坐标值       
            //divObj.style.left = 60 + 5;
            divObj.style.top = objEvent.clientY -180;     //clientY 为鼠标在窗体中的 y 坐标值
        }

　　//隐藏提示框

        function HiddenPrompt() {
            divObj = document.getElementById("promptDiv");
            divObj.style.visibility = "hidden";
        }
        
    </script>
</head>
<div class="container maincontent">
    <div class="head span8">
      <h3>My Moods</h3>
    </div>
    <div class="logo" style="margin-top:20px;" title="Everyday Moods">
    <img src="logo.png" name="logo" onMouseOver="logo.src='logo2.png'" onMouseOut="logo.src='logo.png'"  />
    </div>
    <div class="moods span8">
    <div class="navigation">
    <a href="http://emoods.sinaapp.com/moodspool.php">Back to moods pool</a>
    </div>
      <?php 
	$con = mysql_connect(SAE_MYSQL_HOST_M.':'.SAE_MYSQL_PORT,SAE_MYSQL_USER,SAE_MYSQL_PASS);
	mysql_query("SET NAMES 'UTF8'"); 
		mysql_query("SET CHARACTER SET UTF8"); 
		mysql_query("SET CHARACTER_SET_RESULTS=UTF8'"); 
	if (!$con)
 	{
		die('Could not connect: ' . mysql_error());
  	}
	
    mysql_select_db(SAE_MYSQL_DB, $con);
	$result2 = mysql_query("SELECT * FROM moods order by date DESC");
	$i = 0;
	$ename;
	while($row2 = mysql_fetch_array($result2))
	{
		if($row2['username'] == $_COOKIE["mycookie_name"])
		{
			$emood = $row2['moods'];
			$edate = $row2['date'];
			$euser = $row2['username'];
			$eexp = $row2['exp'];
			$elikes = $row2['likes'];
	?>
      <div class="emood span7">
        <img src="arrow1_005.gif"/><span style="color:#4b5cc4;">
          <?php
	echo "From"."  $euser"."  $edate";
    ?>
        </span>
        <span style="float:right;color:#4b5cc4;"> Comments()<img src="054.gif" />Likes(<?php echo $elikes;?>)<a href="#" onClick=")"><img src="057.gif" /></a></span>
        </br></br><p><img style="margin-left:20px;" src="020.gif"/><span style="color:#161823; font-size:12px;">
          <?php
	echo "  $emood";
    ?>
        </span></p>
       <div class="exp"><span>
      <?php 
	  $array=explode(",",$eexp); 
	  for($i=0;$i<count($array);$i++)
	  {
	  		switch($array[$i]){
				case '1':?><img src="expressions/01.png" /><?php break;
				case '2':?><img src="expressions/02.png" /><?php break;
				case '3':?><img src="expressions/03.png" /><?php break;
				case '4':?><img src="expressions/04.png" /><?php break;
				case '5':?><img src="expressions/05.png" /><?php break;
				case '6':?><img src="expressions/06.png" /><?php break;
				case '7':?><img src="expressions/07.png" /><?php break;
				case '8':?><img src="expressions/08.png" /><?php break;
				case '9':?><img src="expressions/09.png" /><?php break;
				case '10':?><img src="expressions/10.png" /><?php break;
				case '11':?><img src="expressions/11.png" /><?php break;
				case '13':?><img src="expressions/13.png" /><?php break;
				case '14':?><img src="expressions/14.png" /><?php break;
				case '15':?><img src="expressions/15.png" /><?php break;
				case '16':?><img src="expressions/16.png" /><?php break;
				}
	  }
	  ?>
      </span></div> 
      </div>
      
      <?php
		}
	}
	?>
    
    </div>
    
  <div class="personalinfo">
    <p>
      <?php
		echo $_COOKIE["mycookie_name"];?>
    </p>
    </a>
    <form action="addmtosql.php" method="post" class="margin-base-vertical" >
      <p>
        <textarea id="moodshere" rows="4" cols="10"class="form-control"  style="resize:none" maxlength="140" name="mymood" placeholder="Type your mood here within 140 words"></textarea>
      </p>
      <p>
    <label class="checkbox inline">
    <input type="checkbox" name="exp[]" value="1" ><img title="kiss" src="expressions/01.png" /></label>
    <label class="checkbox inline">
    <input type="checkbox" name="exp[]" value="2"><img title="awkward" src="expressions/02.png" /></label>
    <label class="checkbox inline">
    <input type="checkbox" name="exp[]" value="3"><img title="cry" src="expressions/03.png" /></label></p>
    <p>
    <label class="checkbox inline">
    <input type="checkbox" name="exp[]" value="4"><img title="oh!no!" src="expressions/04.png" /></label>
    <label class="checkbox inline">
    <input type="checkbox" name="exp[]" value="5"><img title="mask" src="expressions/05.png" /></label>
    <label class="checkbox inline">
    <input type="checkbox" name="exp[]" value="6"><img title="scream" src="expressions/06.png" /></label></p>
    <p>
    <label class="checkbox inline">
    <input type="checkbox" name="exp[]" value="7"><img title="laugh" src="expressions/07.png" /></label>
    <label class="checkbox inline">
    <input type="checkbox" name="exp[]" value="8"><img title="doubt" src="expressions/08.png" /></label>
    <label class="checkbox inline">
    <input type="checkbox" name="exp[]" value="9"><img  title="shy" src="expressions/09.png" /></label></p>
    <p>
    <label class="checkbox inline">
    <input type="checkbox" name="exp[]" value="10"><img title="strong" src="expressions/10.png" /></label>
    <label class="checkbox inline">
    <input type="checkbox" name="exp[]" value="11"><img title="spleepy" src="expressions/11.png" /></label>
    
    <label class="checkbox inline">
    <input type="checkbox" name="exp[]" value="13"><img title="cachet" src="expressions/13.png" /></label></p>
    <p>
    <label class="checkbox inline">
    <input type="checkbox" name="exp[]" value="14"><img title="angry" src="expressions/14.png" /></label>
    <label class="checkbox inline">
    <input type="checkbox" name="exp[]" value="15"><img title="umbrella" src="expressions/15.png" /></label>
    <label class="checkbox inline">
    <input type="checkbox" name="exp[]" value="16"><img title="rainy" src="expressions/16.png" /></label></p>
    
    <button class="btn btn-link" type="submit">Add Mood</button>
    </form> 
    </a><a style="font-size:14px;" href="logout.php">
    Log Out
    </a></div></div>
    
  </div>
  <p style="text-align:center; color:#88ada6;">Copyright &copy; Qifan Zheng  |     <span onMouseOver="ShowPrompt(event)" onMouseOut="HiddenPrompt()" ><img src="060.gif" />About Me</span> </p>
  <div id="promptDiv" class="promptStyle">
        My vision is to build a simple site for people to take down their everyday life by using within 140 words and some simple expressions.
        And I believe simplication is a concept of design. Hope you can enjoy this.<img src="059.gif" />
    </div>
<?php
	mysql_close($con);
?>

<body>
</body>
</html>