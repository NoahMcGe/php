<?php
// Initialize the session
session_start();
 
// Check if the user is logged in, if not then redirect him to login page
if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
    header("location: login.php");
    exit;
}
?>
 
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>:) lol</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.css">
    <style type="text/css">
        body{ font: 14px sans-serif; text-align: center; }
    </style>
    <style>
* {
    box-sizing: border-box;
}

body {
    margin: 0;
    font-family: Arial;
    font-size: 17px;
}
a {
	font-weight: bold;
	font-size: 20px;
}

#myVideo {
    position: fixed;
    right: 0;
    bottom: 0;
    min-width: 100%; 
    min-height: 100%;
    z-index: -1;
}

.content {
    position: fixed;
    bottom: 0;
    background: rgba(0, 0, 0, 0.5);
    color: #f1f1f1;
    width: 100%;
    padding: 20px;
}

#myBtn {
    width: 200px;
    font-size: 18px;
    padding: 10px;
    border: none;
    background: #000;
    color: #fff;
    cursor: pointer;
}

#myBtn:hover {
    background: #ddd;
    color: black;
}
</style>
<style>
html{
 font-family: system-ui, sans-serif;
}

body{
    background-color: #fff;
    color: #2aa198;
   font-family: system-ui, sans-serif;
}
a{
  color: #268bd2;
  text-decoration: none;
}

a:hover{
  color: #2aa198;
}

.location{
  position:absolute;
  top:15rem;
  left:10%;
  font-family: system-ui , sans-serif;
  background-color: rgba(255, 255, 255, 0.4) ;
  //opacity: 0.5;
  color: #2aa198;
  border: solid 5px;
  border-style: solid;
  border-color: #586e75;
  border-radius: 30px;
  padding : 10px;

}
.location2{
  position:absolute;
  top:15rem;
  left:50%;
  font-family: system-ui , sans-serif;
  background-color: rgba(255, 255, 255, 0.4) ;
  //opacity: 0.5;
  color: #2aa198;
  border: solid 5px;
  border-style: solid;
  border-color: #586e75;
  border-radius: 30px;
  padding : 10px;

}

/*
base03    #002b36
base02    #073642
base01    #586e75
base00    #657b83
base0     #839496
base1     #93a1a1
base2     #eee8d5
base3     #fdf6e3
yellow    #b58900
orange    #cb4b16
red       #dc322f
magenta   #d33682
violet    #6c71c4
blue      #268bd2
cyan      #2aa198
green     #859900
*/
</style>
</head>
<body><img src = "/img/noah-logo.png" style="padding-left:1rem;height:150px;float:left;">
    <div class="page-header">
        <h1>Hi, <b><?php echo htmlspecialchars($_SESSION["username"]); ?></b>. Welcome HEHE XD.</h1>
    </div>
    <p>
		<div style="float:right;padding-left:1rem;padding-right:3rem;">
        <a href="reset-password.php" class="btn btn-warning">Reset Your Password</a></div><div style="float:right;padding-bottom:5rem;">
        <a href="logout.php" class="btn btn-danger">Sign Out of Your Account</a></div>
    </p>

    
    <?php  
// this is php  

$_SESSION['pagename'] = "noah index";

// turn php off 
?>
	<video autoplay muted loop id="myVideo">
  <source src="/video/1.mp4" type="video/mp4" style= z-index: -1;>
  Your browser does not support HTML5 video.
</video>

<script>
var video = document.getElementById("myVideo");
var btn = document.getElementById("myBtn");

function myFunction() {
  if (video.paused) {
    video.play();
    btn.innerHTML = "Pause";
  } else {
    video.pause();
    btn.innerHTML = "Play";
  }
}
</script>

&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
<div class = "location" style="padding-left:4rem;padding-top:4rem;padding-bottom:3rem;padding-right:4rem;">
	<div class="op">

<?php
//error_reporting(0);
error_reporting(E_ALL);
ini_set('display_errors', 1);
//


//
$count = 0;
$filelist = array();
$filename = array();
$imgname = array();
if ($handle = opendir('.')) {
  while (false !== ($file = readdir($handle))){
    if ($file != "." &&  $file != "welcome.php" &&  $file != ".htaccess" &&  $file != "upload.php" &&  $file != "logout.php"  &&  $file != "config.php" &&  $file != "register.php" &&  $file != "reset-password.php" &&  $file != "login.php"){
      $imgname[$count] = "file.png";
      			if (false === strpos((string)$file ,'.'))$imgname[$count] = "folder.png";
      $filelist[$count] = $file;
      if ($file == ".."){
        $file = "RETURN TO PARENT FOLDER";
      }
        $filename[$count] = $file;
        $count = $count + 1;
      }
    }
    closedir($handle);
  }
?>

<?php
//rsort($filelist);
//rsort($filename);
// search for ".."
$parent = -1;
$urgent = -1;
for ($i = 0; $i < sizeof($filelist);$i++){
//  echo " $i ";
//  echo "   ";
//  echo " $filelist[$i] ";
  if ($filelist[$i] == ".."){
    $parent = $i;
	}
	if ($filelist[$i] == "* Urgent Must Read.pdf"){
		$urgent = $i;
	  }
//  echo "<br />";

}

for ($i = 0; $i < sizeof($filelist);$i++){
  if ($i == $parent || $i == $urgent) continue;
  echo "<img src = '/img/".$imgname[$i]."'s  style = 'width:20px;'>";
  echo "<a href = '"."$filelist[$i]"."'>"."$filename[$i]"." </a><br>";
}
echo "<br /><a href = '"."$filelist[$parent]"."'>"."<img src = '/img/back.png' style='height:30px;'></a>";
echo "&nbsp;<a href = '"."$filelist[$parent]"."'>"."$filename[$parent]"."</a>";
?>
<br /> <br />

	</div>
</div>

   <div class="location2" style="float:right;">
<form action="upload.php" method="post" enctype="multipart/form-data">
    Select image "Meme" to upload:
    <input type="file" name="fileToUpload" id="fileToUpload">
    <input type="submit" value="Upload Meme" name="submit" style="float:left;">
</form>

</body>
</html>
