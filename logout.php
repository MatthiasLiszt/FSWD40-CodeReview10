
<html>
<body>
 :) just nothing
<?php
  unset($_COOKIE['librarylog']); // contrary to w3schools it does not work without
  setcookie('librarylog', "", time() - 3600, "/"); //deletes login-cookie
  header("Location: biglibrary.php");
?>
</body>
</html>