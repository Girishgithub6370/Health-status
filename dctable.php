<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link rel="stylesheet" href="dctable.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    
</head>
<body>


    <main class="table">
        <section class="table_header">
            <h1>Appointments</h1>

        </section>
        <section class="table_body">
            <?php
            $nc=0;
            $pacc="";
            session_start();
            include "connect.php";
            $doc=1;
            $p='0';
            $pc=0;
            $idd=$_SESSION['idd'];
            $d=$_SESSION['d'];
            $sql = "SELECT * FROM l1 WHERE userid='$idd'";
            $res=mysqli_query($con, $sql);
            while ($row = mysqli_fetch_assoc($res)) {
                $lid=$row['lid'];
                $loc=$row['loc'];
            
                $sql1="SELECT * FROM consult WHERE duserid='$lid' ANd opdate='$d' AND doccon='$doc' AND payment!='$p'";
                $res1=mysqli_query($con,$sql1);
                $nrow=mysqli_num_rows($res1);
                if($nrow==0){
                    $pc=$pc+0;
                }
                else{
                    $pc=$pc+$nrow;
                }
            }
             if($pc==0){
                echo "<h1>No appointment are confirmed for this date.</h1>";
             }   
             else{
            ?>
        <form action="patientcard.php" method="post">
        <table>
            <thead>
                <tr>
            <th>  </th>
            <th>Patient name</th>
            <th>Mail Id</th>
            <th>Phone Number</th>
            <th>D.O.B</th>
            <th>Location</th>
            <th>View</th>
        </tr>
            </thead>
        
    <?php
        
        
        $idd=$_SESSION['idd'];
        
        $d=$_SESSION['d'];
        $sql = "SELECT * FROM l1 WHERE userid='$idd'";
        $res=mysqli_query($con, $sql);
        while ($row = mysqli_fetch_assoc($res)) {
            # code...
            $lid=$row['lid'];
            $loc=$row['loc'];
            
            $sql1="SELECT * FROM consult WHERE duserid='$lid' ANd opdate='$d' AND doccon='$doc' AND payment!='$p'";
            $res1=mysqli_query($con,$sql1);
            while($row1 = mysqli_fetch_assoc($res1)){
                $pid=$row1['puserid'];

        ?>
        
                <?php
             $sql1="SELECT * FROM patient WHERE  userid='$pid'";
                    $resp=mysqli_query($con,$sql1);
                    $rowp=mysqli_fetch_array($resp);
                    ?>
                    <tbody>
                        <tr style="background-color: white;">
                        <?php
                                    if(empty($rowp['img']))
                                    {
                                    ?>
                                        <td><img src="person3.png" class="img" /></td>
                                    <?php
                                    }
                                    else {
                                        ?>
                                            <td><img src="<?php echo $rowp['img'] ; ?>" class="img" /></td>
                                    <?php
                                    }
                                ?>
                        <td><?php echo $rowp['username'] ; ?></td>
                        <td><?php echo $rowp['email'] ;?></td>
                        <td><?php echo $rowp['number'] ;?></td>
                        <td><?php echo $rowp['dob']; ?></td>
                        <td><?php echo $loc ; ?></td>
                        <td><p class="status view"><a href="view.php?viewid=<?php echo $row1['no'] ; ?>" class="view">View</a></p></td>
                        </tr>
                    </tbody>
                        
                
            
                    
          <?php }
        }
        }
        ?>
        </table>
    
        
                   </form>
                   <?php
                        $sql="SELECT * FROM l1 WHERE userid='$idd'";
                        $res=mysqli_query($con,$sql);
                        while($row=mysqli_fetch_assoc($res)){
                            $lid=$row['lid'];
                            $loc=$row['loc'];
                            $no=0;
                            $sql1="SELECT * FROM consult WHERE duserid='$lid' ANd opdate='$d' AND doccon='$no'";
                            $res1=mysqli_query($con,$sql1);
                            $num=mysqli_num_rows($res1);
                            $nc=$nc+$num;
                        }
                   ?>
                   <div class="status new">
                    <?php
                            if($nc!=0){ ?>
                                <div class="notify">
                        
                                </div>
                            <?php 
                            }
                    ?>
                    
                    
                    <a href="new.php" class="new">New Appointments</a>
                </div>
        </section>
    </main>
    <button></button>




    
        
        
    
</body>
</html>