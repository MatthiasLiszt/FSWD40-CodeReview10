<html>
<title>Media Details</title>
<body>
<style>
.present{
 margin-top: 3em;
 margin-left: 3em;
}
textarea{
 width: 36em;
 height: 9em;
 border: none;
}
#bookcover{
 padding: 1em;
}

.red{
 color: red;
}

.green{
  color: green;
}
 
</style>
<div class="present">
<?php
  $title=$_POST['title'];
  $image=$_POST['image'];
  $author=$_POST['author'];
  $type=$_POST['type'];
  $lend=$_POST['lend'];
  $description=$_POST['description'];
  $publisher=$_POST['publisher'];
  $date=$_POST['date'];
  $isbn=$_POST['isbn'];
?>
  <table>
  <tr>
  <td><div id="bookcover"><?php echo "<img src='img/$image' width='200px'> "; ?></div></td>
  <td><h3><?php echo "$title"; ?></h3>
      <p><?php echo "by $author"; ?></p>
      <p><?php echo "ISBN $isbn"; ?></p>
      <p><?php echo "published by $publisher in $date"; ?></p>
      <p><?php echo "$type"; ?></p>
      <p><?php if($lend=="true")
                {echo "<span class='red' >not available</span>";}               
               else
                {echo "<span class='green' >available</span>";}   
         ?>
      </p>    
  </td>
  </tr>
  </table>
  <textarea>
  <?php echo "$description"; ?>
  </textarea>
  <p><a href="biglibrary.php">return to main page</a></p>
</div>
</body>
</html>