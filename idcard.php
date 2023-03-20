<?php
require_once 'db.php';

$user_id = $_GET['id'];
$sql = "SELECT users.*, regions.region_name, cities.city_name FROM users INNER JOIN regions ON users.region_id = regions.id INNER JOIN cities ON users.city_id = cities.id WHERE users.id = '$user_id'";
$result = mysqli_query($conn, $sql);
$row = mysqli_fetch_assoc($result);
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>ID Card</title>
    <style>
        /* Add your own styles here */
    </style>
</head>
<body>
    <h1>ID Card</h1>
    <h2>Name: <?php echo $row['username']; ?></h2>
    <h3>Email: <?php echo $row['email']; ?></h3>
    <h3>Region: <?php echo $row['region_name']; ?></h3>
    <h3>City: <?php echo $row['city_name']; ?></h3>
    <img src="https://api.qrserver.com/v1/create-qr-code/?size=150x150&data=<?php echo $row['id']; ?>">
    <p>QR Code</p>
    
   
