
<?php
// Variables in use
// YOU MIGHT HAVE TO ADD THE NAME OF THE ISSUE AS THE DEFAULT VARIABLE FOR THIS PAGE
$orgName = $item = $qty = $emailAdd = $contactNum = $name = "";

$sqlConnect = mysqli_connect('localhost', 'root', '');
if (!$sqlConnect) {
    die();
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $selectDB = mysqli_select_db($sqlConnect, "LoginDatabase");
    if (!$selectDB) {
        die();
    }

    // FOR THE SELECTION OF THE AVAILABLE ORGANIZATIONS
    $list_out = mysqli_query($sqlConnect, "select * from AccountDetails");
    $rows = mysqli_num_rows($list_out);
    $count = 0;

    // IT MIGHT BE A GOOD IDEA TO ADD THE TIMESTAMP
    // YOU MIGHT HAVE TO ADD THE NAME OF THE ISSUE AS THE DEFAULT VARIABLE FOR THIS PAGE
    $orgName = $_POST["orgName"];
    $item = $_POST["item"];
    $qty = $_POST["qty"];
    $emailAdd = $_POST["emailAdd"];
    $contactNum = $_POST["contactNum"];
    $name = $_POST["name"];
    $data = array(array());

    // FOR DROP DOWN
//    while ($SR = mysqli_fetch_array($list_out)) {
//        echo "<option value = \"organizations1\">".$SR['OrganizationName']."</option>";
//    }


    // CONNECTS TO A DONATIONS DATABASE
    $selectDB = mysqli_select_db($sqlConnect, "DonationDatabase");
    if (!$selectDB) {
        die();
    }

    // IT MIGHT BE A GOOD IDEA TO ADD THE TIMESTAMP
    // YOU MIGHT HAVE TO ADD THE NAME OF THE ISSUE AS THE DEFAULT VARIABLE FOR THIS PAGE
    $addrecord = "insert into DonationTable(values('$orgName', '$item', '$qty', '$emailAdd', '$contactNum', '$name'))";
    mysqli_query($sqlConnect, $addrecord);

}


?>


<select name = "organizations">
    <option>
        <?php
            while($SR = mysqli_fetch_array($list_out)) {

            }
        ?>
    </option>
</select>
