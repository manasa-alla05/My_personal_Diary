<?php
class connection{
    public PDO  $pdo;
    public function __construct()
    {
       $this->pdo=new PDO('mysql:server=localhost;dbname=project','root','9550990344');
       $this->pdo->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
    }
    public function getnotes()
    {
        $con=mysqli_connect("localhost","root","9550990344","project");
        $last="SELECT * FROM present ";
        $res=$con->query($last);
        $row = $res->fetch_assoc();
        $y=$row['p_user'];
        // $result = mysqli_query($con,"SELECT * FROM notes where user1='$y'");
        $statement=$this->pdo->prepare("SELECT *FROM notes2 WHERE user='$y' ORDER BY date2 DESC");
        $statement->execute();
        return $statement->fetchAll(PDO ::FETCH_ASSOC);
    }
    public function getnotebyuser($title)
    {
        $statement=$this->pdo->prepare("SELECT *FROM notes2 WHERE title= :title");
        $statement->bindValue('title',$title);
        $statement->execute();
        return $statement->fetch(PDO::FETCH_ASSOC);
    }
    public function removenote($title)
    {
        $con=mysqli_connect("localhost","root","9550990344","project");
        $last="SELECT * FROM present ";
        $res=$con->query($last);
        $row = $res->fetch_assoc();
        $y=$row['p_user'];
        $statement=$this->pdo->prepare("DELETE FROM notes2 WHERE title= :title and user='$y'");
        $statement->bindValue('title',$title);
         $statement->execute();
    }
}
?>