<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="login2.css">
    <title>Document</title>
</head>
<body>
    <?php
        if($_SERVER['REQUEST_METHOD']=="POST"){
            session_start();
            if(isset($_POST['regist'])){
                if(empty($_POST['pc'])){
                    $error="Select First ";
                }
                else{
                    $check=$_POST['pc'];
                    if($check=="p"){
                        header("Location:patientreg2.php");
                    }
                    elseif ($check=="d") {
                        header("Location:docreg.php");
                    }
                }
            }
            elseif (isset($_POST['Submit'])) {
                if(empty($_POST['pc'])){
                    $error="Select First ";
                }
                else{
                    if(empty($_POST['name']) OR empty($_POST['pass'])){
                    $error="Please enter the details correctly.";
                }
                else{
                    $name=$_POST['name'];
                    $pass=$_POST['pass'];
                    $check=$_POST['pc'];
                    include "connect.php";
                    if($check == "p"){
                        $sql="SELECT * FROM patient WHERE userid='$name' AND passwd='$pass'";
                         $result = mysqli_query($con, $sql);
                         $num=mysqli_num_rows($result);
                        if ($num < 1) {
                        $error="This userid is not registered . ";
                        }
                        else{
                        $_SESSION['idp']=$name;
                        header("Location:Index2.php");
                        
                    }
                    }
                    elseif($check=="d"){
                        $sql="SELECT * FROM docreg WHERE userid='$name' AND pass='$pass'";
                         $res=mysqli_query($con,$sql);
                         $num=mysqli_num_rows($res);
                         $d=1;
                        if ($num < 1) {
                        $error="This userid is not registered . ";
                        }
                        else{
                        $_SESSION['idd']=$name;
                        $date=date("Y/m/d");
                        $ln1=$name.'1';
                        $ln2=$name.'2';
                        $sqll="SELECT * FROM consult WHERE duserid='$ln1' AND doccon='$d' AND payment='0' AND opdate>'$date'";
                        $res1=mysqli_query($con, $sqll);
                        while ($row1 = mysqli_fetch_assoc($res1)) {
                            $id=$row1['puserid'];
                            $cdate=$row1['opdate'];
                            $sqlr="SELECT * FROM consult WHERE duserid='$ln1' AND doccon='$d' AND payment!='0' AND opdate='$cdate'";
                            $resr=mysqli_query($con, $sqlr);
                            $num=mysqli_num_rows($resr);
                            $num=10-$num;
                            $sqlp="SELECT * FROM patient WHERE userid='$id'";
                            $resp=mysqli_query($con, $sqlp);
                            $rowp=mysqli_fetch_array($resp);
                            $to=$rowp['email'];
                            $subject="Consult Reminder.";
                            $message="Hello ".$rowp['username']." ! Your request Accepted by the doctor. \nPLease pay the fees to confirm the booking Only ".$num." are available";
                            $from="kumargirish6370@gmail.com";
                    
                    mail($to, $subject, $message, $from);
                        }
                        $sqll="SELECT * FROM consult WHERE duserid='$ln2' AND doccon='$d' AND payment='0' AND opdate>'$date'";
                        $res1=mysqli_query($con, $sqll);
                        while ($row1 = mysqli_fetch_assoc($res1)) {
                            $id=$row1['puserid'];
                            $cdate=$row1['opdate'];
                            $sqlr="SELECT * FROM consult WHERE duserid='$ln1' AND doccon='$d' AND payment!='0' AND opdate='$cdate'";
                            $resr=mysqli_query($con, $sqlr);
                            $num=mysqli_num_rows($resr);
                            $num=10-$num;
                            $sqlp="SELECT * FROM patient WHERE userid='$id'";
                            $resp=mysqli_query($con, $sqlp);
                            $rowp=mysqli_fetch_array($resp);
                            $to=$rowp['email'];
                            $subject="Consult Reminder.";
                            $message="Hello ".$rowp['username']." ! Your request Accepted by the doctor. \nPLease pay the fees to confirm the booking Only ".$num." are available";
                            $from="kumargirish6370@gmail.com";
                    
                    mail($to, $subject, $message, $from);
                        }
                        header("Location:Index.php");
                    }
                    
                    
                
                }
                }
            }
        }
        if(isset($_POST['forgot'])){
            if(empty($_POST['pc'])){
                $error="Select First ";
            }
            else{
                $_SESSION['forgotc']=$_POST['pc'];
                header("Location:forgot.php");
            }
        }
    }
    ?>
<div class="container">
       
       <form id="Form1" action="login.php" method="post" enctype="multipart/form-data">
           
           <h3 class="heading">Log In</h3>
            <p><?php if(isset($error)){
                    echo $error;
                }?></p>
           <p>Patient Login : <input type="radio" name="pc" value="p" class="pc"> Doctor Login : <input type="radio" name="pc" value="d" class="dc"></p>
           <input type="text" placeholder="User Name" name="name">
           
           <input type="text" placeholder="Password" name="pass">
           
           
           <div class="btn-box">
                <input type="submit" value="Register" class="submit" name="regist">
               <input type="submit" value="Submit" class="submit" name="Submit">
               
           </div>
          
           <div class="btn-box">
               Forgot Userid / Password CLick On Forgot <input type="submit" value="Forgot" class="submit" name="forgot">
               
           </div>

       </form>
</body>
</html>