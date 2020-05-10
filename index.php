<meta name="viewport" content="width=device-width, initial-scale=1">
<?php 

session_start(); /* Starts the session */

    if(!isset($_SESSION['UserData']['Username'])){
       header("location:login.php");
       exit;
   }

?>
<center>
<a href="logout.php">Logout</a>
<a href="add_file.php">เพิ่มไฟล์</a>
</center>
<?php
$d = dir("./file/");
while (($file = $d->read()) !== false){
    echo '<center><h1>'.$file.'</h1></center>';
    echo '<center><audio controls><source src="file/'.$file.'" type="audio/mpeg"></audio></center>';
    echo "<br>";
  }

$d->close();
?>