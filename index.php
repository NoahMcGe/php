<?php
echo "<h1>";
echo "<center>Frozen</center>";
echo "<hr />";
echo "<center><a href = \"test.php\">PHP Testing</a></center>";
echo "</h1>";


for ($x = -15; $x <= 15; $x++) {
    echo "<center>$x </center>";
	if ($x!= 0 &&  $x %5==0) echo "<br> ";
}
?>
