<html lang="en">
<body>
    <div class="container">
        <?php
        if (isset($_SESSION['success'])){
            unset($_SESSION['success']);
        }
        ?>
        <form action= "register.php" method="post" id="registrationForm">
            <h2>Inloggen</h2> 
            <div class="form-group">
                 <label for="username">Username:</label>
                 <input type="text" name="username" id="username"  required>
            </div>  
            <div class="form-group">
                 <label for="email">Email:</label>
                 <input type="email" id="email" name= "email" required.
            </div>
            <div class="form-group">
                 <label for="password">Password:</label>
                 <input type="password" id="password" name="password" required>
            </div>
            <div class="form-group">
                 <button type="submit">Register </button> 
            </div>
        </form>
    </div>
    <script src="scripts.js"></script>
</body>    
</html>
