<!doctype html>
<html lang="en">
 <head>
  <meta charset="UTF-8">
  <meta name="Generator" content="EditPlus®">
  <meta name="Author" content="">
  <meta name="Keywords" content="">
  <meta name="Description" content="">
  <title>Registration</title>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  <style>
  body{
  width:100%;
  }
  td{
  padding:8px;
  }
  .move{
  margin-top:17px;
  }
  #username{
  width:250px;
  }
  .error{
  color:red;
  }
  </style>
 </head>
 <body>
 <?php
  if(isset($_POST['register']))
  {
  $connection = mysqli_connect("localhost", "root", "","CheapBooks");
  $uname=$_POST['username'];
  $pass=$_POST['password'];
  $email=$_POST['email'];
  $phone=$_POST['phone'];
  $addr=$_POST['address'];
  $query = $connection->query("insert into Customer values('$uname','$addr','$email','$phone',md5('$pass'))");
  if($query==1)
	  $error="registration successful";
  else
	  $error="registration failed username already exists";
  }
 ?>
  <div class="container">
  <h1>Registration</h1>
  <hr align="left" width="350">
  <div class="form-group">
  <form  method="post" action="page4.php">
  <table>
  <tr><td>Username:</td><td><input type="text" class="form-control" placeholder="Enter Username" name="username" id="username" required></td></tr>
  <tr><td>Password:</td><td><input type="password" class="form-control" placeholder="Enter Password" name="password" id="password" required></td></tr>
  <tr><td>Email:</td><td><input type="text" name="email" class="form-control" placeholder="Enter Email" id="email" required></td></tr>
  <tr><td>Phone:</td><td><input type="text" name="phone" class="form-control" id="name" placeholder="Enter Phone" required></td></tr>
  <tr><td>Address:</td><td><input type="text" placeholder="Enter Address" name="address" class="form-control" id="address" required></td></tr>
  </table>
  <span class="error"><b><?php if(isset($error))echo $error; ?></b></span><br>
  <tr><td><input type="submit" name="register" class="btn btn-primary move" id="register" value="Register"></td></tr>
  </form>
  </div>
  <a href="page1.php"><input type="button" name="back" class="btn btn-info" id="back" value="Go Back to  Login"></a>
  </div>
  <?php
  if(isset($_POST['register']))
  {
  $connection = mysqli_connect("localhost", "root", "","CheapBooks");
  $uname=$_POST['username'];
  $pass=$_POST['password'];
  $email=$_POST['email'];
  $phone=$_POST['phone'];
  $addr=$_POST['address'];
  $query = $connection->query("insert into Customer values('$uname','$addr','$email','$phone',md5('$pass'))");
  /*if($query==true){
	  echo "ys";
  }
  else
	  echo "no";*/
  /*try{
  $dbh = new PDO("mysql:host=127.0.0.1:3306;dbname=CheapBooks","root","root",array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
  $dbh->beginTransaction();
  $stmt=$dbh->prepare('insert into Customer values(:uname,:addr,:email,:phone,md5(:pass))');
  $stmt->execute(array(':uname'=>$uname,':addr'=>$addr,':email'=>$email,':phone'=>$phone,':pass'=>$pass));
  }
  catch (PDOException $e) {
  print "Error!: " . $e->getMessage() . "<br/>";
  die();
  }*/
  }
  ?>
 </body>
</html>
