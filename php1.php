<?php
$servername="localhost";
$username="root";
$password="9550990344";
$database_name="project";
$conn=mysqli_connect($servername,$username,$password,$database_name);
if(!$conn)
{
    die("Connection Failed:" . mysqli_connect_error());
}
if(isset($_POST['Register']))
{
    $user_id=$_POST['user_id'];
    $email=$_POST['email'];
    $password=$_POST['password'];
    $select ="SELECT * FROM register WHERE email= '$email' or user_id='$user_id' ";
$result = mysqli_query($conn,$select);
if(mysqli_num_rows($result)>0)
{
    echo "<script>alert('Try with Different user name or Mail ID')</script>";
    echo ("<script>window.location='personalnotelogin.php';</script>");
}
else
{
    $query="INSERT INTO logins(user_i,pass)
    VALUES ('$user_id','$password')";
    if (mysqli_query($conn, $query)) 
    {
       //header('Location: http://localhost/project1/personalnotelogin.php');
       //echo "inserted";
    } 
    $sql_query="INSERT INTO register(user_id,email,password)
    VALUES ('$user_id','$email','$password')";
     if (mysqli_query($conn, $sql_query)) 
	 {
		header('Location: http://localhost/project1/personalnotelogin.php');
        //echo "inserted";
	 } 
    else
    {
        echo "error" .$sql . "" . mysqli_error($conn);
    }
    mysqli_close($conn);
}
}


?>