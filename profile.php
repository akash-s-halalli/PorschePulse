<?php
session_start();
include 'database.php';

if (!isset($_SESSION['email'])) {
    header('Location: login.php');
    exit();
}

$email = $_SESSION['email'];

$userQuery = "SELECT * FROM users WHERE email = '$email'";
$userResult = mysqli_query($conn, $userQuery);
if (!$userResult) {
    die("Error fetching user details: " . mysqli_error($conn));
}
$userData = mysqli_fetch_assoc($userResult);

$testDriveQuery = "SELECT * FROM testdrive WHERE email = '$email' LIMIT 3";
$testDriveResult = mysqli_query($conn, $testDriveQuery);
if (!$testDriveResult) {
    die("Error fetching test drive details: " . mysqli_error($conn));
}
$testDriveData = mysqli_fetch_all($testDriveResult, MYSQLI_ASSOC);

$contactUsQuery = "SELECT * FROM contactus WHERE email = '$email'";
$contactUsResult = mysqli_query($conn, $contactUsQuery);
if (!$contactUsResult) {
    die("Error fetching contact us details: " . mysqli_error($conn));
}
$contactUsData = mysqli_fetch_assoc($contactUsResult);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Profile</title>
    <style>

        @font-face {
            font-family: fonth;
            src: url(Font/TT\ Octosquares\ Trial\ Black.ttf);
        }
        
        body {
            font-family: Arial, sans-serif;
            font-family: fonth;
            background-color: black;
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
        }

        .container {
            width: 90%;
            max-width: 1200px;
            margin: 20px auto;
            background-color: #E5E4E2;
            box-shadow: 0 0 20px rgba(0, 0, 0, 0.1);
            border-radius: 10px;
            overflow: hidden;
            
        }

        header {
            background-color: black;
            color: #fff;
            padding: 15px;
            text-align: center;
            border-radius: 50px;
            border: 10px solid #E5E4E2;
        }

        .logo {
            width: 50px;
            height: 50px;
            display: inline-block;
            vertical-align: middle;
            margin-right: 10px;
        }

        nav {
            display: inline-block;
            vertical-align: middle;
        }

        nav ul {
            list-style-type: none;
            margin: 0;
            padding: 0;
            text-align: center;
        }

        nav ul li {
            display: inline-block;
            margin-right: 20px;
        }

        nav ul li a {
            color: #fff;
            text-decoration: none;
            font-size: 16px;
            transition: color 0.3s ease-in-out;
        }

        nav ul li a:hover {
            color: #ffc107;
        }

        .logout-btn {
            background-color: #C29049;
            color: #fff;
            border: none;
            padding: 8px 16px;
            border-radius: 5px;
            cursor: pointer;
            transition: background-color 0.3s ease-in-out;
        }

        .logout-btn:hover {
            background-color: black;
            color:#C29049;
            border-color: #C29049;

        }

        h1, h2, p {
            margin: 0 0 10px;
        }

        .details-section {
            margin-bottom: 30px;
            padding: 20px;
            background-color: #C0C0C0;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        .details-section h2 {
            border-bottom: 2px solid #333;
            padding-bottom: 5px;
            margin-bottom: 15px;
        }

        .details-section p {
            font-size: 16px;
        }

        .no-data {
            font-style: italic;
            color: #888;
        }

        .fade-in {
            animation: fadeIn 1s ease-in-out;
        }

        @keyframes fadeIn {
            from {
                opacity: 0;
            }
            to {
                opacity: 1;
            }
        }
    </style>
</head>
<body>
    <div class="container fade-in">
        <header>
            <img src="Images/logo.png" alt="Logo" class="logo">
            <nav>
                <ul>
                    <li><a href="index.html">Home</a></li>
                    <li><a href="models.html">Models</a></li>
                    <li><a href="experience.html">Experience</a></li>
                    <li><button class="logout-btn" onclick="logout()">Logout</button></li>
                </ul>
            </nav>
        </header>

        <h1 style="padding: 20px 20px 10px 20px">User Profile</h1>
        <div class="details-section">
            <h2>User Details</h2>
            <p>Name: <?php echo $userData['name']; ?></p>
            <p>Email: <?php echo $userData['email']; ?></p>
        </div>

        <?php if (!empty($testDriveData)): ?>
            <div class="details-section">
                <h2>Test Drive Details</h2>
                <?php foreach ($testDriveData as $index => $testDrive): ?>
                    <div class="test-drive-info">
                        <h3>Test Drive <?php echo $index + 1; ?></h3>
                        <p>Preferred Date: <?php echo $testDrive['preferred_date']; ?></p>
                        <p>Preferred Model: <?php echo $testDrive['preferred_model']; ?></p>
                        <p>Location for Test Drive: <?php echo $testDrive['location']; ?></p>
                        <p>Booking Date and Time: <?php echo $testDrive['created_at']; ?></p>
                    </div>
                <?php endforeach; ?>
            </div>
        <?php else: ?>
            <div class="details-section">
                <h2>Test Drive Details</h2>
                <p class="no-data">No test drive details found.</p>
            </div>
        <?php endif; ?>

        <div class="details-section">
            <h2>Contact Us Details</h2>
            <?php if ($contactUsData): ?>
                <p>Subject: <?php echo $contactUsData['subject']; ?></p>
                <p>Message: <?php echo $contactUsData['message']; ?></p>
            <?php else: ?>
                <p class="no-data">No contact us details found.</p>
            <?php endif; ?>
        </div>
    </div>

    <script>
        function logout() {
            if (confirm("Are you sure you want to logout?")) {
                localStorage.removeItem('loggedInUser');
                window.location.href = "index.html";
            }
        }
    </script>

</body>
</html>
