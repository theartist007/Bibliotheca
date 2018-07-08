<!DOCTYPE html>
<html>
<head>
<style>

th{font-size:150%;
border-bottom:1px solid white;
font-family:comic sans ms;}
td{text-align:center;
font-family:comic sans ms;
}
td{border-bottom:1px solid white;
font-size:150%;
}
.design{border-radius:30px;
height:40px;
width:100px;
font-size:100%;
font-family:Comic sans ms;
color:white;
background-color:blue;
}
</style>
</head>


<body>


<?php
$conn=new mysqli("localhost","id6457760_root","password","id6457760_library");
$sql="SELECT * FROM books;";
$result=$conn->query($sql);
echo "<table style='width:800px; height:500px; float:center;'><th>Name</th><th>Author</th><th>Publisher</th><th>Quantity</th><th>Remove</th>";
while($row=$result->fetch_assoc())
{$t=underscore($row['name']);

echo "<tr id= '" .$t. "r'><td>" .$row['name']. "</td><td> " .$row['author']. "</td><td>" .$row['publisher']. "</td><td id='" .$t. "m'>" .$row['quantity']. "</td><td><button class='design' onclick= 'reply_click(this.id)' id= '" .$t. "'>Remove</button></td></tr>";
}
echo "</table>";
$_SESSION['dog']=0;
?>
<?php
function underscore($m)
{$n=strlen($m);
for($i=0;$i<$n;$i++)
{if($m[$i]==" ")
$m[$i]="_";
}
return($m);
}
?>
</body>