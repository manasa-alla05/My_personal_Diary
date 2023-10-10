<?php
if(isset($_POST['back']))
{
    header("location:personal2.php");
}
if(isset($_POST['del']))
{
    header("location:delete.php");
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
 <style>  
body
    {
        background:linear-gradient(rgba(0,0,0,0.4),rgba(0,0,0,0.4)),url("back4.jpg");
        background-repeat:no-repeat;
        background-attachment:fixed;
        background-position:center;
        background-size:cover;  
    }
.text 
{   background:#D7DBDD;
    color:#fff;
    top:100px;
    width:900px;
    height:500px;
    align:center;
   position:center;
   justify-content:center;
    color:#0F0706 ;
    font-size:30px;
    border-radius:50px;
}
.back1
{  
    top:100px;
    width:100px;
    height:50px;
    align:center;
   position:center;
   justify-content:center;
    font-size:20px;
    border-radius:20px;
    align:center;
    margin-left:740px;
    margin-top:10px;
}
.back1 .t:hover
{
     color:orange;
}
.back2
{  
    top:100px;
    width:100px;
    height:50px;
    align:center;
   position:center;
   justify-content:center;
    font-size:20px;
    border-radius:20px;
    align:center;
    margin-left:30px;
    margin-top:10px;
}
.back2 .t:hover
{
     color:orange;
}
</style> 
</head>
<body >
    <br>
    <br> <br>   
  <center> <form name="text" id="text" cols="30" rows="10" class="text">
    <h3><u> <i> <?php
    $conn=mysqli_connect("localhost","root","9550990344","project");
    if(isset($_POST['title'])){
         $x=$_POST['title'];
         $sql_query="UPDATE present1 SET p_title='$x'";
        
         $conn->query($sql_query);
         $result = mysqli_query($conn,"SELECT * FROM notes2 where title='$x'"); 
        if($result){
        while($row = $result->fetch_assoc()){
           $z= $row['title'];
            }
            echo $z;
        } 
    }
          ?></u> </i> </h3>
<?php
$conn=mysqli_connect("localhost","root","9550990344","project");
if(isset($_POST['title'])){
     $x=$_POST['title'];
     $con=mysqli_connect("localhost","root","9550990344","project");
     $last="SELECT * FROM present ";
     $res=$con->query($last);
     $row = $res->fetch_assoc();
     $y=$row['p_user'];
    $result = mysqli_query($conn,"SELECT * FROM notes2 where title='$x' and user='$y' "); 
    if($result){
    while($row = $result->fetch_assoc()){
       echo $row['content'];
        }
    } 
}
?>
</form></center>
<form action="" method="POST">
<button type="submit" class="back1" name="back">
    <bold class="t">BACK</bold>
    </button>
    <button type="submit" class="back2" name="del">
    <bold class="t">DELETE</bold>
    </button>
    </form> 
</body>
</html>