<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>User</title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">
    </head>
<body>
<div class="container" style="margin-top:30px">
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
    <a class="btn btn-warning" href="index.php" role="button">Home Page</a>
    

        
        <h2 style="margin-left:310px;">View Individual User</h2>
       <a href="Users.php"style="margin-left:200px; color:black;"> <i class="fas fa-arrow-circle-left" ></i></a>
        <a class="btn btn-primary" href="transfer.php" role="button" style="margin-left:auto">Transfer Credit</a>
    </nav>

<?php
?>
<br>
<table class="table table-striped " >
<thead align="center">
            

            <tr class="table-dark">
            <th>Email</th>
            <th>Current Credit</th>
            <th>View</th>  
            </tr>
           
    <?php
        include('dbcon.php');

        $sid = $_GET['sid'];
        $sql = "select * from user where email= '$sid'";
        $run = mysqli_query($con,$sql);
        $data = mysqli_fetch_assoc($run);
            ?>
               <tr class="table-info">
            <td><?php echo $data['name']?></td>
            <td><?php echo $data['email']?></td>
            <td><?php echo $data['current_credit']?></td>
            
            </tr>
            <?php
    
    ?>
        </table>
        
</body>
</html>