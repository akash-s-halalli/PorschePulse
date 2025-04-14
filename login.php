<?php
$host = 'localhost';
$dbname = 'porsche';
$username = 'root';
$password = '';

try {
    $conn = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $email = $_POST['email'];
        $password = $_POST['password'];

        $stmt = $conn->prepare("SELECT * FROM users WHERE email = :email");
        $stmt->bindParam(':email', $email);
        $stmt->execute();
        $user = $stmt->fetch();

        if ($user && password_verify($password, $user['password'])) {
            session_start();
            $_SESSION['username'] = $user['username'];
            $_SESSION['email'] = $user['email'];

            $userInfo = [
                'username' => $user['username'],
                'email' => $user['email']
            ];
            echo "<script>
                    localStorage.setItem('loggedInUser', JSON.stringify(" . json_encode($userInfo) . "));
                    window.location.href = 'index.html';
                  </script>";
            exit(); 
        } else {
            echo "<script>
                    alert('Invalid Email or password');
                    window.location.href = 'login.html';
                  </script>";
            exit(); 
        }
    }
} catch (PDOException $e) {
    echo "Error: " . $e->getMessage();
}
?>
