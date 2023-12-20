<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    
    
    <?php
        if(isset($_GET['exid'])){
            $id=$_GET['exid'];
            echo $id;
        }
        
    ?>

    <a href="ex.php?exid=YE" onclick="return confirm('Are You Sure')">Click</a>

</body>
</html>