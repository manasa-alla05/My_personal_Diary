<?php
$server_name="localhost";
$user_name="root";
$password="9550990344";
$database_name="project";
$conn = mysqli_connect($server_name,$user_name,$password,$database_name);
if(!$conn){
    die("Connection Failed" . mysqli_connect_error());
}
if(isset($_POST['login'])){
    $u=$_POST['user_in'];
    $p=$_POST['password_in'];
}
$flag=true;
$query ="SELECT user_i,pass FROM logins";
$result = $conn->query($query);
if($result->num_rows >0){
    while($row = $result->fetch_assoc()){
       // echo $row['user_id']. "." .$row['password'];
        if($row['user_i'] == $u ){
            if($row['pass'] == $p){
               $sql_query="UPDATE present SET p_user='$u'";
               $conn->query($sql_query);
                $flag=false;
                header('Location:http://localhost/project1/personal2.php');
                //echo "pass";
            }
            else{
                $flag=false;
              header('Location:http://localhost/project1/personalnotelogin.php');
            //    echo "fail";
            }
        }
    }
    // if($flag){
    //     header("Location:http://localhost/project1/personalnotelogin.php");
    //     echo "else";
    // }
}
?>