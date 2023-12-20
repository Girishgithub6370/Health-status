<?php
    include "connect.php";
    $ln1="sh637004701";
    $d=1;
    $date=date("Y/m/d");
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
        $to="girishkumar63270@gmail.com";
        $subject="Consult Reminder.";
        $message="Hello  ! Your request Accepted by the doctor. \nPLease pay the fees to confirm the booking Only ".$num." are available";
        $from="kumargirish6370@gmail.com";

        mail($to, $subject, $message, $from);
    }
?>