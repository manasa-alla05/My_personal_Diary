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
$dat=date('m/d/Y');  
if(isset($_POST['submit']))
{
    $email=$_POST['ntitle'];
    $password=$_POST['ndesc'];
    $select ="SELECT * FROM notes2 WHERE title= '$email' ";
    $ch=mysqli_query($conn,$select);
    if(mysqli_num_rows($ch)>0){      
        echo "<script>alert('Duplicate Entry of Title')</script>";
        echo ("<script>window.location='personal2.php';</script>");
        }
    else{
        $last="SELECT * FROM present"; 
    $res=$conn->query($last);
    $row = $res->fetch_assoc();
    $y=$row['p_user'];    
    $result = mysqli_query($conn,$select); 
    $dat=date("F jS,Y");
    $query="INSERT INTO  notes2(user,title,content,date2)
    VALUES ('$y','$email','$password','$dat')";   
    if (mysqli_query($conn, $query)) 
    {
       header('Location: http://localhost/project1/personal2.php');
       //echo "inserted";
    }  
    else
    {
        header("location:personal2.php");
    }
    }
    mysqli_close($conn);
}
?>
