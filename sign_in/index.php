<?php session_start(); ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login or Register</title>
    <link href="sign_in/inlog.css" rel="stylesheet">
</head>
<body>
    <div class="container">
        <?php
        // Succes- of foutberichten
        if (isset($_SESSION['success'])) {
            echo "<p style='color: green;'>".$_SESSION['success']."</p>";
            unset($_SESSION['success']);
        } elseif (isset($_SESSION['error'])) {
            echo "<p style='color: red;'>".$_SESSION['error']."</p>";
            unset($_SESSION['error']);
        }
        ?>

        <!-- Als de gebruiker kiest om in te loggen -->
        <form action="inlog.php" method="post" id="loginForm">
            <h2>Login</h2>
            
            <div class="form-group">
                <label for="email">Email:</label>
                <input type="email" name="email" id="email" required>
            </div>
            
            <div class="form-group">
                <label for="password">Password:</label>
                <input type="password" name="password" id="password" required>
            </div>
            
            <div class="form-group">
                <button type="submit" name="login">Login</button> 
            </div>
        </form>

        <p>Don't have an account? <a href="#registerForm">Register here</a></p> <!-- Link naar registratieformulier -->

        <!-- Registratieformulier -->
        <form action="register.php" method="post" id="registerForm" style="display: none;">
            <h2>Register</h2>
            
            <div class="form-group">
                <label for="username">Username:</label>
                <input type="text" name="username" id="username" required>
            </div>
            
            <div class="form-group">
                <label for="email">Email:</label>
                <input type="email" name="email" id="email" required>
            </div>
            
            <div class="form-group">
                <label for="password">Password:</label>
                <input type="password" name="password" id="password" required>
            </div>
            
            <div class="form-group">
                <button type="submit" name="register">Register</button> 
            </div>
        </form>

        <p>Already have an account? <a href="#loginForm">Login here</a></p> <!-- Link naar loginformulier -->

    </div>

    <script src="sign_in/scripts.js"></script>
</body>    
</html>
