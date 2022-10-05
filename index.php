<html>
<form action="index.php" method="post">
<input type="url" placeholder="Image URL" name="imgurl" />
<input type="submit" value="Submit" />
</form>


<?php
if (isset($_POST['imgurl'])) {

   if(!extension_loaded('gd')){
     throw new Exception("GD Image Library not installed");
    }

   echo "URL: " . $_POST['imgurl'];
   $raw = file_get_contents($_POST['imgurl']);
   $im  = imagecreatefromstring($raw);
   $newloc = "image-" . time() . ".png";
   imagepng($im, $newloc);
   echo "<br />";
   echo "<img src='". $newloc . "'><br />";
   echo "<a href='" . $newloc .  "'>Download PNG here</a>";
}
?>

</body>
</html>
