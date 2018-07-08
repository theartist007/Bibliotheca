

<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<style>
body{font-family: Arial, Helvetica, sans-serif;
background: url('libexper.jpg') no-repeat center center fixed; 
  -webkit-background-size: cover;
  -moz-background-size: cover;
  -o-background-size: cover;
  background-size: cover;
}

/* The Modal (background) */
.modal {
    display: none; /* Hidden by default */
    position: fixed; /* Stay in place */
    z-index: 1; /* Sit on top */
    padding-top: 100px; /* Location of the box */
    left: 0;
    top: 0;
    width: 100%; /* Full width */
    height: 100%; /* Full height */
    overflow: auto; /* Enable scroll if needed */
    background-color: cornsilk; /* Fallback color */
    background-color: rgba(0,0,0,0.4); /* Black w/ opacity */
}
#myBtn{position:absolute;
top:170px;
left:150px;
height:50px;
width:100px;
font-size:125%;
border-radius:30px;
font-family:comic sans ms;
cursor : pointer;
}

/* Modal Content */
#modal-content {
    background: url('modalback.jpg') no-repeat center center fixed; 
  -webkit-background-size: cover;
  -moz-background-size: cover;
  -o-background-size: cover;
  background-size: cover;
    margin: auto;
    padding: 80px;
    border: 1px solid #888;
    width: 60%;
box-shadow: 0 4px 8px 0 rgba(0,0,0,0.2),0 6px 20px 0 rgba(0,0,0,0.19);
    -webkit-animation-name: animatetop;
    -webkit-animation-duration: 0.5s;
    animation-name: animatetop;
    animation-duration: 0.5s;
    cursor : pointer;
}

/* The Close Button */
.close {
    color: #aaaaaa;
    float: right;
    font-size: 28px;
    font-weight: bold;
    cursor : pointer;
}

.close:hover,
.close:focus {
    color: #000;
    text-decoration: none;
    cursor: pointer;
}
th{font-size:150%;
border-bottom:1px solid white;
font-family:comic sans ms;
font-size:300%;
color:white;
}
td{text-align:center;
font-family:comic sans ms;
font-size:150%;
color:white;
}
td{border-bottom:1px solid white;
}

th{font-size:150%;
border-bottom:1px solid white;}
td{text-align:center;
}
td{border-bottom:1px solid white;
}
.peak{position:absolute;
top:200px;
left:300px;
color:white;
}
#hello{position:absolute;
top:150px;
left:1100px;
height:50px;
width:100px;
font-size:125%;
background-color:azure;
text-align:center;
border-radius:30px;
font-family:comic sans ms;
cursor : pointer;
}
@-webkit-keyframes animatetop {
    from {top:-300px; opacity:0} 
    to {top:0; opacity:1}
}

@keyframes animatetop {
    from {top:-300px; opacity:0}
    to {top:0; opacity:1}
}
.design{border-radius:30px;
height:40px;
width:100px;
font-size:100%;
font-family:Comic sans ms;
color:white;
background-color:blue;
cursor : pointer;
}
</style>
<head>
<body>
<?php session_start(); 

if($_SESSION["user_type"]=="admin")
echo "<script> window.location.assign('admin.php'); </script>";
else
 echo "<h1 style='text-align:center;color:white;font-family:Roboto;'>Welcome " .$_SESSION['name']."!</h1>" ; ?><br>
<h3 style='text-align:center;color:white;font-family:Roboto;'>*Click on 'Return' to return book. Click on 'Issue' to issue book.</h3>
<?php
$conn=new mysqli("localhost","id6457760_root","password","id6457760_library");
$sql="SELECT * FROM books;";
$result=$conn->query($sql);
echo "<table class='peak' style='width:800px; height:500px; float:center;'><th>Name</th><th>Author</th><th>Publisher</th><th>Quantity</th><th>Issue</th>";
while($row=$result->fetch_assoc())
{$t=underscore($row['name']);

echo "<tr><td>" .$row['name']. "</td><td> " .$row['author']. "</td><td>" .$row['publisher']. "</td><td id='" .$t. "m'>" .$row['quantity']. "</td><td><button class='design' onclick= 'reply_click(this.id)' id= '" .$t. "'>Issue</button></td></tr>";
}
echo "</table>";
?>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>




<script>


function reply_click(x)
{var h="#"+x+'m';
var p=x;


var i,n=p.length;
p=p.replace(/_/g," ");

$.ajax({
            url:"t3.php", //the page containing php script
            type: "post", //request type,
            data: {y:p},
            success: function( result )  {
                    
                  
                   
                  
                   if((document.getElementById(x+'m').innerHTML==0))
                      alert("Sorry!! This book isn't available right now.");  
                      else if((document.getElementById(x+'m').innerHTML-1==result))
                       {alert("Book issued");
                        $(h).html(result);
                       }
                else
                    window.alert("YOU CANNOT ISSUE THIS BOOK AS YOU HAVE ALREADY ISSUED IT");

              
                                 
                    }


         });
}

</script>
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
<!-- Trigger/Open The Modal -->
<button id="myBtn" onclick='allow(); modd()'>Return</button>

<!-- The Modal -->
<div id="myModal" class="modal">

  <!-- Modal content -->
  <div id="modal-content">
    <span class="close" onclick="fff()">close</span>
<script>
    function allow()
{$.ajax({
            url:"modal.php", //the page containing php script
            type: "post", //request type,
            data:"",
            success: function(result)  {
                    
                  
                   
                        $("#modal-content").html(result);
                     
                    },
            error: function(result)
                {alert("nothing");
                }


         });
}
</script>
  </div>

</div>

<script>
// Get the modal
var modal = document.getElementById('myModal');

// Get the button that opens the modal
var btn = document.getElementById("myBtn");

// Get the <span> element that closes the modal
var span = document.getElementsByClassName("close")[0];

// When the user clicks the button, open the modal 
 function modd() {
    modal.style.display = "block";
}

// When the user clicks on <span> (x), close the modal
function fff() {
    modal.style.display = "none";
}

// When the user clicks anywhere outside of the modal, close it
window.onclick = function(event) {
    if (event.target == modal) {
        modal.style.display = "none";
    }
}
</script>

<form action="logout.php">
<input id="hello" type="submit" value="Logout">
</form>
<script>
    $(document).ready(function(){ 
	$('body').find('img[src$="https://cdn.rawgit.com/000webhost/logo/e9bd13f7/footer-powered-by-000webhost-white2.png"]').remove();
    }); 
</script>
     






