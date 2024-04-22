<?php
include 'conn.php';

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



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Display table</title>
</head>
<body>
    <?php 
    include 'header.php';
    ?>
    <center>
    <style>
        body {
            margin: 12px,12px;
            padding: 0;
        }

        .container {
            width: 80%;
            margin: 0 auto;
            padding: 20px;
        }

        table {
            border-collapse: collapse;
            width: 80%;
            margin-top: 30px;
            overflow-x: auto;
            margin-bottom: 5px;
        }

        th, td {
            border: 1px solid black;
            padding: 8px;
            text-align: center;
        }

        th {
            height: 60px;
        }
        h4{
            margin-top: 20px;
        }

        @media screen and (max-width: 600px) {
            table {
                border: 0;
            }

            table thead tr {
                display: none;
            }

            table tr {
                border-bottom: 3px solid #ddd;
                display: block;
                margin-bottom: 10px;
            }

            table td {
                border-bottom: 1px solid #ddd;
                display: block;
                font-size: 14px;
                text-align: right;
            }

            table td:last-child {
                border-bottom: 0;
            }

           
        }
    </style>

    <h4>Display User</h4>
    <table>
        <tr>
            <th>user_id</th>
            <th>FirtsName</th>
            <th>LastsName</th>
            <th>MiddleNAme</th>
            <th>Email</th>
            <th>Password</th>
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
            $Password = $row['Password'];
            ?>
        
    <tr>
            <td><?php echo $user_id;?></td>
            <td><?php echo $FirtsName;?></td>
            <td><?php echo $LastsName;?></td>
            <td><?php echo $MiddleNAme;?></td>
            <td><?php echo $Email;?></td>
            <td><?php echo $Password;?></td>
            <td><a href="delete.php?delete=<?php echo $user_id;?>">delete</a>| <a href="edit.php?edit=<?php echo $user_id;?>">edit</a></td>
        </tr>
        <?php
    }
    ?>
        
    </table>
    </center>
</body>
</html>
<?php 
    include 'footer.php';
?>