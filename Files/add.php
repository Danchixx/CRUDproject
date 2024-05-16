<html>
    <head>
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
            width: 18.5rem;
            height: 22px;
        }
        .button{
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
        .flex {
            display: flex;
            gap: 3.6rem;
        }
    </style>
    </head>
    <body>
        <div class="container">
        <h2>Barangay Registration Form</h2>
        <hr>
        <form method="POST">
            First Name:<br>
            <input type="text" name="fname" required class="input"><br><br>
            Last Name:<br>
            <input type="text" name="lname" required class="input"><br><br>
            Middle Name:<br>
            <input type="text" name="mname" required class="input"><br><br>
            Suffix:<br>
            <input type="text" name="suffix" class="input"><br><br>
            Course:<br>
            <input type="text" name="course" required class="input"><br><br>
            Year & Section:<br>
            <input type="text" name="year_section" required class="input"><br><br>
            <div class="flex">
            <div>
            <input type="submit" value="Add" class="button">
    </div>
    <div>
            <input type="reset" value="Clear" class="button">
    </div>
    <div>
            <a href="home.php"><input type="button" value="Back" class="button"></a>
    </div>
    </div>
        </form>
</div>
        <?php
            include 'db.php'; // Include db.php for database connection

            // Check if form is submitted
            if ($_SERVER["REQUEST_METHOD"] == "POST") {
                // Collect form data
                $fname = $_POST['fname'];
                $lname = $_POST['lname'];
                $mname = $_POST['mname']; 
                $suffix = $_POST['suffix'];
                $course = $_POST['course'];
                $year_section = $_POST['year_section'];


                // Insert data into database
                $sql = "INSERT INTO users (fname, lname, mname, suffix, course, year_section) VALUES ('$fname', '$lname', '$mname', '$suffix', '$course', '$year_section')";
                
                
                if (mysqli_query($conn, $sql)) {
                    echo "<p style='color:green;'>Data added successfully!</p>";
                } else {
                    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
                }
            }
        ?>
    </body>
</html>
