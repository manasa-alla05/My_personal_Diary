<?php
$con=mysqli_connect("localhost","root","9550990344","project");
// Check connection
if (mysqli_connect_errno())
{
echo "Failed to connect to MySQL: " . mysqli_connect_error();
}

$result = mysqli_query($con,"SELECT * FROM logins");

echo "<table border='0.5'>
<tr>
<th>Title</th>
</tr>";

while($row = mysqli_fetch_array($result))
{
echo "<link rel='stylesheet' type='text/css' href='showstyle.css' />";
echo "<tr>";
$title= $row['user_i'];
echo "<td>" . "<button class='button'>"  . $title . "</button>" . "</td>";
echo "</tr>";
}
echo "</table>";
mysqli_close($con);
?>