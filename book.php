<?php
    include "connect.php";
    if(isset($_GET['bid'])){
        $bid=$_GET['bid'];
        session_start();
        
        $paid=$_SESSION['idp'];
        $sqlp="SELECT * FROM patient WHERE userid='$paid'";
        $resp=mysqli_query($con, $sqlp);
        $rowp=mysqli_fetch_array($resp);
        $pmail=$rowp['email'];
        $sql = "SELECT * FROM consult";
        $res=mysqli_query($con, $sql);
        $row=mysqli_num_rows($res);
        if($row==0){
            $row=1;
        }
        else{
            $sql="SELECT * FROM consult ORDER BY no DESC LIMIT 1";
            $res=mysqli_query($con, $sql);
            $rowd=mysqli_fetch_array($res);
            $row=$rowd['no'];
            $row=$row+1;
        }
        $dc=0;
        $pm=0;
        $d=$_SESSION['cd'];
        $d=str_replace('-','/',$d);
                
        $sql="INSERT INTO `consult` (`duserid`, `puserid`, `opdate`, `no`, `doccon`, `payment`) VALUES ('$bid', '$paid', '$d', '$row','$dc', '$pm')";
        $result = mysqli_query($con, $sql);
        header("Location:cbook.html");
    }
?>