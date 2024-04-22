<!DOCTYPE html>
<html>
<head>
    <title>Crud</title>
    <link rel="stylesheet" href="form.css">
</head>
<body>
    <?php 
    include 'header.php';
    ?>
    <?php
    include 'conn.php';
    $edit_id = $_GET['edit'];
    $result = mysqli_query($con, "SELECT * FROM signup_table WHERE user_id='$edit_id'") or die("database error:" . mysqli_error($con));
    while ($row = mysqli_fetch_array($result)) {
        $user_id = $row['user_id'];
        $FirtsName = $row['FirtsName'];
        $MiddleNAme = $row['MiddleNAme'];
		$LastsName = $row['LastsName']; 
        $Email = $row['Email'];
        $Password = $row['Password'];
       
    }
    ?>
    <center>
        <div class="Signup-container">
            <div class="class">    
                <h2>EDIT FORM</h2>
                <form method="post">
                   
                    <input type="hidden" name="user_id" value="<?php echo $user_id; ?>">
                    <input type="text" name="edit_FirtsName" value="<?php echo $FirtsName; ?>" placeholder="Firstname"><br>
                    <input type="text" name="edit_MiddleNAme" value="<?php echo $MiddleNAme; ?>" ><br> 
					<input type="text" name="edit_LastsName" value="<?php echo $LastsName; ?>" placeholder="Lastname"><br>   
                    <input type="text" name="edit_Email" value="<?php echo $Email; ?>" ><br>
                    <input type="text" name="edit_Password" value="<?php echo $Password; ?>" ><br>
                    <button type="submit" name="update" class="btn">UPDATE</button>
                </form>
            </div>
        </div>
        <?php
        if (isset($_POST['update'])) {
            $user_id = $_POST['user_id'];
            $FirtsName = $_POST['edit_FirtsName'];
            $MiddleNAme = $_POST['edit_MiddleNAme'];
            $LastsName = $_POST['edit_LastsName'];
            $Email = $_POST['edit_Email'];
            $Password = $_POST['edit_Password'];

            // Correct the SQL query by removing the extra comma before WHERE
            $stmt = mysqli_prepare($con, "UPDATE signup_table SET FirtsName=?, MiddleNAme=?, LastsName=?, Email=?, Password=? WHERE user_id=?");
            // Ensure you bind the correct number of variables (6 in this case)
            mysqli_stmt_bind_param($stmt, "sssssi", $FirtsName, $MiddleNAme, $LastsName, $Email, $Password, $user_id);
            mysqli_stmt_execute($stmt);
            mysqli_stmt_close($stmt);
            echo "<script>alert('Updated Successfully!')</script>"; 
            echo "<script>window.location='index.php'</script>";
        }
        ?>

</body>
</html>
<?php 
    include 'footer.php';
?>



