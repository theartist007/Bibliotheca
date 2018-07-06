<?php
session_start();
$conn=new mysqli("localhost","id6457760_root","password","id6457760_library");
$x=$_POST['y'];
$sql="SELECT * FROM books WHERE name='$x'";
$result=$conn->query($sql);
$row=$result->fetch_assoc();
if($row['quantity']>0)
{$flag=$_SESSION['dog'];
$sql2="SELECT quantity FROM issue WHERE book='$x'";
$result2=$conn->query($sql2);
while($row2=$result2->fetch_assoc())
{if($row2['quantity']==1)
$flag=1;
}
if($flag==0)
{$sql3="DELETE FROM books WHERE name='$x'";
if($conn->query($sql3)===TRUE)
echo 1;
} 
else
{echo 2;
$_SESSION['dog']=0;
}
}

?>

