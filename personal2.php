<?php
require_once './Connection.php';
$connection =new Connection();
$notes=$connection->getnotes();
$currentnote = [
    'title' =>'',
    'content' =>''
];
if(isset($_POST['edit']))
{   
    $currentnote=$connection->getnotebyuser($_POST['edit']);

}
if(isset($_POST['delete']))
{   
  $connection->removenote($_POST['delete']);
  header("location:personal2.php");
}
if(isset($_POST['home']))
{
    header("location:/project1/hell.html");
}
if(isset($_POST['logout']))
{
    header("location:/project1/personalnotelogin.php");
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>personal note</title>
    <link rel="stylesheet" href="s4.css">
    <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.0/css/line.css">
    <style>

.back1{
    position: relative;
    top:30px;
    left:-15px;
    color:black;
}
.back1 .t:hover
{
     color:#D8300C;
} 
.back2{
    position: relative;
    top:30px;
    left:1600px;
    color:black;
}
.back2 .t:hover
{
     color:#D8300C ;
} 
    
    </style>    
</head>
<body>   
    <a href="personalnotelogin.php" class="back2"> <strong class="t">LOG OUT</strong></a>
    <a href="hell.html" class="back1"><strong class="t"> HOME</strong></a>
    <div class="popup-box">
     <div class="popup">
        <div class="content">
            <header>
                <p>Add a new note</p>
                <i class="uil uil-times">

                </i>
            </header>
            <form action="php2.php" method="POST">
                <div class="row Title">
                    <label >Title</label> <br>
                    <input type="text" name="ntitle" value='<?php echo $currentnote['title']?>' placeholder=" Title " >
                </div>
                <div class="row description">
                    <label >Description</label> <br>
                    <textarea name="ndesc" id="popup" cols="50" placeholder="Type your Text here.."><?php echo $currentnote['content']?> </textarea>
                </div>
                <button type="submit" name="submit" id="button">Add</button>
            </form>
        </div>
     </div>
    </div>
    <div class="wrapper">
        <li class="add-box" id="plus">
            <div class="icon"><i class="uil uil-plus"></i></div>
            <p>Add new note</p>
        </li>
        <?php 
            foreach ($notes as $note):
            ?>
             <form action="open.php" method="POST" class="newnote" >
        <li class="note" >
           
            <div class="details">
                <div class="Title"> 
                    <br>
                    <br>
                    <br>
               <center> <button class='button' type='submit' name='title' value='<?php echo $note['title'] ?>' id='title' > <bold class="b"> <?php echo $note['title'] ?></bold></button> </center>
                </div>
            </div>
            <div class="bottom-content">
            <span><?php echo $note['date2']?></span>
                <div class="settings">
                    <i onclick="showmenu(this)" class="uil-ellipsis-h"></i>
                   <ul class="menu">
                    <!-- <button formaction="" class="edit" name='edit' value='<?php echo $note['title']?>' method="POST" type="submit" ><i class="uil uil-pen" ></i> <bold>Edit</bold></button> -->
                    <button formaction="" class="del" method="POST" name="delete" value='<?php echo $note['title']?>'><i class="uil uil-trash" ></i> <bold>Delete</bold> </button>
                   </ul>
                </div>
                
            </div>
        </form>            
            <?php endforeach; ?>            
        </li>
    </div>
    <script  type="text/javascript">
const addbox=document.querySelector(" .add-box");
const change=document.querySelector(" .edit");
popupBox=document.querySelector(".popup-box");
closeIcon=popupBox.querySelector("header i");
titletag=popupBox.querySelector("input");
desctag=popupBox.querySelector("textarea");
addbtn=popupBox.querySelector("button");
addbox.addEventListener("click",() =>
{
    popupBox.classList.add("show");
});
closeIcon.addEventListener("click",() =>
{    titletag="";
    desctag="";
    popupBox.classList.remove("show");
});
function showmenu(ele)
{
  ele.parentElement.classList.add("show");
  document.addEventListener("click",e =>{
        if(e.target.tagName != "I" || e.target != ele)
        {
            ele.parentElement.classList.remove("show");
        }
  });
}
function getpopup()
{    
    addbox.click();
}
</script>
</body>
</html>