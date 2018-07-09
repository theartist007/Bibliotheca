<?php
session_start();

?>




<!DOCTYPE html>
<html>
<style>
body{
   background: url('lib1.jpg') no-repeat center center fixed; 
  -webkit-background-size: cover;
  -moz-background-size: cover;
  -o-background-size: cover;
  background-size: cover;

}
.x{font-family:Comic Sans Ms;
    width: 500px;
    height: 45px;
background: transparent;
    padding: 0 5px 0 38px;
    line-height: 1.2;
border-bottom:1px solid white;
font-size: 75%;
border-top:none;
border-left:none;
border-right:none;
color:white;
}




div.t1{position:absolute;
opacity:0.8;
width:900px;
height:500px;
font-family:Comic Sans Ms;
color:white;
left: 250px;
   
top:60px;
border-radius:20px;
background-image: url('back1.jpg');
}
#t2{width:200px;
height:50px;
font-family:Comic Sans MS;
font-size:75%;
position:absolute;
top:350px;
left:90px;
border-radius:30px;
cursor : pointer;
}
#t3{width:200px;
font-family:Comic Sans MS;
height:50px;
font-size:150%;
border:1 px solid green;
position:absolute;
top:400px;
left:800px;
border-radius:30px;
cursor : pointer;
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
<body>
<?php
$nameerr="";
$name="";
$username=$usererr=$email=$emailerr=$password=$passworderr=$user_type=$user_typeerr="";


if(empty($_POST["username"]))
$usererr="*Username Required";
else
{$_SESSION["username"]=$username=$_POST["username"];
if (!preg_match("/^[a-zA-Z ]*$/",$username)) {
      $usererr = "Only letters and white space allowed"; 
      $username="";
    }
}

if(empty($_POST["password"]))
$passworderr="&nbsp;&nbsp;&nbsp;&nbsp; *Password Required";
else
$_SESSION["password"]=$password=$_POST["password"];

if(empty($_POST["user_type"]))
$user_typeerr="*User type is required";
else
$_SESSION['user_type']=$user_type=$_POST["user_type"];

?>
<div class=t1>
<pre><h1 style="text-align:center;font-size:300%;font-family: Roboto, sans-serif; color : white;">Library Portal</h1></pre><pre style="font-size:200%"><form method="post" id="mrrobot" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" >     <input type="text" class="x" placeholder="Username" title="your username" name="username">   <span style="color:white;font-size:50%;font-family:Roboto;"><?php echo $usererr; ?></span>

     <input type="password" class="x" placeholder="Password" name="password" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" title="Must contain at least one number and one uppercase and lowercase letter, and at least 8 or more characters" required> <span style="color:white;font-size:50%;font-family: Roboto;">&nbsp; <?php echo $passworderr; ?></span>

        <input type="radio" name="user_type" value="user" style="font-family:Comic sans ms;">&nbsp;User   <input type="radio" name="user_type" value="admin" style="font-family:Comic sans ms;">&nbsp;Admin    <span style="color:white;font-size:50%;font-family: Roboto;"><?php echo $user_typeerr; ?></span>
<input type="submit" value="Login" id="t2">
</form>
</pre>
</div>
<form action="test1.php" >
<input type="submit" value="Register" id="t3">
</form>
<?php
if(($username!="")&&($password!="")&&($user_type!=""))
{$conn=new mysqli("localhost","id6457760_root","password","id6457760_library");
$sql="SELECT password,user_type,name FROM members WHERE username='$username';";
$result=$conn->query($sql);
$row=$result->fetch_assoc();
$_SESSION['name']=$row['name'];
$y=$row['password'];
$z=$row['user_type'];


if(($password==$y)&&($user_type==$z))
 echo "<script> window.location.assign('pp.php'); </script>";
else if (($username!="")&&($password!=""))
{echo '<script language="javascript">';
echo 'alert("Wrong username or password or usertype. Please register")';
echo '</script>';
}
$username="";
$password="";

}


?>
<?php $_SESSION['mrrobot']=0 ?>
</body>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script>
    $(document).ready(function(){ 
	$('body').find('img[src$="https://cdn.rawgit.com/000webhost/logo/e9bd13f7/footer-powered-by-000webhost-white2.png"]').remove();
    }); 
</script>
</html>