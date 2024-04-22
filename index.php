<!DOCTYPE html>
<html lang="en"> 
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Crud</title>
    <link rel="stylesheet" href="form.css">
</head>
<body>
<?php 
   include 'header.php';
?> 
<center>
    <div class="container">
        
            <?php
            include 'conn.php';
            if (isset($_POST['SAVE'])){
                $FirtsName = $_POST['FirtsName'];
                $LastsName = $_POST['LastsName'];
                $MiddleNAme = $_POST['MiddleNAme'];
                $Email = $_POST['Email'];
                $Password = $_POST['Password'];
                $verify_query = mysqli_query($con,"SELECT FirtsName From signup_table WHERE FirtsName='$FirtsName'");
                
                if(mysqli_num_rows($verify_query) !=0 ) {
                    echo "<script>alert('This username is used, Try another One please!')</script>";
                    echo "<script>window.location='index.php'</script>";
                }
                else{
                    mysqli_query($con,"INSERT INTO signup_table(FirtsName,LastsName,MiddleNAme,Email,Password) 
                    VALUES('$FirtsName','$LastsName','$MiddleNAme','$Email',$Password)") or die("Error Occured");
                    echo "<script>alert('register sucsses!')</script>";
                    echo "<script>window.location='index.php'</script>";
                  
                }
                }
                ?>
            <form method="post">
                <div class="econtainer">
                <h2>Information</h2>
                <input type="text" id="FirtsName" name="FirtsName" placeholder="FirtsName"><br>
                <input type="text" id="LastsName" name="LastsName" placeholder="LastsName"><br>
                <input type="text" id="MiddleName" name="MiddleNAme" placeholder="MiddleNAme"><br>
                <input type="text" id="Email" name="Email" placeholder="Email"><br>
                <input type="text" id="Password" name="Password" placeholder="Password"><br>
                <button type="submit" name="SAVE" class="btn">SAVE</button>
                </div>
            </form>
            </div>
    
    <table>
        <tr>
            <th>user_id</th>
            <th>FirtsName</th>
            <th>LastsName</th>
            <th>MiddleNAme</th>
            <th>Email</th>
            <th>Action</th>
            
        </tr>
        <?php
        $result = mysqli_query($con, "SELECT * from signup_table") or die ("database error:".mysqli_error($con));
        while($row=mysqli_fetch_array($result)){
            $user_id = $row['user_id'];
            $FirtsName = $row['FirtsName'];
            $LastsName = $row['LastsName'];
            $MiddleNAme = $row['MiddleNAme'];
            $Email = $row['Email'];
            ?>
        
    <tr>
            <td><?php echo $user_id;?></td>
            <td><?php echo $FirtsName;?></td>
            <td><?php echo $LastsName;?></td>
            <td><?php echo $MiddleNAme;?></td>
            <td><?php echo $Email;?></td>
            <td><a href="delete.php?delete=<?php echo $user_id;?>">delete</a>| <a href="edit.php?edit=<?php echo $user_id;?>">edit</a></td>
        </tr>
        <?php
    }
    ?>
        
    </table>
    </div>

            <?php


            // Perform deletion of records
            if (isset($_POST['delete'])) {
                $deleteId = $_POST['delete'];

                $deleteSql = "DELETE FROM signup_table WHERE Id = $deleteId";
                if ($con->query($deleteSql) === TRUE) {
                    echo '<script>alert("Record deleted successfully.");</script>';
                    echo '<script>
                            setTimeout(function(){
                                window.location.href = "table.php";
                            }, 250); // Delay of 250 milliseconds (0.25 second)
                        </script>';
                    exit;
                } else {
                    echo "Error deleting record: " . $con->error;
                }
            }

            // Check if all records are deleted
            $checkEmptySql = "SELECT COUNT(*) as count FROM signup_table";
            $result = $con->query($checkEmptySql);
            $row = $result->fetch_assoc();
            $count = $row['count'];

            if ($count == 0) {
                // Reset the auto-increment value to 1 when there are no records in the table
                $resetAutoIncrement = "ALTER TABLE signup_table AUTO_INCREMENT = 1";
                $con->query($resetAutoIncrement);
            }
            ?>



</center>
</body>
</html>
<?php 
    include 'footer.php';
?>