<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<style>

th{font-size:150%;
border-bottom:1px solid white;}
td{text-align:center;
}
td{border-bottom:1px solid white;
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
<?php session_start();?>   
<?php
$conn=new mysqli("localhost","id6457760_root","password","id6457760_library");
echo "<table class='h1' style='width:800px; height:200px; float:center;'><th style='color:#144539'>Name</th><th style='color:#144539'>Author</th><th style='color:#144539'>Publisher</th><th style='color:#144539'>Quantity</th><th style='color:#144539'>Return</th>";
$sql="SELECT * FROM issue WHERE user = '$_SESSION[username]'" ;
$result=$conn->query($sql);

while($row=$result->fetch_assoc())
{$t=underscore($row['book']);
echo "<tr id='" .$t. "r'><td style='color:#144539'>" .$row['book']. "</td><td style='color:#144539'> " .$row['author']. "</td><td style='color:#144539'>" .$row['publisher']. "</td><td style='color:#144539'>" .$row['quantity']. "</td><td><button class='design' onclick='frew(this.id)' id='" .$t. "'>Return</button></td></tr>";
}
echo "</table>";
?>

</body>
</html>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script>
function frew(x)
{var p=x;


var i,n=p.length;
p=p.replace(/_/g," ");
$.ajax({
            url:"modal2.php", //the page containing php script
            type: "post", //request type,
            data: {y:p},
            success: function(result)  {
                    
                  
                   $("#"+x+'r').css('display','none');
                   $("#"+x+'m').html(result);
                                 
                    }


         });
}
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