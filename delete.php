<?php
$server_name="localhost";
$user_name="root";
$password="9550990344";
$database_name="project";
$conn = mysqli_connect($server_name,$user_name,$password,$database_name);
if(!$conn){
    die("Connection Failed" . mysqli_connect_error());
}
$last1="SELECT * FROM present1";
$res1=$conn->query($last1);
$row = $res1->fetch_assoc();
$x=$row['p_title'];
$last2="SELECT * FROM present";
$res=$conn->query($last2);
$row = $res->fetch_assoc();
$u=$row['p_user'];
$flag=true;
$query2 ="SELECT * FROM notes2";
$result2 = $conn->query($query2);
if($result2->num_rows >0){
    while($row = $result2->fetch_assoc()){
        if($row['title'] == $x){
               $sql_query="DELETE FROM notes2 WHERE title='$x' && user='$u'";
               $conn->query($sql_query);
                $flag=false;
                header('Location:http://localhost/project1/personal2.php');
                //echo "pass";
            }
            else{
                $flag=false;
               header('Location:http://localhost/project1/personal2.php');
               //echo "fail";            
        }
    }
    if($flag){
        //header("Location:http://localhost/project/login.html");
        echo "else";
    }
}
?>