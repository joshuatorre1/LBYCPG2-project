<?php

// FIND A WAY TO CHECK WHAT ACCOUNT IS ACTIVE

    // Variables in use
    // YOU MIGHT HAVE TO ADD THE NAME OF THE ISSUE AS THE DEFAULT VARIABLE FOR THIS PAGE
    $orgName = $item = $qty = $emailAdd = $contactNum = $name = "";

    $sqlConnect = mysqli_connect('localhost', 'root', '');
    if (!$sqlConnect) {
        die();
    }

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $selectDB = mysqli_select_db($sqlConnect, "DonationDatabase");
        if (!$selectDB) {
            die();
        }
        // RETRIEVES ORGANIZATION LIST
        $list_out = mysqli_query($sqlConnect, "select * from DonationTable");
        $rows = mysqli_num_rows($list_out);
        $count = 0;
        $data = array(array());

        while ($SR = mysqli_fetch_array($list_out)) {
            // YOU MIGHT HAVE TO ADD THE NAME OF THE ISSUE AS THE DEFAULT VARIABLE FOR THIS PAGE
            $data[$count][0] = $SR["OrganizationName"];
            $data[$count][1] = $SR["ItemDonated"];
            $data[$count][2] = $SR["Quantity"];
            $data[$count][3] = $SR["EmailAddress"];
            $data[$count][4] = $SR["ContactNumber"];
            $data[$count][5] = $SR["Name"];

        }
    }

?>