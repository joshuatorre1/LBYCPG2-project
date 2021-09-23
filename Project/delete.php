<?php
$id = $_GET['a'];

$sqlConnect = mysqli_connect("localhost","root", "");
if(!$sqlConnect) die();
$selectDB = mysqli_select_db($sqlConnect, "DonationDatabase");
if(!$selectDB) die();

$query = mysqli_query($sqlConnect, "delete from DonationTable where DonationID = '$id'");
header('location: profile.php');