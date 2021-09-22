<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <title>Donasyon</title>
        <link rel="stylesheet" type="text/css" href="assets/stylesheets/manage.css">
        <script src="https://code.jquery.com/jquery-1.10.2.js"></script>
        <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    </head>
    <body>
        <div id="nav-placeholder">

        </div>
        <script>
            $(function(){
                $("#nav-placeholder").load("navbar.html");
            });
        </script>
    </body>

    <!--PHP SCRIPT FOR REGISTRATION-->
    <?php
    // Variables in use
    $orgName = $orgAddress = $representative = $regNumber = $contactNum = $emailAdd = $username = $password = $status = "";
    // Checks connection to server
    $sqlConnect = mysqli_connect('localhost', 'root', '');
    if (!$sqlConnect) {
        die();
    }

    if ($_SERVER["REQUEST_METHOD"] == "POST") {

        // Checks connection to database
        $selectDB = mysqli_select_db($sqlConnect, "LoginDatabase");
        if (!$selectDB) {
            die();
        }

        // Preparation for data checking
        $result_out = mysqli_query($sqlConnect, "select * from AccountDetails");
        $rows = mysqli_num_rows($result_out);
        $count = 0;

        // Assigning values
        $orgName = $_POST["orgName"];
        $orgAddress = $_POST["orgAddress"];
        $representative = $_POST["representative"];
        $regNumber = $_POST["regNumber"];

        // FIX AFTER FRONT-END ADJUSTMENT
        $preferred = $_POST["preferred"];
        $orgDesc = $_POST["orgDesc"];

        $contactNum = $_POST["contactNum"];
        $emailAdd = $_POST["emailAdd"];
        $username = $_POST["username"];
        $password = $_POST["password"];

        // Store each row of table in 2D array
        $data = array(array());
        while ($SR = mysqli_fetch_array($result_out)) {
            $data[$count][0] = $SR["OrganizationName"];
            $data[$count][1] = $SR["OrganizationAddress"];
            $data[$count][2] = $SR["RepresentativeName"];
            $data[$count][3] = $SR["RegistrationNumber"];

            $data[$count][4] = $SR["PreferredDonations"];
            $data[$count][5] = $SR["OrganizationDescription"];

            $data[$count][6] = $SR["ContactNumber"];
            $data[$count][7] = $SR["EmailAddress"];
            $data[$count][8] = $SR["Username"];
            $data[$count][9] = $SR["Password"];
            $count++;
        }

        // Checking of existence of account
        $existing = true;
        for ($i = 0; $i < $rows; $i++) {
            if ((strcmp($data[$i][3], $regNumber) == 0)) {
                $status = 2;
                $existing = true;
                break;
            }
            else if ((strcmp($data[$i][8], $username) == 0)) {
                $status = 3;
                $existing = true;
            }
            else {
                $existing = false;
            }
        }
        if (!$existing) {
            $addrecord = "insert into AccountDetails(values('$orgName', '$orgAddress', '$representative', '$emailAdd', '$contactNum', '$regNumber', '$preferred', '$orgDesc','$username', '$password'))";
            mysqli_query($sqlConnect, $addrecord);
            // Adds to the Organization List Table

            $selectDB1 = mysqli_select_db($sqlConnect, "OrganizationDatabase");
            if (!$selectDB1) {
                die();
            }

            $addrecord1 = "insert into OrganizationList(values(NULL,'$orgName', '$orgAddress', '$representative', '$emailAdd', '$contactNum', '$regNumber', '$preferred', '$orgDesc'))";
            mysqli_query($sqlConnect, $addrecord1);

            $status = 1;
        }

    }
    mysqli_close($sqlConnect);

    ?>

    <div class="container" id="register-container">
        <form id="reg-form" class="forms" method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
            <div class="h1-container"><h1>REGISTER YOUR ORGANIZATION</h1></div>
            <fieldset id="basic-info">
                <legend>BASIC INFORMATION</legend>
                <div class="text-field">
                    <input class="field" type="text" placeholder=" " id="org-name" name="orgName" required>
                    <label class="prompt" for="org-name">Organization Name</label>
                </div>
                <div class="text-field">
                    <input class="field" type="text" placeholder=" " id="org-address" name="orgAddress" required>
                    <label class="prompt" for="org-address">Organization Address</label>
                </div>
                <div class="text-field">
                    <input class="field" type="text" placeholder=" " id="representative" name="representative" required>
                    <label class="prompt" for="representative">Name of Representative</label>
                </div>
                <div class="text-field">
                    <input class="field" type="text" placeholder=" " id="reg-number" name="regNumber" required>
                    <label class="prompt" for="reg-number">Registration Number</label>
                </div>
                <div class="text-field">
                    <input class="field" type="text" placeholder=" " id="preferred-donation" name="preferred" required>
                    <label class="prompt" for="preferred-donation">Preferred Donation</label>
                </div>
                <div class="text-field">
                    <textarea class="field" type="text" placeholder="Please write a short description about your organization..." id="org-description" name="orgDesc"></textarea>
<!--                    <label class="prompt" for="org-description">Organization Description</label>-->
                </div>
            </fieldset>
            <fieldset>
                <legend>CONTACT DETAILS</legend>
                <div class="text-field">
                    <input class="field" type="number" placeholder=" " id="contact-no" name="contactNum" required>
                    <label class="prompt" for="contact-no">Contact Number</label>
                </div>
                <div class="text-field">
                    <input class="field" type="email" placeholder=" " id="email" name="emailAdd" required>
                    <label class="prompt" for="email">Email Address</label>
                </div>
            </fieldset>
            <fieldset>
                <legend>ACCOUNT DETAILS</legend>
                <div class="text-field">
                    <input class="field" type="text" placeholder=" " id="username" name="username" required>
                    <label class="prompt" for="username">Username</label>
                </div>
                <div class="text-field">
                    <input class="field" type="password" placeholder=" " id="password" name="password" required>
                    <label class="prompt" for="password">Password</label>
                </div>
            </fieldset>
<!--            <div>-->
<!--                <h4 class="error">--><?php //echo $status;?><!--</h4>-->
<!--            </div>-->
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
        <?php
        if($status == 1) {
            echo "
            <script type=\"text/javascript\">swal('Registration Complete', 'Please log in now.', 'success');</script>
            ";
        } else if($status == 2) {
            echo "
            <script type=\"text/javascript\">swal('Organization Already Registered', 'Kindly contact your representative in charge of the account details', 'error');</script>
            ";
        } else if($status == 3) {
            echo "
            <script type=\"text/javascript\">swal('Username Already Taken', 'Please use another username', 'error');</script>
            ";
        }
        ?>
</html>