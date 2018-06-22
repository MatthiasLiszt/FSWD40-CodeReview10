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

  function isInDatabase($connect,$user){
   $sql="select userName from userdata where userName='$user'";
   $result=mysqli_query($connect,$sql);
   if(mysqli_num_rows($result)>0){return true;}else{return false;}
  }  

  function registering($connect,$user,$name,$surname,$hash){
   $sql="insert into userdata (userName,name,surname,password) values ('$user','$name','$surname','$hash')";
   $result=mysqli_query($connect,$sql);
   
  } 

 $connect=connectDB();
?>
<html>
<body>
<h1>Registering to The Big Library</h1>
<form method="post">
<p>UserName: <input type="text" name="username"/></p>
<p>real name: <input type="text" name="realname"/></p>
<p>real surname: <input type="text" name="surname"/></p>
<p>password: <input type="password" name="password"/></p>
<p>retype password <input type="password" name="retype"/></p>
<button type="submit" name="register">register</button>
</form>
<style>
#check h1{
 color: red;
}
</style>
<div id="check">
<?php
  if(isset($_POST['register']))
   {
    if(!$connect)
     {echo "sorry! no database access";}
    else
     {echo "database access granted";}
    
    $username=$_POST['username'];
    $realname=$_POST['realname'];
    $surname=$_POST['surname'];
    $password=$_POST['password'];
    $retype=$_POST['retype'];
    //echo "<p>$username $realname $surname </p>";
    
    if(isInDatabase($connect,$username)=="true")
     {echo "<h1>warning: username already exists !!!</h1>";}
    else
     {echo "<p>$username is okay</p>";
      if($password==$retype)
       {echo "<p>password was entered correctly</p>";
        if($realname==""||$surname=="")
         {echo "<h1>please fill all fields !!! no empty fields allowed</h1>";}
        else
         {echo "data correct, writing to database ...";
          $hashpass = hash('sha256', $password); // password hashing
          echo "<p>$username $realname $surname $hashpass</p>";
          registering($connect,$username,$realname,$surname,$hashpass);   
          echo "<h2>You successfully registered! <a href='biglibrary.php'>return now</a></h2>";
         }
       }
      else
       {echo "<h1>password and retype do not match !!!</h1>";}
     }
   }
?>
</div>
</body>
</html>