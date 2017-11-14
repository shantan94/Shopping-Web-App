<!doctype html>
<html lang="en">
 <head>
  <meta charset="UTF-8">
  <meta name="Generator" content="EditPlus®">
  <meta name="Author" content="">
  <meta name="Keywords" content="">
  <meta name="Description" content="">
  <title>Book Search</title>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  <style>
  .set{
  float:left;
  }
  .extend{
  width:1140px;
  }
  body{
  width:100%;
  }
  #getval{
  display:none;
  }
  .headings{
  margin-top:20px
  }
  .right{
  margin-top:20px;
  margin-right:350px;
  }
  .left{
  margin-left:350px;
  margin-top:20px;
  }
  .hide{
  display:none;
  }
  .msg{
  color:red;
  }
  </style>
 </head>
 <body>
  <?php
  session_start();
  $count=0;
  /*try{
	   $dbh = new PDO("mysql:host=127.0.0.1:3306;dbname=CheapBooks","root","root",array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
	   $dbh->beginTransaction();
	   $stmt = $dbh->prepare('select * from shoppingbasket where username=:username');
	   $stmt->bindParam(':username', $_SESSION['username']);
	   $stmt->execute();
	   $count=$stmt->rowCount();
  }
  catch (PDOException $e) {
  print "Error!: " . $e->getMessage() . "<br/>";
  die();
  }*/
  if(isset($_SESSION['count'])){
	  $count=$_SESSION['count'];
  }
  else{
	$_SESSION['count']=$count;
  }
  $username=$_SESSION['username'];
  $welcome='Welcome: '.$username;
  if(isset($_POST['getval'])){
	  $user=$_SESSION['username'];
	  $book=$_POST['getval'];
	  $_SESSION['val'][]=$book;
	  $quant=$_POST['quant'];
	  $_SESSION['val1'][]=$quant;
	  $count++;
	  $_SESSION['count']=$count;
	  $msg1="Item Added to Cart";
  }
  ?>
  <div class="container">
  <div class="set">
  <h1>Book Search</h1>
  </div>
  <div class="headings" align="right">
  <form method="post" action="">
  <span><b><?php if(isset($welcome)) echo $welcome; ?></b></span>
  <input type="submit" name="submit" value="Log Out" class="btn btn-primary">
  <button name="shopping" class="btn btn-primary" id="shopping"><span>Shopping Basket.(<span class="badge"><?php echo $count; ?></span>)</span></button>
  </form>
  </div>
  <hr align="left" width="1140">
  <div class="form-group">
  <form method="get" action="">
  <table>
  <tr><td colspan="2"><textarea name="search" id="search" class="form-control extend" placeholder="search an item" rows="5" cols="40"></textarea></td></tr>
  <tr>
  <td><input type="submit" class="btn btn-primary left" value="SearchByAuthor" name="author" id="author"></td>
  <td><input type="submit" class="btn btn-primary right" value="SearchByBookTitle" name="booktitle" id="booktitle"></td>
  </table>
  </form>
  </div>
  <?php
   try{
  $dbh = new PDO("mysql:host=localhost;dbname=CheapBooks","root","",array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
  $dbh->beginTransaction();
   if(isset($_GET['author'])){
  $stmt = $dbh->prepare('select * from Book b join WrittenBy wb on b.ISBN=wb.ISBN join Author a on wb.ssn=a.ssn join Stocks s on wb.ISBN=s.ISBN where a.name=:author');
  $stmt->bindParam(':author', $_GET['search']);
  $stmt->execute();
  echo '<table class="table table-bordered">';
  if($stmt->rowCount()==0){
	  echo "<span class='msg'><b>No such Author found</b></span>";
  }
  else{
	  $inc=1;
	  echo '<tr><th>S.No.</th><td>BookName</th><th>ISBN</th><th>Number of books available(stocks)</th><th colspan="2">Enter Quantity</th></tr>';
	  while($row=$stmt->fetch(PDO::FETCH_BOTH)){
			if($row['number']!=0){
				echo '<tr><td>'.$inc.'.</td><td>'.$row['title'].'</td><td>'.$row['ISBN'].'</td><td>'.$row['number'].'</td><td><form method="post" action=""><input type="text" id="quant" name="quant" placeholder="enter quantity" value="1"></td><td><input type="submit" onclick="getval()" value="Add to Cart" name="cart" id="cart"></td></tr>';
				echo '<tr><td class="hide"><input type="text" name="getval" value="'.$row['ISBN'].'" id="getval"></form></td></tr>';
				$inc++;
			}
			else{
				echo '<tr><td>'.$inc.'.</td><td colspan="4"><span class="msg"><b>Out of Stock!</b></span></td></tr>';
				$inc++;
			}
	  }
  }
  //$_SESSION['val']=$val;
  echo '</table>';
  }
   if(isset($_GET['booktitle'])){
  $stmt = $dbh->prepare('select * from Book b join WrittenBy wb on b.ISBN=wb.ISBN join Author a on wb.ssn=a.ssn join Stocks s on wb.ISBN=s.ISBN where b.title=:booktitle');
  $stmt->bindParam(':booktitle', $_GET['search']);
  $stmt->execute();
  echo '<table class="table table-bordered">';
   if($stmt->rowCount()==0){
		  echo "<span class='msg'><b>No such book found</b></span>";
   }
   else{
	  $inc=1;
	  echo '<tr><th>S.No.</th><th>BookName</th><th>ISBN</th><th>Number of books available(stocks)</th><th colspan="2">Enter Quantity</th></tr>';
	  while($row=$stmt->fetch(PDO::FETCH_BOTH)){
			if($row['number']!=0){
				echo '<tr><td>'.$inc.'.</td><td>'.$row['title'].'</td><td>'.$row['ISBN'].'</td><td>'.$row['number'].'</td><td><form method="post" action=""><input type="text" id="quant" name="quant" placeholder="enter quantity" value="1"></td><td><input type="submit" onclick="getval()" value="Add to Cart" name="cart" id="cart"></td></tr>';
				echo '<tr><td class="hide"><input type="text" name="getval" value="'.$row['ISBN'].'" id="getval"></form></td></tr>';
				$inc++;
			}
			else{
				echo '<tr><td>'.$inc.'.</td><td colspan="4"><span class="msg"><b>Out of Stock!</b></span></td></tr>';
				$inc++;
			}
	  }
   }
  echo '</table>';
  }
  }
  catch (PDOException $e) {
  print "Error!: " . $e->getMessage() . "<br/>";
  die();
  }
  if(isset($_SESSION['count1'])){
	  if($_SESSION['count1']==0){
		  echo '<span class="msg"><b>All items bought</b></span>';
		  unset($_SESSION['count1']);
	  }
	  else{
		  echo '<span class="msg"><b>'.$_SESSION['count1'].'item/items was/were not added because there is no stock please check your shopping cart to see the items that were not added</b></span>';
		  unset($_SESSION['count1']);
	  }
  }
  /*$connect=mysqli_connect("localhost","root","root","CheapBooks");
  if(isset($_POST['author'])){
	  $query="select * from Book b join WrittenBy wb on b.ISBN=wb.ISBN join Author a on wb.ssn=a.ssn join Stocks s on wb.ISBN=s.ISBN where a.name='$author'";

	  $result=mysqli_query($connect,$query);
	  echo '<table>';
	  echo '<tr><td>BookName</td><td>ISBN</td><td>Number of books available(stocks)</td></tr>';
	   while($row=mysqli_fetch_array($result)){
		   if($row['number']!=0)
		   echo '<tr><td>'.$row['title'].'</td><td>'.$row['ISBN'].'</td><td>'.$row['number'].'</td></tr>';
       }
	   echo '</table>';
  }
   else if(isset($_POST['booktitle'])){
	  $title=$_POST['search'];
	  $query="select * from Book b join WrittenBy wb on b.ISBN=wb.ISBN join Author a on wb.ssn=a.ssn join Stocks s on wb.ISBN=s.ISBN where b.title='$title'";
	  $result=mysqli_query($connect,$query);
	   echo '<table>';
	  echo '<tr><td>BookName</td><td>ISBN</td><td>Number of books available(stocks)</td></tr>';
	   while($row=mysqli_fetch_array($result)){
		   if($row['number']!=0)
		   echo '<tr><td>'.$row['title'].'</td><td>'.$row['ISBN'].'</td><td>'.$row['number'].'</td></tr>';
       }
	   echo '</table>';
  }*/
  ?>
  <span class="msg"><b><?php if(isset($msg1)) echo $msg1;  ?></b></span>
  <?php
  if(isset($_POST['submit'])){
	  session_destroy();
	  header('Location: page1.php');
  }
  if(isset($_POST['shopping'])){
	  header("location: page3.php");
  }
  ?>
  </div>
 </body>
</html>
 