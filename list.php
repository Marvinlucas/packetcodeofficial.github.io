<?php 
 
$servername = "localhost";
$username = "root"; 
$password = ""; 
$dbname = "register"; 


$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}


$sql = "SELECT * FROM posts";

$result = $conn->query($sql);


?>

<!DOCTYPE html>
<html>
<head>
	<title>View Page</title>
	<link rel="stylesheet" href="style1.css">  
  <link rel="stylesheet" href="css/style.css">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
	
</head>
<body>
	<div class="hero">
	<nav>
      <h2 class="logo">Me<span>Diary</span></h2>
      <ul >
        <li><a href="index.html">Home</a></li>
        <li><a href="gallery.html">Gallery</a></li>
        <li><a href="list.php">List Diary</a></li>
        <li><a href="add.php">Add Diary</a></li>
      </ul>     
  </nav> 
	<div class="container">
		<h2>List Diary</h2>
<table class="table">
	<thead>
		<tr>		
		<th>Topic</th>
		<th>Category</th>
		<th>Date</th>
		<th>Content</th>
	</tr>
	</thead>
	<tbody>	
		<?php
			if ($result->num_rows > 0) {
				//output data of each row
				while ($row = $result->fetch_assoc()) {
		?>
					<tr>
					<td><?php echo $row['topic']; ?></td>
					<td><?php echo $row['category']; ?></td>
					<td><?php echo $row['c_date']; ?></td>		
					<td><?php echo $row['content']; ?></td>
							
					</tr>	
					
		<?php		}
			}
		?>
	        	
	</tbody>
</table>
</div>
</div>
</body>
</html>