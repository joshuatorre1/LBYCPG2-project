<?php
?>
<!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <title>Donasyon</title>
        <link rel="stylesheet" type="text/css" href="assets/stylesheets/manage.css">
        <script src="https://code.jquery.com/jquery-1.10.2.js"></script>
    </head>
    <body>
        <div id="nav-placeholder">

        </div>
        <script>
            $(function(){
                $("#nav-placeholder").load("navbar.html");
            });
        </script>
        <div class="container">
            <form class="forms" method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
                <div class="h1-container"><h1>LOG IN USING YOUR ACCOUNT</h1></div>
                <div class="text-field">
                    <input class="field" type="text" placeholder=" " id="username" name="username" required>
                    <label class="prompt" for="username">Username</label>
                </div>
                <div class="text-field">
                    <input class="field" type="password" placeholder=" " id="password" name="password" required>
                    <label class="prompt" for="password">Password</label>
                </div>
                <div class="button-container">
                    <input type="submit" class="button" value="Log In">
                </div>
                <div class="link-container">
                    <a href="#register">Don't have an account yet? Sign up here.</a>
                </div>

            </form>
        </div>

        <div class="container" id="register">
            <form id="reg-form" class="forms" method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
                <div class="h1-container"><h1>REGISTER YOUR ORGANIZATION</h1></div>
                <fieldset>
                    <legend>BASIC INFORMATION</legend>
                    <div class="text-field">
                        <input class="field" type="text" placeholder=" " id="username" name="username" required>
                        <label class="prompt" for="username">Organization Name</label>
                    </div>
                    <div class="text-field">
                        <input class="field" type="password" placeholder=" " id="password" name="password" required>
                        <label class="prompt" for="password">Organization Address</label>
                    </div>
                </fieldset>
                <!--                <div class="text-field">-->
                <!--                    <input class="field" type="text" placeholder=" " id="username" name="username" required>-->
                <!--                    <label class="prompt" for="username">Username</label>-->
                <!--                </div>-->
                <!--                <div class="text-field">-->
                <!--                    <input class="field" type="password" placeholder=" " id="password" name="password" required>-->
                <!--                    <label class="prompt" for="password">Password</label>-->
                <!--                </div>-->
                <!--                <div class="button-container">-->
                <!--                    <input type="submit" class="button" value="Log In">-->
                <!--                </div>-->
                <!--                <div class="link-container">-->
                <!--                    <a href="register.php">Don't have an account yet? Sign up here.</a>-->
                <!--                </div>-->

            </form>
    </body>