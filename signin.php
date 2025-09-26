<?php
$host = "localhost";
$user = "root";
$pass = "";
$db = "rictei_ecommerce";

$conn = new mysqli($host, $user, $pass, $db);
if($conn->connect_error){
    die("Connection failed: " . $conn->connect_error);
}

$email = $_POST['email'];
$password = password_hash($_POST['password'], PASSWORD_DEFAULT);

$stmt = $conn->prepare("INSERT INTO users (email, password) VALUES (?, ?)");
$stmt->bind_param("ss", $email, $password);

if($stmt->execute()){
    echo "Login saved successfully";
}else{
    echo "Error: " . $stmt->error;
}

$stmt->close();
$conn->close();
?>
