<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Form data
    $name = htmlspecialchars($_POST['name']);
    $email = htmlspecialchars($_POST['email']);
    $password = htmlspecialchars($_POST['password']);

    // File path
    $filePath = __DIR__ . '/data/registration_data.txt';

    // Create directory if it doesn't exist
    if (!is_dir('data')) {
        mkdir('data', 0755, true);
    }

    // Prepare data to save
    $data = "Name: $name, Email: $email, Password: $password\n";

    // Save data to file
    file_put_contents($filePath, $data, FILE_APPEND | LOCK_EX);

    // Confirmation message
    echo "Registration successful!";
} else {
    echo "Invalid request.";
}
?>
