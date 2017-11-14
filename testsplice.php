<!doctype html>
<html lang="en">
 <head>
  <meta charset="UTF-8">
  <meta name="Generator" content="EditPlus®">
  <meta name="Author" content="">
  <meta name="Keywords" content="">
  <meta name="Description" content="">
  <title>Document</title>
 </head>
 <body>
  <?php
  $connect=mysqli_connect("localhost","root","root","test");
  $query="insert into test1 values(null)";
  $query1="insert into test2 values('shan',null)";
  $result=$connect->query($query);
  $result1=$connect->query($query1);
  echo $connect->error;
  echo $result==1?"true":"false";
  echo $result1==1?"true":"false";
   ?>
 </body>
</html>
