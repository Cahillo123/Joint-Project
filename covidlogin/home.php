<?php
session_start();
include_once 'loggedInHeader.php';

if (isset($_SESSION["useruid"])) {
echo "<p>Welcome " . $_SESSION['useruid'] . "</p>";
}
?>

    <h2>Update User Info</h2>
    <form action="includes/home.inc.php" method="post" enctype='multipart/form-data'>
        <label for="email"><b>Address</b></label>
        <input type="text" name="address" placeholder="Enter Address">
        <label for="email"><b>Date of Birth</b></label>
        <input type="text" name="dob" placeholder="Enter Date of Birth">
        <label for="email"><b>Phone Number</b></label>
        <input type="text" name="phone" placeholder="Enter Phone Number">
        <label for="email"><b>Close Contact Name</b></label>
        <input type="text" name="ccname" placeholder="Enter Close Contact Name">
        <label for="email"><b>Close Contact Phone Number</b></label>
        <input type="text" name="ccnumber" placeholder="Enter Close Contact Phone Number">
        <label for="email"><b>Positive Covid-19 Antigen Test</b></label><br>
        <input type="file" name="uploadfile" value="" />
        <button type="submit" name="submit" class="btn">Update</button>
    </form>