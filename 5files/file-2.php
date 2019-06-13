<!DOCTYPE html>
<html>
<body>
<h1>Html works in PHP files</h1>
<?php
$t = date("H");

if ($t < "20") {
    echo "Have a good day!";
} else {
    echo "Have a good night!";
}
?>
 
</body>
</html>
