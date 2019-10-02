

<html>
<head>
<title>OpenDR-Noah</title>
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
  top:110px;
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
<body>
	<?php  
// this is php  
session_start();// start a session 
$_SESSION['pagename'] = "noah index";

// turn php off 
?>
	<video autoplay muted loop id="myVideo">
  <source src="/video/house.mp4" type="video/mp4" style= z-index: -1;>
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

&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<img src = "/img/noah-logo.png" style="padding:1rem;height:150px;">
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
    if ($file != "." &&  $file != "index.php" &&  $file != ".htaccess" ){
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
<h1><center>
</center></h1>
</body>
</html>
