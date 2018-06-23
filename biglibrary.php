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
  $sql="select media.mediaId, media.title, media.image, media.mediaType, media.description, author.name, author.surname, media.publisherId, media.publisherDate,publisher.publisherName,media.isbn from media inner join author on author.authorId=media.authorId inner join publisher on publisher.publisherId = media.publisherId";
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
                $isbn=$row['isbn']; 

                $element="<div class='col-sm-3 col-md-3 col-lg-3'><div class='media'>";
                $divend="<//div>";
                //echo "<div class='media col-sm-12 col-md-6 col-lg-4'><div class='media'>";
                echo "<div class='medium'>";
                //popup window code
                echo "<div class='popup'>";
                echo "<p>by $author</p>";
                echo "<p>published by $publisher in $publisherDate</p>";
                echo "<p>$mediaType</p><textarea>$description</textarea>";
                $lendsql="select active from transactiondata where mediaId='$mediaId'"; 
                $lend=mysqli_query($connect,$lendsql);
                 
                if(mysqli_num_rows($lend)>0)
                 {$lendrow=mysqli_fetch_assoc($lend);
                  if($lendrow['active']==1){$isLend=true;}
                  if($lendrow['active']!=1){$isLend=false;}
                 }
                else
                 {$isLend=false;} 

                if($SESSION&&!$isLend)
                 {echo "<form action='lending.php' method='get'>";
                  echo "<input style='display:none' name='mediaId' value='$mediaId'>";
                  echo "<input style='display:none' name='user' value='$SESSION'>";
                  echo "<button type='submit'>lend</button></form>";}
                else         
                 {if(!$isLend)
                   {echo "<p class='advice'>please login or register to lend</p>";}
                 }

                if($isLend)
                 {echo "<p class='advice'>the media is currently not available for lend</p>";} 
                echo "</div>";  
                // echo "</div>";                

                if($isLend)
                 {$lended="true";}
                else
                 {$lended="false";}
                // image and title 
                echo "<p><img src='img/$image' width='200' ></p>";
                echo "<p class='fat'>$title</p>";        
                echo "<form action='showdetails.php' method='post' id='mediaDetail'>";
                echo "<input style='display:none' name='title' value='$title'> ";
                echo "<input style='display:none' name='image' value='$image'> ";
                echo "<input style='display:none' name='type' value='$mediaType'> ";  
                echo "<input style='display:none' name='author' value='$author'> ";
                echo "<input style='display:none' name='publisher' value='$publisher'> ";
                echo "<input style='display:none' name='date' value='$publisherDate'> ";
                echo "<input style='display:none' name='lend' value='$lended'> ";
                echo "<input style='display:none' name='description' value='$description'> "; 
                echo "<input style='display:none' name='isbn' value='$isbn'> ";
                echo "<button>show media</button>"; 
                echo "</form>";
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
   {echo "<p>connection to database successfull</p>";
    
    getAllMedia($connect);
   }
?>
</div>	


</body> 
</html>