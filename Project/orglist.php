<?php
$sqlConnect = mysqli_connect('localhost', 'root', '');
if(!$sqlConnect) die();
$selectDB = mysqli_select_db($sqlConnect, 'OrganizationDatabase');
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
        </style>
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

        <div class="table-container">
            <table>
                <tr>
                    <th>Organization Name</th>
                    <th>Organization Address</th>
                    <th>Name of Representative</th>
                    <th>Email Address</th>
                    <th>Contact Number</th>
                    <th>Registration Number</th>
                    <th>Preferred Donations</th>
                    <th>Organization Description</th>
                </tr>
                <?php
                    $result_out = mysqli_query($sqlConnect, "select * from OrganizationList");
                    if(!$result_out) die();
                    while($SR = mysqli_fetch_array($result_out)) {
                        $orgName = $SR['OrganizationName'];
                        $orgAddress = $SR['OrganizationAddress'];
                        $representative = $SR['RepresentativeName'];
                        $emailAdd = $SR['EmailAddress'];
                        $contactNum = $SR['ContactNumber'];
                        $regNumber = $SR['RegistrationNumber'];
                        $preferred = $SR['PreferredDonations'];
                        $orgDesc = $SR['OrganizationDescription'];
                        echo "<tr><td>".$orgName."</td><td>".$orgAddress."</td><td>".$representative."</td><td>".$emailAdd."</td><td>
                        ".$contactNum."</td><td>".$regNumber."</td><td>".$preferred."</td><td>".$orgDesc."</td></tr>";
                    }
                ?>
            </table>
        </div>
    </body>
</html>

<?php
mysqli_close($sqlConnect);
?>