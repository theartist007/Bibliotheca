<?php
$x=$_POST['bn'];
$y=$_POST['an'];
$z=$_POST['p'];
$conn=new mysqli("localhost","id6457760_root","password","id6457760_library");

$sql="SELECT * FROM books WHERE name='$x'";
$result=$conn->query($sql);
$row=$result->fetch_assoc();
if($result->num_rows==0)
{$sql2="INSERT INTO books VALUES('$x','$y','$z',quantity+1)";
if($conn->query($sql2)==TRUE)
{echo "book added successfully";
}
else
echo "book cant be added";
}
else
{
if(($row['author']!=$y)||($row['publisher']!=$z))
echo "book cant be added as duplicate book names are not allowed";
else
{$sql3="UPDATE books SET quantity=quantity+1 WHERE name='$x'";
if($conn->query($sql3)===TRUE)
{echo "book already existed so quantity is updated and book is added";
}
else
echo "book cant be updated";
}
}

?>