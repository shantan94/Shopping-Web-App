<!doctype html>
<html lang="en">
 <head>
  <meta charset="UTF-8">
  <meta name="Generator" content="EditPlus®">
  <meta name="Author" content="">
  <meta name="Keywords" content="">
  <meta name="Description" content="">
  <title>Shopping Cart</title>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  <style>
  .msg{
  color:red;
  }
  .move{
  margin-top:10px;
  }
  .move1{
  margin-top:10px;
  }
  </style>
 </head>
 <body>
 <div class="container">
  <h1>Shopping Basket</h1>
  <hr align="left">
  <?php
  session_start();
  $count=0;
  $connect=mysqli_connect("localhost","root","root","CheapBooks");
  if(isset($_SESSION['count'])){
		$count=$_SESSION['count'];
  }
  if(isset($_SESSION['val'])&&isset($_SESSION['val1'])){
	  /*foreach($_SESSION['val'] as $value1=>$value){
		  echo $_SESSION['val1'][$value1].'      ';
		  echo $value.'          ';
	  }*/
	    $res=0;
		echo "<form class='form-group'>";
	    echo "<table class='table table-bordered'>";
		echo "<tr><th>ISBN</th><th>Title</th><th>Author Name</th><th>Price</th><th>Quantity Bought</th></tr>";
		//$count1=1;
	    foreach($_SESSION['val'] as $value1=>$value){
				$title=$value;
				$query="select * from Book b join WrittenBy wb on b.ISBN=wb.ISBN join Author a on wb.ssn=a.ssn join Stocks s on wb.ISBN=s.ISBN where b.ISBN='$title'";
				$result=mysqli_query($connect,$query);
				while($row=mysqli_fetch_array($result)){
					echo '<tr><td>'.$row['ISBN'].'</td><td>'.$row['title'].'</td><td>'.$row['name'].'</td><td>'.$row['price'].'</td><td>'.$_SESSION['val1'][$value1].'</td></tr>';
					$res+=$row['price']*$_SESSION['val1'][$value1];
					}
	  }
	  echo "</table>";
	  echo "</form>";
	  echo "<span class='msg'><b>The total price of cart is: ".number_format($res,2).'</b></span>';
  }
  ?>
  <form method="post" action="">
  <input type="submit" class="btn btn-primary move" value="Buy" id="buy" class="buy" name="buy">
  </form>
  <?php
  $val=[];
  $val1=[];
  if(isset($_POST['buy'])){
	  $count1=0;
	  $count2=0;
	  foreach($_SESSION['val'] as $value1=>$value){
		  //foreach($_SESSION['val1'] as $value1){
			$get=$_SESSION['val1'][$value1];
			/*echo $value.'     ';
			echo $value1.'     ';
			echo $get.'     ';
			echo $count2.'    ';
			echo $val[$value1];*/
			$query="select * from Book b join WrittenBy wb on b.ISBN=wb.ISBN join Author a on wb.ssn=a.ssn join Stocks s on wb.ISBN=s.ISBN where b.ISBN='$value'";
			$result=mysqli_query($connect,$query);
			while($row=mysqli_fetch_array($result)){
				if(/*(mysqli_num_rows($result))<=$row['number']&&*/$get<=$row['number']){
					$user=$_SESSION['username'];
					$ISBN=$row['ISBN'];
					$code=$row['warehouseCode'];
					mysqli_query($connect,"update Stocks set number=number-'$get' where ISBN='$value'");
					$query1=$connect->query("insert into ShoppingBasket values(null,'$user')");
					$query2=$connect->query("insert into Contains values('$ISBN',null,'$get')");
					$query3=$connect->query("insert into ShippingOrder values('$ISBN','$code','$user','$get')");
					echo $query1==1?"true":"false";
					echo $query2==1?"true":"false";
					echo $query3==1?"true":"false";
					//array_splice($_SESSION['val'],$count2,1);
					//array_splice($_SESSION['val1'],$count2,1);
					//$count2--;
					//echo $_SESSION['val'][$count2].'<br>';
					//echo $_SESSION['val1'][$count2];
					unset($_SESSION['val'][$count2]);
					$val=array_values($_SESSION['val']);
					unset($_SESSION['val1'][$count2]);
					$val1=array_values($_SESSION['val1']);
				}
				else{
					$count1++;
					$val=array_values($_SESSION['val']);
					$val1=array_values($_SESSION['val1']);
				}
			}
			$count2++;
			//break;
			//echo $count2.'<br>';
		  //}
	  }
	  $_SESSION['val']=$val;
	  $_SESSION['val1']=$val1;
	  $_SESSION['count1']=$count1;
	  $_SESSION['count']=$count1;
	  echo $_SESSION['count1'];
	  header("location: Page1.php");
  }
  /*echo 'in post';
  try{
	  $dbh = new PDO("mysql:host=127.0.0.1:3306;dbname=CheapBooks","root","root",array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
	  $dbh->beginTransaction();
	  foreach($_SESSION['val'] as $value){
	    $stmt=$dbh->prepare('select * from Book b join WrittenBy wb on b.ISBN=wb.ISBN join Author a on wb.ssn=a.ssn join Stocks s on wb.ISBN=s.ISBN where b.ISBN=:ISBN');
	    $stmt->bindParam(':ISBN',$value);
	    $stmt->execute();
		while($row=$stmt->fetch(PDO::FETCH_BOTH)){
			echo 'first stmt effect'.$stmt->rowCount(); 
		    if(($stmt->rowCount())<=$row['number']){
				//echo $row['name'].' success';
				echo 'stock available -> '.$row['number'];
				$stmt1=$dbh->prepare('update stocks set number=number-1 where ISBN=:ISBN');
				$stmt1->bindParam(':ISBN',$row['ISBN']);
				$stmt1->execute();
				echo 'rows affcted'.$stmt1->rowCount();
			}
		
		}
	  }
  }
  catch (PDOException $e) {
  print "Error!: " . $e->getMessage() . "<br/>";
  die();
  }*/
  /*if(isset($_SESSION['count1'])){
	  echo $_SESSION['count1'].' items where sold out and could not be purchased';
  }*/
  ?>
  <a href="page2.php"><input type="button" class="btn btn-info move1" name="return" id="return" value="Return to Search"></a>
  </div>
 </body>
</html>
