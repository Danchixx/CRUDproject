<?php
    include 'db.php'; // Include db.php for database connection

    // Retrieve data from the database
    $sql = "SELECT * FROM users";//selects all columns from users table
    $result = mysqli_query($conn, $sql);//executes mysqli query
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcome</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 20px;
        }
        h2 {
            color: #333;
        }
        table {
            border-collapse: collapse;
            width: 60rem;
            align-items: center;
        }
        th, td {
            border: 1px solid #dddddd;
            text-align: left;
            padding: 8px;
        }
        th {
            background-color: black;
            color: white;
        }

        button {
            width: 60px;
            height: 30px;
            padding: 4px;
            cursor: pointer;
            margin-right: 12px;
            background-color: #A4A2A2;
            color: white;
        }
        button:hover{
            background-color: #E3DEDE;
            color: black; 
        }

        .container {
            position: absolute;
            top: 18%;
            left: 12%; 
            padding: 30px 60px 30px 60px;
            background-color: white;
            box-shadow: 0 0 128px 0 rgba(0,0,0,0.1),
                0 32px 64px -48px rgba(0,0,0,0.5);
        }


    </style>
</head>
<body>

<div class="container">
    <h2>Registered</h2>
    <hr>
    <a href="add.php"><button class="add">ADD</button></a>
    <br>
    <br>
    <table>
        <tr>
            <th>Student ID</th>
            <th>First Name</th>
            <th>Last Name</th>
            <th>Middle Name</th>
            <th>Suffix</th>
            <th>Course</th>
            <th>Year & Section</th>
            <th>Action</th>
        </tr>
        <?php
        
            // Loop through each row of the result set
            while ($row = mysqli_fetch_assoc($result)) {// "mysqli_fetch_assoc()" used to fetch a record in a table.
                echo "<tr>";
                echo "<td>" . $row['studentid'] . "</td>";//displays the id 
                echo "<td>" . $row['fname'] . "</td>";//displays the first name
                echo "<td>" . $row['lname'] . "</td>";//displays the last name
                echo "<td>" . $row['mname'] . "</td>";//displays the middle name 
                echo "<td>" . $row['suffix'] . "</td>";//displays the middle name 
                echo "<td>" . $row['course'] . "</td>";//displays the middle name 
                echo "<td>" . $row['year_section'] . "</td>";//displays the middle name 


            
                echo "<td>";
                echo "<a href='delete.php?id=" . $row['studentid'] . "'><button>Delete</button></a>";//delete button
                echo "<a href='update.php?id=" . $row['studentid'] . "'><button>Update</button></a>";//update button

                echo "</td>";
                echo "</tr>";
            }
        ?>

    </table>
        </div>  
        

</body>
</html>
