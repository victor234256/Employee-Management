<?php 
$connection=mysqli_connect("localhost","root","","project1");
// $selected = mysqli_select_db($connection,"project1");
$delet_id = $_GET['Delete'];   //that is get the id of delete inside table.php file;
 $delet_box = "DELETE FROM emt WHERE id='$delet_id'";
$del_Query = mysqli_query($connection,$delet_box);
if($del_Query){
    echo '<script>window.open("table.php?deleted=successfully deleted","_self")</script>';
}



?>