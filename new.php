<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link rel="stylesheet" href="new2.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    
</head>
<body>
    <main class="table">
        <section class="table_header">
            <h1>New Appointments</h1>
        </section>
        <section class="table_body">

        <?php
                include "connect.php";
                $c=0;
                session_start();
                $idd=$_SESSION['idd'];
                $d=$_SESSION['d'];
                $sql="SELECT * FROM l1 WHERE userid='$idd'";
                $res=mysqli_query($con,$sql);
                while($row=mysqli_fetch_assoc($res)){
                    $lid=$row['lid'];
                    $loc=$row['loc'];
                    $no=0;
                    $sql1="SELECT * FROM consult WHERE duserid='$lid' ANd opdate='$d' AND doccon='$no'";
                    $res1=mysqli_query($con,$sql1);

                    $num=mysqli_num_rows($res1);
                    $c=$c+$num;
                }
                if($c>0){

        ?>
            <form action="patientcard.php" method="post">
            <table>
                <thead>
                    <tr >
                    <th>  </th>
                    <th>Patient name</th>
                    <th>Mail Id</th>
                    <th>Phone Number</th>
                    <th>D.O.B</th>
                    <th>Location</th>
                    <th>Accept</th>
                    <th>Delete</th>
                    <th>View</th>
                    </tr>
                </thead>
                <?php
                
                $sql = "SELECT * FROM l1 WHERE userid='$idd'";
                $res=mysqli_query($con, $sql);
                while ($row = mysqli_fetch_assoc($res)) {
                    # code...
                    $lid=$row['lid'];
                    $loc=$row['loc'];
                    $no=0;
                    $sql1="SELECT * FROM consult WHERE duserid='$lid' ANd opdate='$d' AND doccon='$no'";
                    $res1=mysqli_query($con,$sql1);
                    
                    while($row1 = mysqli_fetch_assoc($res1)){
                        $pid=$row1['puserid'];
                        $lid=$row1['no'];
                    
                ?>

                        <?php
                            $sqlp="SELECT * FROM patient WHERE  userid='$pid'";
                            $resp=mysqli_query($con, $sqlp);
                            $rowp=mysqli_fetch_array($resp);
                ?>
                        <tbody>
                            <tr >
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
                                <td><p class="status accept"><a href="accept.php?acceptid=<?php echo $lid ; ?> " class="acc">Accept</a></p></td>
                                <td><p class="status delete"><a href="delete.php?deleteid=<?php echo $lid ; ?>" class="del">Delete</a></p></td>
                                <td><p class="status view"><a href="view.php?viewid=<?php echo $lid ; ?>" class="view">View</a></p></td>
                        </tr>
                        </tbody>
                        
                
            
                    
                <?php }
                }
            }
            else{
                ?>
                <h1 color="red"><?php echo "No More Appointments are book for this date ."; ?></h1>
                <?php
            }
                ?>
        </table>
                   </form>
        </section>
    </main>
        
        

        
        
    
</body>
</html>