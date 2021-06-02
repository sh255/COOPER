<?php

$con = mysqli_connect("localhost", "root", "");
//the user name and password
if (!$con) {
exit('Connect Error (' . mysqli_connect_errno() . ') '
                    . mysqli_connect_error());
        }
mysqli_set_charset($con, 'utf-8');
mysqli_select_db($con, "mydb");
$email = mysqli_real_escape_string($con, $_POST['email']);

$q = mysqli_query($con, "SELECT * FROM service WHERE email='" . $email . "'");
if (mysqli_num_rows($q) < 1) {
exit(" is not found");
        }
                 



 
echo "<table width='100%' border='1'>\n";
echo "<tr><th>email</th><th>type</th><th>price</th>
     <th>note</th></tr>\n";
while ( $Row= mysqli_fetch_row($q))
 {
     echo "<tr><td>{$Row[0]}</td>";
     echo "<td>{$Row[1]}</td>";
     echo "<td>{$Row[2]}</td>";
    echo "<td align='right'>{$Row[3]}</td>\n";
       

}
echo "</table>\n";

echo"<a href=payment.html>pay now </a>";
mysqli_close($con);

?>