<?php
require_once 'db.php';

// Retrieve users from database
$users = array();
$sql = "SELECT users.*, regions.region_name, cities.city_name FROM users
        INNER JOIN regions ON users.region_id = regions.id
        INNER JOIN cities ON users.city_id = cities.id";
$result = mysqli_query($conn, $sql);
if (mysqli_num_rows($result) > 0) {
    while ($row = mysqli_fetch_assoc($result)) {
        $users[] = $row;
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Report - ID Card System</title>
    <style>
        /* Add your own styles here */
    </style>
</head>
<body>
    <h1>Report - ID Card System</h1>
    <table>
        <thead>
            <tr>
                <th>Username</th>
                <th>Email</th>
                <th>Region</th>
                <th>City</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($users as $user) { ?>
            <tr>
                <td><?php echo $user['username']; ?></td>
                <td><?php echo $user['email']; ?></td>
                <td><?php echo $user['region_name']; ?></td>
                <td><?php echo $user['city_name']; ?></td>
            </tr>
            <?php } ?>
        </tbody>
    </table>
    <button onclick="window.print()">Print</button>
</body>
</html>

<?php mysqli_close($conn); ?>
