<?php
session_start();
$email = $_SESSION['email'] ;

$con = mysqli_connect("localhost", "root", "");
//the user name and password
if (!$con) {
exit('Connect Error (' . mysqli_connect_errno() . ') '
                    . mysqli_connect_error());
        }
mysqli_set_charset($con, 'utf-8');
mysqli_select_db($con, "mydb");
$cname = mysqli_real_escape_string($con, $_POST['cname']);
$cnumber = mysqli_real_escape_string($con, $_POST['cnumber']);
$expiry= mysqli_real_escape_string($con, $_POST['expiry']);
$cvc= mysqli_real_escape_string($con, $_POST['cvc']);
$dress= mysqli_real_escape_string($con, $_POST['dress']);

$q = mysqli_query($con,"insert into payment values('$email','$cname','$cnumber','$expiry','$cvc','$dress')");



if(mysqli_affected_rows($con) > 0){
	echo "<p> payment is done</p>";
	echo "<a href= home.html >Go Back</a>";
} else {
	echo "payment is not  done <br />";
	echo mysqli_error ($con);
}

?>