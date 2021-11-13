<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
   <link rel="stylesheet" href="css/style2.css">
  <title></title>
</head>
<body>
<div class="login">
  <h1>Login to MeDiary</h1>
  <form method="post" action="">
    <p><input type="text" name="user" value="" placeholder="Username or Email"></p>
    <p><input type="password" name="pass" value="" placeholder="Password"></p>   
    <h6>user: admin</h6>
      <h6>pass: admin</h6>
    <p class="submit"><input type="submit" name="submit" value="Login"></p>

      <?php
      session_start();
    
        $db = mysqli_connect('localhost', 'root', '') or
        die ('Unable to connect. Check your connection parameters.');
        mysqli_select_db($db, 'register' ) or die(mysqli_error($db));

      if(isset($_POST['submit'])){
       $user = $_POST['user'];
       $pass = $_POST['pass'];
       $query=mysqli_query($db,"SELECT * FROM users WHERE username = '$user' AND password = '$pass'");
       $num_rows=mysqli_num_rows($query);
       $row=mysqli_fetch_array($query);
       $_SESSION["id"]=$row['user_id'];
       if ($num_rows>0)
    {
    ?>
    <script>
      alert('Successfully Log In');
      document.location='index.html'
    </script>
    
    <?php
      }
      }
      ?>
    <?php
      if(isset($_SESSION["error"])){
      $error = $_SESSION["error"];
      echo "<span>$error</span>";
      }
      ?>  
</form>
</div>
</body>
</html>
<?php
    unset($_SESSION["error"]);
?>
