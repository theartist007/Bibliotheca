
<?php
session_start();
$x=$_POST['y'];
$conn=new mysqli("localhost","id6457760_root","password","id6457760_library");

$sql="DELETE FROM issue WHERE user='$_SESSION[username]' AND book='$x'" ;
$result=$conn->query($sql);

$sql2="UPDATE books SET quantity=quantity+1 WHERE name='$x'";
$result2=$conn->query($sql2);
$sql3="SELECT quantity FROM books WHERE name='$x'";
$result3=$conn->query($sql3);
$row=$result3->fetch_assoc();
echo $row['quantity'];
?>