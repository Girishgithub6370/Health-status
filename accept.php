<?php
    include "connect.php";
    if(isset($_GET['acceptid'])){
        $id=$_GET['acceptid'];
        $no=1;
        $sql1="UPDATE consult SET doccon='$no' WHERE no='$id'";
        $result = mysqli_query($con, $sql1);
        header("Location:new.php");
    }
    
?>