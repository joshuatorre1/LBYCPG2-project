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

<!--PHP SCRIPT FOR LOGGING IN-->
<?php
//    $usernameLogin = $passwordLogin = $statusLogin = "";
//
//    $sqlConnectLogin = mysqli_connect('localhost', 'root', '');
//    if (!$sqlConnectLogin) {
//        die();
//    }
//
//    if ($_SERVER["REQUEST_METHOD"] == "POST") {
//
//        $selectDBLogin = mysqli_select_db($sqlConnectLogin, 'LoginDatabase');
//        if (!$selectDBLogin) {
//            die();
//        }
//
//        $result_out_login = mysqli_query($sqlConnectLogin, "select * from AccountDetails");
//        $rows = mysqli_num_rows($result_out_login);
//        $count = 0;
//
//        $usernameLogin = $_POST["usernameLogin"];
//        $passwordLogin = $_POST["passwordLogin"];
//        $data_login = array(array());
//
//        while ($SRLog = mysqli_fetch_array($result_out_login)) {
//            $data_login[$count][0] = $SRLog["Username"];
//            $data_login[$count][0] = $SRLog["Password"];
//            $count++;
//        }
//
//        for ($i = 0; $i < $rows; $i++) {
//            if ((strcmp($data_login[$i][0], $usernameLogin) == 0) && (strcmp($data_login[$i][1], $passwordLogin) == 0)) {
//                $statusLogin = "Login successful! SCRIPT FOR JUMPING TO ORG HOME PAGE";     // ADD SCRIPT TO JUMP TO ORG HOME PAGE
//                break;
//            }
//            else if ((strcmp($data_login[$i][0], $usernameLogin) == 0) && (strcmp($data_login[$i][1], $passwordLogin) != 0)) {
//                $statusLogin = "Incorrect Password. Please try again.";
//                break;
//            }
//            else {
//                $statusLogin = "Your organization is not registered within the website.";
//            }
//        }
//    }
//    mysqli_close($sqlConnectLogin)
//?>

<div class="container">
    <form class="forms" method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
        <div class="h1-container"><h1>LOG IN USING YOUR ACCOUNT</h1></div>
        <div class="text-field">
            <input class="field" type="text" placeholder=" " id="username" name="usernameLogin" required>
            <label class="prompt" for="username">Username</label>
        </div>
        <div class="text-field">
            <input class="field" type="password" placeholder=" " id="password" name="passwordLogin" required>
            <label class="prompt" for="password">Password</label>
        </div>
        <div class="button-container">
            <input type="submit" class="button" value="Log In">
        </div>
        <div class="link-container">
            <a href="#reg-form">Don't have an account yet? Sign up here.</a>
        </div>

    </form>
<!--    <h4>--><?php //echo $statusLogin;?><!--</h4>-->
</div>


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
        $preferred = "DEFAULT DONATIONS (CHANGE IN SCRIPT)";    // FIX
        $orgDesc = "DEFAULT DESCRIPTION (CHANGE IN SCRIPT)";    // FIX

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
            $data[$count][4] = $SR["ContactNumber"];
            $data[$count][5] = $SR["EmailAddress"];
            $data[$count][6] = $SR["Username"];
            $data[$count][7] = $SR["Password"];
        }

        // Checking of existence of account
        $existing = true;
        for ($i = 0; $i < $rows; $i++) {
            if ((strcmp($data[$i][3], $regNumber) == 0)) {
                $status = "Organization is already registered. Kindly contact your representative in charge for account details";
                $existing = true;
                break;
            }
            else if ((strcmp($data[$i][5], $username) == 0)) {
                $status = "Username is already in use. Please register try again.";
                $existing = true;
            }
            else {
                $existing = false;
            }
        }
        if (!$existing) {
            $addrecord = "insert into AccountDetails(values('$orgName', '$orgAddress', '$representative', '$emailAdd', '$contactNum', '$regNumber', '$preferred', '$orgDesc','$username', '$password'))";
            mysqli_query($sqlConnect, $addrecord);

            $status = "Organization has successfully registered!";
        }

    }
    mysqli_close($sqlConnect);

?>

<div class="container" id="register-container">
    <form id="reg-form" class="forms" method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
        <div class="h1-container"><h1>REGISTER YOUR ORGANIZATION</h1></div>
        <fieldset>
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

    <h4><?php echo $status;?></h4>
</body>
