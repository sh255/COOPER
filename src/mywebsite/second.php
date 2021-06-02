<?php
$connect=mysqli_connect('localhost','root','','mydatabase');

if(mysqli_connect_errno($connect))
{
		echo 'Failed to connect';
}


// create a variable
$name=$_POST['name'];
$password=$_POST['password'];


//Execute the query


mysqli_query($connect,"INSERT INTO users (name,password)
 		        VALUES ('$name','$password')");
				
	if(mysqli_affected_rows($connect) > 0){
	echo "<p>user Added</p>";
	echo "<a href= index.html >Go Back</a>";
} else {
	echo "Employee NOT Added<br />";
	echo mysqli_error ($connect);
}


?>