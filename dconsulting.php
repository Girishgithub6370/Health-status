<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="patient.css">
</head>
<body>

<?php
        if($_SERVER['REQUEST_METHOD']=="POST"){
            $e=1;
            $lid="";
            include "connect.php";
            session_start();
            $id=$_SESSION['idd'];
            
            $flag=1;
            $d=$_POST['date'];
            
           if(empty($d)){
                $derror="Please Enter the date";
                $e=0;
                
           }
           else{
            $d=str_replace("-","/",$d);
            $td = date("Y/m/d");
            if($d<$td){
                $derror="Please Enter valid date date";
                $e=0;
            }
           }
           

           if($e==1){
            $day=date('l',strtotime($d));
            $sql="SELECT * FROM l1 WHERE userid='$id' AND $day='1'";
            $res=mysqli_query($con,$sql);
            
            $num=mysqli_num_rows($res);
            if($num>0){
                    $row=mysqli_fetch_array($res);
                    $lid = $row['lid'];
                    $d=str_replace('-','/',$d);
                    $_SESSION['lid']=$lid;
                    $_SESSION['d']=$d;
                    header("Location:dctable.php");

                }
                else{
                    echo "<script>alert('You have not registered any schedule at this date.')</script>";
                }
           }
           
           
                
           
                
        }
?>
    <div class="container">
       
        <form id="Form1" action="dconsulting.php" method="post" enctype="multipart/form-data">
            
            <h3 class="heading">Consult List Details</h3>
            <input type="date" name="date">
            <p><?php if(isset($derror)){ echo $derror;}?></p>
            <p><?php if(isset($err)){ echo $err;}?></p>
            

            <div class="btn-box">
                <input type="submit" value="Submit" class="submit">
                
            </div>
        </form>
    </div>
    
    
</body>
</html>