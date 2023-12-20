<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="daccount.css">
    <title>Document</title>
</head>
<body>
    <?php
        session_start();
        $id=$_SESSION['idd'];
        include "connect.php";
        $sql="SELECT * FROM docreg WHERE userid='$id'";
        $res=mysqli_query($con,$sql);
        $row = mysqli_fetch_array($res);
        
    ?>
    <div class="wrapper">
        <div class="left">
        <img src="neurology2.jpg" alt="user" width="100">
        <h4>Dr. <?php echo $row['username'] ; ?></h4>
        <p><b><?php echo $row['special']  ; ?></b></p>
    </div>
    <div class="right">
        <div class="info">
            <h3>Contact Details</h3>
            <div class="info-data">
                <div class="data">
                    <h4>Email</h4>
                    <p><?php echo $row['mail']; ?></p>
                </div>
                <div class="data">
                    <h4>Phone</h4>
                    <p><?php echo $row['phone']; ?></p>
                </div>
            </div>
        </div>
        <div class="degree">
            <h3>Qualification</h3>
            <div class="degree-data">
                <div class="data">
                    <h4>Degree</h4>
                    <p><?php echo $row['degree']; ?></p>
                </div>
                <div class="data">
                    <h4>Specialisation</h4>
                    <p><?php echo $row['special']; ?></p>
                </div>
            </div>
        </div>
    </div>
    </div>
</body>
</html>