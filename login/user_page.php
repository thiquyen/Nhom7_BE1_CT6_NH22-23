<?php

require("../config.php");


session_start();


?>

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>user page</title>

   <!-- custom css file link  -->
	<link type="text/css" rel="stylesheet" href="logs/css/styless.css"/>

</head>
<body>
   
<div class="container">

   <div class="content">
      <h3>Hi, <span>user</span></h3>
      <h1>welcome <span><?php echo $_SESSION['user_name'] ?></span></h1>
      <p>This is an user page</p>
      <a href="../index.php" class="btn">Trang chủ</a>
      <!-- <a href="../login/register_form.php" class="btn">Đăng kí</a> -->
      <a href="../login/login_form.php" class="btn">Đăng Xuất</a>
   </div>

</div>


</body>
</html>