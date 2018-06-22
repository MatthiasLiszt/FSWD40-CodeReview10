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

 function getAllMedia($connect){
  $sql="select media.mediaId, media.title, media.image, media.mediaType, media.description, author.name, author.surname, media.publisherId, media.publisherDate,publisher.publisherName from media inner join author on author.authorId=media.authorId inner join publisher on publisher.publisherId = media.publisherId";
  $result=mysqli_query($connect,$sql);

  if(!isset($_COOKIE['librarylog']))
   {$SESSION=false;}
  else
   {$SESSION=$_COOKIE['librarylog'];} 

  if(mysqli_num_rows($result)>0)
   {
   	while($row = mysqli_fetch_assoc($result))
   	           {
                $mediaId=$row['mediaId'];
                $title=$row['title'];
                $image=$row['image'];
                $mediaType=$row['mediaType'];
                $description=$row['description'];
                $author=$row['name']." ".$row['surname'];
                $publisherDate=$row['publisherDate'];
                $publisher=$row['publisherName']; 

                $element="<div class='col-sm-3 col-md-3 col-lg-3 media'>";
                $divend="<//div>";
                //echo "<div class='col-sm-3 col-md-3 col-lg-3 media'>";
                echo "<div class='medium'>";
                //popup window code
                echo "<div class='popup'>";
                echo "<p>by $author</p>";
                echo "<p>published by $publisher in $publisherDate</p>";
                echo "<p>$mediaType</p><textarea>$description</textarea>";
                if($SESSION)
                 {echo "<form action='lending.php' method='get'><button type='submit'>lend</button></form>";}
                else
                 {echo "<p class='advice'>please login or register to lend</p>";}
                echo "</div>";  

                // image and title 
                echo "<p><img src='img/$image' width='200' ></p><p class='fat'>$title</p>";
                echo "</div>"; 
                
                
               }
            
   }	
 } 

 if(!isset($_COOKIE['librarylog']))
  {$SESSION=false;}
 else
  {$SESSION=$_COOKIE['librarylog'];}
?>

<html>
<head>
<meta charset="UTF-8">
<title>The Big library</title>	
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

<!-- Optional theme -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">

<!-- Latest compiled and minified JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>

<link rel="stylesheet" href="library.css">
</head>
<body>

<header><h1>The Big Library</h1>


<nav id="libNav">
<?php
if($SESSION)
 {echo "<form action='logout.php'><button>LogOut</button></form>";
  echo "<form action='profile.php'><button>Profile</button></form>";
 }
else
 {
  echo "<form action='login.php'><button>LogIn</button></form>";
  echo "<form action='register.php'><button >Register</button></form>";
 }
?>

</nav>
</header>
  
<div id="showMedia" class="container-fluid">
<?php 
  $connect=connectDB();
  if($connect)
   {echo "connection to database successfull";
    
    getAllMedia($connect);
   }
?>
</div>	


</body> 
</html>