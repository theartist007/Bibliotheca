<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<style>
body {
    font-family: Arial, Helvetica, sans-serif;
    background: url('lib11.jpg') no-repeat center center fixed; 
  -webkit-background-size: cover;
  -moz-background-size: cover;
  -o-background-size: cover;
  background-size: cover;
}
#log{
position:absolute;
display:block;
height:50px;
width:100px;
font-size:150%;
top:20px;
left:1100px;
border-radius:5px;
cursor : pointer;
}
.x{width:400px;
   height:40px;
   
   color:white;
   font-size:50%;
border-top:none;
border-bottom:1px solid white;
border-left:none;
border-right:none;
background:transparent;
   }
#z{width:100px;
height:50px;
font-size:50%;
position:absolute;
top:470px;
border-radius:30px;
 background-image: url('hello.jpg');
color:white;
cursor : pointer;
}
th{font-size:150%;
color:white;
border-bottom:1px solid white;}
td{text-align:center;
font-size:150%;
}
td{border-bottom:1px solid white;
}

th{
border-bottom:1px solid white;
font-family:comic sans ms;}
td{text-align:center;
}
td{border-bottom:1px solid white;
font-family:comic sans ms;
color:white;
}
.peak{position:absolute;
top:200px;
left:300px;
}
.modal{
    display: none; /* Hidden by default */
    position: fixed; /* Stay in place */
    z-index: 1; /* Sit on top */
    padding-top: 100px; /* Location of the box */
    left: 0;
    top: 0;
    width: 100%; /* Full width */
    height:100% ;/* Full height */
     /* Enable scroll if needed */
    background-color: cornsilk; /* Fallback color */
    background-color: rgba(0,0,0,0.4); /* Black w/ opacity */
}
#myBtn{position:absolute;
top:150px;
left:150px;
height:50px;
width:100px;
font-size:100%;
border-radius:30px;
cursor : pointer;
}
#utopian{position:absolute;
height:50px;
width:100px;
top:150px;
left:1100px;
font-size:150%;
border-radius:30px;
cursor : pointer;
}

/* Modal Content */
#modal-content {
    background-image: url('hello.jpg');
    margin: auto;
    padding-top:0px;
padding-left:150px;
padding-right:80px;
padding-bottom:80px;
    border: 1px solid #888;
    width:750px;
-webkit-animation-name: animatetop;
    -webkit-animation-duration: 0.5s;
    animation-name: animatetop;
    animation-duration: 0.5s;
height:350px;
}

/* The Close Button */
.close {
    color: #aaaaaa;
    float: right;
    position:absolute;
    top:150px;
    left:1000px;
    font-size: 28px;
    font-weight: bold;
}

.close:hover,
.close:focus {
    color: #000;
    text-decoration: none;
    cursor: pointer;
}
.design{border-radius:30px;
height:40px;
width:100px;
font-size:100%;
font-family:Comic sans ms;
color:white;
background-color:blue;
}
@-webkit-keyframes animatetop {
    from {top:-300px; opacity:0} 
    to {top:0; opacity:1}
}

@keyframes animatetop {
    from {top:-300px; opacity:0}
    to {top:0; opacity:1}
}
::placeholder {
    color: white;
    opacity: 1; /* Firefox */
}

:-ms-input-placeholder { /* Internet Explorer 10-11 */
   color: white;
}

::-ms-input-placeholder { /* Microsoft Edge */
   color: white;
}
</style>
</head>
<body>
<script>var flag=1 </script>
<?php session_start(); 

 echo "<h1 style='text-align:center;color:white;font-family:Roboto;'>Welcome " .$_SESSION['name']. "!</h1>" ; ?><br>    
<h3 style='text-align:center;color:white;font-family:Roboto; size : 100%;'>*To add a book, fill out the details on "Book Details" and then click on Add.</h3>
<div class='peak' id='help'>
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
</div>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>




<script>


function reply_click(x)
{var h="#"+x+'m';
var p=x;


var i,n=p.length;
p=p.replace(/_/g," ");

$.ajax({
            url:"admint3.php", //the page containing php script
            type: "post", //request type,
            data: {y:p},
            success: function(result)  {
                    
                  
                   
                  
                   if((document.getElementById(x+'m').innerHTML==0))
                      alert("Sorry!!Book cannot be removed it is already issued by someone");  
                    else if(result==2)
                       {alert("Dont remove as it is issued by someone else");
                        }
                      
                      else if(result==1)
                       {alert("Book successfully removed");
                        $("#"+x+'r').css('display','none');
                       }
                      

                     <?php $_SESSION['dog']=0; ?>
                                 
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
<button id="myBtn" onclick='modd()'>BOOK DETAILS</button>
<?php
$booknameerr="";
$bookname="";
$author=$authorerr=$publisher=$publishererr="";
if(empty($_POST["bookname"]))
$booknameerr="Book Name Required";
else
{$bookname=$_POST["bookname"];
if (!preg_match("/^[a-zA-Z ]*$/",$bookname)) {
      $booknameerr = "Only letters and white space allowed"; 
      $bookname="";
    }
}
if(empty($_POST["author"]))
$authorerr="Author Name Required";
else
{$author=$_POST["author"];
if (!preg_match("/^[a-zA-Z ]*$/",$author)) {
      $authorerr = "Only letters and white space allowed"; 
      $author="";
    }
}
if(empty($_POST["publisher"]))
$publishererr="Name Required";
else
{$publisher=$_POST["publisher"];
if (!preg_match("/^[a-zA-Z ]*$/",$publisher)) {
      $publishererr = "Only letters and white space allowed"; 
      $publisher="";
    }
}
     
?>





<!-- The Modal -->
<div id="myModal" class="modal">

  <!-- Modal content -->
  <div id="modal-content">
    <span class="close" onclick="fff()">&nbsp;Close</span>
<pre style="font-size:300%">
<form method="post" id="mrrobot" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>"> 
<input type="text" class="x" placeholder="Type book name" name="bookname"> <span style="color:red;color:white;font-size:50%;"><?php echo $booknameerr; ?></span>

<input type="text" class="x" placeholder="Author" name="author"> <span style="color:red;color:white;font-size:50%;"><?php echo $authorerr; ?></span>

<input type="text" class="x" placeholder="Publisher" name="publisher"> <span style="color:red;color:white;font-size:50%;"><?php echo $publishererr; ?></span>
<input type="submit"  onclick="onto()" id="z">
</form>
  </div>

</div>

<button id="utopian" onclick="hellofunc()">Add</button>
<script>
function onto()
{flag=1;

}

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
<script>
function hellofunc()
{var a,b,c;
a="<?php echo $bookname ?>";
b="<?php echo $author ?>";
c= "<?php echo $publisher ?>";
if((flag==0)||(a=="")||(b=="")||(c==""))
{alert("first fill book details then click add");
if(flag==1)
alert("Form didn't fill up correctly please refill it");
}
else
{flag=0;
var x,y,z;
x=a;
y=b;
z=c;
$.ajax({
            url:"admint4.php", //the page containing php script
            type: "post", //request type,
            data: {bn:x,
                   an:y,
                   p:z, 
                   },
            success: function(result)  {
        alert(result);
                  $.ajax({
            url:"admint5.php", //the page containing php script
            type: "post", //request type,
            
            success: function(result1)  {
        alert(result);
                  
                 $("#help").html(result1)  
                  
                   
                                 
                   }


                  });
          

                   
                                 
                   }


         });
}
}
</script>

<form action="logout.php">
<input id="log" type="submit" value="Logout">
</form>