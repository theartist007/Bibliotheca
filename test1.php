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
.x{width: 500px;
    height: 45px;
   border-top:none;
border-left:none;
border-right:none;
   font-family:Comic Sans Ms;
border-bottom:2px solid white;
font-size:50%;
  background: transparent; 
color:white;
   }
div.y{width:750px;
      height:650px;
padding-left:50px;
      border:1px solid green;
position:absolute;
left:300px;
opacity:0.9;
top:30px;
color:white;
background-image:url('back1.jpg');
border-radius:30px;
     }
#z{width:150px;
height:50px;
font-size:50%;
position:absolute;
top:550px;
border-radius:30px;
cursor : pointer;
}
#t3{width:150px;
height:50px;
font-size:150%;
position:absolute;
top:580px;
left:900px;
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
if(empty($_POST["name"]))
$nameerr="*Name Required";
else
{$name=$_POST["name"];
if (!preg_match("/^[a-zA-Z ]*$/",$name)) {
      $nameerr = "Only letters and white space allowed"; 
      $name="";
    }
}
if(empty($_POST["email"]))
$emailerr="*Email Required";
else
{$email=$_POST["email"];
 if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
      $emailerr = "Invalid email format"; 
      $email="";
    }
}
if(empty($_POST["username"]))
$usererr="*Username Required";
else
{$username=$_POST["username"];
if (!preg_match("/^[a-zA-Z ]*$/",$username)) {
      $usererr = "Only letters and white space allowed"; 
      $username="";
    }
}
if(empty($_POST["password"]))
$passworderr="*Password Required";
else
$password=$_POST["password"];
if(empty($_POST["user_type"]))
$user_typeerr="*User type is required";
else
$user_type=$_POST["user_type"];
?>
<div class='y'>
<h1 style="text-align:center; font-size:300%; font-family : Roboto;">Registration Form</h1><pre style="font-size:275%"><form method="post" id="mrrobot" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>"><input type="text" class="x" placeholder="Name" name="name"> <span style="color:white;font-size:50%;"><?php echo $nameerr; ?></span>

<input type="text" class="x" placeholder="Email" name="email"> <span style="color:whitered;font-size:50%;"><?php echo $emailerr; ?></span>

<input type="text" class="x" placeholder="Username" name="username"> <span style="color:white;font-size:50%;"><?php echo $usererr; ?></span>

<input type="password" class="x" placeholder="*********" name="password" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" title="Must contain at least one number and one uppercase and lowercase letter, and at least 8 or more characters" required> <span style="color:white;font-size:50%;"> <?php echo $passworderr; ?></span>

<input type="radio" name="user_type" value="user">&nbsp;User   <input type="radio" name="user_type" value="admin" >&nbsp;Admin    <span style="color:white;font-size:50%;"><?php echo $user_typeerr; ?></span>
<input type="submit" id="z">
</form>
</pre>
</div>
<form action="index.php" >
<input type="submit" value="Login" id="t3">
</form>
<?php

$conn=new mysqli("localhost" ,"id6457760_root" ,"password" ,"id6457760_library");
if(($name!="")&&($email!="")&&($username!="")&&($password!="")&&($user_type!=""))
{$sql="INSERT INTO members VALUES('$name','$email','$username','$password','$user_type')";
if($conn->query($sql)===TRUE)
{echo '<script language="javascript">';
echo 'alert("Your data has been successfully registered; Thank you")';
echo '</script>';
}
else
{echo '<script language="javascript">';
echo 'alert("sorry this email or username is already registered. Please use another")';
echo '</script>';
}

}

?>

</body>
</html>








