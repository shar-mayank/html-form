<?php

$server = 'localhost';
$user = 'root';
$pass = 'root';
$dbname = 'form';

$conn = mysqli_connect($server,$user,$pass,$dbname);

if(!$conn){
    echo 'Failed';
    die;
}


$submit = $_POST['submit'];
  header("Location: index.php");

if(isset($submit)){
  $name = $_POST['name'];
  $email = $_POST['email'];
  $subject = $_POST['subject'];
  $message = $_POST['message'];
  $gender = $_POST['gender'];
  $house = serialize($_POST['house']);

  if ( !isset($name) && trim($name) == '') {
      die;
  }
  if ( !isset($email) && trim($email) == '') {
    die;
  }
  if ( !isset($subject) && trim($subject) == '') {
    die;
  }
  if ( !isset($message) && trim($message) == '') {
    die;
  }
  if ( !isset($gender) && trim($gender) == '') {
    die;
  }
  if ( !isset($house) && trim($house) == '') {
    die;
  }

  $query = "INSERT INTO data (`Name`, `Email address`, `Subject`, `Message`, `Gender`, `House`) 
          VALUES ('$name', '$email', '$subject', '$message', '$gender', '$house')";

  $result = mysqli_query($conn, $query);

  header("Location: index.php");
}else{
  header("Location: index.php");
}
?>
