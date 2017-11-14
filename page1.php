<?php
/*error_reporting(E_ALL);
ini_set('display_errors','On');

try {*/
  session_start();
  $error='';
  if(isset($_SESSION['username'])){
	header('Location: page2.php');
  }
  if(isset($_POST['submit'])){
  $username=$_POST['username'];
  /*$connect=mysqli_connect("localhost","root","root","CheapBooks");
  $query="select * from Customer where username='$username' and password=md5('$password')";
  $result=mysqli_query($connect,$query);
  $rows=mysqli_num_rows($result);
  if($rows==1){
	  $_SESSION['username']=$username;*/
  try{
  $dbh = new PDO("mysql:host=127.0.0.1:3306;dbname=CheapBooks","root","root",array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
  $dbh->beginTransaction();
  $stmt = $dbh->prepare('select * from Customer where username=:username and password=md5(:password)');
  $stmt->bindParam(':username', $_POST['username']);
  $stmt->bindParam(':password', $_POST['password']);
  $stmt->execute();
  if($stmt->rowCount()==1){
	  $_SESSION['username']=$username;
	  header('Location: page2.php');
  } 
  else{
	$error="username or password is invalid";
  }
  }
  catch (PDOException $e) {
  print "Error!: " . $e->getMessage() . "<br/>";
  die();
  }
}
?>
<html>
<head><title>Customer Login</title>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  <style>
  body{
  width:100%;
  }
  td{
  padding:9px;
  }
  #username{
  width:250px;
  }
  .move{
  margin-left:5px;
  margin-top:8px;
  }
  .move1{
  margin-left:5px;
  margin-top:15px;
  }
  .error{
  margin-left:5px;
  margin-top:15px;
  color:red;
  }
  </style>
</head>
<body>
<div class="container">
<h1>Customer Login</h1>
<hr align="left" width="370">
<div class="form-group">
<form method="post" action="">
<table>
<tr><td>Username: </td><td><input type="text" class="form-control" id="username" name="username" placeholder="enter username" required></td>
<tr><td>Password: </td><td><input type="password" class="form-control" id="password" name="password" placeholder="enter password" required></td></tr><td>
</table>
<span class="error"><b><?php echo $error; ?></b></span><br>
<input type="submit" class="btn btn-primary move" value="Log in" name="submit"><br>
<a href="page4.php"><input type="button" class="btn btn-info move1" value="New users must register here"></a><br>
</form>
</div>
</div>
</body>
</html>
