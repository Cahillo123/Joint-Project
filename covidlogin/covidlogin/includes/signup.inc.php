<?php
include("connection.php");

if (isset($_POST["submit"])) {
    $cipher = 'AES-128-CBC';
    $key = 'cryptokey';
    $iv = random_bytes(16);
    
    //Take in Image
    $image_contents = file_get_contents($_FILES['img']['tmp_name']);
    $img_name = $_FILES['img']['name'];
    
    //Take in Full Name and Encrypt
    $fullname = $conn -> real_escape_string($_POST['fullname']);
    $encrypted_fullname = openssl_encrypt($fullname, $cipher, $key, OPENSSL_RAW_DATA, $iv);
    $fullname_hex = bin2hex($encrypted_fullname);
    
    //Take in Username and Encrypt
    $username = $conn -> real_escape_string($_POST['username']);
    $encrypted_username = openssl_encrypt($username, $cipher, $key, OPENSSL_RAW_DATA, $iv);
    $username_hex = bin2hex($encrypted_username);
    
    //Take in Email and Encrypt
    $email = $conn -> real_escape_string($_POST['email']);
    $encrypted_email = openssl_encrypt($email, $cipher, $key, OPENSSL_RAW_DATA, $iv);
    $email_hex = bin2hex($encrypted_email);
    
    //Take in Address and Encrypt
    $address = $conn -> real_escape_string($_POST['address']);
    $encrypted_address = openssl_encrypt($address, $cipher, $key, OPENSSL_RAW_DATA, $iv);
    $address_hex = bin2hex($encrypted_address);
    
    //Take in Date of Birth and Encrypt
    $dob = $conn -> real_escape_string($_POST['dob']);
    $encrypted_dob = openssl_encrypt($dob, $cipher, $key, OPENSSL_RAW_DATA, $iv);
    $dob_hex = bin2hex($encrypted_dob);
    
    //Take in Phone Number and Encrypt
    $phonenumber = $conn -> real_escape_string($_POST['phonenumber']);
    $encrypted_phonenumber = openssl_encrypt($phonenumber, $cipher, $key, OPENSSL_RAW_DATA, $iv);
    $phonenumber_hex = bin2hex($encrypted_phonenumber);
    
    //Take in Close Contact Name and Encrypt
    $ccname = $conn -> real_escape_string($_POST['ccname']);
    $encrypted_ccname = openssl_encrypt($ccname, $cipher, $key, OPENSSL_RAW_DATA, $iv);
    $ccname_hex = bin2hex($encrypted_ccname);
    
    //Take in Close Contact Name and Encrypt
    $ccnumber = $conn -> real_escape_string($_POST['ccnumber']);
    $encrypted_ccnumber = openssl_encrypt($ccnumber, $cipher, $key, OPENSSL_RAW_DATA, $iv);
    $ccnumber_hex = bin2hex($encrypted_ccnumber);
    
    //Take in Password and Encrypt
    $password = $conn -> real_escape_string($_POST['password']);
    $passwordHashed = password_hash($password, PASSWORD_DEFAULT);
    
    //Encrypt Image
    $encrypted_img = openssl_encrypt($image_contents, $cipher, $key, OPENSSL_RAW_DATA, $iv);
    $img_hex = bin2hex($encrypted_img);
    
    //Encrypt Image Name
    $encrypted_img_name = openssl_encrypt($img_name, $cipher, $key, OPENSSL_RAW_DATA, $iv);
    $img_name_hex = bin2hex($encrypted_img_name);
    
    //Take in IV Hex
    $iv_hex = bin2hex($iv);
    
    //Insert all data into Database
    $sql = "INSERT INTO users (iv, fullname, username, email, password, address, dob, phonenumber, ccname, ccnumber,img_file_name,img_contents) VALUES 
    ('$iv_hex', '$fullname_hex', '$username_hex', '$email_hex', '$passwordHashed', '$address_hex', '$dob_hex', '$phonenumber_hex', '$ccname_hex', '$ccnumber_hex', '$img_name_hex','$img_hex')";
    
    if ($conn->query($sql) === TRUE) {
    echo '<p>New account created</p><br>';
    echo '<a href="../login.php">Click here to sign in!.</a>';
  } 
    else {
    die('Error adding account: ' . $conn->error);
  }
}