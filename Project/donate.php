<?php

$sqlConnect = mysqli_connect('localhost', 'root', '');
if (!$sqlConnect) {
    die();
}

// Select database
$selectDB = mysqli_select_db($sqlConnect, 'OrganizationDatabase');
if (!$selectDB) die();

$query = mysqli_query($sqlConnect, "select * from OrganizationList");

$status = "";
if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $selectDB1 = mysqli_select_db($sqlConnect, 'DonationDatabase');
    if (!$selectDB1) die();

    $orgName = $_POST["chosenOrganization"];
    $item = $_POST["item"];
    $qty = $_POST["quantity"];
    $emailAdd = $_POST["email"];
    $contactNum = $_POST["contact-no"];
    $name = $_POST["name"];

    $addRecord = "insert into DonationTable values('NULL', '$orgName', '$item', '$qty', '$emailAdd', '$contactNum', '$name')";
    $verify = mysqli_query($sqlConnect, $addRecord);
    if(!$verify) {
        die();
    } else {
        $status = 1;
    }

}

?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <title>Donasyon</title>
        <link rel="stylesheet" type="text/css" href="assets/stylesheets/donate.css">
        <script src="https://code.jquery.com/jquery-1.10.2.js"></script>
        <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    </head>
    <body>
        <div id="nav-placeholder">

        </div>
        <script>
            $(function(){
                $("#nav-placeholder").load("navbar.php");
            });
        </script>
        <div class="main-container">
            <div class="specific-calamity-container">
                <div class="specific-container">
                    <img src="assets/images/slides/slide1.jpg">
                    <h1>Protect Our Frontliners</h1>
                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et
                    dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.
                        Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et
                        dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.
                        Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et
                        dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
                </div>

            </div>
            <div class="form-container">
                <form class="forms" method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
                    <div class="h1-container"><h1>Fill up donation form</h1></div>
                    <div class="text-field">
                        <select name="chosenOrganization" required>
                            <option value="" disabled selected>Select an organization</option>
                            <?php while($SR = mysqli_fetch_array($query)):;?>
                            <option value="<?php echo $SR['OrganizationName'];?>"><?php echo $SR['OrganizationName'];?></option>
                            <?php endwhile;?>
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
                <?php
                if($status == 1) {
                    echo "
                    <script type=\"text/javascript\">swal('Thank you!', 'Please wait for the chosen organization to contact you.', 'success');</script>
                    ";
                }
                ?>
            </div>

        </div>
    </body>
</html>