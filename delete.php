<?php
    include "connect.php";
    if(isset($_GET['deleteid'])){
        $id=$_GET['deleteid'];
        $no=1;
        $sql1="DELETE FROM consult WHERE no='$id'";
        $result = mysqli_query($con, $sql1);
        header("Location:new.php");
    }
    
?>