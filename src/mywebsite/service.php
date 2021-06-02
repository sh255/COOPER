<?php
session_start();
$con = mysqli_connect("localhost", "root", "");
//the user name and password
if (!$con) {
exit('Connect Error (' . mysqli_connect_errno() . ') '
                    . mysqli_connect_error());
        }
mysqli_set_charset($con, 'utf-8');
mysqli_select_db($con, "mydb");
//$email = mysqli_real_escape_string($con, $_POST['email']);
$email = $_SESSION['email'] ;
$servtype= mysqli_real_escape_string($con, $_POST['servtype']);
$price = mysqli_real_escape_string($con, $_POST['price']);
$note = mysqli_real_escape_string($con, $_POST['note']);

$q = mysqli_query($con, "insert into service values('$email','$servtype','$price','$note')");

if(mysqli_affected_rows($con) > 0){
	echo "<p>order Added</p>";
	} else {
	echo "order NOT Added<br />";
	echo mysqli_error ($con);
}






if(isset($_FILES['image'])){
      $errors= array();
      $file_name = $_FILES['image']['name'];
      $file_size =$_FILES['image']['size'];
      $file_tmp =$_FILES['image']['tmp_name'];
      $file_type=$_FILES['image']['type'];
      $file_ext=strtolower(end(explode('.',$_FILES['image']['name'])));
      
      $extensions= array("jpeg","jpg","png");
      
      if(in_array($file_ext,$extensions)=== false){
         $errors[]="extension not allowed, please choose a JPEG or PNG file.";
      }
      
      if($file_size > 2097152){
         $errors[]='File size must be excately 2 MB';
      }
      
      if(empty($errors)==true){
         move_uploaded_file($file_tmp,"images/".$file_name);
         echo "Success";
      }else{
         print_r($errors);
      }
   }
?>