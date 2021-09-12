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
                    <a href="#reg-form">Don't have an account yet? Sign up here.</a>
                </div>

            </form>
        </div>

        <div class="container" id="register-container">
            <form id="reg-form" class="forms" method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
                <div class="h1-container"><h1>REGISTER YOUR ORGANIZATION</h1></div>
                <fieldset>
                    <legend>BASIC INFORMATION</legend>
                    <div class="text-field">
                        <input class="field" type="text" placeholder=" " id="org-name" name="" required>
                        <label class="prompt" for="org-name">Organization Name</label>
                    </div>
                    <div class="text-field">
                        <input class="field" type="text" placeholder=" " id="org-address" name="" required>
                        <label class="prompt" for="org-address">Organization Address</label>
                    </div>
                    <div class="text-field">
                        <input class="field" type="text" placeholder=" " id="representative" name="" required>
                        <label class="prompt" for="representative">Name of Representative</label>
                    </div>
                    <div class="text-field">
                        <input class="field" type="number" placeholder=" " id="reg-number" name="" required>
                        <label class="prompt" for="reg-number">Registration Number</label>
                    </div>
                </fieldset>
                <fieldset>
                    <legend>CONTACT DETAILS</legend>
                    <div class="text-field">
                        <input class="field" type="number" placeholder=" " id="contact-no" name="" required>
                        <label class="prompt" for="contact-no">Contact Number</label>
                    </div>
                    <div class="text-field">
                        <input class="field" type="email" placeholder=" " id="email" name="" required>
                        <label class="prompt" for="email">Email Address</label>
                    </div>
                </fieldset>
                <fieldset>
                    <legend>ACCOUNT DETAILS</legend>
                    <div class="text-field">
                        <input class="field" type="text" placeholder=" " id="username" name="" required>
                        <label class="prompt" for="username">Username</label>
                    </div>
                    <div class="text-field">
                        <input class="field" type="password" placeholder=" " id="password" name="" required>
                        <label class="prompt" for="password">Password</label>
                    </div>
                </fieldset>
                <div class="button-container">
                    <input type="submit" class="button" value="Sign Up">
                </div>
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