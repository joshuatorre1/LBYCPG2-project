<?php
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <title>Donasyon</title>
        <link rel="stylesheet" type="text/css" href="assets/stylesheets/donate.css">
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
        <div class="main-container">
            <div class="specific-calamity-container">
                <!--img -->
                <!--h1 -->
                <!--p -->
            </div>
            <div class="form-container">
                <form class="forms" method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
<!--                    <div class="text-field">-->
<!--                        <label id="choose-label">Choose an organization</label>-->
<!--                        <select>-->
<!--                            <option>Org 1</option>-->
<!--                            <option>Org 1</option>-->
<!--                            <option>Org 1</option>-->
<!--                            <option>Org 1</option>-->
<!--                        </select>-->
<!--                    </div>-->
<!--                    <div class="text-field">-->
<!--                        <textarea>Type</textarea>-->
<!--                        <label class="prompt" for="item">Password</label>-->
<!--                    </div>-->
                    <div class="h1-container"><h1>Fill up donation form</h1></div>
                    <div class="text-field">
                        <select name="chosenOrganization" required>
                            <option value="" disabled selected>Select an organization</option>
                            <option>Organization A</option>
                        </select>
                    </div>
                    <div class="text-field">
                        <input class="field" type="text" placeholder=" " id="item" name="item" required>
                        <label class="prompt" for="item">Name of Item</label>
                    </div>
                    <div class="text-field">
                        <input class="field" type="number" placeholder=" " id="quantity" name="quantity" required>
                        <label class="prompt" for="quantity">Quantity</label>
                    </div>
                    <div class="text-field">
                        <input class="field" type="email" placeholder=" " id="email" name="email" required>
                        <label class="prompt" for="email">Email Address</label>
                    </div>
                    <div class="text-field">
                        <input class="field" type="number" placeholder=" " id="contact-no" name="contact-no" required>
                        <label class="prompt" for="contact-no">Contact Number</label>
                    </div>
                    <div class="text-field">
                        <p>You may include your name so you will be recognized as one of our donors.</p>
                    </div>
                    <div class="text-field">
                        <input class="field" type="text" placeholder=" " id="name" name="name">
                        <label class="prompt" for="name">Your Name (optional)</label>
                    </div>
                    <input type="submit" class="button" value="Submit">
                </form>
            </div>

        </div>
    </body>
</html>
