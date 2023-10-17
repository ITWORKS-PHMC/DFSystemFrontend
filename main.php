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
        <div class="container home">
            <h3 class="title" id="title"> Perpetual Help Medical Center - Las Piñas City </h3>
            <p class="datetime" id="datetime"></p>
            <p> Good day,
                <?php echo str_replace('.',' ', $username. '!'); ?>
            </p>
        </div>
    </div>

    <script>
        // Function to update the date and time
        function updateDateTime() {
            const datetimeElement = document.getElementById('datetime');
            const now = new Date();

            const options = { weekday: 'long', year: 'numeric', month: 'long', day: 'numeric', hour: 'numeric', minute: 'numeric', second: 'numeric', timeZoneName: 'short' };
            const formattedDateTime = now.toLocaleString('en-US', options);

            datetimeElement.textContent = formattedDateTime;
        }
        updateDateTime();
        setInterval(updateDateTime, 1000);
    </script>
</body>

</html>