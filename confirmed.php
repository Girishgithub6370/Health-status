<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link rel="stylesheet" href="pbook.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    
</head>
<body>
    
    <main class="table">
        <section class="table_header">
            <div><h1>New Appointments </h1>
            <p><a href="confirmed.php">Confirmed</a></p>
            <p><a href="waiting.php">Waiting</a> </p></div>
            
            
        </section>
        <section class="table_body">
            <?php
                $c=0;
                include "connect.php";
                session_start();
                $idp=$_SESSION['idp'];
                $doc=1;
                $sql="SELECT * FROM consult WHERE puserid='$idp' AND doccon='$doc'";
                $res=mysqli_query($con, $sql);
                while($row=mysqli_fetch_assoc($res)) {
                    $dlid=$row['duserid'];
                    $date=$row['opdate'];
                    $d=date("Y/m/d");
                    if($date>=$d){
                        $c=$c+1;
                    }
                }
                if($c==0){
                    ?>
                        <h1>No bookings are done at the previous dates.</h1>
                    <?php
                }
                else{

            ?>
        
            <form action="patientcard.php" method="post">
            <table>
                <thead>
                    <tr >
                    <th>Doctor's name</th>
                    <th>Specialisation</th>
                    <th>Location</th>
                    <th>Appointment date</th>
                    </tr>
                </thead>
                <?php
                    $d=1;
                    $sql="SELECT * FROM consult WHERE puserid='$idp' AND doccon='$d'";
                    $res=mysqli_query($con, $sql);
                    while($row=mysqli_fetch_assoc($res)) {
                        $dlid=$row['duserid'];
                        $date=$row['opdate'];
                        $d=date("Y/m/d");
                        $sqldl= "SELECT * FROM l1 WHERE lid='$dlid'";
                        $resdl=mysqli_query($con, $sqldl);
                        $rowdl= mysqli_fetch_array($resdl);
                        $loc= $rowdl['loc'];
                        $did= $rowdl['userid'];
                        $sqld = "SELECT * FROM docreg WHERE userid='$did'";
                        $resd=mysqli_query($con, $sqld);
                        $rowd= mysqli_fetch_array($resd);
                        $name=$rowd['username'];
                        $special=$rowd['special'];
                        
                ?>
                        <tbody>
                            <tr >
                               <td><?php echo $name ; ?></td>
                               <td><?php echo $special ; ?></td>
                               <td><?php echo $loc ; ?></td>
                               <td><?php echo $date ; ?></td>
                        </tr>
                        </tbody>
                        
                
           <?php 
                }
            }
            ?>
                
        </table>
                   </form>
        </section>
    </main>
        
        

        
        
    
</body>
</html>