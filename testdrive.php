<?php
$servername = "localhost";
$username = "root"; 
$password = ""; 
$database = "porsche"; 

$conn = new mysqli($servername, $username, $password, $database);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $date = $_POST['date'];
    $car_model = $_POST['car_model'];
    $location = $_POST['location'];
    $showroom = $_POST['showroom'] ?? ''; 

    $sql = "INSERT INTO testdrive (name, email, phone, preferred_date, preferred_model, location, showroom_location)
            VALUES ('$name', '$email', '$phone', '$date', '$car_model', '$location', '$showroom')";

    if ($conn->query($sql) === TRUE) {
        echo '<script>alert("Booking successful!");</script>';
        echo '<script>
                setTimeout(function(){
                    window.location.href = "index.html#models";
                }, 2000);
              </script>';
    } else {
        echo '<script>alert("Error: ' . $conn->error . '");</script>';
    }
}
$conn->close();
?>
