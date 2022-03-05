<?php
include_once 'loggedInheader.php';
include_once 'includes/connection.php';
session_start();

$cipher = 'AES-128-CBC';
$key = 'cryptokey';
$iv = random_bytes(16);
$user = $_SESSION['loggedIn'];

//Retrieve data from database
$sql = "SELECT id, iv, fullname, username, email, address, dob, phonenumber, ccname, ccnumber, img_file_name, img_contents FROM users WHERE username = '$user'";
$result = $conn->query($sql);

//Display Table Headings
if ($result->num_rows > 0) {
  echo '
  <table><tr>
  <th>ID</th>
  <th>Full Name</th>
  <th>Username</th>
  <th>Email</th>
  <th>Address</th>
  <th>Date of Birth</th>
  <th>Phone Number</th>
  <th>Covid Result</th>
  <th>Close Contact Name</th>
  <th>Close Contact Phone Number</th>
  </tr>';
    
  while($row = $result->fetch_assoc()) {
    $id = $row['id'];
    $iv = hex2bin($row['iv']);
      
    //Decrypt Full Name  
    $fullname = hex2bin($row['fullname']);
    $unencrypted_fullname = openssl_decrypt($fullname, $cipher, $key, OPENSSL_RAW_DATA, $iv);
    
    //Decrypt Username 
    $username = hex2bin($row['username']);
    $unencrypted_username = openssl_decrypt($username, $cipher, $key, OPENSSL_RAW_DATA, $iv);
      
    //Decrypt Email  
    $email = hex2bin($row['email']);
    $unencrypted_email = openssl_decrypt($email, $cipher, $key, OPENSSL_RAW_DATA, $iv);
     
    //Decrypt Address   
    $address = hex2bin($row['address']);
    $unencrypted_address = openssl_decrypt($address, $cipher, $key, OPENSSL_RAW_DATA, $iv);
    
    //Decrypt Date of Birth   
    $dob = hex2bin($row['dob']);
    $unencrypted_dob = openssl_decrypt($dob, $cipher, $key, OPENSSL_RAW_DATA, $iv);
      
    //Decrypt Phone Number   
    $phonenumber = hex2bin($row['phonenumber']);
    $unencrypted_phonenumber = openssl_decrypt($phonenumber, $cipher, $key, OPENSSL_RAW_DATA, $iv);
     
    //Decrypt Image  
    $image = hex2bin($row['img_contents']);  
    $unencrypted_image = openssl_decrypt($image, $cipher, $key, OPENSSL_RAW_DATA, $iv);
      
    //Decrypt Close Contact Name   
    $ccname = hex2bin($row['ccname']);
    $unencrypted_ccname = openssl_decrypt($ccname, $cipher, $key, OPENSSL_RAW_DATA, $iv);
      
    //Decrypt Close Contact Number   
    $ccnumber = hex2bin($row['ccnumber']);
    $unencrypted_ccnumber = openssl_decrypt($ccnumber, $cipher, $key, OPENSSL_RAW_DATA, $iv);
    
    //Decrypt Image   
    $display_unencrypted_image = '<img src="data:image/jpeg;base64,'.base64_encode( $unencrypted_image ). '" height="100" width="100"/>';  
      
    //Display Data in Table  
    echo "<tr>
          <td>$id</td>
          <td>$unencrypted_fullname</td>
          <td>$unencrypted_username</td>
          <td>$unencrypted_email</td>
          <td>$unencrypted_address</td>
          <td>$unencrypted_dob</td>
          <td>$unencrypted_phonenumber</td>
          <td>$display_unencrypted_image</td>
          <td>$unencrypted_ccname</td>
          <td>$unencrypted_ccnumber</td>
          </tr>";
  }
  echo '</table>';
} else {
  echo '<p>You are not logged in!</p>';
}
