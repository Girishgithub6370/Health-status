<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="forgot.css">
    <title>Document</title>
</head>
<body>
    <?php
    include "connect.php";
        
        $c=1;
        if($_SERVER['REQUEST_METHOD']=="POST"){
            session_start();
            
            $fc=$_SESSION['forgotc'];
            $fid=$_POST['name'];
            
            
            
            if(empty($fid)){
                $cerr="Please enter the user details";
                $c=0;
            }
            if($c==1){

                if($fc=='p'){
                    $sql="SELECT * FROM patient WHERE userid='$fid' OR email='$fid' OR number='$fid'";
            $res=mysqli_query($con, $sql);
            $row=mysqli_fetch_array($res);
            $num=mysqli_num_rows($res);
            if($num<1){
                $cerr="This user is not registered in the website";
            }
            else{
                $str="0123456789";
                $rst=substr(str_shuffle($str),0,6);
                $_SESSION['rst']=$rst;
                $id=$row['userid'];
                $_SESSION['oid']=$id;
                $mail=$row['email'];
                    $to=$mail;
                    $subject="One Time Password";
                    $message="Hello ! Thiis is Your One time Password : ".$rst;
                    $from="kumargirish6370@gmail.com";
                    
                    mail($to, $subject, $message, $from);
                header("Location:otp.php");
            }
                }
                else{
                    $sql="SELECT * FROM docreg WHERE userid='$fid' OR mail='$fid' OR phone='$fid'";
            $res=mysqli_query($con, $sql);
            $row=mysqli_fetch_array($res);
            $num=mysqli_num_rows($res);
            if($num<1){
                $cerr="This user is not registered in the website";
            }
            else{
                $str="0123456789";
                $rst=substr(str_shuffle($str),0,6);
                $_SESSION['rst']=$rst;
                $id=$row['userid'];
                $_SESSION['oid']=$id;
                $mail=$row['mail'];
                    $to=$mail;
                    $subject="One Time Password";
                    $message="Hello ! Thiis is Your One time Password : ".$rst;
                    $from="kumargirish6370@gmail.com";
                    
                    mail($to, $subject, $message, $from);
                header("Location:otp.php");
            }
                }
                
    }
            }
            
    ?>
<div class="container">
       
       <form id="Form1" action="forgot.php" method="post" enctype="multipart/form-data">
           
           <h3 class="heading">Forgot USer Id / Password</h3>
           
           <input type="text" placeholder="Enter User Id/ Mail Id/ Mobile number" name="name">
           
           <p><?php if(isset($cerr)){ echo $cerr ; }  ?></p>
           <div class="btn-box">
                <input type="submit" value="Submit" class="submit" name="Submit">
               
           </div>
          
           

       </form>
</body>
</html>