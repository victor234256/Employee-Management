<?php 
$EmpError = "";
$SSNerror ="";
$DeptError ="";
if(isset($_POST["submit"])){
    if(empty($_POST["Emp"])){
        $EmpError = "Employee name required";
    }
    else{
        $Empn = myFunction($_POST["Emp"]);
    }
    if(empty($_POST["SSN"])){
        $SSNerror = "Social Security Number Required";
    }
    else{
        $SSN = myFunction($_POST["SSN"]);
    }
    if(empty($_POST["Dept"])){
        $DeptError = "Department is Required";
    }
    else{
        $Dept = myFunction($_POST["Dept"]);
    }
    if(!empty($_POST["Emp"]) && !empty($_POST["SSN"]) && !empty($_POST["Dept"])){
    $Empn = $_POST["Emp"];
    $SSN = $_POST["SSN"];
    $Dept = $_POST["Dept"];
    $Salary = $_POST["Salary"];
    $HomeAdd = $_POST["HomeAdd"];
    $connection = mysqli_connect("localhost","root","","project1");
//    if(!$connection){
//        die("Not connected" . mysqli_connect_error());
//    }
//    else {
//        echo "connection succesful";
    //}
//    if(mysqli_query($connection,$selected)){
//        echo "new data suceessfully inserted";
//    }
//    else{
//        echo"wrong format";
//    }
    $DB = "INSERT INTO emt(empname,ssn,dept,salary,homeadd)VALUES('$Empn','$SSN','$Dept','$Salary','$HomeAdd')";
    if(mysqli_query($connection,$DB)){
        echo '<h2 class="success"><script>window.open("table.php?inputed=Information inserted successfully","_self")</script></h2>';
    }
   
    else{
        echo mysqli_error($connection);
    }
    }
    else{
        echo '<h2 class="text-white">Please fill the required space</h2>';
    }
   
}

function myFunction($emt){
    return $emt;
}

?>




<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Insert</title>
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link href="css/style.css" rel="stylesheet">
</head>

<body>
    <h1 class="text-center p-3" id="topic">EMPLOYEE MANAGEMENT APPLICATION</h1>
    <div class="container">
        <form action="insert.php" method="post" class="form p-4 mx-5" id="form">
            <div class="form-group">
                <label for="">Employee Name:</label>
                <input type="text" name="Emp" class="form-control">
                <span class="error">*<?php echo $EmpError; ?></span>
            </div>
            <div class="form-group">
                <label for="">Social Security Number:</label>
                <input type="text" name="SSN" class="form-control">
                <span class="error">*<?php echo $SSNerror; ?></span>
            </div>
            <div class="form-group">
                <label for="">department:</label>
                <input type="text" name="Dept" class="form-control">
                <span class="error">*<?php echo $DeptError; ?></span>
            </div>
            <div class="form-group">
                <label for="">Salary:</label>
                <input type="text" name="Salary" class="form-control">
            </div>

            <div class="form-group">
                <label for=" :">Home Address</label>
                <textarea name="HomeAdd" class="form-control" rows="5"></textarea>
            </div>
            <input type="submit" name="submit" class="btn btn-primary" value="Submit">

        </form>
    </div>
    
    
</body>

</html>
