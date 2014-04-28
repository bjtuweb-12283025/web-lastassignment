<?php setcookie("mycookie_name","$_POST[name]",time()+3600);?>
<html>
<head>
<link href="mycss.css" rel="stylesheet" type="text/css">
<link href="bootstrap.css" rel="stylesheet" type="text/css">
<script type="text/javascript" src="bootstrap.js"></script>
<script src="jquery-1.11.0.min.js"></script>
<title>EverydayMoods</title>
</head>
<body>

<div class="logo text-center" style="margin-top:100px;" title="Everyday Moods">
    <img src="logo.png" name="logo" onMouseOver="logo.src='logo2.png'" onMouseOut="logo.src='logo.png'"  />
    </div>
<div class="container" style="margin-top:50px">
  <div class="row">
    <div class="login span5">
      <h2>I'm an old user! </h2>
      <h2>Log in directly! </h2>
      <form action="moodspool.php" method="post" class="margin-base-vertical" >
        <p>
          <input type="text" class="form-control" style="height:auto" name="name" placeholder="Username">
        </p>
        <p>
          <input type="password" class="form-control" style="height:auto" name="pwd" placeholder="Password">
        </p>
        <button class="btn" type="submit">Log in</button>
      </form>
    </div>
    <div class="blank span2"><img src="line.png"></div>
    <div class="signup span5">
      <h2>I'm a new user! </h2>
      <h2>Sign up now! </h2>
      <form action="addtosql.php" method="post" class="margin-base-vertical">
        <p>
          <input type="text" class="form-control" name="newname" style="height:auto" placeholder="Enter Username">
        </p>
        <p>
          <input type="password" class="form-control" name="newpsw" style="height:auto" placeholder="Enter Password">
        </p>
        <button type="submit" class="btn">Sign up</button>
      </form>
    </div>
  </div>
</div>
</body>
</html>
