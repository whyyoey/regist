<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>ID Card System</title>
    <style>
        /* Add your own styles here */
    </style>
</head>
<body>
    <h1>ID Card System</h1>
    <form action="register.php" method="post">
        <label for="username">Username:</label>
        <input type="text" id="username" name="username" required><br>
        <label for="email">Email:</label>
        <input type="email" id="email" name="email" required><br>
        <label for="region">Region:</label>
        <select id="region" name="region" required>
            <option value="">Select a region</option>
            <?php foreach ($regions as $region) { ?>
            <option value="<?php echo $region['id']; ?>"><?php echo $region['region_name']; ?></option>
            <?php } ?>
        </select><br>
        <label for="city">City:</label>
        <select id="city" name="city" required>
            <option value="">Select a city</option>
        </select><br>
        <button type="submit">Register</button>
    </form>
    <br>
    <div>
        <button onclick="location.href='report.php'">View Report</button>
    </div>
    <br>
    <div>
        <form action="generate_id_card.php" method="get">
            <label for="user_id">Select a user:</label>
            <select id="user_id" name="user_id" required>
                <option value="">Select a user</option>
                <?php foreach ($users as $user) { ?>
                <option value="<?php echo $user['id']; ?>"><?php echo $user['username']; ?></option>
                <?php } ?>
            </select>
            <button type="submit">Generate ID Card</button>
        </form>
    </div>
</body>
</html>
