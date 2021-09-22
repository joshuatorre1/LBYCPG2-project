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
            <a href="register.php">Don't have an account yet? Sign up here.</a>
        </div>

    </form>
    <!--    <h4>--><?php //echo $statusLogin;?><!--</h4>-->
</div>

</body>
</html>