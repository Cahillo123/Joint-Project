<?php
include_once '../header.php';
include_once 'connection.php';
session_start();

$cipher = 'AES-128-CBC';
$key = 'cryptokey';
$iv = random_bytes(16);

$sql = "SELECT username, password, iv FROM users";
$result = $conn->query($sql);

while($row = $result->fetch_assoc()) {
 $iv = hex2bin($row['iv']);
 $username = openssl_encrypt($_POST['username'], $cipher, $key, OPENSSL_RAW_DATA, $iv);
 $passwordHashed = $_POST['password'];

    
    if($username == hex2bin($row['username']) && password_verify($passwordHashed, $row['password']))
    {
        echo "<script>location.href = '../home.php';</script>";
        $_SESSION['loggedIn'] = bin2hex($username);
    }
    else
    {
        echo "Incorrect Login Details.";
    }
    mysqli_close($conn);
}
?>