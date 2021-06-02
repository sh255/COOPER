<?php



$con = mysqli_connect("localhost", "root", "");
//the user name and password
if (!$con) {
exit('Connect Error (' . mysqli_connect_errno() . ') '
                    . mysqli_connect_error());
        }
mysqli_set_charset($con, 'utf-8');
mysqli_select_db($con, "mydb");
$q = mysqli_query($con, "SELECT * FROM user");
if (mysqli_num_rows($q) < 1) {
exit(" is not found");
        }
                 

$email = mysqli_real_escape_string($con, $_POST['email']);
$password = mysqli_real_escape_string($con, $_POST['psw']);

$found=0 ;
 

//echo "<table width='100%' border='1'>\n";
//echo "<tr><th>name</th><th>email</th><th>password</th>
    // <th>phone</th></tr>\n";
while ( $Row= mysqli_fetch_row($q))
 {
     //echo "<tr><td>{$Row[0]}</td>";
     //echo "<td>{$Row[1]}</td>";
     //echo "<td>{$Row[2]}</td>";
    // echo "<td align='right'>{$Row[3]}</td>\n";
       if($Row[1]==$email && $Row[2]==$password  )
{
session_start();

$_SESSION['email'] = $Row[1];
//echo $_SESSION['email'] ;
echo $Row[0] ;
$found=1;
break;
}


}
//echo "</table>\n";

if($found==1){
$homepage = file_get_contents('http://localhost/home.html');
echo $homepage;
}
else
echo "invalid email or password";

mysqli_close($con);

?>