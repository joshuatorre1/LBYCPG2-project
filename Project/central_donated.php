<?php
$sqlConnect = mysqli_connect('localhost', 'root', '');
if(!$sqlConnect) die();
$selectDB = mysqli_select_db($sqlConnect, 'DonationDatabase');
if(!$selectDB) die();

// ISSUE
$issue = "Frontliners Aid";
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
            $("#nav-placeholder").load("navbar.php");
        });
    </script>

    <div class="table-container">
        <table>
            <tr>
                <th>Donated Cause</th>
                <th>Donated Organization</th>
                <th>Item Donated</th>
                <th>Quantity</th>
                <th>Name</th>
            </tr>
            <?php
            $result_out = mysqli_query($sqlConnect, "select * from DonationTable");
            if(!$result_out) die();
            while($SR = mysqli_fetch_array($result_out)) {
                $issue = $SR['Issue'];
                $orgName = $SR['OrganizationName'];
                $item = $SR['ItemDonated'];
                $quantity = $SR['Quantity'];
                $name = $SR['Name'];
                echo "<tr><td>".$issue."</td><td>".$orgName."</td><td>".$item."</td><td>".$quantity."</td><td>".$name."</td></tr>";
            }
            ?>
        </table>
    </div>
    </body>
    </html>

<?php
mysqli_close($sqlConnect);
?>