<?php
include_once 'header.php';
?>

    <h2>Register your account</h2>
    <form action="includes/signup.inc.php" method="post" enctype="multipart/form-data">
        <label for="fullname"><b>Full Name</b></label>
        <input type="text" name="fullname" placeholder="Enter Full Name" required>
        
        <label for="email"><b>Email</b></label>
        <input type="text" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,4}$" name="email" placeholder="Enter Email" required>
        
        <label for="username"><b>Username</b></label>
        <input type="text" name="username" placeholder="Enter Username" required>
        
        <label for="password"><b>Password</b></label>
        <input type="password" name="password" placeholder="Enter Password" required>
        
        <label for="address"><b>Address</b></label>
        <input type="text" name="address" placeholder="Enter address" required>
        
        <label for="dob"><b>Date of Birth</b></label>
        <input type="text" name="dob" placeholder="Enter Date of Birth" required>
        
        <label for="phonenumber"><b>Phone Number</b></label>
        <input type="text" pattern="[0-9()]{2,5}[-]{0,1}[0-9]{5}" name="phonenumber" placeholder="Enter Phone Number" required>
        
        <label for="ccname"><b>Close Contact Name</b></label>
        <input type="text" name="ccname" placeholder="Enter Close Contact Name" required>
        
        <label for="ccnumber"><b>Close Contact Phone Number</b></label>
        <input type="text" name="ccnumber" placeholder="Enter Close Contact Phone Number" required>
        
        <label for="img"><b>Covid-19 Result</b></label>
        <input type="file" id="img" name="img" accept="image/*">
    
        <button type="submit" name="submit" class="btn">Sign Up!</button>
    </form>