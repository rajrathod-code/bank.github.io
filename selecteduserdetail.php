<?php
include("config.php");
if(isset($_POST['submit']))
{
    $from = $_GET['id'];
    $to = $_POST['to'];
    $amount = $_POST['amount'];

    $qry = "SELECT * FROM users WHERE id=$from";
    $run = mysqli_query($con,$qry);
    $result1 = mysqli_fetch_assoc($run);

    $qry = "SELECT * FROM users WHERE id=$to";
    $run =mysqli_query($con,$qry);
    $result2 =mysqli_fetch_assoc($run);

    if($amount<0)
    {
        echo "

            <script type='text/javascript'>
                alert('Negative Values is not allowed');
            </script>

        ";
    }
    elseif ($amount > $result1['balance']) {
        echo "

            <script type='text/javascript'>
                alert('Bad Luck! insufficinet Fund..!');
            </script>

        ";
    }
    elseif($amount==0)
    {
        echo "

        <script type='text/javascript'>
            alert('Zero Value is not to be Transferd.');
        </script>

    ";

    }
    else
    {
        $newbalance = $result1['balance']-$amount;
        $qry = "UPDATE users set balance = $newbalance WHERE id = $from";
        mysqli_query($con,$qry);


        $newbalance = $result2['balance'] + $amount;
        $qry = "UPDATE users set balance = $newbalance WHERE id = $to";
        mysqli_query($con,$qry);

        $sender = $result1['name'];
        $receiver = $result2['name'];
        $qry = "INSERT INTO transaction(`sender`, `recevier`, `balance`) VALUES ('$sender','$receiver','$amount')";
        $query=mysqli_query($con,$qry);

        if($query){
             echo "<script> alert('Transaction Successful');
                             window.location='transactionhistory.php';
                   </script>";
            
        }

        $newbalance= 0;
        $amount =0;

    }

}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Bootstarp CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
    <style type="text/css">
      button{
        transition: 1.5s;
        border: 3px solid black;
        
        border-radius: 9px;
      }
    
    </style>
    <title>Selected User Page</title>
</head>
<body>
    <div class="container">
        <div style="display:flex;
        align-items: center;
        justify-content: center;">
         <div>
            <h2 class="text-center pt-4">Transaction</h2></div>
        <div>
        <button style="margin-left: 500px;margin-top: 20px; width: 30%;"> <a style="color: black;" href="transfermoney.php"> Back</a></button></div>
       
    </div>
        <?php
            include("config.php");
            $sid=$_GET['id'];
            $qry = "SELECT * FROM users WHERE id=$sid";
            $run = mysqli_query($con,$qry);
            if(!$run)
            {
                echo "ERROR:".$qry."<br>".mysqli_error($con);
            }
            $rows = mysqli_fetch_assoc($run);
        ?>

        <form  method="post" name="tcredit" class="table-text"><br>
            <div>
            <table class="table table-striped table-condensed table-bordered">
                <tr>
                    <th class="text-center">Id</th>
                    <th class="text-center">Name</th>
                    <th class="text-center">Email Id</th>
                    <th class="text-center">Balance</th>
                </tr>
                <tr>
                    <td class="py-2"><?php echo $rows['id']?></td>
                    <td class="py-2"><?php echo $rows['name']?></td>
                    <td class="py-2"><?php echo $rows['email']?></td>
                    <td class="py-2"><?php echo $rows['balance']?></td>
                </tr>
            </table>
        </div>
        <br><br><br>
            <label>Transfer To:</label>
            <select name="to" class="form-control" required>
            <option value="" disabled selected>Chooes</option>
            <?php
                $sid = $_GET['id'];
                $qry = "SELECT * FROM users WHERE id!=$sid";
                $run = mysqli_query($con,$qry);
                if(!$run)
                {
                    echo "ERROR".$qry."<br>".mysqli_error($con);
                }
                while($rows=mysqli_fetch_assoc($run)){
            ?>
                    <option class="table" value="<?php echo $rows['id']; ?>">
                    <?php echo $rows['name']; ?>
                    (Balance : <?php echo $rows['balance']; ?>)  
                </option>
                <?php
                }
                ?>
                </select>
                <br>
                <br>
                <label>Amount:</label>
                <input type="number" name="amount" class="form-control" required>
                <br><br>
                <div class="text-center">
                    <button class="btn mt-3" name="submit" type="submit" id="myBtn">Trasfer</button>
                </div>
        </form>
    </div>
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>
</body>
</html>