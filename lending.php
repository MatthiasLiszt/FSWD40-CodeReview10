<?php

  define('DBHOST', 'localhost');
  define('DBUSER', 'root');
  define('DBPASS', '');
  define('DBNAME', 'cr10_matthias_liszt_biglibrary');

 function connectDB()
  {$conn = mysqli_connect(DBHOST,DBUSER,DBPASS,DBNAME);


     if ( !$conn ) {
      die("Connection failed : " . mysqli_error());
     }
    return $conn; 
   } 

 function lending($connect,$mediaId,$user){
  $userSql="select userId from userdata where userName='$user'";
  $userResult=mysqli_query($connect,$userSql);
  $row=mysqli_fetch_assoc($userResult);
  $userId=$row['userId'];

  $lendSql="insert into transactiondata (userId,mediaId,active) values ('$userId','$mediaId',1)";
  $lendResult=mysqli_query($connect,$lendSql);
  if($lendResult)
   {return $userId;}
  else
   {return "error: could not write to database";}
 }

 $connect=connectDB();
 
?> 
<html>
<body>
:) keep smiling
<?php
  $userId=lending($connect,$_GET['mediaId'],$_GET['user']);
  echo " userId : $userId ";
  header("Location: biglibrary.php");

?>
</body>
</htm>