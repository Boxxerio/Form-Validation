<?php

$servername="localhost";
$username="root";
$password="";
$database="employee";

$conn=mysqli_connect($servername, $username, $password,$database);


if($_SERVER['REQUEST_METHOD']=='POST'){
$fname=trim($_POST["fname"]);
$sname=trim($_POST["sname"]);
$contact=$_POST["number"];
$email=trim($_POST["email"]);
$password=trim($_POST["password"]);
$cpassword=trim($_POST["cpassword"]);
$hobbies=implode(",", $_POST["hobbies"]);
$dob=$_POST["date"];
$qualification=$_POST["education"];
$location=$_POST["location"];
$comment=$_POST["comment"];

if(!preg_match('/^[a-zA-z]+$/',$fname)){
echo "name is not in correct format <br>";
}
if(!preg_match('/^[a-zA-Z]+$/',$sname)){
    echo "last name not in proper format <br>";
}
if(!preg_match('/^\d+$/',$contact)){
    echo "number not in proper format <br>";
}
if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
    echo "pls provide correct email address. The email address".$email."does not exist <br>";
}

if($password!==$cpassword){
    echo "password not matching in confirm password field";
}
if(!preg_match('/^(?=.*[A-Z])(?=.*[a-z])(?=.*\W)(?=.*\d).{8,}$/',$password)){
    echo "password must have atleast one capital letter, one small letter, one number, one special character and minimum of length 8 <br>";
}

else{
$sql="INSERT INTO `employee`.`mcd`(`fname`,`sname`,`contact`,`email`, `password`,`dob`,`qualification`,`hobbies`,`location`,`comment`) VALUES ('$fname', '$sname', '$contact', '$email', '$password', '$dob', '$qualification', '$hobbies', '$location', '$comment')";
mysqli_query($conn,$sql);
echo"form submitted successfully!!!";
}
}
?>