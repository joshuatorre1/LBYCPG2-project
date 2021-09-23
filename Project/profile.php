<?php
session_start();

if(!isset($_SESSION['usernameLogin'])) header('location: manage.php');
?>

<?php
$sqlConnect = mysqli_connect('localhost', 'root', '');
if(!$sqlConnect) die();
$selectDB = mysqli_select_db($sqlConnect, 'DonationDatabase');
if(!$selectDB) die();

?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <title>Donasyon</title>
        <style>
            table {
                border-collapse: collapse;
                width: 100%;
                font-family: 'Raleway', sans-serif;
                font-size: 16px;
                text-align: left;
            }
            th {
                background-color: #fc6f41;
                color: whitesmoke;
            }
            .remove-link {
                background-color: transparent;
            }
            .logout {
                height: 50px;
                width: 200px;
                line-height: 43px;
                margin: 3px;
                padding: 0 22px;
                font-size: 0.73rem;
                text-transform: uppercase;
                letter-spacing: 1px;
                border-radius: 3px;
                transition: 0.1s ease-in-out;
                background-color: var(--main-color);
                color: #fff;
                border: none;
                cursor: pointer;
            }
        </style>
        <link rel="stylesheet" type="text/css" href="assets/stylesheets/manage.css">
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

    <a class="logout" href="logout.php">Logout</a>
    <div class="table-container">
        <table>
            <tr>
                <th>Donation ID</th>
                <th>Item Donated</th>
                <th>Quantity</th>
                <th>Email Address</th>
                <th>Contact Number</th>
                <th>Name</th>
                <th>Delete</th>
            </tr>
            <?php
            $result_out = mysqli_query($sqlConnect, "select * from DonationTable where OrganizationName = '$_SESSION[OrganizationName]'");
            if(!$result_out) die();
            while($SR = mysqli_fetch_array($result_out)) {
            ?>
                <tr>
                    <td><?php echo $SR['DonationID'];?></td>
                    <td><?php echo $SR['ItemDonated'];?></td>
                    <td><?php echo $SR['Quantity'];?></td>
                    <td><?php echo $SR['EmailAddress'];?></td>
                    <td><?php echo $SR['ContactNumber'];?></td>
                    <td><?php echo $SR['Name'];?></td>
                    <td><a href="delete.php?a=<?php echo $SR['DonationID'];?>">Collected</a></td>
                </tr>
            <?php } ?>
        </table>
    </div>
    </body>
</html>