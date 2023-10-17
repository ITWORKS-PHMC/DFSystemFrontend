<!-- Programmer: Chasey Larrisse V. Elizarde
Project: Doctors Fee System
Description: Frontend SMS  -->

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Doctors Fee System</title>
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <div class="login">
        <h2> Perpetual Help Medical Center - Las Piñas Hospital </h2>
        <div class="signin">
            <form action="authenticate.php" method="post">
                <input type="login" id="username" name="username" placeholder="Username" required>
                <input type="password" id="password" name="password" placeholder="Password" required> 
                
                <input type="checkbox" id="checkbox" onclick="showPassword()">Show Password
                
                <input type="submit" class="submit" value="Login">
            </form>
        </div>
    </div>
    <script src="script.js"></script>
</body>

</html>