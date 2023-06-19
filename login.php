<?php
require 'function.php';
?>
 <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css">
    <title>Login</title>
</head>
<body>
    <div class="wrapper">
        <div class="container main">
            <div class="row">
                <div class="col-md-6 side-image">
                    <!-------Image-------->
                    <img src="" alt="">
                    <div class="text">
                        <h2 style="color: white; font-weight: bold;">ZAKAT FITRAH</h2>
                        <i style="color: white;">- Dikri Maulana</i>
                    </div>
                </div>
                <div class="col-md-6 right">
                    <form method="post">
                     <div class="input-box">
                        <header>LOGIN DULU</header>
                        <div class="input-field">
                            <input type="text" class="input" id="inputUsername" name="username" required autocomplete="off">
                            <label for="email">Username</label>
                        </div>
                        <div class="input-field">
                            <input type="password" class="input" id="inputPassword" name="password" required>
                            <label for="password">Password</label>
                        </div>
                        <div class="input-field">
                            <button type="submit" class="submit" name="login">MASUK</button>
                            
                            
                        </div>
                        
                     </div>
                     </form>
                </div>
            </div>
        </div>
    </div>
</body>
</html>