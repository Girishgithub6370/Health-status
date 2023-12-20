<?php
    include "connect.php";
    if(isset($_GET['cancelid'])){
        $no=$_GET['cancelid'];
        $sql="DELETE FROM consult WHERE no='$no'";
        $res=mysqli_query($con, $sql);
        header("Location:upcoming.php");
        
    }
    
?>