<?php
session_start();
$conn=new mysqli("localhost","id6457760_root","password","id6457760_library");
$x=$_POST['y'];
$sql="SELECT * FROM books WHERE name='$x'";
$result=$conn->query($sql);
$row=$result->fetch_assoc();
if($row['quantity']>0)
{
$sql2="SELECT quantity FROM issue WHERE book='$x' AND user='$_SESSION[username]'";
$result2=$conn->query($sql2);
$row2=$result2->fetch_assoc();

if($row2['quantity']!=1)
{$_SESSION['mrrobot']=0;
$sql1="INSERT INTO issue (book ,author ,publisher,quantity,user) VALUES('$row[name]' ,'$row[author]' ,'$row[publisher]',quantity+1,'$_SESSION[username]')";
if($conn->query($sql1)===TRUE)
{echo $row['quantity']-1;
$_SESSION['q']=$row['quantity'];
$sql1="UPDATE books SET quantity=" .$row['quantity']. "-1 WHERE name='$x'";
if($conn->query($sql1)===TRUE)
{
}
}
}
else
{echo $row['quantity'];
$_SESSION['mrrobot']=1;
}

}


?>







