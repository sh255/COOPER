<?php
$con = mysqli_connect("localhost", "root", "");
//the user name and password
if (!$con) {
exit('Connect Error (' . mysqli_connect_errno() . ') '
                    . mysqli_connect_error());
        }
mysqli_set_charset($con, 'utf-8');
mysqli_select_db($con, "mydb");
$name = mysqli_real_escape_string($con, $_POST['name']);
$email = mysqli_real_escape_string($con, $_POST['email']);
$password = mysqli_real_escape_string($con, $_POST['psw']);
$phone = mysqli_real_escape_string($con, $_POST['phone']);
$q = mysqli_query($con, "insert into user values('$name','$email','$password','$phone')");

if(mysqli_affected_rows($con) > 0){
	echo "<p>user Added</p>";
	echo "<a href= login.html >Go Back</a>";
} else {
	echo "user NOT Added<br />";
	echo mysqli_error ($con);
}

?>