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

  function isInDatabase($connect,$user,$pass){
   $sql="select userName from userdata where userName='$user' and password='$pass'";
   $result=mysqli_query($connect,$sql);
   if(mysqli_num_rows($result)>0){return true;}else{return false;}
  } 

 $connect=connectDB();
?>
<html>
<body>
<style>
div{
 margin-top: 3em;
 margin-left: 5em;
}

#check h1{
 color: red;
}
</style>
<div>
<h1>LogIn Form</h1>
<form method="post">
<p><input type="text" placeholder="username" name="username"></p>
<p><input type="password" placeholder="password" name="password"></p>
<p><button type="submit" name="login">logIn</button></p>
</form>
<div id="check">
<?php
 
 if(isset($_POST['login']))
  {$passhash=hash('sha256',$_POST['password']);
   $username=$_POST['username'];
   echo "$username $passhash";
   if(isInDatabase($connect,$username,$passhash))
    {echo "<p>you are successfully logged in now</p>";
     //$_SESSION['user']=$username;
     setcookie('librarylog', $username, time() + 3600, "/");
     header("Location: biglibrary.php");
    }
   else
    {echo "<h1>username or password is wrong</h1>";} 
  }
?>
</div>
</div>
</body>
</html>