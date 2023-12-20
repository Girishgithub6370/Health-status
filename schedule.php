<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="schedule.css">
</head>
<body>
    <?php
        session_start();
        $id= $_SESSION['id'];
        

        if($_SERVER['REQUEST_METHOD']=="POST"){
            $flag=1;
            include "connect.php";
            $c=0;$c2=0;

            //======================Location 1=================================================//
            if(empty($_POST['location2'])){
                $c=$c;
                $l2="NO";
                
                $l2d1=$l2d2=$l2d3=$l2d4=$l2d5=$l2d6=$l2d7="0";
                $l2d1ft=$l2d1tt=$l2d2ft=$l2d2tt=$l2d3ft=$l2d3tt=$l2d4ft=$l2d4tt=$l2d5ft=$l2d5tt=$l2d6ft=$l2d6tt=$l2d7ft=$l2d7tt="NO";
            }
            else{   
                    $l2d1ft=$l2d1tt=$l2d2ft=$l2d2tt=$l2d3ft=$l2d3tt=$l2d4ft=$l2d4tt=$l2d5ft=$l2d5tt=$l2d6ft=$l2d6tt=$l2d7ft=$l2d7tt="NO";
                    $l2=$_POST['location2'];
                    $l2=strtoupper($l2);
                    $c=$c+1;
                    
                    if(empty($_POST['l2day1'])){
                        $l2d1="0";
                    }
                    else{
                        $l2d1="1";
                    
                        
                        if(empty($_POST['l2d1ft']) OR empty($_POST['l2d1tt'])){
                            $le="Please enter the location, date and time correctly.";
                            $flag=0;
                        }
                        else{
                            $l2d1tt=$_POST['l2d1tt'];
                            $l2d1ft=$_POST['l2d1ft'];
                            $c2=$c2+1;
                        }
                    }
                    
                    if(empty($_POST['l2day2'])){
                        $l2d2="0";
                    }
                    else{
                        $l2d2="1";
                    
                        
                        if(empty($_POST['l2d2ft']) OR empty($_POST['l2d2tt'])){
                            $le="Please enter the location, date and time correctly.";
                            $flag=0;
                        }
                        else{
                            $l2d2tt=$_POST['l2d2tt'];
                            $l2d2ft=$_POST['l2d2ft'];
                            $c2=$c2+1;
                        }
                    }

                    if(empty($_POST['l2day3'])){
                        $l2d3="0";
                    }
                    else{
                        $l2d3="1";
                    
                        
                        if(empty($_POST['l2d3ft']) OR empty($_POST['l2d3tt'])){
                            $le="Please enter the location, date and time correctly.";
                            $flag=0;
                        }
                        else{
                            $l2d3tt=$_POST['l2d3tt'];
                            $l2d3ft=$_POST['l2d3ft'];
                            $c2=$c2+1;
                        }
                    }

                    if(empty($_POST['l2day4'])){
                        $l2d4="0";
                    }
                    else{
                        $l2d4="1";
                    
                        
                        if(empty($_POST['l2d4ft']) OR empty($_POST['l2d4tt'])){
                            $le="Please enter the location, date and time correctly.";
                            $flag=0;
                        }
                        else{
                            $l2d4tt=$_POST['l2d4tt'];
                            $l2d4ft=$_POST['l2d4ft'];
                            $c2=$c2+1;
                        }
                    }

                    if(empty($_POST['l2day5'])){
                        $l2d5="0";
                    }
                    else{
                        $l2d5="1";
                    
                        
                        if(empty($_POST['l2d5ft']) OR empty($_POST['l2d5tt'])){
                            $le="Please enter the location, date and time correctly.";
                            $flag=0;
                        }
                        else{
                            $l2d5tt=$_POST['l2d5tt'];
                            $l2d5ft=$_POST['l2d5ft'];
                            $c2=$c2+1;
                        }
                    }

                    if(empty($_POST['l2day6'])){
                        $l2d6="0";
                    }
                    else{
                        $l2d6="1";
                    
                        
                        if(empty($_POST['l2d6ft']) OR empty($_POST['l2d6tt'])){
                            $le="Please enter the location, date and time correctly.";
                            $flag=0;
                        }
                        else{
                            $l2d6tt=$_POST['l2d6tt'];
                            $l2d6ft=$_POST['l2d6ft'];
                            $c2=$c2+1;
                        }
                    }

                    if(empty($_POST['l2day7'])){
                        $l2d7="0";
                    }
                    else{
                        $l2d7="1";
                    
                        
                        if(empty($_POST['l2d7ft']) OR empty($_POST['l2d7tt'])){
                            $le="Please enter the location, date and time correctly.";
                            $flag=0;
                        }
                        else{
                            $l2d7tt=$_POST['l2d7tt'];
                            $l2d7ft=$_POST['l2d7ft'];
                            $c2=$c2+1;
                        }
                    }
                   if($c2==0){
                $le ="Please Enter the location date and time details of Location1";
            }
            else{
                $l1id=$id."1";
            }
                        
            }
            
            
            

            //=================================================Location 2==========================//
            $c2=0;
            if(empty($_POST['location3'])){
                $c=$c;
                $l3="NO";
                
                $l3d1=$l3d2=$l3d3=$l3d4=$l3d5=$l3d6=$l3d7="0";
                $l3d1ft=$l3d1tt=$l3d2ft=$l3d2tt=$l3d3ft=$l3d3tt=$l3d4ft=$l3d4tt=$l3d5ft=$l3d5tt=$l3d6ft=$l3d6tt=$l3d7ft=$l3d7tt="NO";
            }
            else{
                    $l3d1ft=$l3d1tt=$l3d2ft=$l3d2tt=$l3d3ft=$l3d3tt=$l3d4ft=$l3d4tt=$l3d5ft=$l3d5tt=$l3d6ft=$l3d6tt=$l3d7ft=$l3d7tt="NO";
                    $l3=$_POST['location3'];
                    $l3=strtoupper($l3);
                    $c=$c+1;
                    
                    if(empty($_POST['l3day1'])){
                        $l3d1="0";
                    }
                    else{
                        $l3d1="1";
                    
                        
                        if(empty($_POST['l3d1ft']) OR empty($_POST['l3d1tt'])){
                            $le="Please enter the location, date and time correctly.";
                            $flag=0;
                        }
                        else{
                            $l3d1tt=$_POST['l3d1tt'];
                            $l3d1ft=$_POST['l3d1ft'];
                            $c2=$c2+1;
                        }
                    }
                    
                    if(empty($_POST['l3day2'])){
                        $l3d2="0";
                    }
                    else{
                        $l3d2="1";
                    
                        
                        if(empty($_POST['l3d2ft']) OR empty($_POST['l3d2tt'])){
                            $le="Please enter the location, date and time correctly.";
                            $flag=0;
                        }
                        else{
                            $l3d2tt=$_POST['l3d2tt'];
                            $l3d2ft=$_POST['l3d2ft'];
                            $c2=$c2+1;
                        }
                    }

                    if(empty($_POST['l3day3'])){
                        $l3d3="0";
                    }
                    else{
                        $l3d3="1";
                    
                        
                        if(empty($_POST['l3d3ft']) OR empty($_POST['l3d3tt'])){
                            $le="Please enter the location, date and time correctly.";
                            $flag=0;
                        }
                        else{
                            $l3d3tt=$_POST['l3d3tt'];
                            $l3d3ft=$_POST['l3d3ft'];
                            $c2=$c2+1;
                        }
                    }

                    if(empty($_POST['l3day4'])){
                        $l3d4="0";
                    }
                    else{
                        $l3d4="1";
                    
                        
                        if(empty($_POST['l3d4ft']) OR empty($_POST['l3d4tt'])){
                            $le="Please enter the location, date and time correctly.";
                            $flag=0;
                        }
                        else{
                            $l3d4tt=$_POST['l3d4tt'];
                            $l3d4ft=$_POST['l3d4ft'];
                            $c2=$c2+1;
                        }
                    }

                    if(empty($_POST['l3day5'])){
                        $l3d5="0";
                    }
                    else{
                        $l3d5="1";
                    
                        
                        if(empty($_POST['l3d5ft']) OR empty($_POST['l3d5tt'])){
                            $le="Please enter the location, date and time correctly.";
                            $flag=0;
                        }
                        else{
                            $l3d5tt=$_POST['l3d5tt'];
                            $l3d5ft=$_POST['l3d5ft'];
                            $c2=$c2+1;
                        }
                    }

                    if(empty($_POST['l3day6'])){
                        $l3d6="0";
                    }
                    else{
                        $l3d6="1";
                    
                        
                        if(empty($_POST['l3d6ft']) OR empty($_POST['l3d6tt'])){
                            $le="Please enter the location, date and time correctly.";
                            $flag=0;
                        }
                        else{
                            $l3d6tt=$_POST['l3d6tt'];
                            $l3d6ft=$_POST['l3d6ft'];
                            $c2=$c2+1;
                        }
                    }

                    if(empty($_POST['l3day7'])){
                        $l3d7="0";
                    }
                    else{
                        $l3d7="1";
                    
                        
                        if(empty($_POST['l3d7ft']) OR empty($_POST['l3d7tt'])){
                            $le="Please enter the location, date and time correctly.";
                            $flag=0;
                        }
                        else{
                            $l3d7tt=$_POST['l3d7tt'];
                            $l3d7ft=$_POST['l3d7ft'];
                            $c2=$c2+1;
                        }
                    }
                    if($c2==0){
                        $le ="Please Enter the location date and time details of Location2";
                    }
                    else{
                        $l2id=$id."2";
                    }
                        
            }
            if($c==0){
                $le = "Please enter your scheduling details.";
                $flag=0;
            }
            if($flag == 1){
                if($l2!="NO"){
                    $sql="INSERT INTO `l1` (`userid`, `loc`, `Monday`, `Tuesday`, `Wednesday`, `Thursday`, `Friday`, `Saturday`, `Sunday`,`lid`) VALUES ('$id', '$l2', '$l2d1', '$l2d2', '$l2d3', '$l2d4', '$l2d5', '$l2d6', '$l2d7','$l1id')";
                    $result=mysqli_query($con,$sql);
                    $sql="INSERT INTO `l1ft` (`userid`, `loc`, `Monday`, `Tuesday`, `Wednesday`, `Thursday`, `Friday`, `Saturday`, `Sunday`,`lid`) VALUES ('$id', '$l2', '$l2d1ft', '$l2d2ft', '$l2d3ft', '$l2d4ft', '$l2d5ft', '$l2d6ft', '$l2d7ft','$l1id')";
                    $result=mysqli_query($con,$sql);
                    $sql="INSERT INTO `l1tt` (`userid`, `loc`, `Monday`, `Tuesday`, `Wednesday`, `Thursday`, `Friday`, `Saturday`, `Sunday`,`lid`) VALUES ('$id', '$l2', '$l2d1tt', '$l2d2tt', '$l2d3tt', '$l2d4tt', '$l2d5tt', '$l2d6tt', '$l2d7tt','$l1id')";
                    $result=mysqli_query($con,$sql);
            
                }
                if($l3!="NO"){
                     $sql="INSERT INTO `l1` (`userid`, `loc`, `Monday`, `Tuesday`, `Wednesday`, `Thursday`, `Friday`, `Saturday`, `Sunday`,`lid`) VALUES ('$id', '$l3', '$l3d1', '$l3d2', '$l3d3', '$l3d4', '$l3d5', '$l3d6', '$l3d7','$l2id')";
                $result=mysqli_query($con,$sql);
                
                $sql="INSERT INTO `l1ft` (`userid`, `loc`, `Monday`, `Tuesday`, `Wednesday`, `Thursday`, `Friday`, `Saturday`, `Sunday`,`lid`) VALUES ('$id', '$l3', '$l3d1ft', '$l3d2ft', '$l3d3ft', '$l3d4ft', '$l3d5ft', '$l3d6ft', '$l3d7ft','$l2id')";
                $result=mysqli_query($con,$sql);
                $sql="INSERT INTO `l1tt` (`userid`, `loc`, `Monday`, `Tuesday`, `Wednesday`, `Thursday`, `Friday`, `Saturday`, `Sunday`,`lid`) VALUES ('$id', '$l3', '$l3d1tt', '$l3d2tt', '$l3d3tt', '$l3d4tt', '$l3d5tt', '$l3d6tt', '$l3d7tt','$l2id')";
                $result=mysqli_query($con,$sql);
                }
                
               
                header("Location:Index.php");
            }
            

        }
    ?>
    <div class="container">
       <h4>You Successfully Registered Please Set your Schedule</h4>
        <form id="Form1" action="schedule.php" method="post">
            
            <h3>Set Your Schedule</h3>
            <p><?php if(isset($le)){
                echo $le;
            } ?></p>
            <input type="text" name = "location2" placeholder="Location1">
        Monday : <input type="checkbox" name="l2day1" value='1' class="check1">
        Timing : From : <input type="time" name="l2d1ft" id=""  class="check1f"> To : <input type="time" name="l2d1tt" id="" class="check1e">
        
        Tuesday : <input type="checkbox" name="l2day2" value='1' class="check2">
        Timing : From : <input type="time" name="l2d2ft" id="" class="check2f"> To : <input type="time" name="l2d2tt" id="" class="check2e">
        
        Wednesday : <input type="checkbox" name="l2day3" value='1' class="check3">
        Timing : From : <input type="time" name="l2d3ft" id="" class="check3f"> To : <input type="time" name="l2d3tt" id="" class="check3e">
        
        Thursday : <input type="checkbox" name="l2day4" value='1' class="check4">
        Timing : From : <input type="time" name="l2d4ft" id="" class="check4f"> To : <input type="time" name="l2d4tt" id="" class="check4e">
       
        Friday : <input type="checkbox" name="l2day5" value='1' class="check5">
        Timing : From : <input type="time" name="l2d5ft" id="" class="check5f"> To : <input type="time" name="l2d5tt" id="" class="check5e">
        
        Saturday : <input type="checkbox" name="l2day6" value='1' class="check6">
        Timing : From : <input type="time" name="l2d6ft" id="" class="check6f"> To : <input type="time" name="l2d6tt" id="" class="check6e">
        
        Sunday : <input type="checkbox" name="l2day7" value='1' class="check7">
        Timing : From : <input type="time" name="l2d7ft" id="" class="check7f"> To : <input type="time" name="l2d7tt" id="" class="check7e">
        

        <input type="text" name = "location3" placeholder="Location3">
        Monday : <input type="checkbox" name="l3day1" value="Monday" class="check1">
        Timing : From : <input type="time" name="l3d1ft" id=""  class="check1f"> To : <input type="time" name="l3d1tt" id="" class="check1e">
        
        Tuesday : <input type="checkbox" name="l3day2" value="Tuesday" class="check2">
        Timing : From : <input type="time" name="l3d2ft" id="" class="check2f"> To : <input type="time" name="l3d2tt" id="" class="check2e">
        
        Wednesday : <input type="checkbox" name="l3day3" value="Wednesday" class="check3">
        Timing : From : <input type="time" name="l3d3ft" id="" class="check3f"> To : <input type="time" name="l3d3tt" id="" class="check3e">
        
        Thursday : <input type="checkbox" name="l3day4" value="Thursday" class="check4">
        Timing : From : <input type="time" name="l3d4ft" id="" class="check4f"> To : <input type="time" name="l3d4tt" id="" class="check4e">
        
        Friday : <input type="checkbox" name="l3day5" value="Friday" class="check5">
        Timing : From : <input type="time" name="l3d5ft" id="" class="check5f"> To : <input type="time" name="l3d5tt" id="" class="check5e">
        
        Saturday : <input type="checkbox" name="l3day6" value="Saturday" class="check6">
        Timing : From : <input type="time" name="l3d6ft" id="" class="check6f"> To : <input type="time" name="l3d6tt" id="" class="check6e">
        
        Sunday : <input type="checkbox" name="l3day7" value="Sunday" class="check7">
        Timing : From : <input type="time" name="l3d7ft" id="" class="check7f"> To : <input type="time" name="l3d7tt" id="" class="check7e">
        
            
            <div class="btn-box">
                <button type="submit" id="Next1">Submit</button>
            </div>
            
        </form>
</body>
</html>