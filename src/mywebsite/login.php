<?php

session_start();
if (isset($_SESSION['email']) )
echo $_SESSION['email'];
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "mydb";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
die("Connection failed: " . $conn->connect_error);
} 

$sql = "SELECT name, password  FROM user";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
// output data of each row
while($row = $result->fetch_assoc()) {

if($row["name"]=="mhmd")
{
echo "welcome " . $row["name"]. ;

$homepage = file_get_contents('http://localhost/home.html');
echo $homepage;

}

} else {
echo "invalid email or password";
}
$conn->close();
?> 
