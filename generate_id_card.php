<?php
require_once 'db.php';

// Retrieve user data from database
$user_id = $_GET['user_id'];
$sql = "SELECT users.*, regions.region_name, cities.city_name FROM users
        INNER JOIN regions ON users.region_id = regions.id
        INNER JOIN cities ON users.city_id = cities.id
        WHERE users.id = $user_id";
$result = mysqli_query($conn, $sql);
$user = mysqli_fetch_assoc($result);

// Generate ID card image
$im = imagecreate(600, 400);
$bg_color = imagecolorallocate($im, 255, 255, 255);
$text_color = imagecolorallocate($im, 0, 0, 0);
imagestring($im, 5, 240, 50, 'ID Card', $text_color);
imagestring($im, 4, 50, 100, 'Username: '.$user['username'], $text_color);
imagestring($im, 4, 50, 150, 'Email: '.$user['email'], $text_color);
imagestring($im, 4, 50, 200, 'Region: '.$user['region_name'], $text_color);
imagestring($im, 4, 50, 250, 'City: '.$user['city_name'], $text_color);
header('Content-type: image/png');
imagepng($im);
imagedestroy($im);
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>ID Card - ID Card System</title>
    <style>
        /* Add your own styles here */
    </style>
</head>
<body>
    <h1>ID Card - ID Card System</h1>
    <img src="generate_id_card.php?user_id=<?php echo $user_id; ?>" alt="ID Card">
    <button onclick="window.print()">Print</button>
</body>
</html>

<?php mysqli_close($conn); ?>
