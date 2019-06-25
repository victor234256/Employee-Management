<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Table</title>
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">

</head>

<body>
    <h1 id="topic" class="text-center">EMPLOYEE MANAGEMENT TABLE</h1>
    <p class="text-danger"> <?php echo @$_GET['deleted']; ?></p><!--   the @sign tell the query to get the SUPER GLOBAL VARIABLE OF DELECTED even though it has not being declare-->
    <p class="text-danger"> <?php echo @$_GET['updated']; ?></p>
    <p class="text-danger"> <?php echo @$_GET['inputed']; ?></p>
    <div class="container bg-white p-5">

        <div class="row">
            <div class="col-sm-6">
                <form action="table.php" method="GET">

                    <div class="form-group col-sm-6">
                        <input type="text" name="insert_into" placeholder="Employee Name/SSN" class="form-control">
                    </div>
                    <div class="col-sm-6" style="margin-left:-25px;">
                        <input type="submit" name="search" value="Search" class="btn btn-primary">
                    </div>



                </form>
            </div>
            <div class="col-sm-4 col-sm-offset-2 text-right">
                <a input type="button" class="btn btn-success form-control lead" href="insert.php">Click To Insert</a>
            </div>
        </div>
        <div class="table-responsive">
            <table class="table table-striped table-bordered table-hover">

                <?php
    $connection=mysqli_connect("localhost","root","","project1");
    if(isset($_GET['search'])){
    $search_for = $_GET['insert_into'];
    $execute="SELECT * FROM emt WHERE empname='$search_for' OR ssn='$search_for'";
    $query=mysqli_query($connection,$execute);  
   
    while($tableRow=mysqli_fetch_array($query)){
            $ID = $tableRow['id'];
            $EMN = $tableRow['empname'];
            $SSN = $tableRow['ssn'];
            $DEPT = $tableRow['dept'];
            $SALARY = $tableRow['salary'];
            $HOMEADD = $tableRow['homeadd'];
   
    ?>
                <tr class="bg-secondary">
                    <th>ID</th>
                    <th>EMPLOYEE NAME</th>
                    <th>SOCIAL SECURITY NUMBER</th>
                    <th>DEPARTMENT</th>
                    <th>SALARY</th>
                    <th>HOME ADDRESS</th>
                    <th>DELETE</th>
                    <th>UPDATE</th>
                </tr>
                <tr>
                    <td><?php echo $ID; ?></td>
                    <td><?php echo $EMN; ?></td>
                    <td><?php echo $SSN; ?></td>
                    <td><?php echo $DEPT; ?></td>
                    <td><?php echo $SALARY; ?></td>
                    <td><?php echo $HOMEADD; ?></td>
                    <td class="del text-white"><a href="delete.php?Delete=<?php echo $ID; ?>">Delete</a></td><!-- we used  the serach query of ?delete to target the id because it is save as primary key in our databass. so each id govern the whole data in the row.-->
                    <!--                <td><a href="update.php?update=<?php echo $ID; ?>">Update</a></td>-->
                    <td class="upd text-white"><a href="update.php?update=<?php echo $ID; ?>">Update</a></td>
                </tr>
            </table>
        </div>
        <?php 
        }
    }
    ?>



    </div>
    <div class="container bg-white p-5 table-responsive">


        <table class="table table-striped table-bordered table-hover">
            <h2 class="iq text-center">SQL Table fetching Data from the Database</h2>

            <tr>
                <th>ID</th>
                <th>EMPLOYEE NAME</th>
                <th>SOCIAL SECURITY NUMBER</th>
                <th>DEPARTMENT</th>
                <th>SALARY</th>
                <th>HOME ADDRESS</th>
                <th colspan="2" class="text-center">OPTION</th>

            </tr>
            <?php 
      $connection=mysqli_connect("localhost","root","","project1");
      $select = 'SELECT * FROM emt';
      $query = mysqli_query($connection,$select);
      while($Tabledata = mysqli_fetch_array($query)){
          $ID = $Tabledata['id'];
          $EMP = $Tabledata['empname'];
          $SSN = $Tabledata['ssn'];
          $DEPT = $Tabledata['dept'];
          $SALARY = $Tabledata['salary'];
          $HOMEADD = $Tabledata['homeadd'];
      
      
      ?>
            <tr>
                <td><?php echo $ID; ?></td>
                <td><?php echo $EMP; ?></td>
                <td><?php echo $SSN; ?></td>
                <td><?php echo $DEPT; ?></td>
                <td><?php echo $SALARY; ?></td>
                <td><?php echo $HOMEADD; ?></td>
                <td class="del text-white"><a href="delete.php?Delete=<?php echo $ID; ?>">Delete</a></td><!-- we used  the serach query of ?delete to target the id because it is save as primary key in our databass. so each id govern the whole data in the row.-->
                <!--                <td><a href="update.php?update=<?php echo $ID; ?>">Update</a></td>-->
                <td class="upd text-white"><a href="update.php?update=<?php echo $ID; ?>">Update</a></td>
            </tr>
            <?php } ?>
        </table>
    </div>


    <div class="footer">
        <div class="sub-footer pt-5">
            <p class="text-center  text-white" id="foot">All Right Reserved........Designed by Jimoh Victor</p>
        </div>
    </div>
</body>

</html>