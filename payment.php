<?php
session_start();
$username = $_SESSION['username'];

if (!isset($_SESSION['username'])) {
    // Redirect to the login page if not login 
    header("Location: login.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Doctors Fee System</title>
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <?php include("./nav/navbar.php"); ?>

    <div class="content">
        <div class="container payment">
            <p> PAYMENT</p>
            <table class="validation">
                <tr>
                    <th>Firstname</th>
                    <th>Lastname</th>
                    <th>Age</th>
                    <th>View</th>
                </tr>
                <tr>
                    <td>Jill</td>
                    <td>Smith</td>
                    <td>50</td>
                    <td><button class='viewButton'>View</button></td>
                </tr>
                <tr>
                    <td>Eve</td>
                    <td>Jackson</td>
                    <td>50</td>
                    <td><button class='viewButton'>View</button></td>
                </tr>
                <tr>
                    <td>John</td>
                    <td>Doe</td>
                    <td>50</td>
                    <td><button class='viewButton'>Validate</button></td>
                </tr>
            </table>
        </div>
    </div>

    <script>
    </script>
</body>

</html>