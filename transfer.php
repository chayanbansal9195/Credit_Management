<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>Transfer</title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">
    </head>
<body>
<div class="container" style="margin-top:30px">
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
    <a class="btn btn-warning" href="index.php" role="button">Home Page</a>
    

        
        <h2 style="margin-left:310px;">Transfer Credit</h2>
       <a href="Users.php"style="margin-left:auto; color:black;"> <i class="fas fa-arrow-circle-left" ></i></a>
        
    </nav>
<br>
    <form action="" method="post">
    <div class="row justify-content-md-center">
    <div class="form-group">
    <table class="table table-striped" >   
        <tr>
            <td align="left">Form</td>
            <td>
                <select  class="form-control" name="from_user" id="">
                    <?php 
                    include ('dbcon.php');
                        $sql = "select * from user";
                        $run = mysqli_query($con, $sql);
                        while($data = mysqli_fetch_assoc($run)){
                            ?>
                            <option value="<?php echo $data['name']?>">
                                <?php echo $data['name']?>
                                </option>
                            <?php
                        }
                    ?>
                    
                </select>
            </td>
        </tr>
        <tr>
            <td align="left">To</td>
            <td>
                <select class="form-control" name="to_user" id="">
                    <?php 
                    include ('dbcon.php');
                        $sql = "select * from user";
                        $run = mysqli_query($con, $sql);
                        while($data = mysqli_fetch_assoc($run)){
                            ?>
                            <option selected value="<?php echo $data['name']?>">
                                <?php echo $data['name']?>
                                </option>
                            <?php
                        }
                    ?>
                    
                </select>
            </td>
        </tr>
        <tr>
            <td>    
                credit
            </td>
            <td>
            <input type="number" name="credit" style="width:100px;" required>
            </td>
        </tr> 
        <tr >
                <td ><button style="margin-left:80px" type="Submit" name="Submit" class="btn btn-success">Transfer</button></td>
            </tr>       
        </table>
    </form>
</body>
</html>

<?php
    if(isset($_POST['Submit'])==true){
        include ('dbcon.php');

        $from_user=$_POST['from_user'];
        $to_user=$_POST['to_user'];
        $credit=$_POST['credit'];
        $sql = "insert into transfer (From_user,To_user,credit) values('$from_user','$to_user','$credit');";
        $sql .="update user set current_credit=current_credit-$credit where name = '$from_user';";
        $sql .="update user set current_credit=current_credit+$credit where name = '$to_user';";
        $run = mysqli_multi_query($con,$sql );
        if($run){
           ?><script> window.open('Users.php','_self') </script><?php
            }
    }

?>