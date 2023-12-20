<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="docreg3.css">
</head>
<body>
    <?php
        include "connect.php";
        if($_SERVER['REQUEST_METHOD']=="POST"){
            $flag=1;
            $name=$_POST['name'];
            $number=$_POST['number'];
            $mail=$_POST['mail'];
            $ex=$_POST['ex'];
            $dg=$_POST['dg'];
            $special=$_POST['specialisation'];
            $pass=$_POST['pass'];
            //---------------------------------Name------------------------//
            if(empty($name)){
                $nerror="Please enter your name";
                $flag=0;
            }
            else{
                if(is_numeric($name)){
                    $nerror="Please entre the correct name";
                    $flag=0;
                }
            }
            //--------------------------------Number------------------------//
            if(empty($number)){
                $perror="Please enter your Phone number .";
                $flag=0;
            }
            else{
                if(strlen($number)!=10){
                    $perror="Please enter the coorect number.";
                    $flag=0;
                }
                else{
                    $sql="SELECT * FROM docreg WHERE phone='$number'";
                    $res=mysqli_query($con,$sql);
                    $nrow=mysqli_num_rows($res);
                    if($nrow>0){
                        $perror="This Phone number is already registered.";
                        $flag=0;
                    }
                }
                
            }
            //----------------------------------experience-----------------------//
           
                if($ex<0){
                    $eerror="Please enter the coorect experience year.";
                    $flag=0;
                }
                
            
            //---------------------------------degree-------------------------------//
            if(empty($dg)){
                $derror="Please enter your qualification or degree .";
                $flag=0;
            }
            else{
                if(is_numeric($dg)){
                    $derror="Please entre a valid degree";
                    $flag=0;
                }
            }
            //-----------------------------specialisation-----------------------------//
            if($special=='select'){
                $serror="Please select your specialisation.";
                $flag=0;
            }
            //-----------------------------ppassword---------------------------------//
            if(empty($pass)){
                $paerror="Please enter your password .";
                $flag=0;
            }
            
            
                else{
                    if(strlen($pass) <8 || strlen($pass)>16){
                        $paerror="The entered password shoubld 8-16 character long";
                        $flag=0;
                    }
                    else{
                        $sql="SELECT * FROM docreg WHERE pass='$pass'";
                        $res=mysqli_query($con,$sql);
                        $nrow=mysqli_num_rows($res);
                        if($nrow>0){
                            $paerror="This Password is already registered.";
                            $flag=0;
                        }
                    }
                }
                //--------------------file--------------------------//
                $file=$_FILES['file'];
                if(!(empty($file['name']))){
                $file=$_FILES['file'];
                if(substr($file['name'],-3)=="pdf" || substr($file['name'],-3)=="PDF"){
                    $pfname=$file['name'];
                    $pfpath=$file['tmp_name'];
                    $pferror=$file['error'];

                    if($pferror == 0){
                    $dstfi = 'dfile/'.$pfname;
                    move_uploaded_file($pfpath, $dstfi);
                    }
                    
                    
                }
                else{
                    $ferror="Please enter the correct pdf file.";
                    $flag=0;
                }
            }
            else
            {
                $ferror="Please choose the  pdf file.";
                $flag=0;
            }
            //--------------------------mail-------------------------//
            if(empty($mail)){
                $merror="Please enter the mail id";
                $flag=0;
            }
            else{
                $sql="SELECT * FROM docreg WHERE mail='$mail'";
                    $res=mysqli_query($con,$sql);
                    $nrow=mysqli_num_rows($res);
                    if($nrow>0){
                        $merror="This Mail id is already registered.";
                        $flag=0;
                    }
            }

                if($flag==1){
                    $s= (string) $number;
                    include 'connect.php';
                    session_start();
                    $s=substr($pass,4).substr($s,-4);
                    $_SESSION['id']=$s;
                    $name=strtoupper($name);
                    $dg=strtoupper($dg);
                    $special=strtoupper($special);
                    $sql="INSERT INTO `docreg` (`userid`, `username`, `phone`, `mail`, `ex`, `degree`, `file`, `special`, `pass`) VALUES ('$s', '$name', '$number', '$mail', '$ex', '$dg', '$dstfi', '$special', '$pass')";
                    $result = mysqli_query($con, $sql);
                    header("Location: schedule.php");
                }

        }
    ?>
    <div class="container">
       
        <form id="Form1" action="docreg.php" method="post" enctype="multipart/form-data">
            
            <h3>Doctor's Info</h3>
            <input type="text" placeholder="Name" name="name">
            <p class="error"><?php if(isset($nerror)){echo $nerror;}?></p>
            <input type="number" placeholder="Number" name="number">
            <p class="error"><?php if(isset($perror)){echo $perror;}?></p>
            <input type="email" placeholder="Mail Id" name="mail" name="mail">
            <p class="error"><?php if(isset($merror)){echo $merror;}?></p>
            <input type="number" placeholder="Experience" name="ex">
            <p class="error"><?php if(isset($eerror)){echo $eerror;}?></p>
            <input type="text" placeholder="Degree" name="dg">
            <p class="error"><?php if(isset($derror)){echo $derror;}?></p><br>
            <p>Degree Certificate PDF file: <input type="file" name="file" ></p>
            <p class="error"><?php if(isset($ferror)){echo $ferror;}?></p>
            <select name="specialisation" class="special">
            <option value="select">Select</option>
            <option value="orthopadic">orthopadic</option>
            <option value="medicine specialist">medicine specialist</option>
            <option value="surgeon">surgeon</option>
        </select>
        <p class="error"><?php if(isset($serror)){echo $serror;}?></p>
        <input type="password" name="pass" placeholder="Password">
        <p class="error"><?php if(isset($paerror)){echo $paerror;}?></p>
            <div class="btn-box">
                <button type="submit" id="Next1">Submit</button>
            </div>
            
        </form>
</body>
</html>