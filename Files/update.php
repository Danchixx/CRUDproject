<?php
    // Include db.php for database connection
    include 'db.php';

    //get the information based on the id
    if(isset($_REQUEST['id'])) {
        $id = $_REQUEST['id'];

        // Execute SQL query to select user information
        $sql = "SELECT * FROM users WHERE studentid = $id";
        $result = mysqli_query($conn, $sql);

        if (mysqli_num_rows($result) > 0) {
            $row = mysqli_fetch_assoc($result);
            // Assign user information to variables
            //$studentid = $row["studentid"];
            $fname = $row["fname"];
            $lname = $row["lname"];
            $mname = $row["mname"];
            $suffix = $row["suffix"];
            $course = $row["course"];
            $year_section = $row["year_section"];

        } else {
            echo "No user found with the given ID.";
            exit(); // Stop script execution if ID not found
        }
    } else {
        echo "No ID provided.";
        exit(); // Stop script execution if ID not provided
    }

    // Updates the records.
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        // Collect form data
        $studentid = $_POST['studentid'];
        $fname = $_POST['fname'];
        $lname = $_POST['lname'];
        $mname = $_POST['mname'];
        $suffix = $_POST['suffix'];
        $course = $_POST['course'];
        $year_section = $_POST['year_section'];

        // Prepare and execute SQL query for update
        $sql = "UPDATE users SET fname='$fname', lname='$lname', mname='$mname', suffix='$suffix', course='$courses', year_section='$year_section' WHERE studentid = '$studentid'";
        if (mysqli_query($conn, $sql)) {
            echo "<script>alert('Data updated successfully!');</script>";
        } else {
            echo "Error updating data: " . mysqli_error($conn);
        }
    }

    // Close connection
    mysqli_close($conn);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Citizen</title>
    <!-- Add your CSS styles here if needed -->
    <style>
        .container {
            position: absolute;
            top: 10%;
            left: 36%; 
            padding: 30px 60px 30px 60px;
            background-color: white;
            box-shadow: 0 0 128px 0 rgba(0,0,0,0.1),
                0 32px 64px -48px rgba(0,0,0,0.5);
        }
        .input {
            width: 15rem;
            height: 22px;
        }
        .flex {
            display: flex;
            gap: 8rem;
        }
        .button {
            width: 60px;
            height: 30px;
            padding: 4px;
            cursor: pointer;
            background-color: #A4A2A2;
            color: white;
        }

        .button:hover{
            background-color: #E3DEDE;
            color: black; 
        }


       
    </style>
</head>
<body>
<div class="container">
    <form method="POST">
        <h3>Barangay Registration Form</h3><hr>
        <input type="hidden" name="studentid" value="<?php echo $id ?>"><br> <!-- "echo $id"  used to display value-->
        First Name:<br>
        <input type="text" name="fname" value="<?php echo $fname ?>" class="input"><br><br>
        Last Name:<br>
        <input type="text" name="lname" value="<?php echo $lname ?>" class="input"><br><br>
        Middle Name:<br>
        <input type="text" name="mname" value="<?php echo $mname ?>" class="input"><br><br>
        Suffix:<br>
        <input type="text" name="suffix" value="<?php echo $suffix ?>" class="input"><br><br>
        Course:<br>
        <input type="text" name="course" value="<?php echo $course ?>" class="input"><br><br>
        Year & Section:<br>
        <input type="text" name="year_section" value="<?php echo $year_section ?>" class="input"><br><br>
        <div class="flex">
        <div>
        <input type="submit" value="Update" class="button"> 
       </div>
        <div>
        <a href="home.php"><input type="button" value="Back" class="button"></a>
    </div>
    </div>
    </form>
</div>
</body>
</html>
