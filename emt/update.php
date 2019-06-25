<?php 
$EmpError = "";
$SSNerror ="";
$DeptError ="";

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

function myFunction($myData){
    return $myData;
}
 $connection=mysqli_connect("localhost","root","","project1");
 $selected=mysqli_select_db($connection,"project1");
$getUPDATE=$_GET['update'];
$update="SELECT * FROM emt WHERE id='$getUPDATE'";
$execute=mysqli_query($connection,$update);
while($data=mysqli_fetch_array($execute)){
    $Update_id=$data['id'];
    $EMPN=$data['empname'];
    $SSn=$data['ssn'];
    $DEPT=$data['dept'];
    $SALARY=$data['salary'];
    $HOMEADD=$data['homeadd'];
    
}


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Update table</title>
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link href="css/style.css" rel="stylesheet">
    </head>
    
<body>
<!-- <h3 class="text-danger"> <?php //echo @$_GET['updated']; ?></h3>-->
  <h1 class="text-center p-3" id="topic">EMPLOYEE MANAGEMENT APPLICATION</h1>
   <div class="container">
    
           <form action="update.php?Update_id=<?php echo $Update_id; ?>" method="post" class="form p-4 mx-5" id="form">
           <div class="form-group">
               <label for="">Employee Name:</label>
               <input type="text" name="Emp" class="form-control" value="<?php echo $EMPN;?>">
               <span class="error">*<?php echo $EmpError; ?></span>
           </div>
           <div class="form-group">
               <label for="">Social Security Number:</label>
               <input type="text" name="SSN" class="form-control" value="<?php echo $SSn;?>">
               <span class="error">*<?php echo $SSNerror; ?></span>
           </div>
              <div class="form-group">
               <label for="">department:</label>
               <input type="text" name="Dept" class="form-control" value="<?php echo $DEPT;?>">
               <span class="error">*<?php echo $DeptError; ?></span>
           </div>
           <div class="form-group">
               <label for="">Salary:</label>
               <input type="text" name="Salary" class="form-control" value="<?php echo $SALARY;?>">
           </div>
          
           <div class="form-group">
               <label for=" :">Home Address</label>
               <textarea name="HomeAdd" class="form-control" rows="5" ><?php echo $HOMEADD;?></textarea>
           </div>
           <input type="submit" name="submit" class="btn btn-primary" value="Submit">
           
       </form>
   </div> 
</body>


<?php 
   $connection=mysqli_connect("localhost","root","","project1");
     $selected = mysqli_select_db($connection,"project1");
    if(isset($_POST['submit'])){
        $Update_id=$_GET['Update_id'];
        $Empn=$_POST['Emp'];
        $SSN=$_POST['SSN'];
        $Dept=$_POST['Dept'];
        $Salary=$_POST['Salary'];
        $HomeAdd=$_POST['HomeAdd'];
         $udate="UPDATE emt SET empname='$Empn',ssn='$SSN',dept='$Dept',salary='$Salary',homeadd='$HomeAdd' WHERE id='$Update_id'";
        $query=mysqli_query($connection,$udate);
         if($query){
            function redirect($location){
             header("Location:" . $location);
            exit;
        }
        redirect("table.php?updated='It has been updated successfully'");
    }
        else {
            echo "wrong";
        }
    
    }
    else {
 echo "wrong statement";    }
?>

</html>