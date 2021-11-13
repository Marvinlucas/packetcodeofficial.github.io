<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<title>Registration</title>
<link rel="stylesheet" href="css/style.css" />
</head>
<body>
<?php
$con = mysqli_connect("localhost","root","","register");
if (mysqli_connect_errno())
  {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
  }

if (isset($_REQUEST['topic'])){
  $topic = stripslashes($_REQUEST['topic']);
  $topic = mysqli_real_escape_string($con,$topic); 
  $category = stripslashes($_REQUEST['category']);
  $category = mysqli_real_escape_string($con,$category);
  $content = stripslashes($_REQUEST['content']);
  $content = mysqli_real_escape_string($con,$content);
  $c_date = date("Y-m-d H:i:s");
  $query = "INSERT into `posts` (topic, category, content, c_date) VALUES ('$topic', '$category', '$content', '$c_date')";
        $result = mysqli_query($con,$query);
        if($result){
            header('Location: list.php');
        }
    }
    else
    {
?>
<div class="hero">
  <nav>
      <h2 class="logo">Me<span>Diary</span></h2>
      <ul>
        <li><a href="index.html">Home</a></li>
        <li><a href="gallery.html">Gallery</a></li>
        <li><a href="list.php">List Diary</a></li>
        <li><a href="add.php">Add Diary</a></li>
      </ul>     
  </nav>    

<div class="card">
  <form name="registration" action="" method="post">
  <h2>Add Diary</h2>
  <div class="row">
   
    <div class="col">
      <div class="form-group">
        <label>Topic</label>
        <input type="text" name="topic" placeholder="Topic..." required />
      </div>
    </div>

    <div class="col">
      <div class="form-group">
        <label>Category</label>
        <select  name="category">
         <option >Blog</option>
         <option >Travel</option>
         <option >Hobbies</option>
      </select>
      </div>
    </div>

    <div class="col">
      <div class="form-group">
        <label>Content</label>
        <textarea rows="5"  id="cont" name="content" placeholder="Content.."></textarea> 
      </div>
    </div>

    <div class="col">
      <div class="form-group">
        <label>Date</label>
        <input type="date"  name="c_date">
      </div>
    </div>

    <div class="col">
      <input type="submit" name="submit" value="Register" />
    </div>
  </div>
</form>
</div>
</div>
<?php } ?>
</body>
</html>