<?php 
$db_name = 'mysql:host=localhost;dbname=icecreem_cafe';
$user_name = 'root';
$user_password = ''; // Fixed the variable name

try {
    $conn = new PDO($db_name, $user_name, $user_password); // Fixed the variable name

    // Set the PDO error mode to exception
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    
    echo ""; // Added a success message
} catch (PDOException $e) {
    echo "Connection failed: " . $e->getMessage(); // Catch and display connection errors
}

function unique_id() {
    $chars = '123456789abcdefgijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $charLength = strlen($chars); // Fixed strLen to strlen
    $randomString = '';

    for ($i = 0; $i < 20; $i++) {
        $randomString .= $chars[mt_rand(0, $charLength - 1)]; // Fixed concatenation
    }
    return $randomString;
}
?>