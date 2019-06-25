<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Connection</title>
</head>
<body>
 <?php
    $connection=mysqli_connect("localhost","root","","project1");
    if($connection){
        echo "Database Connected <br>";
    }
    else{
        error.mysqli_connect();
    }
    $selected = mysqli_select_db($connection,"project1");
    if($selected){
        echo "Database selected";
    }
    else{
        error.mysql_select_db();
    }
    
 ?>   
</body>
</html>