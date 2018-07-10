<!DOCTYPE html>
<html>
<head>
<style>
#l{display:inline-block;
width:150px;
height:75px;
border-radius:30px;
position:absolute;
top:400px;
left:600px;
cursor : pointer;
}
body{
 background: url('liblogout.jpg') no-repeat center center fixed; 
  -webkit-background-size: cover;
  -moz-background-size: cover;
  -o-background-size: cover;
  background-size: cover;
}
</style>
</head>
<body>
<?php
session_start();
?><br><br>
<h1 style="font-size:300%;text-align:center;font-family:Roboto;color:white;"> You are successfully logged out </h1>
<h2 style="font-size:300%;text-align:center;font-family:Roboto;color:white;"> Thank you for coming.</h2>
<?php session_unset();
session_destroy();
?>
<form action="index.php">
<button id='l'style="font-size:250%;color:black;font-family:Roboto;text-decoration:none;">Login</button>
</form>