<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="pcon.css">
</head>
<body>

<?php
        require_once('fpdf/fpdf.php');
        require_once('fpdi/src/autoload.php');

        use setasign\Fpdi\Fpdi;
        session_start();
        $pid=$_SESSION['idp'];
        include "connect.php";
        if(isset($_GET['cid'])){
            $sql="SELECT * FROM consult WHERE puserid='$pid'";
            $res=mysqli_query($con, $sql);
            $row=mysqli_num_rows($res);
            if($row>0){
                header("Location:pbooking.php");
            }
            else{
                echo "<script>alert('no bookings are booked.') ; </script>";
            }
        }

        if($_SERVER['REQUEST_METHOD']=="POST"){
            $flag=1;
            
            
            
            $sql="SELECT * FROM patient WHERE userid='$pid'";
            $res=mysqli_query($con,$sql);
            $row = mysqli_fetch_array($res);
            // $check = $_POST['for'];
            $ds=$_POST['ds'];
            $vac=$_POST['vaccine'];
            // $dn=$_POST['dn'];
            // $pf=$_POST['pf'];
            // $id=$_POST['id'];
            // $sp=$_POST['specialisation'];
            // $cd=$_POST['cd'];
            // $cft=$_POST['cft'];
            // $ctt=$_POST['ctt'];
            $pfile=$row['file'];
            $mail=$row['email'];
            if($row['diabeticstatus']=="no"){
                if($ds=="select"){
                    $derr="Please Select Your Diabetic Status";
                    $flag=0;
                }
                elseif ($ds=="yes") {
                    $sql1="UPDATE patient SET diabeticstatus='$ds' WHERE userid='$pid'";
                    $result = mysqli_query($con, $sql1);
                }
            }
            elseif ($row['diabeticstatus']=="yes"){
                $ds="yes";
            }

            if($row['vaccination']=="no"){
                if($vac=="select"){
                    $verr="Please Select Your vaccination Status";
                    $flag=0;
                }
                elseif ($vac=="yes") {
                    $sql1="UPDATE patient SET vaccination='$vac' WHERE userid='$pid'";
                    $result = mysqli_query($con, $sql1);
                }
            }
            elseif ($row['vaccination']=="yes"){
                $vac="Yes";
            }
            
            if(empty($_POST['dn']) || is_numeric($_POST['dn'])){
                $dnerr="Please Enter the correct diesease name .";
                $flag=0;
            }
            else {
                $dn=$_POST['dn'];
                $sql1="UPDATE patient SET  disease='$dn' WHERE userid='$pid'";
                $result = mysqli_query($con, $sql1);
            }

            if(empty($_POST['id']) || is_numeric($_POST['id'])){
                $iderr="Please Enter the correct inherited diesease name .";
                $flag=0;
            }
            else {
                $id=$_POST['id'];
                $sql1="UPDATE patient SET  idisease='$id' WHERE userid='$pid'";
                $result = mysqli_query($con, $sql1);
            }

            if($_POST['specialisation']=="select"){
                $serr="Please select which specialised doctor you need.";
                $flag=0;
            }else {
                $sp=$_POST['specialisation'];
            }

            if(empty($_POST['cd'])){
                $cderr="Please enter the booking date.";
                $flag=0;
            }
            else{
                $cd=$_POST['cd'];
                $td=date('Y-m-d');
                $d=str_replace("-","/",$cd);
                if($cd<$td){
                    $cderr="Please enter the correct date.";
                    $flag=0;
                }
                else{
                    $dsql="SELECT * FROM consult WHERE puserid='$pid' AND opdate='$d'";
                    $dres=mysqli_query($con, $dsql);
                    $drow=mysqli_num_rows($dres);
                    if($drow>=1){
                        $cderr="You have already booked an appointment at this date.";
                        $flag=0;
                    }
                    }
            }
            $file=$_FILES['pf'];
            if(!(empty($file['name']))){
                $file=$_FILES['pf'];
                if(substr($file['name'],-3)!="pdf"){
                    $ferror="Please enter the correct pdf file.";
                    $flag=0;
                }
                else{
                    $dstfi="";
                    $pfname=$file['name'];
                    $pfpath=$file['tmp_name'];
                    $pferror=$file['error'];
                    if($pferror == 0){
                    $dstfi = 'file/'.$pfname;
                    move_uploaded_file($pfpath, $dstfi);
                    }
                    if(empty($pfile)){
                        $usql="UPDATE patient SET file='$dstfi' WHERE userid='$pid'";
                        $ures=mysqli_query($con, $usql);
                        
                    }
                    else{
                        
                        function mergePDF($file1, $file2, $outputFile) {
                            $pdf = new Fpdi();
    
    // Add the first PDF file
                            $pageCount = $pdf->setSourceFile($file1);
                            for ($pageNo = 1; $pageNo <= $pageCount; $pageNo++) {
                                $template = $pdf->importPage($pageNo);
                                $pdf->AddPage();
                                $pdf->useTemplate($template);
                            }

                            // Add the second PDF file
                         $pageCount = $pdf->setSourceFile($file2);
                            for ($pageNo = 1; $pageNo <= $pageCount; $pageNo++) {
                                $template = $pdf->importPage($pageNo);
                                $pdf->AddPage();
                                $pdf->useTemplate($template);
                            }

                            // Output merged PDF to a file
                            $pdf->Output($outputFile, 'F');

                         echo "Merging complete. The merged PDF is saved as: $outputFile";
                        }

                        // Usage example
                        $file1 = $pfile;
                        $file2 = $dstfi;
                        $outputFile = $pfile;

                        mergePDF($file1, $file2, $outputFile);  
                                           }
                }
            }
            
            if($flag==1){
                $ch=0;
                $_SESSION['cd']=$cd;
                $day=date('l',strtotime($cd));
                $_SESSION['special']=$sp;
                $_SESSION['l1']=0;
                $_SESSION['l2']=0;
                $sql="SELECT * FROM docreg WHERE special='$sp' AND mail!='$mail'";
                $run=mysqli_query($con, $sql);
                if(mysqli_num_rows($run)>0){
                foreach($run as $row){
                    $i=$row['userid']; 
                    $sql1 = "SELECT * FROM l1 WHERE userid='$i' AND $day='1'";
                    $run1=mysqli_query($con, $sql1);
                    if(mysqli_num_rows($run1)>0){
                       
                        $ch=$ch+1;
                    }
                }
                if($ch==0){
                    $docserr="No doctors are present at this date please select another date";
                }
                else{
                    header("Location:opconsult.php");
                }
                
            }
            else{
                $docserr= "No doctors are present accroding to youe request";
            }
            }
              

            }
        
?>
    <div class="container">
       
        <form id="Form1" action="consult.php" method="post" enctype="multipart/form-data">
        <p class="error"><?php if(isset($docserr)){
                echo $docserr;
            } ?></p>
            
            <h3 class="heading">Basic Health Details</h3>
            <input type="text" placeholder="Blood Group" name="bg">

            <input type="button" for="diabetic">Diabetic status

            <select id="diabetic" name="ds">
                <option value="select">Select</option>
              <option value="yes">Diabetic</option>
              <option value="no">Non-Diabetic</option>
              
            </select>
            <p class="error"><?php if(isset($derr)){
                echo $derr;
            } ?></p>
            
            <input type="button" for="cars"> Any Vaccination

            <select id="diabetic" name="vaccine">
                <option value="select">Select</option>
              <option value="yes">Yes</option>
              <option value="no">No</option>
              
            </select>
            <p class="error"><?php if(isset($verr)){
                echo $verr;
            } ?></p>
            
            <h3 class="heading">Patient Query</h3>
            <input type="text" placeholder="Query" name="dn">
            <p class="error"><?php if(isset($dnerr)){echo $dnerr;}?></p>
            <input type="file" placeholder="Prescription/Report" name="pf">
            <p class="error"><?php if(isset($ferror)){echo $ferror;}?></p>
            
            <input type="text" placeholder="Inherited Diseases if any" name="id">
            <p class="error"><?php if(isset($iderr)){echo $iderr;}?></p>
            

            <h3 class="heading">Consult details</h3>

            <input type="button" for="diabetic"  class="cdf">Select Specialisation : 

                <select name="specialisation" class="special">
            <option value="select">Select</option>
            <option value="orthopadic">orthopadic</option>
            <option value="medicine specialist">medicine specialist</option>
            <option value="surgeon">surgeon</option>
            </select>
            <p class="error"><?php if(isset($serr)){echo $serr;}?></p>
            
            <p class="apd">Appoint Date : <input type="date" placeholder="Consult Date" name="cd" class="cd"></p>
            <p class="error"><?php if(isset($cderr)){echo $cderr;}?></p>
            
            <div class="btn-box">
                <input type="submit" value="Submit" class="submit">
                <a href="consult.php?cid=1">Bookings</a>
                <a href="Index2.php">Back</a>
                
            </div>
        </form>
    </div>
</body>
</html>