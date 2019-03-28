<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>View All Users</title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="">
    </head>
<body>
<div class="container" style="margin-top:30px">
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
    <a class="btn btn-warning" href="index.php" role="button">Home Page</a>
        
        <h2 style="margin-left:330px;">All The Users</h2>

    </nav>


<?php
?>
<table class="table table-striped table-dark">
<thead>

            <tr>
            <th scope="col">Sl No</th>
            <th scope="col">Name</th>
            <th scope="col">Email</th>
            <th scope="col">Current Credit</th>
            <th scope="col">View</th>  
            </tr>
            </thead>
    <?php
        include('dbcon.php');

        $query = "select * from user";
        $run = mysqli_query($con,$query);
      
            $count = 0;
            while($data = mysqli_fetch_assoc($run)){
                $count++;
                ?>
                <tbody>
                <tr>
            <td><?php echo $count; ?></td>
            <td><?php echo $data['name']?></td>
            <td><?php echo $data['email']?></td>
            <td><?php echo $data['current_credit']?></td>
            <td><a href="user.php?sid=<?php echo $data['email'];?>" >View</a></td>  
            </tr>
            </tbody>
            <?php
            }
    
    ?>
        </table>
</body>
</html>